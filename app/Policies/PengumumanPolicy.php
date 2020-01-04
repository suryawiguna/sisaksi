<?php

namespace App\Policies;

use App\User;
use App\Pengumuman;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengumumanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pengumuman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengumuman  $pengumuman
     * @return mixed
     */
    public function index(User $user)
    {
        if($user->role_id !== 1) {
            return true;
        }
        else {
            abort(403, "Mengarahkan ke panel pengumuman...");
        }
    }

    public function pengumumanku(User $user)
    {
        if($user->is(1)) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat panel pengumuman dilarang");
        }
    }
    
     public function view(User $user, Pengumuman $pengumuman)
    {
        if($pengumuman->status === 1 || $user->is(1)){
            return true;
        }
        else {
            abort(404);
        }
    }

    /**
     * Determine whether the user can create pengumumen.
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
            abort(403, "Akses untuk menambah pengumuman dilarang");
        }
    }

    /**
     * Determine whether the user can update the pengumuman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengumuman  $pengumuman
     * @return mixed
     */

    public function edit(User $user, Pengumuman $pengumuman)
    {
        if($user->id == $pengumuman->user_id) {
            return true;
        }
        else {
            abort(403, "Akses untuk mengedit pengumuman dilarang");
        }
    }

    public function update(User $user, Pengumuman $pengumuman)
    {
        if($user->id == $pengumuman->user_id) {
            return true;
        }
        else {
            abort(403, "Akses untuk mengupdate pengumuman dilarang");
        }
    }

    /**
     * Determine whether the user can delete the pengumuman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengumuman  $pengumuman
     * @return mixed
     */
    public function delete(User $user, Pengumuman $pengumuman)
    {
        if($user->id == $pengumuman->user_id) {
            return true;
        }
        else {
            abort(403, "Akses untuk menghapus pengumuman dilarang");
        }
    }

    /**
     * Determine whether the user can restore the pengumuman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengumuman  $pengumuman
     * @return mixed
     */
    public function restore(User $user, Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pengumuman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengumuman  $pengumuman
     * @return mixed
     */
    public function forceDelete(User $user, Pengumuman $pengumuman)
    {
        //
    }
}
