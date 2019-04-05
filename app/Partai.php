<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
  protected $table = 'partai';
  
  protected $fillable = ['nama', 'deskripsi'];

  public function saksi()
  {
    return $this->hasMany('App\Saksi', 'partai_id');
  }
}
