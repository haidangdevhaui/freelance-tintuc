<section class="wrapper wrapper_cate_live content_search news_new_update_post_default area_news_live">
    <div class="list_box_item">
        <h3>Kết quả tìm kiếm: {!! isset($search) ? $search : null !!}</h3>
        @if(isset($result_search))
            @foreach($result_search as $result_search_val)
            <div class="box_item_live">
                <a href=""><h3>{!! $result_search_val->name !!}</h3></a>
                <div class="media_content">
                    <div class="m_left">
                        <div class="media">
                            @if(!empty($result_search_val->images))
                                <a href="{{ URL::route('m_getNewsDetail', $result_search_val->slug.'-'.$result_search_val->id) }}" style="background-image:url({{ url('Uploads/News/'.$result_search_val->images) }})">
                                   <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                </a>
                            @else
                                <a href="{{ URL::route('m_getNewsDetail', $result_search_val->slug.'-'.$result_search_val->id) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                   <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="content">
                        <p>{!! $result_search_val->description !!}</p>
                    </div>
                    <div class="clear_fix"></div>
                </div>
            </div>
            @endforeach
        @else
           <p>{!! 'Không tìm thấy kết quả' !!}</p>
        @endif
    </div>
</section>