@extends('../../layouts/app') 
@section('title') Team |
@endsection
 
@section('content')
<section class="latest-blog-area section-gap" id="team">
    <team :yearid="{{$year_id}}" :userid="{{$user_id}}"></team>
</section>
@endsection
 
@section('css')
<style>
</style>
@endsection
