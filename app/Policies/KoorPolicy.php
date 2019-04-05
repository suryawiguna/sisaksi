<?php

namespace App\Policies;

use App\User;
use App\Koor;
use Illuminate\Auth\Access\HandlesAuthorization;

class KoorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the koor.
     *
     * @param  \App\User  $user
     * @param  \App\Koor  $koor
     * @return mixed
     */
    public function index(User $user) {
        if ($user->is(1) || $user->is(2)) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat koordinator saksi dilarang");
        }
    }

    public function view(User $user)
    {
        if ($user->is(1) || $user->is(2)) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat detail koordinator saksi dilarang");
        }
    }

    /**
     * Determine whether the user can create koors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->is(2)) {
            return true;
        }
        else {
            abort(403, "Akses untuk menambah koordinator saksi dilarang");
        }
    }

    public function edit(User $user, Koor $koor) {
        if($user->id === $koor->kelurahan->kecamatan->user->id || $user->id === $koor->user_id) {
            return true;
        }
        else {
            abort(403, "Akses untuk mengedit koordinator saksi dilarang");
        }
    }
    /**
     * Determine whether the user can update the koor.
     *
     * @param  \App\User  $user
     * @param  \App\Koor  $koor
     * @return mixed
     */
    public function update(User $user, Koor $koor)
    {
        if($user->id === $koor->kelurahan->kecamatan->user->id || $user->id === $koor->user_id){
            return true;
        }
        else {
            abort(403, "Akses untuk mengupdate koordinator saksi dilarang");
        }
    }

    /**
     * Determine whether the user can delete the koor.
     *
     * @param  \App\User  $user
     * @param  \App\Koor  $koor
     * @return mixed
     */
    public function delete(User $user, Koor $koor)
    {
        if($user->id === $koor->kelurahan->kecamatan->user->id){
            return true;
        }
        else {
            abort(403, "Akses untuk menghapus koordinator saksi dilarang");
        }
    }

    /**
     * Determine whether the user can restore the koor.
     *
     * @param  \App\User  $user
     * @param  \App\Koor  $koor
     * @return mixed
     */
    public function restore(User $user, Koor $koor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the koor.
     *
     * @param  \App\User  $user
     * @param  \App\Koor  $koor
     * @return mixed
     */
    public function forceDelete(User $user, Koor $koor)
    {
        //
    }

    public function myKoor(User $user)
    {
        if ($user->is(2)) {
            return true;
        }
        else {
            abort(403, "Akses untuk halaman ini dilarang");
        }
    }
}
