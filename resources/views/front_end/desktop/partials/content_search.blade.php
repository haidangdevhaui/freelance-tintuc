<div class="contai_site_songmoi post_detail_site">
    <div class="w-content">
        <div class="content">
            <div class="primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Kết quả tìm kiếm: {!! isset($search) ? $search : null !!}</li>
                </ol> 
                <div class="life-detail-content content_tag_list_post"> 
                    @if(!empty($result_search))
                        @foreach($result_search as $result_search_item)
                            <div class="col-md-12 row">
                                <div class="row">
                                    <div class="col-md-5 list_item_news">
                                        <div class="img_news_tag item_news_img">
                                            <a href="{{ URL::route('getNewsDetail', $result_search_item->slug) }}">
                                                @if(!empty($result_search_item->images))
                                                    <div class="img" style="background-image: url({{ url('/'.$result_search_item->images)}})">
                                                      <img src="{{ url('assets/images/transparent_live_substance.png') }}" alt="">
                                                    </div>
                                                @else
                                                   <img src="{{ url('assets/images/no-image.jpg') }}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="text_news_tag">
                                            <h3 class="title"><a href="{{ URL::route('getNewsDetail', $result_search_item->slug) }}">{!! $result_search_item->name !!}</a></h3>
                                            <p class="description">
                                                {!! $result_search_item->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                        	{{ $result_search->appends(Request::only('search_form'))->links() }}
                        </div>
                    @else
                        <p>Không có kết quả tìm thấy</p>
                    @endif
                </div>
            </div>
            