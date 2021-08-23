<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_file extends Model
{
    protected $fillable = [
        'name' ,
        'image' ,
        'student_id' ,
    ];
}
