<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
}
