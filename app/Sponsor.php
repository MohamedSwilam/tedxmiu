<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sponsor extends Model
{
    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
}
