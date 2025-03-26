<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Edit User Profile
     * @group Profile Management
     * @authenticated
     * @bodyParam age int optional User's age
     * @bodyParam mobile_number string optional User's mobile number
     * @bodyParam profile_picture file optional User's profile picture
     * 
     * @response 200 {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "john@example.com",
     *   "age": 30,
     *   "mobile_number": "+1234567890",
     *   "profile_picture": "path/to/profile/picture.jpg"
     * }
     * 
     * @response 422 {
     *   "message": "Validation failed",
     *   "errors": {
     *     "mobile_number": ["The mobile number format is invalid"]
     *   }
     * }
     */
    public function editProfile(Request $request)
    {
        $user = $request->user();

        // Validate the incoming request
        $validatedData = $request->validate([
            'age' => 'nullable|integer|min:13|max:120',
            'mobile_number' => [
                'nullable', 
                'string', 
                'regex:/^[+]?[\d\s-]{10,15}$/'
            ],
            'profile_picture' => 'nullable|image|max:2048' // max 2MB
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture) {
                // Remove the old profile picture from storage
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validatedData['profile_picture'] = $profilePicturePath;
        }

        // Update user profile
        $user->update($validatedData);

        // Refresh user to get updated data
        $user->refresh();

        return response()->json($user, 200);
    }

    /**
     * Get Current User Profile
     * @group Profile Management
     * @authenticated
     * @response 200 {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "john@example.com",
     *   "age": 30,
     *   "mobile_number": "+1234567890",
     *   "profile_picture": "path/to/profile/picture.jpg"
     * }
     */
    public function getCurrentUserProfile(Request $request)
    {
        $user = $request->user();
        return response()->json($user, 200);
    }

    /**
     * Get a single user's public profile
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }
}