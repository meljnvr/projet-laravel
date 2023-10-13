<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Ad;

class AdPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Ad $ad)
    {
        return ($user->id === $ad->author_id or $user->role === 'admin');
    }

    public function delete(User $user, Ad $ad)
    {
        return ($user->id === $ad->author_id or $user->role === 'admin');
    }
}
