@extends('home')
@section('content_home')
    <div class="adv-top">
        <div class="contai_site_songmoi">
            <img src="{{ url('assets/images/adv-plaza.jpg') }}" class="img-responsive"/>
        </div>
    </div>
    @include('partials._header')
    <div class="contai_site_songmoi">
        @include('partials.list_menu_children')
        @include('partials.freeture')
        @include('partials.content_living_substance')
        @include('partials.sidebar_living_substance')
    </div>
    @include('partials._footer')
@endsection