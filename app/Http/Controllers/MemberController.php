<?php

namespace App\Http\Controllers;

use App\Member;
use App\Transformers\MemberTransformer;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the HighBoard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBoard()
    {
        $board = Member::with(array('user','user.userType' ,'photo','year'))
            ->whereHas('user.userType', function ($q){
                $q->where('user_types.parent','=', '1');
                $q->orderBy('user_types.parent','asc');
            })
            ->get();
        return fractal($board, new MemberTransformer());
    }
}
