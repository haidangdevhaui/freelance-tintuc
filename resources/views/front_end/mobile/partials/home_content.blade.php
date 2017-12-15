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
    @if(isset($post_collect))
        @foreach($post_collect as $post_collect_val)
            <div class="area_news_live news_new_update_post_default">
                <div class="area_title"><a href=""><h2 class="m_text_upper">{!! $post_collect_val->name !!} <i class="fa fa-chevron-right" aria-hidden="true"></i></h2></a>
                </div>
                @foreach($post_collect_val->posts as $posts_val)
                <div class="box_item_main">
                    <div class="m_thumbnail m_text_center">
                        @if(!empty($posts_val->images))
                            <a href="{{ URL::route('getNewsDetailMb', $posts_val->slug) }}" style="background-image:url({{ url($posts_val->images) }})">
                               <img src="{{ url('assets/mobile/img2/item2.png') }}" alt="">
                            </a>
                        @else
                            <a href="{{ URL::route('getNewsDetailMb', $posts_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                               <img src="{{ url('assets/mobile/img2/item2.png') }}" alt="">
                            </a>
                        @endif
                    </div>
                    <a href="{{ URL::route('getNewsDetailMb', $posts_val->slug) }}">
                        <p>{!! $posts_val->name !!}</p>
                    </a>
                </div>
                @endforeach
                <div class="list_box_item">
                    @foreach($post_collect_val->postPass as $postPass_val)
                    <div class="box_item_live">
                        <a href=""><h3>{!! $postPass_val->name !!}</h3></a>
                        <div class="media_content">
                            <div class="m_left">
                                <div class="media">
                                    @if(!empty($postPass_val->images))
                                        <a href="{{ URL::route('getNewsDetailMb', $postPass_val->slug) }}" style="background-image:url({{ url($postPass_val->images) }})">
                                           <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                        </a>
                                    @else
                                        <a href="{{ URL::route('getNewsDetailMb', $postPass_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                           <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="content">
                                <p>{!! $postPass_val->description !!}</p>
                            </div>
                            <div class="clear_fix"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif 
    @if(isset($postStep2_collect))
        @foreach($postStep2_collect as $postStep2_collect_val)
            <div class="area_news_view area_news_live news_new_update_post_default">
                <div class="area_title"><a href=""><h2 class="m_text_upper">{!! $postStep2_collect_val->name !!}<i class="fa fa-chevron-right" aria-hidden="true"></i></h2></a>
                </div>
                @foreach($postStep2_collect_val->postStep1 as $postStep1_val)
                    <div class="box_item_main">
                        <div class="m_thumbnail m_text_center">
                            @if(!empty($postStep1_val->images))
                                <a href="{{ URL::route('getNewsDetailMb', $postStep1_val->slug) }}" style="background-image:url({{ url($postStep1_val->images) }})">
                                   <img src="{{ url('assets/mobile/img/home-live-trans.png') }}" alt="">
                                </a>
                            @else 
                                <a href="{{ URL::route('getNewsDetailMb', $postStep1_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                   <img src="{{ url('assets/mobile/img/home-live-trans.png') }}" alt="">
                                </a>
                            @endif
                        </div>
                        <a href="">
                            <p>{!! $postStep1_val->name !!}</p>
                        </a>
                    </div>
                @endforeach
                <div class="list_box_item">
                    @foreach($postStep2_collect_val->postStep2 as $postStep2_val)
                    <div class="box_item_live">
                        <a href=""><h3>{!! $postStep2_val->name !!}</h3></a>
                        <div class="media_content">
                            <div class="m_left">
                                <div class="media">
                                    @if(!empty($postStep2_val->images))
                                        <a href="{{ URL::route('getNewsDetailMb', $postStep2_val->slug) }}" style="background-image:url({{ url($postStep2_val->images) }})">
                                           <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                        </a>
                                    @else 
                                        <a href="{{ URL::route('getNewsDetailMb', $postStep2_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                           <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="content">
                                <p>{!! $postStep2_val->description !!}</p>
                            </div>
                            <div class="clear_fix"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="home_list_article">
                    <ul>
                        @foreach($postStep2_collect_val->postStep3 as $postStep3_val)
                            <div>
                                <li><a href="">{!! $postStep3_val->name !!}</a></li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
    <div class="area_news_video area_news_live">
        <div class="area_title"><a href=""><h2 class="m_text_upper">Video<i class="fa fa-chevron-right" aria-hidden="true"></i></h2></a></div>
        @if(isset($listVideo))
            @foreach($listVideo as $listVideo_val)
                <div class="box_item_main">
                    <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/{{$post_detail->url}}" width="100%"></iframe>
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
