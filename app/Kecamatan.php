<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
  protected $table = 'kecamatan';
  
  protected $fillable = ['nama', 'kab_id'];

  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }
  
  public function kabupaten()
  {
    return $this->belongsTo('App\Kabupaten', 'kab_id');
  }

  public function kelurahan()
  {
    return $this->hasMany('App\Kelurahan', 'kec_id');
  }

  public function koor() {
    return $this->hasManyThrough(
      'App\Koor',
      'App\Kelurahan',
      'kec_id', // FK table kelurahan
      'kel_id' // FK table koor
    //   'id_kec', // PK table kecamatan
    //   'id_kel'  // PK table kelurahan
    );
  }
}
