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
        'description',
        'link',
        'location',
        'time',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function joinRequest(){
        return $this->hasMany(JoinRequest::class);
    }
}
