@extends('mobile')
@section('content_home_mobile')
    @include('front_end.mobile.advertisement.home_top')
    @include('front_end.mobile.partials._header')
    @include('front_end.mobile.partials.home_content')
    @include('front_end.mobile.partials._footer')
    @include('front_end.mobile.advertisement.home_pop_up')
    @include('front_end.mobile.advertisement.home_catfish')
@endsection