<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    //
    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}