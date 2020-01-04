<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C1 extends Model
{
    protected $table = 'c1';
    
    protected $fillable = [
        'saksi_id',
        'foto_c1'
    ];

    public function saksi() {
        return $this->belongsTo('App\Saksi', 'saksi_id');
    }
}
