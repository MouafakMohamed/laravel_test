<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transport extends Model
{
    public function staff_accom()
    {
        return $this->belongsTo('App\Staff','staff_accom_id','id');
    }
}
