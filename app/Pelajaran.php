<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'matapelajaran';

    public function kategori()
    {
    	return $this->BelongsTo('App\Kategori', 'kategori_id');
    }
    public function nilaiangka()
    {
        return $this->hasMany('App\Nilaiangka', 'matapelajaran_id');
        
    }
}
