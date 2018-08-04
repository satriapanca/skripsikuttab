<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajar';

    public function jabatan()
    {
    	return $this->BelongsTo('App\Jabatan', 'jabatan_id');
    }

    public function kelas()
    {
        return $this->hasMany('App\Kelas', 'pengajar_id');
        
    }
    public function kas()
    {
        return $this->hasMany('App\Kas', 'pengajar_id');
        
    }

}
