<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

    public static function middleWare()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }
    public function index()
    {
        return Activity::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $useractivity = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'location' => 'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $post = $request->user()->activities()->create($useractivity);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return $activity;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        Gate::authorize('modify', $activity);
        $useractivity = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $activity->update($useractivity);
        return $activity;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        Gate::authorize('modify', $activity);
        $activity->delete();
        return [
            'message' => 'Activity deleted successfully',
        ];
    }

    public function joinActivity(Request $request, Activity $activity)
    {
        $user = $request->user(); //get authenticated user

        //check if the user has already requested to join

        $existingRequest = $activity->joinRequest()->where('user_id', $user->id)->first();
        if ($existingRequest) {
            return response()->json([
                'message' => 'you have already requested to join this activity',
            ], 400);
        }

        //Create join Request

        $JoinRequest = $activity->joinRequest()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Join request sent successfully.',
            'join_request' => $JoinRequest
        ], 201);
    }

    // get all user user activities, pending, accepted, declined, created
    public function getUserActivities(Request $request)
    {
        $user = $request->user();

        //retrieve created activities
        $createdActivities = $user->activities;

        // to paginate the created activity use:
        //                            $createdActivities = $user->activities()->paginate(10);

        //retrieve joined request with theire associated activities
        $joinRequests = $user->sentJoinRequest()->with('activity')->get();

        //categorize join requests
        $pendingActivities = $joinRequests->where('status', 'pending')->pluck('activity');
        $acceptedActivities = $joinRequests->where('status', 'accepted')->pluck('activity');
        $declinedgActivities = $joinRequests->where('status', 'declined')->pluck('activity');

        return response()->json([
            'created_activities' => $createdActivities,
            'pending_activities' => $pendingActivities,
            'accepted_activities' => $acceptedActivities,
            'declined_activities' => $declinedgActivities,
        ]);
    }

    //filter activity

    public function filterActivities(Request $request)
    {
        //validate the request 
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'date' => 'nullable',
            'location' => 'nullable|string',
        ]);

        //retrieve filter parameters
        $title = $request->query('title');
        $description = $request->query('description');
        $date = $request->query('date'); //format: y-m-d
        $location = $request->query('location');

        //build the query
        $query = Activity::query();

        //apply filter if parameters are provided
        if ($title) {
            $query->where('title', 'LIKE', "%{$title}%");
        }
        if ($description) {
            $query->where('description', 'LIKE', "%{$description}%");
        }
        if ($date) {
            //format date before searching
            try {
                // convert date to y-m-d format
                $formattedDate = Carbon::parse($date)->format('y-m-d');
                $query->whereDate('time', '=', $formattedDate);
            } catch (\Exception $e) {
                // handle invalid date format
                return response()->json([
                    'message' => 'Invalid date format, please use a valid date',
                ], 400);
            }
        }
        if ($location) {
            $query->where('location', 'LIKE', "%{$location}%");
        } {

            // BASIC OPTIONS 

            // for pagination
            // $activities = $query->orderBy('time', 'desc')->paginate(10);


            // cache results: use laravel catching to optimize frequently requested filters
            // $activities = Cache::remember("filtered_activities_" . md5($request->fullUrl()), 60, function () use ($query) {
            //     return $query->get();
            // });

        }

        //get the filter activities in descending order
        $activities = $query->get();

        return response()->json($activities);
    }
}
