@extends('home')
{{-- @section('meta_title', $post_detail->meta_title)
@section('meta_keyword', $post_detail->meta_keyword)
@section('meta_description', $post_detail->meta_description) --}}
@section('content_home')
    <div class="adv-top">
        <div class="contai_site_songmoi">
            @if(isset($advers_header))
                @foreach($advers_header as $advers_header_val)
                    <a href="{{ $advers_header_val->url }}">
                       <img src="{{ url('assets/images/'. $advers_header_val->images) }}" class="img-responsive"/>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
    @include('front_end.desktop.partials._header')
    @include('front_end.desktop.partials.content_news_tag')
    @include('front_end.desktop.partials.sidebar_detail')
         </div>
        </div>
    </div>
    @include('front_end.desktop.partials._footer')
    @include('library.api_comment_fb')
@endsection
