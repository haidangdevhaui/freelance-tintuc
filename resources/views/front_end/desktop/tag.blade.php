@extends('layouts.desktop')
@section('content')
    <div class="w-content">
        <div class="content">
            <div class="primary">
                @if(isset($ads))
                    @if(isset($ads['bottomSlider']))
                    <div class="adv">
                        <a href="{{$ads['bottomSlider']->url}}">
                            <img alt="" src="{{asset($ads['bottomSlider']->images)}}">
                            </img>
                        </a>
                    </div>
                    @endif
                @endif
                <h3>Thẻ bài viết <b>"{{$tag}}"</b> ({{$total}} bài viết) - Trang {{$page}}</h3>
                <div class="page-live">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="item-article">
                                <a href="{{url($post->slug).'.html'}}">
                                    <img class="img-responsive" src="{{asset($post->images)}}" alt="{{$post->name}}"/>
                                </a>
                                <span class="time">
                                    <i aria-hidden="true" class="fa fa-clock-o">
                                    </i>
                                    <?php
                                    echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post->created_at));
                                    ?>
                                </span>
                                <a href="{{url($post->slug).'.html'}}">
                                    {{$post->name}}
                                </a>
                                <p>
									{{Illuminate\Support\Str::words($post->description, 20, '...')}}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="pagination phantrang">
                        {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
