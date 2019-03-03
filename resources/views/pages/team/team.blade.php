@extends('../../layouts/app') 
@section('title') Team |
@endsection
 
@section('content')
<section class="latest-blog-area section-gap" id="team">
    <board :yearid="{{$year_id}}"></board>
</section>
@endsection
 
@section('css')
<style>
</style>
@endsection
