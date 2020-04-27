<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function addresses(){
        return $this->hasMany('App\Address');
    }

    public function phones(){
        return $this->hasMany('App\Phone');
    }
}
