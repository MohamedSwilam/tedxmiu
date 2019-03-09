<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public function event(){
        return $this->hasMany(event::class);
    }

    public function member(){
        return $this->hasMany(Member::class);
    }

    public function sponsor(){
        return $this->hasMany(Sponsor::class);
    }
}
