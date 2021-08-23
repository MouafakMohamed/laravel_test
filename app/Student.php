<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
            'id1',
            'nom',
            'pre',
            'nom1',
            'pre1',
            'sex',
            'date',
            'tele',
            'mail',
            'adress',
            'image_qr',
            'image',
            'categorie',
            'cycle',
            'class',
            'class_num',
            'date_d',
            'transport',
            'trajet',
            'facebook',
            'twitter',
            'insta',
            'youtube',
            'anne',
            'passe',
            'prix',
            'height',
            'weight',
            'blood',
            'user',
            'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
