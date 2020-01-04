<?php

namespace App\Policies;

use App\User;
use App\Saksi;
use Illuminate\Auth\Access\HandlesAuthorization;

class SaksiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the saksi.
     *
     * @param  \App\User  $user
     * @param  \App\Saksi  $saksi
     * @return mixed
     */
    public function index(User $user) {
        if ($user->role_id == 1 || $user->role_id == 2) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat saksi dilarang");
        }
    }
    
     public function view(User $user)
    {
        if ($user->role_id == 1 || $user->role_id == 2) {
            return true;
        }
        else {
            abort(403, "Akses untuk melihat detail saksi dilarang");
        }
    }

    /**
     * Determine whether the user can create saksis.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->role_id === 2) {
            return true;
        }
        else {
            abort(403, "Akses untuk menambah saksi dilarang");
        }       
    }

    public function edit(User $user, Saksi $saksi) {
        if($user->id === $saksi->koor->kelurahan->kecamatan->user->id || $user->id === $saksi->user_id) {
            return true;
        }
        else {
            abort(403, "Akses untuk mengedit saksi dilarang");
        }
    }
    /**
     * Determine whether the user can update the saksi.
     *
     * @param  \App\User  $user
     * @param  \App\Saksi  $saksi
     * @return mixed
     */
    public function update(User $user, Saksi $saksi)
    {
        if($user->id === $saksi->koor->kelurahan->kecamatan->user->id || $user->id === $saksi->user_id){
            return true;
        }
        else {
            abort(403, "Akses untuk mengupdate saksi dilarang");
        }
    }

    /**
     * Determine whether the user can delete the saksi.
     *
     * @param  \App\User  $user
     * @param  \App\Saksi  $saksi
     * @return mixed
     */
    public function delete(User $user, Saksi $saksi)
    {
        if($user->id === $saksi->koor->kelurahan->kecamatan->user->id){
            return true;
        }
        else {
            abort(403, "Akses untuk menghapus saksi dilarang");
        }
    }

    /**
     * Determine whether the user can restore the saksi.
     *
     * @param  \App\User  $user
     * @param  \App\Saksi  $saksi
     * @return mixed
     */
    public function restore(User $user, Saksi $saksi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the saksi.
     *
     * @param  \App\User  $user
     * @param  \App\Saksi  $saksi
     * @return mixed
     */
    public function forceDelete(User $user, Saksi $saksi)
    {
        //
    }

    public function mySaksi(User $user)
    {
        if ($user->role_id == 2) {
            return true;
        }
        else {
            abort(403, "Hanya user komisi saksi yang bisa melihat halaman ini");
        }
    }
}
