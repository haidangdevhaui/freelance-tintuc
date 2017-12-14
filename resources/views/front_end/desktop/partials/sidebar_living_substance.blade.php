<div class="sidebar">
    <div class="new-more-view sidebar-top">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new">Mới Nhất</a></li>
            <li><a data-toggle="tab" href="#view">Nhiều Nhất</a></li>
        </ul>
        <div class="tab-content">
            <div id="new" class="tab-pane fade in active">
                @if(isset($post_new))
                    @foreach($post_new as $post_new_val)
                        <div class="media">
                            <a class="media-left" href="{{ URL::route('getNewsDetail', $post_new_val->slug) }}">
                                @if(!empty($post_new_val->images))
                                   <img class="media-object" src="{{ url('/'.$post_new_val->images) }}">
                                @else
                                   <img class="media-object" src="{{ url('assets/images/no-image.jpg') }}">
                                @endif
                            </a>
                            <div class="media-body">
                                <a href="{{ URL::route('getNewsDetail', $post_new_val->slug) }}">{!! $post_new_val->name !!}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div id="view" class="tab-pane fade">
                @if(isset($post_most_view_default))
                    @foreach($post_most_view_default as $post_most_view_default_val)
                        <div class="media">
                            <a class="media-left" href="{{ URL::route('getNewsDetail', $post_most_view_default_val->slug) }}">
                                @if(!empty($post_most_view_default_val->images))
                                   <img class="media-object" src="{{ url('/'.$post_most_view_default_val->images) }}">
                                @else
                                   <img class="media-object" src="{{ url('assets/images/no-image.jpg') }}">
                                @endif
                            </a>
                            <div class="media-body">
                                <a href="{{ URL::route('getNewsDetail', $post_most_view_default_val->id) }}">{!! $post_most_view_default_val->name !!}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="adv">
        @if(isset($advers_sidebar))
            @foreach($advers_sidebar as $advers_sidebar_val)
                <a href="{{ $advers_sidebar_val->url }}">
                   <img src="{{ url('assets/images/'.$advers_sidebar_val->images) }}" class="img-responsive"/>
                </a>
            @endforeach
        @endif
    </div>
    <div class="care">
        <h3>Có thể bạn quan tâm</h3>
        @if(isset($post_fulls))
            @foreach($post_fulls as $post_fulls_val)
                <div class="media">
                    <a class="media-left" href="{{ URL::route('getNewsDetail', $post_fulls_val->slug) }}">
                        @if(!empty($post_fulls_val->images))
                           <img class="media-object" src="{{ url('/'.$post_fulls_val->images) }}">
                        @else
                           <img class="media-object" src="{{ url('assets/images/no-image.jpg') }}">
                        @endif
                    </a>
                    <div class="media-body">
                        <a href="{{ URL::route('getNewsDetail', $post_fulls_val->slug) }}">{!! $post_fulls_val->name !!}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="video">
        <div class="title">
            <span class="arrow-left"></span>
            <h3>Video</h3>
        </div>
        <div class="text">
            @if(isset($video_page))
                @foreach($video_page as $video_page_val)
                    <div id="player"></div>
                    <?php 
                       $video_id = $video_page_val->url;
                       // dd($video_id);
                    ?>
                    @include('youtube_api.api')
                    <a href="{{ URL::route('getNewsDetail', $video_page_val->slug) }}">{!! $video_page_val->name !!}</a>
                @endforeach
            @endif
            <ul>
                @if(isset($list_video_page))
                    @foreach($list_video_page as $list_video_page_val)
                       <li><a href="{{ URL::route('getNewsDetail', $list_video_page_val->slug) }}">{!! $list_video_page_val->name !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
</div>
</div>