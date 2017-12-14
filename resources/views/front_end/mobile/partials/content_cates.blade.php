<section class="wrapper wrapper_cate_live cat_mobile">
    <div class="area_news_hot news_top">
        @if(isset($post_step1))
            @foreach($post_step1 as $post_step1_val)
                <div class="box_item_main">
                    <div class="m_thumbnail m_text_center">
                        @if(!empty($post_step1_val->images))
                            <a href="{{ URL::route('getNewsDetailMb', $post_step1_val->slug) }}" style="background-image:url({{ url($post_step1_val->images) }})">
                              <img src="{{ url('assets/mobile/img/home-hot-trans.png') }}" alt="">
                            </a>
                        @else
                            <a href="{{ URL::route('getNewsDetailMb', $post_step1_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                              <img src="{{ url('assets/mobile/img/home-hot-trans.png') }}" alt="">
                            </a>
                        @endif
                    </div>
                    <a href="{{ URL::route('getNewsDetailMb', $post_step1_val->slug) }}"><p>{!! $post_step1_val->name !!}</p></a>
                </div>
            @endforeach
        @endif
        <div class="list_box_item">
            <div class="box_item m_left m_text_center">
                @if(isset($post_step2))
                    @foreach($post_step2 as $post_step2_val)
                        <div class="box_item_inner">
                            <div class="item">
                                <a href="{{ URL::route('getNewsDetailMb', $post_step2_val->slug) }}" style="background-image:url({{ url($post_step2_val->images) }})">
                                  <img src="{{ url('assets/mobile/img/home-hot-item-trans.png') }}" alt="">
                                </a>
                                <a href="{{ URL::route('getNewsDetailMb', $post_step2_val->slug) }}"><p>{!! $post_step2_val->name !!}</p></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="clear_fix"></div>
    </div>
    @if(isset($post_step3))
    <div class="area_news_live news_new_update_post_default">
        <div class="list_box_item">
            <div class="item paginate_load_item">
                @foreach($post_step3 as $post_step3_val)
                    <div class="box_item_live">
                        <a href="{{ URL::route('getNewsDetailMb', $post_step3_val->slug) }}"><h3>{!! $post_step3_val->name !!}</h3></a>
                        <div class="media_content">
                            <div class="m_left">
                                @if(!empty($post_step3_val->images))
                                    <div class="media"> 
                                        <a href="{{ URL::route('getNewsDetailMb', $post_step3_val->slug) }}" style="background-image:url({{ url($post_step3_val->images) }})">
                                          <img src="{{ url('assets/mobile/img/page-list-item-trans.png') }}" alt="">
                                        </a>
                                    </div>
                                @else
                                    <div class="media">
                                        <a href="{{ URL::route('getNewsDetailMb', $post_step3_val->slug) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                          <img src="{{ url('assets/mobile/img/page-list-item-trans.png') }}" alt="">
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="content"><p>{!! $post_step3_val->description !!}</p></div>
                            <div class="clear_fix"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clear_fix"></div>
        </div>
        <div class="news_pagination"><a id="paginate_load" href="javascript:void(0)">Xem thêm</a></div>
    </div>
    @endif
</section>
@include('library.mobile.page_paginate')