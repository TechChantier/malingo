<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'mobile_number',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function sentJoinRequest()
    {
        return $this->hasMany(JoinRequest::class, 'user_id');
    }
    public function recievedJoinRequest()
    {
        return $this->hasManyThrough(JoinRequest::class, Activity::class, 'user_id', 'activity_id');
    }

    public function joinedActivities()
    {
        return $this->belongsToMany(Activity::class, 'join_requests')
            ->withPivot('status');
    }

    public function leaveRequest()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
