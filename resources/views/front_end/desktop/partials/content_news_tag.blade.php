<div class="contai_site_songmoi post_detail_site news_tag_page">
    <div class="w-content">
        <div class="content">
            <div class="primary">
                <h4 class="title_list">Danh sách tin tức có cùng thẻ</h4>
                <div class="life-detail-content content_tag_list_post">
                    @if(isset($post_collect))
                        @foreach($post_collect as $post_item)
                            <div class="col-md-12 row">
                                <div class="row">
                                    <div class="col-md-5 list_item_news">
                                        <div class="img_news_tag item_news_img">
                                            <a href="{{ URL::route('getNewsDetail', $post_item->slug) }}">
                                                @if(!empty($post_item->images))
                                                    <div class="img" style="background-image: url({{ url('/'.$post_item->images)}})">
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
                                            <h3 class="title"><a href="{{ URL::route('getNewsDetail', $post_item->slug) }}">{!! $post_item->name !!}</a></h3>
                                            <p class="description">
                                                {!! $post_item->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
