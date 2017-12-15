            @if(isset($post_hot))
                <div class="news-good news_hot_detail">
                    <div class="title">
                        <h3>Tin hay trên songmoi.vn</h3>
                    </div>
                    @foreach($post_hot as $post_hot_val)
                        <div class="new-good">
                            <a href="{{ URL::route('getNewsDetail', $post_hot_val->slug) }}">
                                @if(!empty($post_hot_val->images))
                                   <img class="bg_item_res" style="background-image: url({{ url('/'.$post_hot_val->images) }})" src="{{ url('assets/mobile/img2/item2.png') }}" class="img-responsive">
                                @else 
                                   <img class="bg_item_res" style="background-image: url({{ url('assets/images/no-image.jpg ') }})" src="{{ url('assets/mobile/img2/item2.png') }}" class="img-responsive">
                                @endif
                                <div class="description">
                                   <h3>{!! $post_hot_val->name !!}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>