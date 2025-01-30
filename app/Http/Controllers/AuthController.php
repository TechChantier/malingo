<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 * 
 * Endpoints for user registration, login, and logout.
 * 
 * @authenticated Bearer token
 */
class AuthController extends Controller
{
    /**
     * Register a new user
     *
     * Create a new user account and generate an authentication token.
     * 
     * @unauthenticated
     *
     * @bodyParam name string required The user's full name. Example: John Doe
     * @bodyParam email string required The user's email address. Example: john@example.com
     * @bodyParam password string required The user's password (minimum 6 characters). Example: secretpassword
     * @bodyParam password_confirmation string required The confirmation of the password. Example: secretpassword
     *
     * @response 201 {
     *   "user": {
     *     "id": 1,
     *     "name": "John Doe",
     *     "email": "john@example.com",
     *     "created_at": "2025-01-21T10:00:00",
     *     "updated_at": "2025-01-21T10:00:00"
     *   },
     *   "token": "1|laravel_sanctum_token_string_here"
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *     "email": ["The email has already been taken."],
     *     "password": ["The password confirmation does not match."]
     *   }
     * }
     */
    public function register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user['password'] = Hash::make($user['password']);
        $registerUser = User::create($user);

        $token = $registerUser->createToken($request->name);

        return response()->json([
            'user' => $registerUser,
            'token' => $token->plainTextToken
        ], 201);
    }

    /**
     * Log in an existing user
     *
     * Authenticate a user using email and password, and generate an authentication token.
     * 
     * @unauthenticated
     *
     * @bodyParam email string required The user's email address. Example: john@example.com
     * @bodyParam password string required The user's password. Example: secretpassword
     *
     * @response 200 {
     *   "user": {
     *     "id": 1,
     *     "name": "John Doe",
     *     "email": "john@example.com",
     *     "created_at": "2025-01-21T10:00:00",
     *     "updated_at": "2025-01-21T10:00:00"
     *   },
     *   "token": "1|laravel_sanctum_token_string_here"
     * }
     * @response 401 {
     *   "message": "Invalid credentials"
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *     "email": ["The selected email is invalid."]
     *   }
     * }
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken($user->name);

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }

    /**
     * Log out the current user
     *
     * Revoke all of the user's tokens to log them out.
     * 
     * @authenticated
     *
     * @response 200 {
     *   "message": "Successfully logged out"
     * }
     * @response 401 {
     *   "message": "Unauthenticated"
     * }
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}