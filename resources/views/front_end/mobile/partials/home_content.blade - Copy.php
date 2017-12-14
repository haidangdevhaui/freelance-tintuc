<section class="wrapper wrapper_home">
    <div class="area_news_hot news_top">
        @if(isset($postNews))
            @foreach($postNews as $postNew)
                <div class="box_item_main">
                    <div class="m_thumbnail m_text_center">
                        @if(!empty($postNew->images))
                            <a href="{{ URL::route('getNewsDetailMb', $postNew->slug) }}" style="background-image:url({{ url($postNew->images) }})">
                             <img src="{{ url('assets/mobile/img2/item1.png') }}" alt="">
                            </a>
                        @else
                            <a href="{{ URL::route('getNewsDetailMb', $postNew->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                             <img src="{{ url('assets/mobile/img2/item1.png') }}" alt="">
                            </a>
                        @endif
                    </div>
                    <a href="{{ URL::route('getNewsDetailMb', $postNew->slug) }}">
                        <p>{!! $postNew->name !!}</p>
                    </a>
                </div>
            @endforeach
        @endif
        <div class="list_box_item">
            @if(isset($postNews2))
                @foreach($postNews2 as $postNews2_val)
                    <div class="box_item m_left m_text_center">
                        <div class="box_item_inner">
                            <div class="item">
                                @if(!empty($postNews2_val->images))
                                    <a href="{{ URL::route('getNewsDetailMb', $postNews2_val->slug) }}" style="background-image:url({{ url($postNews2_val->images) }})">
                                       <img src="{{ url('assets/mobile/img/home-hot-item-trans.png') }}" alt="">
                                    </a>
                                @else
                                    <a href="{{ URL::route('getNewsDetailMb', $postNews2_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                       <img src="{{ url('assets/mobile/img/home-hot-item-trans.png') }}" alt="">
                                    </a>
                                @endif
                               
                                <a href="{{ URL::route('getNewsDetailMb', $postNews2_val->slug) }}">
                                    <p>{!! $postNews2_val->name !!}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="clear_fix"></div>
    </div>
    
    <div class="area_news_video area_news_live">
        <div class="area_title"><a href=""><h2 class="m_text_upper">Video<i class="fa fa-chevron-right" aria-hidden="true"></i></h2></a></div>
        @if(isset($listVideo))
            @foreach($listVideo as $listVideo_val)
                <div class="box_item_main">
                    <div id="player"></div>
                    <?php 
                       $video_id = $listVideo_val->url;
                    ?>
                    @include('youtube_api.api')
                    <a href="{{ URL::route('getNewsDetail', $listVideo_val->slug) }}"><p>{!! $listVideo_val->name !!}</p></a>
                </div>
            @endforeach
        @endif
        <div class="home_list_article">
            <ul>
                @if(isset($listVideo2))
                    @foreach($listVideo2 as $listVideo2_val)
                        <div>
                            <li><a href="{{ URL::route('getNewsDetail', $listVideo2_val->slug) }}">{!! $listVideo2_val->name !!}</a></li>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    @if(isset($postStep3_collect))
        @foreach($postStep3_collect as $postStep3_collect_val)
            <div class="area_news_reporting area_news_video area_news_live news_new_update_post_default">
                <div class="area_title">
                    <h2 class="m_text_upper">{!! $postStep3_collect_val->name !!}<i class="fa fa-chevron-right" aria-hidden="true"></i></h2>
                </div>
                @foreach($postStep3_collect_val->postList1 as $postList1_val)
                    <div class="box_item_main">
                        <div class="m_thumbnail m_text_center">
                            @if(!empty($postList1_val->images))
                                <a href="{{ URL::route('getNewsDetailMb', $postList1_val->slug) }}" style="background-image:url({{ url($postList1_val->images) }})">
                                   <img src="{{ url('assets/mobile/img/home-live-trans.png') }}" alt="">
                                </a>
                            @else
                                <a href="{{ URL::route('getNewsDetailMb', $postList1_val->slug) }}" style="background-image:url({{ url($postList1_val->images) }})">
                                   <img src="{{ url('assets/mobile/img/home-live-trans.png') }}" alt="">
                                </a>
                            @endif
                        </div>
                        <p>{!! $postList1_val->name !!}</p>
                    </div>
                @endforeach
                <div class="home_list_article">
                    <ul>
                        @foreach($postStep3_collect_val->postList2 as $postList2_val)
                            <div>
                                <li>
                                    <a href="{{ URL::route('getNewsDetailMb', $postList2_val->slug) }}">{!! $postList2_val->name !!}</a>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</section>
