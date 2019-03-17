<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function event(){
        return $this->belongsTo(event::class,'event_id');
    }

    public function savedTalk(){
        return $this->hasMany(savedTalk::class);
    }
}
