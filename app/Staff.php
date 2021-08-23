<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom' ,
        'pre' ,
        'cin' ,
        'tele' ,
        'sex' ,
        'date' ,
        'adress' ,
        'fonction' ,
        'status' ,
        'post' ,
        'type' ,
        'date1' ,
        'date2' ,
        'salaire' ,
        'compet' ,
        'rib' ,
        'banque' ,
        'email' ,
        'image' ,
        'facebook' ,
        'twitter' ,
        'insta' ,
        'linked' ,
        'password' ,
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

    public function Files()
    {
        return $this->hasMany('App\File','user_id');
    }

    public function transport_accom()
    {
        return $this->hasOne('App\Transport');
    }
}
