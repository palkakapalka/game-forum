<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the admin section.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAdminSection(User $user)
    {
        return $user->userType === 'admin';
    }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
