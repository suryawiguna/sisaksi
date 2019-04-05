<?php

namespace App\Policies;

use App\User;
use App\Target;
use Illuminate\Auth\Access\HandlesAuthorization;

class TargetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the target.
     *
     * @param  \App\User  $user
     * @param  \App\Target  $target
     * @return mixed
     */

    public function edit(User $user) {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(404);
        }
    }


    public function view(User $user, Target $target)
    {
        //
    }

    /**
     * Determine whether the user can create targets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the target.
     *
     * @param  \App\User  $user
     * @param  \App\Target  $target
     * @return mixed
     */
    public function update(User $user, Target $target)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(404);
        }
    }

    /**
     * Determine whether the user can delete the target.
     *
     * @param  \App\User  $user
     * @param  \App\Target  $target
     * @return mixed
     */
    public function delete(User $user, Target $target)
    {
        //
    }

    /**
     * Determine whether the user can restore the target.
     *
     * @param  \App\User  $user
     * @param  \App\Target  $target
     * @return mixed
     */
    public function restore(User $user, Target $target)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the target.
     *
     * @param  \App\User  $user
     * @param  \App\Target  $target
     * @return mixed
     */
    public function forceDelete(User $user, Target $target)
    {
        //
    }
}
