 <div class="sidebar">
    <div class="new-more-view">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new">Mới Nhất</a></li>
            <li><a data-toggle="tab" href="#view">Nhiều Nhất</a></li>
        </ul>
        <div class="tab-content">
            <div id="new" class="tab-pane fade in active">
                @if(isset($postNews))
                    @foreach($postNews as $postNews_val)
                        <div class="media">
                            <a class="media-left" href="{{ URL::route('getNewsDetail', $postNews_val->slug) }}">
                                @if(!empty($postNews_val->images))
                                    <img class="media-object" src="{{ url('/'.$postNews_val->images) }}">
                                @else 
                                    <img class="media-object" src="{{ url('assets/images/no-image.jpg') }}">
                                @endif
                            </a>
                            <div class="media-body">
                                <a href="{{ URL::route('getNewsDetail', $postNews_val->slug) }}">{!! $postNews_val->name !!}</a>
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
                                   <img class="media-object" src="{{ url('/'. $post_most_view_default_val->images) }}">
                                @else 
                                   <img class="media-object" src="{{ url('assets/images/no-image.jpg') }}">
                                @endif
                            </a>
                            <div class="media-body">
                                <a href="{{ URL::route('getNewsDetail', $post_most_view_default_val->slug) }}">{!! $post_most_view_default_val->name !!}</a>
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
                <a href="{{ $advers_sidebar_val->url }}"><img src="{{ url('assets/images/'. $advers_sidebar_val->images) }}" class="img-responsive"/></a>
            @endforeach
        @endif
    </div>
    @if(isset($post_ramdom))
    <div class="care">
        <h3>Có thể bạn quan tâm</h3>
        @foreach($post_ramdom as $post_ramdom_val)
            <div class="media">
                <a class="media-left" href="{{ URL::route('getNewsDetail', $post_ramdom_val->slug) }}">
                    @if(!empty($post_ramdom_val->images))
                       <img class="media-object" src="{{ url('/'.$post_ramdom_val->images) }}">
                    @else
                       <img class="media-object" src="{{ url('assets/images/no-image.jpg') }}">
                    @endif
                </a>
                <div class="media-body">
                    <a href='{{ URL::route('getNewsDetail', $post_ramdom_val->slug) }}'>{!! $post_ramdom_val->name !!}</a>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>