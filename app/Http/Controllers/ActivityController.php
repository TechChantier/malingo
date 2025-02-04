<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

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

    /**
     * @group Activities
     * Get all activities
     *
     * Retrieve a list of all activities.
     *
     * @response 200 [{"id": 1, "title": "Sample Activity", "description": "Description", "location": "Location", "time": "2025-01-01 10:00:00"}]
     */
    public function index()
    {
        return Activity::all();
    }

    /**
     * @group Activities
     * Create a new activity
     *
     * Store a new activity created by the authenticated user.
     *
     * @bodyParam title string required: The title of the activity. Example: Morning Run
     * @bodyParam ActivityPhoto file: not required The photo of the activity. type: [png, jpeg]
     * @bodyParam description string required:  The description of the activity. Example: A group run in the park.
     * @bodyParam link string required: The link to the activity (if any). Example: https://zoom.com/meeting
     * @bodyParam location string required: The location of the activity. Example: Central Park
     * @bodyParam time datetime required: The date and time of the activity. Format: Y-m-d H:i:s. Example: 2025-01-01 10:00:00
     * 
     * @response 201 {"id": 1, "title": "Morning Run", "description": "A group run in the park.", "location": "Central Park", "time": "2025-01-01 10:00:00"}
     */
    public function store(Request $request)
    {
        $useractivity = $request->validate([
            'title' => 'required|string',
            'ActivityPhoto' => 'required|file|mimes:jpg,jpeg,png|max:10240',
            'description' => 'required|string',
            'link' => 'required|string',
            'numberOfMembers' => 'required',
            'location' => 'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // Store the file and get the path
        // if ($request->hasFile('ActivityPhoto')) {
        //     $useractivity['ActivityPhoto'] = $request->file('ActivityPhoto')->store('activity_photos', 'public');
        // }
        if ($request->hasFile('ActivityPhoto')) {
            Log::info('File present in request');
            $path = $request->file('ActivityPhoto')->store('activity_photos', 'public');
            Log::info('Stored file path: ' . $path);
            $useractivity['ActivityPhoto'] = $path;
        } else {
            Log::info('No file in request');
        }

        $post = $request->user()->activities()->create($useractivity);
        return $post;
    }

    /**
     * @group Activities
     * Get activity details
     *
     * Retrieve details of a specific activity.
     *
     * @urlParam activity int required The ID of the activity. Example: 1
     * 
     * @response 200 {"id": 1, "title": "Morning Run", "description": "A group run in the park.", "location": "Central Park", "time": "2025-01-01 10:00:00"}
     */
    public function show(Activity $activity)
    {
        return $activity;
    }

    /**
     * @group Activities
     * Update an activity
     *
     * Update the details of an existing activity.
     *
     * @urlParam activity int required The ID of the activity to update. Example: 1
     * @bodyParam title string required The updated title of the activity. Example: Evening Walk
     * @bodyParam description string required The updated description. Example: A peaceful evening walk.
     * @bodyParam location string required The updated location. Example: Riverside Park
     * @bodyParam time datetime required The updated date and time. Format: Y-m-d H:i:s. Example: 2025-01-02 18:00:00
     * 
     * @response 200 {"id": 1, "title": "Evening Walk", "description": "A peaceful evening walk.", "location": "Riverside Park", "time": "2025-01-02 18:00:00"}
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
     * @group Activities
     * Delete an activity
     *
     * Delete an activity created by the authenticated user.
     *
     * @urlParam activity int required The ID of the activity to delete. Example: 1
     * 
     * @response 200 {"message": "Activity deleted successfully"}
     */
    public function destroy(Activity $activity)
    {
        Gate::authorize('modify', $activity);
        $activity->delete();
        return [
            'message' => 'Activity deleted successfully',
        ];
    }


    /**
     * @group Activity Management
     * 
     * Endpoints for managing activities, including joining, filtering, searching, and leave requests.
     */

    /**
     * Join an activity
     * 
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     *
     * Send a request to join an activity.
     *
     * @bodyParam activity_id int required The ID of the activity to join.
     *
     * @response 201 {
     *   "message": "Join request sent successfully.",
     *   "join_request": {
     *     "id": 1,
     *     "user_id": 1,
     *     "activity_id": 2,
     *     "status": "pending"
     *   }
     * }
     * @response 400 {
     *   "message": "You have already requested to join this activity."
     * }
     */

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

    /**
     * Get user activities
     * 
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     *
     * Retrieve a list of activities the user has created, joined (pending, accepted, declined), or is waiting to join.
     *
     * @response 200 {
     *   "created_activities": [
     *     {
     *       "id": 1,
     *       "title": "Activity 1",
     *       "time": "2025-01-21T10:00:00",
     *       "location": "Location 1"
     *     }
     *   ],
     *   "pending_activities": [
     *     {
     *       "id": 2,
     *       "title": "Activity 2",
     *       "status": "pending"
     *     }
     *   ],
     *   "accepted_activities": [
     *     {
     *       "id": 3,
     *       "title": "Activity 3",
     *       "status": "accepted"
     *     }
     *   ],
     *   "declined_activities": [
     *     {
     *       "id": 4,
     *       "title": "Activity 4",
     *       "status": "declined"
     *     }
     *   ]
     * }
     */
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

    /**
     * Filter activities by title, description, date, and location
     *
     * Retrieve activities based on specified filters.
     *
     * @queryParam title string optional Filter by title.
     * @queryParam description string optional Filter by description.
     * @queryParam date string optional Filter by date (format: y-m-d).
     * @queryParam location string optional Filter by location.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "title": "Filtered Activity",
     *     "description": "Activity description",
     *     "time": "2025-01-21T10:00:00",
     *     "location": "Location 1"
     *   }
     * ]
     * @response 400 {
     *   "message": "Invalid date format, please use a valid date"
     * }
     */
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



    /**
     * Get users who joined a specific activity
     *
     * Retrieve a list of users who have joined a particular activity.
     *
     * @urlParam activityId int required The ID of the activity.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "User 1",
     *     "email": "user1@example.com"
     *   }
     * ]
     * @response 404 {
     *   "message": "Activity not found"
     * }
     */
    public function getJoinedUsers($activityId)
    {
        //find the activity
        $activity = Activity::find($activityId);


        //check if activity exists
        if (!$activity) {
            return response()->json([
                'message' => 'Activity not found',
            ], 404);
        }
        $joinedUsers = $activity->joinedUsers;
        return response()->json($joinedUsers);
    }


    /**
     * Search activities by title, description, location, or date
     *
     * Search for activities based on the provided parameters.
     *
     * @queryParam title string optional Filter by title.
     * @queryParam description string optional Filter by description.
     * @queryParam location string optional Filter by location.
     * @queryParam date string optional Filter by date (format: y-m-d).
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "title": "Activity 1",
     *     "time": "2025-01-21T10:00:00",
     *     "location": "Location 1"
     *   }
     * ]
     */
    public function search(Request $request)
    {

        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'date' => 'nullable'
        ]);

        //define the searc parameters
        $query = Activity::query();

        //filter the search parameters
        if ($request->has('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->has('description')) {
            $query->where('description', 'LIKE', '%' . $request->description . '%');
        }
        if ($request->has('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }
        if ($request->has('date')) {
            $query->whereDate('time', $request->date); //assuming time is store as date time field
        }

        //order by date in descending order
        $activity = $query->orderBy('time', 'desc')->get();

        return response()->json($activity);
    }


    /**
     * Request leave from an activity
     * 
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     *
     * Send a request to leave an activity.
     *
     * @bodyParam activity_id int required The ID of the activity.
     *
     * @response 201 {
     *   "message": "Leave request sent successfully",
     *   "leaveRequest": {
     *     "id": 1,
     *     "user_id": 1,
     *     "activity_id": 2,
     *     "status": "pending"
     *   }
     * }
     * @response 403 {
     *   "message": "You are not a participant in this activity"
     * }
     */
    public function requestLeave(Request $request, Activity $activity)
    {
        $user = Auth::user();

        //check if user already joined activity

        if (!$activity->joinRequest()->where('user_id', $user->id)->where('status', 'accepted')->exists()) {
            return response()->json([
                'message' => 'you are not a participant in this activity',
            ], 403);
        }

        //create a leave request
        $leaveRequest = LeaveRequest::create([
            'user_id' => $user->id,
            'activity_id' => $activity->id,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Leave request sent successfully',
            'leaveRequest' => $leaveRequest,
        ], 201);
    }
}
