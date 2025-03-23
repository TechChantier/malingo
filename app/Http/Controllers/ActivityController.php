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
     *@authenticated
     * Retrieve a list of all activities.
     *
     * @response 200 {"created_activities":[{"id":1,"user_id":1,"title":"Hiking Adventure","ActivityPhoto":null,"description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":10,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T08:19:02.000000Z","updated_at":"2025-02-04T08:19:02.000000Z"},{"id":2,"user_id":1,"title":"Hiking Adventure","ActivityPhoto":null,"description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":10,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T08:25:56.000000Z","updated_at":"2025-02-04T08:25:56.000000Z"},{"id":3,"user_id":1,"title":"Hiking Adventure","ActivityPhoto":null,"description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":10,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T08:36:04.000000Z","updated_at":"2025-02-04T08:36:04.000000Z"},{"id":4,"user_id":1,"title":"Hiking Adventure","ActivityPhoto":"activity_photos\/rj6fjePPJweFYZf07s9dCtAjL84pKv12XGzWIW81.jpg","description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":10,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T09:07:10.000000Z","updated_at":"2025-02-04T09:07:10.000000Z"},{"id":5,"user_id":1,"title":"Join me at Tech Chantier","ActivityPhoto":"activity_photos\/2bAlnxzYIELlyfUW02fyNbLIobPMGzrUj8DLtchk.jpg","description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":10,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T09:11:42.000000Z","updated_at":"2025-02-04T09:11:42.000000Z"},{"id":6,"user_id":1,"title":"Join me at Tech Chantier","ActivityPhoto":"activity_photos\/OfdYJQsOrGOnYCKFtPDrhhv2Kp7PP5zZ40Q08Exk.jpg","description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":10,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T09:13:20.000000Z","updated_at":"2025-02-04T09:13:20.000000Z"},{"id":7,"user_id":1,"title":"Join me at Tech Chantier","ActivityPhoto":"activity_photos\/wvnmS2UuVkm1pfcNbhqcq6ouYonmj3G5Qd2KL69x.jpg","description":"A thrilling hike to the mountain peak.","link":"https:\/\/example.com\/hiking-event","numberOfMembers":40,"location":"Mount Fako, Cameroon","time":"2025-02-15 08:00:00","created_at":"2025-02-04T09:18:46.000000Z","updated_at":"2025-02-04T09:18:46.000000Z"}],"pending_activities":[],"accepted_activities":[],"declined_activities":[]}
     */
    public function index()
    {
        return Activity::all();
    }

    /**
     * @group Activities
     * Create a new activity
     *@authenticated
     * Store a new activity created by the authenticated user.
     *
     * @bodyParam title string required: The title of the activity. Example: Morning Run
     * @bodyParam ActivityPhoto file: required The photo of the activity. type: [png, jpeg]
     * @bodyParam description string required:  The description of the activity. Example: A group run in the park.
     * @bodyParam link string required: The link to the activity (if any). Example: https://zoom.com/meeting
     * @bodyParam numberOfMembers integer the number of member to the activity is required
     * @bodyParam location string required: The location of the activity. Example: Central Park
     * @bodyParam time datetime required: The date and time of the activity. Format: Y-m-d H:i:s. Example: 2025-01-01 10:00:00
     * 
     * @response 201 {
     *"title": "Join me at Tech Chantier",
     *"ActivityPhoto": "activity_photos/wvnmS2UuVkm1pfcNbhqcq6ouYonmj3G5Qd2KL69x.jpg",
     *"description": "A thrilling hike to the mountain peak.",
     *"link": "https://example.com/hiking-event",
     *"numberOfMembers": "40",
     *"location": "Mount Fako, Cameroon",
     *"time": "2025-02-15 08:00:00",
     *"user_id": 1,
     *"updated_at": "2025-02-04T09:18:46.000000Z",
     *"created_at": "2025-02-04T09:18:46.000000Z",
     *"id": 7
     *}
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
        // if ($request->hasFile('ActivityPhoto')) {
        //     $path = $request->file('ActivityPhoto')->store('activity_photos', 'public');
        //     $useractivity['ActivityPhoto'] = $path;
        // }
        if ($request->hasFile('ActivityPhoto')) {
            $path = $request->file('ActivityPhoto')->store('activity_photos', 'public');
            $useractivity['ActivityPhoto'] = asset('storage/' . $path);
        }

        $post = $request->user()->activities()->create($useractivity);
        return $post;
    }

    /**
     * @group Activities
     * Get activity details
     *@authenticated
     * Retrieve details of a specific activity.
     *
     * @urlParam activity int required The ID of the activity. Example: 1
     * 
     * @response 200 {
     *"id": 5,
     *"user_id": 1,
     *"title": "Join me at Tech Chantier",
     *"ActivityPhoto": "activity_photos/2bAlnxzYIELlyfUW02fyNbLIobPMGzrUj8DLtchk.jpg",
     *"description": "A thrilling hike to the mountain peak.",
     *"link": "https://example.com/hiking-event",
     *"numberOfMembers": 10,
     *"location": "Mount Fako, Cameroon",
     *"time": "2025-02-15 08:00:00",
     *"created_at": "2025-02-04T09:11:42.000000Z",
     *"updated_at": "2025-02-04T09:11:42.000000Z"
     *}
     */
    public function show(Activity $activity)
    {
        return $activity;
    }

    /**
     * @group Activities
     * Update an activity
     *@authenticated
     * Update the details of an existing activity.
     *
     * @urlParam activity int required The ID of the activity to update. Example: 1
     * @bodyParam title string : The title of the activity. Example: Morning Run
     * @bodyParam ActivityPhoto file:  The photo of the activity. type: [png, jpeg]
     * @bodyParam description string:  The description of the activity. Example: A group run in the park.
     * @bodyParam link string: The link to the activity (if any). Example: https://zoom.com/meeting
     * @bodyParam numberOfMembers integer the number of member to the activity is required
     * @bodyParam location string: The location of the activity. Example: Central Park
     * @bodyParam time datetime: The date and time of the activity. Format: Y-m-d H:i:s. Example: 2025-01-01 10:00:00
     * 
     * @response 200 {
     *"id": 5,
     *"user_id": 1,
     *"title": "Hiking go and hike with me",
     *"ActivityPhoto": "activity_photos/uNughpq7aXWNcUTYFOgFBFEFxqcr3DeY60PuOwNu.jpg",
     *"description": "this is a good activity",
     *"link": "https//wa.me/237672474539",
     *"numberOfMembers": "10",
     *"location": "buea",
     *"time": "2025-02-15 08:00:00",
     *"created_at": "2025-02-04T09:11:42.000000Z",
     *"updated_at": "2025-02-04T11:35:10.000000Z"
     *}
     */
    public function update(Request $request, Activity $activity)
    {
        Gate::authorize('modify', $activity);

        $useractivity = $request->validate([
            'title' => 'sometimes|string',
            'ActivityPhoto' => 'sometimes|file|mimes:jpg,jpeg,png|max:10240',
            'description' => 'sometimes|string',
            'link' => 'sometimes|string',
            'numberOfMembers' => 'sometimes',
            'location' => 'sometimes|string',
            'time' => 'sometimes|date_format:Y-m-d H:i:s',
        ]);

        try {
            if ($request->hasFile('ActivityPhoto')) {
                Log::info('Updating file');
                $path = $request->file('ActivityPhoto')->store('activity_photos', 'public');
                $useractivity['ActivityPhoto'] = $path;
            }

            $activity->update($useractivity);
            return $activity;
        } catch (\Exception $e) {
            Log::error('Error updating activity: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating activity'], 500);
        }
    }

    /**
     * @group Activities
     * Delete an activity
     *@authenticated
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
     *"message": "Join request sent successfully.",
     *"join_request": {
     *    "user_id": 2,
     *    "status": "pending",
     *    "activity_id": 5,
     *    "updated_at": "2025-02-04T12:16:50.000000Z",
     *    "created_at": "2025-02-04T12:16:50.000000Z",
     *    "id": 1
     *}
     *}
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
     * @group Activity Management
     * 
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     *
     * Retrieve a list of activities the user has created, joined (pending, accepted, declined), or is waiting to join.
     *
     * @response 200 {
     *"created_activities": [
     *    {
     *        "id": 1,
     *        "user_id": 1,
     *        "title": "Hiking Adventure",
     *        "ActivityPhoto": null,
     *        "description": "A thrilling hike to the mountain peak.",
     *        "link": "https://example.com/hiking-event",
     *        "numberOfMembers": 10,
     *        "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T08:19:02.000000Z",
     *        "updated_at": "2025-02-04T08:19:02.000000Z"
     * *    },
     *    {
     *        "id": 2,
     *         "user_id": 1,
     *        "title": "Hiking Adventure",
     *         "ActivityPhoto": null,
     *         "description": "A thrilling hike to the mountain peak.",
     *      "link": "https://example.com/hiking-event",
     *         "numberOfMembers": 10,
     *         "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T08:25:56.000000Z",
     *        "updated_at": "2025-02-04T08:25:56.000000Z"
     *    },
     *    {
     *        "id": 3,
     *        "user_id": 1,
     *        "title": "Hiking Adventure",
     *        "ActivityPhoto": null,
     *        "description": "A thrilling hike to the mountain peak.",
     *        "link": "https://example.com/hiking-event",
     *        "numberOfMembers": 10,
     *        "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T08:36:04.000000Z",
     *        "updated_at": "2025-02-04T08:36:04.000000Z"
     *    },
     *    {
     *        "id": 4,
     *        "user_id": 1,
     *        "title": "Hiking Adventure",
     *        "ActivityPhoto": "activity_photos/rj6fjePPJweFYZf07s9dCtAjL84pKv12XGzWIW81.jpg",
     *        "description": "A thrilling hike to the mountain peak.",
     *        "link": "https://example.com/hiking-event",
     *        "numberOfMembers": 10,
     *        "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T09:07:10.000000Z",
     *        "updated_at": "2025-02-04T09:07:10.000000Z"
     *    },
     *    {
     *        "id": 5,
     *        "user_id": 1,
     *        "title": "Join me at Tech Chantier",
     *        "ActivityPhoto": "activity_photos/2bAlnxzYIELlyfUW02fyNbLIobPMGzrUj8DLtchk.jpg",
     *        "description": "A thrilling hike to the mountain peak.",
     *        "link": "https://example.com/hiking-event",
     *        "numberOfMembers": 10,
     *        "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T09:11:42.000000Z",
     *        "updated_at": "2025-02-04T09:11:42.000000Z"
     *    },
     *    {
     *        "id": 6,
     *        "user_id": 1,
     *        "title": "Join me at Tech Chantier",
     *         "ActivityPhoto": "activity_photos/OfdYJQsOrGOnYCKFtPDrhhv2Kp7PP5zZ40Q08Exk.jpg",
     *         "description": "A thrilling hike to the mountain peak.",
     *         "link": "https://example.com/hiking-event",
     *        "numberOfMembers": 10,
     *        "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T09:13:20.000000Z",
     *        "updated_at": "2025-02-04T09:13:20.000000Z"
     *    },
     *    {
     *        "id": 7,
     *        "user_id": 1,
     *        "title": "Join me at Tech Chantier",
     *        "ActivityPhoto": "activity_photos/wvnmS2UuVkm1pfcNbhqcq6ouYonmj3G5Qd2KL69x.jpg",
     *        "description": "A thrilling hike to the mountain peak.",
     *        "link": "https://example.com/hiking-event",
     *        "numberOfMembers": 40,
     *        "location": "Mount Fako, Cameroon",
     *        "time": "2025-02-15 08:00:00",
     *        "created_at": "2025-02-04T09:18:46.000000Z",
     *        "updated_at": "2025-02-04T09:18:46.000000Z"
     *    }
     *    ],
     *    "pending_activities": [],
     *    "accepted_activities": [],
     *    "declined_activities": []
     *}
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
     * @group Searching
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
     *{
     *    "id": 5,
     *    "user_id": 1,
     *    "title": "Hiking go and hike with me",
     *    "ActivityPhoto": "activity_photos/QDEBUm8GSGbdAFob56QOh4EidyLtgFR5NckhQFBQ.jpg",
     *    "description": "this is a good activity",
     *    "link": "https//wa.me/237672474539",
     *    "numberOfMembers": 10,
     *    "location": "buea",
     *    "time": "2025-02-15 08:00:00",
     *     "created_at": "2025-02-04T09:11:42.000000Z",
     *     "updated_at": "2025-02-04T11:43:41.000000Z"
     * }
     *]
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
     * @group Activity Management
     *
     * Retrieve a list of users who have joined a particular activity.
     *
     * @urlParam activityId int required The ID of the activity.
     *
     * @response 200 [
     *   {
     *       "id": 2,
     *        "name": "Nkwi Cyril",
     *        "email": "nkwicyril@gmail.com",
     *        "email_verified_at": null,
     *        "created_at": "2025-02-04T09:37:07.000000Z",
     *        "updated_at": "2025-02-04T09:37:07.000000Z",
     *        "pivot": {
     *            "activity_id": 9,
     *            "user_id": 2,
     *            "status": "accepted"
     *        }
     *    }
     *]
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
 * @group Searching
 * Search activities by parameter or specific fields
 *
 * Search for activities using a general parameter or specific field filters.
 *
 * @urlParam parameter string optional General search term to find across title, description, and location.
 * @queryParam title string optional Filter by title.
 * @queryParam description string optional Filter by description.
 * @queryParam location string optional Filter by location.
 * @queryParam date string optional Filter by date (format: y-m-d).
 *
 * @response 200 [
 *    {
 *        "id": 5,
 *        "user_id": 1,
 *        "title": "Hiking go and hike with me",
 *        "ActivityPhoto": "activity_photos/QDEBUm8GSGbdAFob56QOh4EidyLtgFR5NckhQFBQ.jpg",
 *        "description": "this is a good activity",
 *        "link": "https//wa.me/237672474539",
 *        "numberOfMembers": 10,
 *        "location": "buea",
 *        "time": "2025-02-15 08:00:00",
 *        "created_at": "2025-02-04T09:11:42.000000Z",
 *        "updated_at": "2025-02-04T11:43:41.000000Z"
 *    }
 *]
 */
public function search(Request $request, $parameter = null)
{
    // Start with a base query
    $query = Activity::query();

    // If a path parameter is provided, search across all searchable fields
    if ($parameter) {
        $query->where(function($q) use ($parameter) {
            $q->where('title', 'LIKE', "%{$parameter}%")
              ->orWhere('description', 'LIKE', "%{$parameter}%")
              ->orWhere('location', 'LIKE', "%{$parameter}%");
        });
    }

    // Handle additional query parameters as before
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
        $query->whereDate('time', $request->date);
    }

    // Order by date in descending order
    $activity = $query->orderBy('time', 'desc')->get();

    return response()->json($activity);
}

    /**
     * @group Activity Request
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
     *"message": "Leave request sent successfully",
     *"leaveRequest": {
     *    "user_id": 2,
     *    "activity_id": 9,
     *    "status": "pending",
     *    "updated_at": "2025-02-04T13:16:58.000000Z",
     *    "created_at": "2025-02-04T13:16:58.000000Z",
     *    "id": 1
     *   }
     *}
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
