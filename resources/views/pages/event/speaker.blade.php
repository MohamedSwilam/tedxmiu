@extends('../../layouts/app') 
@section('title') Event |
@endsection
 
@section('content')
<section id="speaker">
    <speaker :speakerid="{{$speaker_id}}"></speaker>
</section>
@endsection
 
@section('css')
<style>
</style>
@endsection
