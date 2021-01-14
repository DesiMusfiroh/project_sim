<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prody extends Model
{
    //relasi ke fakultas
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
