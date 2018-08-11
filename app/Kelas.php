<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function pengajar()
    {
    	return $this->BelongsTo('App\Pengajar', 'pengajar_id');
    }
    public function santri()
    {
    	return $this->hasMany('App\Santri', 'kelas_id');
    }
    public function nilaiangka()
    {
        return $this->hasMany('App\Nilaiangka', 'kelas_id');
        
    }
}
