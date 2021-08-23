<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'name' ,
        'date' ,
        'sujet' ,
        'image' ,
        'by' ,
        'student_id' ,
    ];

}
