@extends('mobile')
@section('meta_title', $cates->meta_title)
@section('meta_keyword', $cates->meta_keyword)
@section('meta_description', $cates->meta_description)
@section('content_home_mobile')
    @include('front_end.mobile.advertisement.all_top')
    @include('front_end.mobile.partials._header')
    @include('front_end.mobile.partials.content_cates')
    @include('front_end.mobile.partials._footer')
    @include('front_end.mobile.advertisement.all_pop_up')
    @include('front_end.mobile.advertisement.all_catfish')
@endsection

