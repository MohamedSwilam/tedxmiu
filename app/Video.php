<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function talk(){
        return $this->hasMany(Talk::class);
    }
}
