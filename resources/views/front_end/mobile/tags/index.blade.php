@extends('mobile')
{{-- @section('meta_title', $cats->meta_title)
@section('meta_keyword', $cats->meta_keyword)
@section('meta_description', $cats->meta_description) --}}
@section('content_home_mobile')
@include('front_end.mobile.advertisement.all_top')
@include('front_end.mobile.partials._header')
@include('front_end.mobile.partials.content_tags')
@include('front_end.mobile.partials.sidebar_detail')
@include('front_end.mobile.partials._footer')
@include('front_end.mobile.advertisement.all_pop_up')
@include('front_end.mobile.advertisement.all_catfish')
@endsection