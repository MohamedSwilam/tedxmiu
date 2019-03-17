@extends('../../layouts/app')
@section('title') Saved Talks |
@endsection

@section('content')
    <section class="latest-blog-area section-gap" id="saved-talks">
        <saved-talks :user="{{Auth::user()}}"></saved-talks>
    </section>
@endsection

@section('css')
    <style>
    </style>
@endsection
