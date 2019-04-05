<?php

namespace App\Policies;

use App\User;
use App\C1;
use Illuminate\Auth\Access\HandlesAuthorization;

class C1Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the c1.
     *
     * @param  \App\User  $user
     * @param  \App\C1  $c1
     * @return mixed
     */

    public function index(User $user) {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, 'Akses untuk melihat foto C1 dilarang');
        }
    }

    public function view(User $user, C1 $c1)
    {
        //
    }

    /**
     * Determine whether the user can create c1 s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->is(4)) {
            return true;
        }
        else {
            abort(403, 'Akses untuk tambah foto C1 dilarang');
        }
    }

    public function edit(User $user, C1 $c1) {
        if($user->saksi->id === $c1->saksi_id) {
            return true;
        }
        else {
            abort(403, 'Akses untuk edit foto C1 dilarang');
        }
    }

    /**
     * Determine whether the user can update the c1.
     *
     * @param  \App\User  $user
     * @param  \App\C1  $c1
     * @return mixed
     */
    public function update(User $user, C1 $c1)
    {
        if($user->saksi->id === $c1->saksi_id) {
            return true;
        }
        else {
            abort(403, 'Akses untuk update foto C1 dilarang');
        }
    }

    /**
     * Determine whether the user can delete the c1.
     *
     * @param  \App\User  $user
     * @param  \App\C1  $c1
     * @return mixed
     */
    public function delete(User $user, C1 $c1)
    {
        if($user->saksi->id === $c1->saksi_id) {
            return true;
        }
        else {
            abort(403, 'Akses untuk hapus foto C1 dilarang');
        }
    }

    /**
     * Determine whether the user can restore the c1.
     *
     * @param  \App\User  $user
     * @param  \App\C1  $c1
     * @return mixed
     */
    public function restore(User $user, C1 $c1)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the c1.
     *
     * @param  \App\User  $user
     * @param  \App\C1  $c1
     * @return mixed
     */
    public function forceDelete(User $user, C1 $c1)
    {
        //
    }

    public function c1Saya(User $user) {
        if($user->is(4)) {
            return true;
        }
        else {
            abort(403, "Akses untuk halaman ini dilarang");
        }
    }
}
