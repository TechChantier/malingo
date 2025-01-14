<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JoinRequestController;
use App\Models\JoinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('activity', ActivityController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/activities/{activity}/join', [ActivityController::class, 'joinActivity'])->middleware('auth:sanctum');
Route::post('/join-request/{joinRequest}/accept', [JoinRequestController::class, 'acceptRequest'])->middleware('auth:sanctum');
Route::post('/join-request/{joinRequest}/decline', [JoinRequestController::class, 'declineRequest'])->middleware('auth:sanctum');

//  route to return user created, pending, accepted, declined activity
Route::get('/activities/user', [ActivityController::class, 'getUserActivities'])->middleware('auth:sanctum');

//  filter route

Route::get('/activities/filter', [ActivityController::class, 'filterActivities']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
