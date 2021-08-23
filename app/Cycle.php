<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    public function class()
    {
        return $this->hasOne('App\Classe');
    }
}
