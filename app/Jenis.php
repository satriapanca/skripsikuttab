<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenisbayar';

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'jenisbayar_id');
        
    }
}
