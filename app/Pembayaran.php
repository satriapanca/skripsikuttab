<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    public function santri()
    {
    	return $this->BelongsTo('App\Santri', 'santri_id');
    }
    public function jenis()
    {
    	return $this->BelongsTo('App\Jenis', 'jenisbayar_id');
    }
}
