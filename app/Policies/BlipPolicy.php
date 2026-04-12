<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blip;

class BlipPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }
    // edit/delete only own blips
    public function update(User $user, Blip $blip)
    {
        return $user->id === $blip->user_id;
    }
    public function delete(User $user, Blip $blip)
    {
        return $user->id === $blip->user_id;
    }
}
