@extends('home')
@section('meta_title', isset($post_detail) ? $post_detail->meta_title : null)
@section('meta_keyword', isset($post_detail) ? $post_detail->meta_keyword : null)
@section('meta_description', isset($post_detail) ? $post_detail->meta_description : null)
@section('content_home')
    @if(isset($advers_header))
	    <div class="adv-top">
	        <div class="contai_site_songmoi">
	            @foreach($advers_header as $advers_header_val)
	                <a href="{{ $advers_header_val->url }}">
	                   <img src="{{ url('assets/images/'. $advers_header_val->images) }}" class="img-responsive"/>
	                </a>
	            @endforeach
	        </div>
	    </div>
    @endif
    @include('front_end.desktop.partials._header')
    @include('front_end.desktop.partials.content_search')
    @include('front_end.desktop.partials.sidebar_detail')
    @include('front_end.desktop.partials.list_news_hot')
    @include('front_end.desktop.partials._footer')
    @include('library.api_comment_fb')
@endsection
