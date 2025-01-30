<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class LeaveRequestController extends Controller
{
    /**
     * @group Leave Requests
     *
     * Endpoints for approving leave requests for activities.
     */

    /**
     * Approve a leave request
     * 
     * @authenticated
     * @header Authorization string required The authentication token. Example: Bearer {token}
     *
     * Approve a user's leave request for an activity.
     *
     * @bodyParam leaveRequest_id int required The ID of the leave request to approve. Example: 1
     *
     * @response 200 {
     *   "message": "The leave request has been approved"
     * }
     * @response 403 {
     *   "message": "You are not authorized to approve this request"
     * }
     */
    public function approveLeave(Request $request, LeaveRequest $leaveRequest)
    {
        $activityOwner = $leaveRequest->activity->user_id;

        //ensure the logged in owner is the owner of the activity
        if (Auth::id() !== $activityOwner) {
            return response()->json([
                'message' => 'you are not authorized to approve this request',
            ], 403);
        }
        //approve the leave request
        $leaveRequest->update(['status', 'approved']);

        return response()->json([
            'message' => 'the leave request has been approved',
        ]);
    }
}
