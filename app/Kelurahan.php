<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
  protected $table = 'kelurahan';
  
  protected $fillable = ['nama', 'kec_id'];

  public function kecamatan()
  {
    return $this->belongsTo('App\Kecamatan', 'kec_id');
  }

  public function koor()
  {
    return $this->hasMany('App\Koor', 'kel_id');
  }
  
  public function saksi() {
    return $this->hasManyThrough(
      'App\Saksi',
      'App\Koor',
      'kel_id', // FK table Koor
      'koor_id' // FK table saksi
    );
  }
}
