<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function update($user, $event){
        return $user->id == $event->organizer_id;
    }
    
    public function join($user, $event){
        return $user->role == 'participant' && $event->published;
    }
}
