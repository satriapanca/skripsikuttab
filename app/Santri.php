<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas', 'kelas_id');
    }
    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'santri_id');
        
    }

}
