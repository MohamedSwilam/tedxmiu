@extends('../../layouts/app')
@section('title') Settings |
@endsection

@section('content')
    <section class="latest-blog-area section-gap" id="setting">
        {{--<board :yearid="{{$year_id}}"></board>--}}
        <setting :user="{{Auth::user()}}"></setting>
    </section>
@endsection

@section('css')
    <style>
    </style>
@endsection
