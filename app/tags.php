<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    //
    public function questions()
    {
        return $this->belongsToMany('App\question')
        ->withTimestamps();
    }
}
