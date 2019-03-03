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
    public function getBoard($yearID)
    {
        $board = Member::with(array('user','user.userType' ,'photo','year'))
            ->whereHas('user.userType', function ($q){
                $q->where('user_types.parent','=', '1');
                $q->orderBy('user_types.parent','asc');
            })->whereHas('year', function ($q) use ($yearID){
                $q->where('years.id','=', $yearID);
            })
            ->get();
        return fractal($board, new MemberTransformer());
    }

    public function getTeam($yearID, $HeadID)
    {
        $head = Member::with('user','user.userType' ,'photo','year')
            ->whereHas('user', function ($q) use ($HeadID){
                $q->where('users.id','=', $HeadID);
            })->get();
        $HeadTypeID = $head[0]["user"]->toArray()["user_type"]["id"];
        $members = Member::with(array('user','user.userType' ,'photo','year'))
            ->whereHas('user.userType', function ($q) use ($HeadTypeID){
                $q->where('user_types.parent','=', $HeadTypeID);
                $q->orderBy('user_types.parent','asc');
            })->whereHas('year', function ($q) use ($yearID){
                $q->where('years.id','=', $yearID);
            })
            ->get();
//        return array(1, 2, 3);
        return array(fractal($head, new MemberTransformer()), fractal($members, new MemberTransformer()));
    }
}
