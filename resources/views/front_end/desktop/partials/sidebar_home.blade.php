<div class="sidebar">
    <div class="new sidebar-top">
        @if(isset($posts))
            @foreach($posts as $post)
                <div class="media">
                    <a class="media-left" href="{{ URL::route("getNewsDetail", $post->slug) }}">
                        @if(!empty($post->images))
                            <img class="media-object" src="{!! url('/'. $post->images) !!}">
                        @else
                            <img class="media-object" src="{!! url('assets/images/no-image.jpg') !!}">
                        @endif
                        
                    </a>
                    <div class="media-body">
                        <a href="{{ URL::route("getNewsDetail", $post->slug) }}">{!! $post->name !!}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="adv">
        @if(isset($advers_sidebar))
            @foreach($advers_sidebar as $advers_sidebar_val)
                <a href="{{ $advers_sidebar_val->url }}">
                   @if(!empty($advers_sidebar_val->images))
                      <img src="{!! url('Uploads/advertisement/'.$advers_sidebar_val->images) !!}" class="img-responsive"/>
                   @else
                      <img src="{!! url('assets/images/no-image.jpg') !!}" class="img-responsive"/>
                   @endif
                </a>
            @endforeach
        @endif
    </div>
    <div class="video">
        <div class="title">
            <span class="arrow-left"></span>
            <h3>Video</h3>
        </div>
        <div class="text">
            @if(isset($video_home))
                @foreach($video_home as $video_home_val)
                    <div id="player"></div>
                    <?php 
                       $video_id = $video_home_val->url;
                    ?>
                    @include('youtube_api.api')
                    <a href="{{ URL::route('getNewsDetail', $video_home_val->slug) }}">{!! $video_home_val->name !!}</a>
                @endforeach
            @endif
            <ul>
                @if(isset($video_home_list))
                    @foreach($video_home_list as $video_home_list_val)
                        <li><a href="{{ URL::route('getNewsDetail', $video_home_list_val->slug) }}">{!! $video_home_list_val->name !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    @if(isset($cats_collection_step3))
        @foreach($cats_collection_step3 as $cat_val)
            <div class="Reporting cat_sidebar">
                <div class="title">
                    <span class="arrow-left"></span>
                    <h3>{!! $cat_val->name !!}</h3>
                </div>
                <div class="text">
                    <ul>
                        @foreach($cat_val->posts as $post)
                            <li>
                                @if(!empty($post->images))
                                <div class="img" style="background-image:url({{ url('/'.$post->images) }})">
                                    <a href="{{ URL::route('getNewsDetail', $post->slug) }}">
                                       <img src="{{ url('assets/images/transparent_live_substance.png') }}" class="img-responsive">
                                    </a>
                                </div>
                                @else
                                <div class="img" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                    <a href="{{ URL::route('getNewsDetail', $post->slug) }}">
                                       <img src="{{ url('assets/images/transparent_live_substance.png') }}" class="img-responsive">
                                    </a>
                                </div>
                                @endif
                                <h3><a href="{{ URL::route('getNewsDetail', $post->slug) }}">{{ $post->name }}</a></h3>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>