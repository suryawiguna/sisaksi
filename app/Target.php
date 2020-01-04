<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = 'target';
  
    protected $fillable = ['kab_id', 'target_koor', 'target_saksi'];

    public function kabupaten()
    {
        return $this->belongsTo('App\Kabupaten', 'kab_id');
    }
}
