<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    
    protected $fillable = ['nama'];

    public function kecamatan()
    {
        return $this->hasMany('App\Kecamatan', 'kab_id');
    }

    public function kelurahan()
    {
        return $this->hasManyThrough(
        'App\Kelurahan',
        'App\Kecamatan',
        'kab_id', // FK table kecamatan
        'kec_id' // FK table kelurahan
        //   'id_kab', // PK table kabupaten
        //   'id_kec'  // PK table kecamatan
        );
    }

    public function target()
    {
        return $this->hasOne('App\Target', 'kab_id');
    }
}
