<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    //
    public function questions()
    {
        return $this->hasMany('App\question');
    }
}
