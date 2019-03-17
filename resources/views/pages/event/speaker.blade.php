@extends('../../layouts/app') 
@section('title') Event |
@endsection
 
@section('content')
<section id="speaker">
    <speaker :auth="{{ Auth::check() ? Auth::user() : "false" }}" :speakerid="{{$speaker_id}}"></speaker>
</section>
@endsection
 
@section('css')
<style>
</style>
@endsection
