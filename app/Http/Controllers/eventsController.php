<?php

namespace App\Http\Controllers;

use App\event;
use App\Mail\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transformers\EventTransformer;
use Illuminate\Support\Facades\Mail;

class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = event::with(array('year','photo'))
        ->orderBy('events.date', 'desc')
        ->get();
//        Mail::to('mohamed_swilam@hotmail.com')->send(
//            new test()
//        );
//        return $events;
        return fractal($events, new EventTransformer());
    }

    /**
     * get last number of the resource.
     *
     * @param  $number
     * @return \Illuminate\Http\Response
     */
    public function getLast($number)
    {
        $events = event::with(array('year','photo'))
        ->orderBy('events.id', 'desc')
        ->take($number)->get();


        return fractal($events, new EventTransformer());
    }


    /**
     * search for the resource.
     *
     * @param  $eventID
     * @return \Illuminate\Http\Response
     */
    public function getOnly($eventID)
    {
        $event = event::with(array('talk','talk.photo','talk.user', 'photo'))
        ->find($eventID);
        return fractal($event, new EventTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }
}
