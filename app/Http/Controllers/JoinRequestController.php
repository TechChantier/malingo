<?php

namespace App\Http\Controllers;

use App\Models\JoinRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class JoinRequestController extends Controller
{
    public function acceptRequest(Request $request, JoinRequest $joinRequest){
        $activity = $joinRequest->activity;
        //check if the authenticated user owns the activity
        if($activity->user_id !== $request->user()->id){
            return response()->json([
                'message'=>'Unauthorized'
            ], 403);
        }

        //update the join activity status
        $joinRequest->update(['status'=>'accepted']);

        //send a response to the requester
        return response()->json([
            'message' => 'Join request accepted',
            'whatsapp_link'=> $activity->link, //send the whatsapp link
        ]);
    }

    public function declineRequest(Request $request, JoinRequest $joinRequest){
        $activity = $joinRequest->activity;

        //check if the authenticated user owns the activvity
        if($activity->user_id !== $request->user()->id){
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }
        
        //updated join request status

        $joinRequest->update(['status'=>'declined']);

        //notify the requester

        return response()->json([
            'message' => 'Your request to join this activity has been decline', 
        ]);
    }
}
