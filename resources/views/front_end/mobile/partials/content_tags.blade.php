@if(isset($post_collect))
<div class="area_news_live news_new_update_post_default list_content_tags_mobile">
    <h3 class="title_list">Tags</h3>
    <div class="list_box_item">
            @foreach($post_collect as $post_collect_val)
	            <div class="box_item_live">
	                <a href=""><h3>{!! $post_collect_val->name !!}</h3></a>
	                <div class="media_content">
	                    <div class="m_left">
	                        <div class="media">
	                            <a href="{{ URL::route('getNewsDetailMb', $post_collect_val->slug) }}">
                                   @if(!empty($post_collect_val->images))
                                        <div class="img bg_item_res" style="background-image: url({{ url('Uploads/News/'.$post_collect_val->images) }})">
                                           <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                        </div>
                                   @else
                                        <div class="img bg_item_res" style="background-image: url({{ url('assets/images/no-image.jpg') }})">
                                           <img src="{{ url('assets/mobile/img2/item3.png') }}" alt="">
                                        </div>
                                   @endif
                                </a>
	                        </div>
	                    </div>
	                    <div class="content">
	                        <p>{!! $post_collect_val->description !!}</p>
	                    </div>
	                    <div class="clear_fix"></div>
	                </div>
	            </div>
	        @endforeach
        <div class="clear_fix"></div>
    </div>
</div>
@endif