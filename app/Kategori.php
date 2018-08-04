<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public function pelajaran()
    {
    	return $this->hasMany('App\Pelajaran', 'kategori_id');
    }
}
