<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    public function tags()
    {
        return $this->belongsToMany('App\tag')
        ->withTimestamps();
    }

    public function answers()
    {
        return $this->hasMany('App\answer');
    }
}
