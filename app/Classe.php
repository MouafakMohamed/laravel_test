<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }
}
