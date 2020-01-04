<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function komisisaksi() {
        return $this->hasOne('App\Kecamatan', 'user_id');
    }

    public function koor() {
        return $this->hasOne('App\Koor', 'user_id');
    }

    public function saksi() {
        return $this->hasOne('App\Saksi', 'user_id');
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function kelurahan()
    {
        return $this->hasManyThrough(
        'App\Kelurahan',
        'App\Kecamatan',
        'user_id', // FK table kecamatan
        'kec_id' // FK table kelurahan
        //   'id_user', // PK table user
        //   'id_kec'  // PK table kecamatan
        );
    }

    public function pengumuman()
    {
        return $this->hasMany('App\Pengumuman', 'user_id');
    }

    public function is($roleID)
    {
        foreach ($this->role()->get() as $role)
        {
            if ($role->id === $roleID)
            {
                return true;
            }
        }

        return false;
    }

    public function userKomisiSaksi()
    {
        return $this->hasMany('App\Koor', 'komisisaksi_id');
    }
}
