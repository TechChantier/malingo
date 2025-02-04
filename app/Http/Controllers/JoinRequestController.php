<?php

namespace App\Http\Controllers;

use App\Models\JoinRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class JoinRequestController extends Controller
{

    /**
     * @group Join Requests
     *
     * Endpoints to accept or decline join requests for activities.
     */

    /**
     * @group Activity Request
     * Accept a join request
     *
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     * 
     * Accept a user's request to join an activity, and send a response with a WhatsApp link.
     *
     * @bodyParam joinRequest_id int required The ID of the join request to accept. Example: 1
     *
     * @response 200 {
     *   "message": "Join request accepted",
     *   "whatsapp_link": "https://wa.me/1234567890"
     * }
     * @response 403 {
     *   "message": "Unauthorized"
     * }
     */
    public function acceptRequest(Request $request, JoinRequest $joinRequest)
    {
        $activity = $joinRequest->activity;
        //check if the authenticated user owns the activity
        if ($activity->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        //update the join activity status
        $joinRequest->update(['status' => 'accepted']);

        //send a response to the requester
        return response()->json([
            'message' => 'Join request accepted',
            'whatsapp_link' => $activity->link, //send the whatsapp link
        ]);
    }

    /**
     * @group Activity Request
     * Decline a join request
     * 
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     *
     * Decline a user's request to join an activity and notify the requester.
     *
     * @bodyParam joinRequest_id int required The ID of the join request to decline. Example: 1
     *
     * @response 200 {
     *   "message": "Your request to join this activity has been declined"
     * }
     * @response 403 {
     *   "message": "Unauthorized"
     * }
     */
    public function declineRequest(Request $request, JoinRequest $joinRequest)
    {
        $activity = $joinRequest->activity;

        //check if the authenticated user owns the activvity
        if ($activity->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        //updated join request status

        $joinRequest->update(['status' => 'declined']);

        //notify the requester

        return response()->json([
            'message' => 'Your request to join this activity has been decline',
        ]);
    }
}
