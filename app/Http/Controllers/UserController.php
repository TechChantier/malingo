<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /**
     * @group Geneneral User Endpoints
     * get single user details by ID
     * @authenticated
     *@header Authorization string required The authentication token. Example: Bearer {token}
     * Retrieve the details of a user by their ID.
     *
     * @urlParam id int required The ID of the user. Example: 1
     *
     * @response 200 {
     *"id": 1,
     *"name": "Nkuma Confident",
     *"email": "nsem@gmail.com",
     *"email_verified_at": null,
     *"created_at": "2025-02-04T08:18:33.000000Z",
     *"updated_at": "2025-02-04T08:18:33.000000Z"
     *}
     * @response 404 {
     *   "message": "User not found"
     * }
     */
    public function show($id)
    {
        //find user by id
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
        return response()->json($user, 200);
    }
}
