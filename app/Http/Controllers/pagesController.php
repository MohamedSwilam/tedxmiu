<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\event;
use App\Transformers\EventTransformer;

class pagesController extends Controller
{
    public function home(){
        $e1 = new eventsController();
        $events = $e1->getLast(2);
        return view('pages/home/home')->with('events',$events);
    }

    public function about(){
        return view('pages/about/about');
    }

    public function teams(){
        return view('pages/team/teams');
    }

    public function team($year_id){
        return view('pages/team/team')->with('yearID',$year_id);
    }

    public function department($department_name){
        return view('pages/team/department')->with('departmentName',$department_name);
    }

    public function event($event_id){
        //$e1 = new eventsController();
        //$event = $e1->search('events.id',$event_id);
        //return $event;
        return view('pages.event.event')->with('event_id',$event_id);
    }

    public function events(){
        $e1 = new eventsController();
        $events = $e1->index();
        return view('pages/event/events')->with('events',$events);
    }

    public function speaker($speaker_id){
        return view('pages/event/speaker')->with('speaker_id',$speaker_id);
    }

    public function sponsor(){
        return view('pages/sponsor/sponsor');
    }
}
