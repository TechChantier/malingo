<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'ActivityPhoto',
        'description',
        'link',
        'numberOfMembers',
        'location',
        'time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function joinRequest()
    {
        return $this->hasMany(JoinRequest::class);
    }

    public function joinedUsers()
    {
        return $this->belongsToMany(User::class, 'join_requests', 'activity_id', 'user_id')
            ->withPivot('status')
            ->wherePivot('status', 'accepted'); // Only accepted users
    }

    public function leaveReques(){
        $this->hasMany(LeaveRequest::class);
    }
}
