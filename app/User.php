<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','departments_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function personalInfos()
    {
        return $this->hasOne('App\personalInfo');
    }

    public function questions()
    {
        return $this->hasMany('App\question');
    }

    public function answers()
    {
        return $this->hasMany('App\answer');
    }

    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}
