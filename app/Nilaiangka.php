<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaiangka extends Model
{
    protected $table = 'nilai_angka';

    public function santri()
    {
    	return $this->BelongsTo('App\Santri', 'santri_id');
    }
    public function kelas()
    {
    	return $this->BelongsTo('App\Kelas', 'kelas_id');
    }
    public function pengajar()
    {
        return $this->BelongsTo('App\Pengajar', 'pengajar_id');
    }
    public function pelajaran()
    {
    	return $this->BelongsTo('App\Pelajaran', 'matapelajaran_id');
    }
}
