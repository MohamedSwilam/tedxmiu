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

    public function photo(){
        return $this->belongsTo(Photo::class,'photo_id');
    }
}
