<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @group Users
     *
     * Endpoints for fetching user details.
     */

    /**
     * Show user details by ID
     * @authenticated
     *@header Authorization string required The authentication token. Example: Bearer {token}
     * Retrieve the details of a user by their ID.
     *
     * @urlParam id int required The ID of the user. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "john@example.com",
     *   "created_at": "2021-01-01T00:00:00Z",
     *   "updated_at": "2021-01-01T00:00:00Z"
     * }
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
