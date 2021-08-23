<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class File extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' ,
        'image' ,
        'date' ,
        'user_id' ,
        'prof_id' ,
    ];

    public function Staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function Prof()
    {
        return $this->belongsTo('App\Prof');
    }
}
