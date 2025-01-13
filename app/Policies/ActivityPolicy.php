<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActivityPolicy
{
    
    public function modify(User $user, Activity $activity): Response
    {
        return $user->id === $activity->user_id
               ? Response::allow()
               : Response::deny('you are not allowed to perform this action');
    }
}
