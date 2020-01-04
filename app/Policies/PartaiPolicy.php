<?php

namespace App\Policies;

use App\User;
use App\Partai;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartaiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the partai.
     *
     * @param  \App\User  $user
     * @param  \App\Partai  $partai
     * @return mixed
     */
    public function index(User $user) {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat partai dilarang");
        }
    }


    public function view(User $user, Partai $partai)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat partai dilarang");
        }
    }

    /**
     * Determine whether the user can create partais.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk menambah partai dilarang");
        }
    }

    /**
     * Determine whether the user can update the partai.
     *
     * @param  \App\User  $user
     * @param  \App\Partai  $partai
     * @return mixed
     */

    public function edit(User $user, Partai $partai)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk mengedit partai dilarang");
        }
    }

    public function update(User $user, Partai $partai)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk mengupdate partai dilarang");
        }
    }

    /**
     * Determine whether the user can delete the partai.
     *
     * @param  \App\User  $user
     * @param  \App\Partai  $partai
     * @return mixed
     */
    public function delete(User $user, Partai $partai)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk menghapus partai dilarang");
        }
    }

    /**
     * Determine whether the user can restore the partai.
     *
     * @param  \App\User  $user
     * @param  \App\Partai  $partai
     * @return mixed
     */
    public function restore(User $user, Partai $partai)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the partai.
     *
     * @param  \App\User  $user
     * @param  \App\Partai  $partai
     * @return mixed
     */
    public function forceDelete(User $user, Partai $partai)
    {
        //
    }
}
