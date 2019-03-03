@extends('../../layouts/app') 
@section('title') Event |
@endsection
 
@section('content')
<section class="generic-banner" id="event-header" style="margin-top:135px;">
    <event-info :eventid="{{$event_id}}"></event-info>
</section>

@endsection
 
@section('css')
<style>

   
</style>
@endsection
