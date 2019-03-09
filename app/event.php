<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
    
//    public function photo(){
//        return $this->belongsTo(Photo::class,'photo_id');
//    }

    public function talk(){
        return $this->hasMany(Talk::class);
    }
}
