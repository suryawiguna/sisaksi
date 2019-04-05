<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */

    public function index(User $user) {
        if($user->role_id == 1) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat pengguna dilarang");
        }
    }

    public function view(User $user, User $model)
    {
        if($user->role_id == 1) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat pengguna dilarang");
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        abort(403, 'Akses untuk menambah pengguna dilarang');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        if($user->role_id == 1) {
            return true;
        }
        else if($user->role_id == 2 && $model->role_id !== 1) {
            return true;
        }
        else if($user->id == $model->id) {
            return true;        
        }
        else {
            abort(403, "Akses untuk update pengguna dilarang");
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }

    public function editProfil(User $user) {
        if($user->role_id === 3 || $user->role_id === 4) {
            return true;
        }
        else {
            abort(404);
        }
    }
}
