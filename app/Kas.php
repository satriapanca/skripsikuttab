<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'kas';

    public function pengajar()
    {
    	return $this->BelongsTo('App\Pengajar', 'pengajar_id');
    }
}
