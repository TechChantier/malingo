<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ActivityController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     public static function middleWare(){
        return[
        new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
     }
    public function index()
    {
        return Activity::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $useractivity = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'time'=>'required|date_format:Y-m-d H:i:s',
        ]);

        $post = $request->user()->activities()->create($useractivity);
        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return $activity;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $useractivity = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'time'=>'required|date_format:Y-m-d H:i:s',
        ]);

        $activity->update($useractivity);
        return $activity;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return [
            'message'=> 'Activity deleted successfully',
        ];
    }
}
