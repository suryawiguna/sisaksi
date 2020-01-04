<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    protected $table = 'saksi';
    
    protected $fillable = [
        'user_id',
        'koor_id',
        'partai_id',
        'tps',
        'nama',
        'gender',
        'alamat',
        'no_hp',
        'foto_ktp',
        'foto_diri'
    ];

    public function koor()
    {
        return $this->belongsTo('App\Koor', 'koor_id');
    }
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function partai()
    {
        return $this->belongsTo('App\Partai', 'partai_id');
    }

    public function c1() {
        return $this->hasOne('App\C1', 'saksi_id');
    }
}
