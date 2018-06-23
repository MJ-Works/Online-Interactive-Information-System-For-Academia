<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    public function tags()
    {
        return $this->belongsToMany('App\tags')
        ->withTimestamps();
    }

    public function answers()
    {
        return $this->hasMany('App\answer');
    }

    public function User()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
