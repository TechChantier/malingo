<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JoinRequestController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\UserController;
use App\Models\JoinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('activity', ActivityController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('users/{id}', [UserController::class, 'show'])->middleware('auth:sanctum');

//manage the joining of an activity
Route::post('/activities/{activity}/join', [ActivityController::class, 'joinActivity'])->middleware('auth:sanctum');
Route::post('/join-request/{joinRequest}/accept', [JoinRequestController::class, 'acceptRequest'])->middleware('auth:sanctum');
Route::post('/join-request/{joinRequest}/decline', [JoinRequestController::class, 'declineRequest'])->middleware('auth:sanctum');

//  route to return user created, pending, accepted, declined activity
Route::get('/activities/user', [ActivityController::class, 'getUserActivities'])->middleware('auth:sanctum');

//  filter route and search route
Route::get('/activities/filter', [ActivityController::class, 'filterActivities']);
Route::get('/activities/search', [ActivityController::class, 'search']);

//get number of users who joined an activity
Route::get('/activities/{id}/joined-users', [ActivityController::class, 'getJoinedUsers']);

//leave activity
Route::post('/activity/{activity}/leave', [ActivityController::class, 'requestLeave'])->middleware('auth:sanctum');
Route::post('/leave-requests/{leaveRequest}/approve', [LeaveRequestController::class, 'approveLeave'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
