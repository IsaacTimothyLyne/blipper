<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Chirp;

class ChirpPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }
    // edit/delete only own chirps
    public function update(User $user, Chirp $chirp)
    {
        return $user->id === $chirp->user_id;
    }
    public function delete(User $user, Chirp $chirp)
    {
        return $user->id === $chirp->user_id;
    }
}
