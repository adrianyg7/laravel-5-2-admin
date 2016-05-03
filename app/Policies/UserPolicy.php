<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can be shown to the logged user.
     *
     * @param  \App\Models\User  $loggedUser
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function show(User $loggedUser, User $user)
    {
        if ($user->isSuperuser())
        {
            return false;
        }
        elseif ($loggedUser->id == $user->id)
        {
            return true;
        }
        elseif ($loggedUser->hasPermission('admin.users.show-all'))
        {
            return true;
        }

        return false;
    }

    /**
     * Determine if logged user can view form for given user.
     *
     * @param  \App\Models\User  $loggedUser
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function edit(User $loggedUser, User $user)
    {
        return ! $user->isSuperuser();
    }

    /**
     * Determine if the given user can be updated by logged user.
     *
     * @param  \App\Models\User  $loggedUser
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function update(User $loggedUser, User $user)
    {
        return ! $user->isSuperuser();
    }

    /**
     * Determine if the given user password can be updated by logged user.
     *
     * @param  \App\Models\User  $loggedUser
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function updatePassword(User $loggedUser, User $user)
    {
        return $loggedUser->id == $user->id;
    }
}
