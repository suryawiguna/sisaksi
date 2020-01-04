<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koor extends Model
{
    protected $table = 'koor';
    
    protected $fillable = [
        'user_id',
        'kel_id',
        'nama',
        'gender',
        'alamat',
        'no_hp',
        'foto_ktp',
        'foto_diri'
    ];

    public function saksi()
    {
        return $this->hasMany('App\Saksi', 'koor_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\Kelurahan', 'kel_id');
    }
}
