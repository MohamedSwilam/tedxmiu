<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Transformers\TalkTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TalkController extends Controller
{
    public function getOnly($talk_id)
    {
        $talk = Talk::with(array('user','user.userType'))
            ->find($talk_id);
        return fractal($talk, new TalkTransformer());
    }

    public function getRandom(){
        $talks = Talk::with(array('user', 'user.userType'))
            ->orderBy(DB::raw('RAND()'))
            ->take(4)->get();
        return fractal($talks, new TalkTransformer());
    }
}
