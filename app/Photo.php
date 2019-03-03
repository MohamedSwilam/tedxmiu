<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function event(){
        return $this->hasMany(event::class);
    }

    public function talk(){
        return $this->hasMany(Talk::class);
    }

    public function member(){
        return $this->hasMany(Member::class);
    }
}
