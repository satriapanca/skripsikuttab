<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    public function pengajar()
    {
    	return $this->hasMany('App\Pengajar', 'jabatan_id');
    }
}
