<section class="wrapper wrapper_cate_live">
    <div class="area_news_hot news_top">
        @if(isset($postsNewStep1))
		@foreach($postsNewStep1 as $postsNewStep1_val)
		<div class="box_item_main">
			<div class="m_thumbnail m_text_center">
				@if(!empty($postsNewStep1_val->images))
				<a href="{{ URL::route('getNewsDetailMb', $postsNewStep1_val->slug.'-'.$postsNewStep1_val->id) }}" style="background-image:url({{ url('Uploads/News/'.$postsNewStep1_val->images) }})">
					<img src="{{ url('assets/mobile/img2/item_slider1.png') }}" alt="">
				</a>
				@else
				<a href="{{ URL::route('getNewsDetailMb', $postsNewStep1_val->slug.'-'.$postsNewStep1_val->id) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
					<img src="{{ url('assets/mobile/img2/item_slider1.png') }}" alt="">
				</a>
				@endif
			</div>
			<a href="{{ URL::route('getNewsDetailMb', $postsNewStep1_val->slug.'-'.$postsNewStep1_val->id) }}">
				<p>{!! $postsNewStep1_val->name !!}</p>
			</a>
		</div>
		@endforeach
        @endif
        @if(isset($postsNewStep2))
        <div class="list_box_item">
            @foreach($postsNewStep2 as $postsNewStep2_val)
			<div class="box_item m_left m_text_center">
				<div class="box_item_inner">
					@if(!empty($postsNewStep2_val->images))
					<a href="{{ URL::route('getNewsDetailMb', $postsNewStep2_val->slug.'-'.$postsNewStep2_val->id) }}" style="background-image:url({{ url('Uploads/News/'.$postsNewStep2_val->images) }})">
						<img src="{{ url('assets/mobile/img/home-hot-item-trans.png') }}" alt="">
					</a>
					@else
					<a href="{{ URL::route('getNewsDetailMb', $postsNewStep2_val->slug.'-'.$postsNewStep2_val->id) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
						<img src="{{ url('assets/mobile/img/home-hot-item-trans.png') }}" alt="">
					</a>
					@endif
					<a href="{{ URL::route('getNewsDetailMb', $postsNewStep2_val->slug.'-'.$postsNewStep2_val->id) }}">
						<p>{!! $postsNewStep2_val->name !!}</p>
					</a>
				</div>
			</div>
            @endforeach
        </div>
        @endif
        <div class="clear_fix"></div>
    </div>
    <div class="area_box_tab">
        <div class="box_tab">
            <ul>
                <li class="tab tab_new button_show_news_most"><a href="javascript:void(0)">Mới nhất</a></li>
                <li class="tab tab_hot button_show_news_last"><a href="javascript:void(0)">Đọc nhiều</a></li>
            </ul>
            <div class="clear_fix"></div>
        </div>
        <div class="box_content_tab slider_news_list">

            <section class="content_tab content_tab_hot content_news_view_most_view">
                @if(isset($post_most_view_default))
                <section id="demos">
                    <div class="row">
                        <div class="large-12 ">
                            <div class="loop owl-carousel owl-theme">
                                @foreach($post_most_view_default as $post_most_view_default_val)
								<div class="item">
									<a href="{{ URL::route('getNewsDetailMb', $post_most_view_default_val->slug.'-'.$post_most_view_default_val->id) }}">
										@if(!empty($post_most_view_default_val->images))
										<img class="bg_item_res" style="background-image: url({{ url('Uploads/News/'.$post_most_view_default_val->images) }})" src="{{ url('assets/mobile/img2/item_slider1.png') }}" alt="">
										@else
										<img class="bg_item_res" style="background-image: url({{ url('assets/images/no-image.jpg') }})" src="{{ url('assets/mobile/img2/item_slider1.png') }}" alt="">
										@endif

										<p>{!! $post_most_view_default_val->name !!}</p>
									</a>
								</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                @if(isset($post_hot))
                <div class="home_list_article">
                    <ul>
                        @foreach($post_hot as $post_hot_val)
						<div>
							<li>
								<a href="{{ URL::route('getNewsDetailMb', $post_hot_val->slug.'-'.$post_hot_val->id) }}">{!! $post_hot_val->name !!}</a>
							</li>
						</div>
                        @endforeach
                    </ul>
                </div>
                @endif
            </section>
            <section class="content_tab content_tab_new content_news_view_latest">
                @if(isset($postsNewStep3))
                <section id="demos">
                    <div class="row">
                        <div class="large-12 ">
                            <div class="loop owl-carousel owl-theme">
                                @foreach($postsNewStep3 as $postsNewStep3_Val)
								<div class="item">
									@if(!empty($postsNewStep3_Val->images))
									<a href="{{ URL::route('getNewsDetailMb', $postsNewStep3_Val->slug.'-'. $postsNewStep3_Val->id) }}" style="background-image:url({{ url('Uploads/News/'.$postsNewStep3_Val->images) }})">
										<img src="{{ url('assets/mobile/img/list-slide-trans.png') }}" alt="">
									</a>
									@else 
									<a href="{{ URL::route('getNewsDetailMb', $postsNewStep3_Val->slug.'-'. $postsNewStep3_Val->id) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
										<img src="{{ url('assets/mobile/img/list-slide-trans.png') }}" alt="">
									</a>
									@endif

									<a href="{{ URL::route('getNewsDetailMb', $postsNewStep3_Val->slug.'-'. $postsNewStep3_Val->id) }}">
										<p>{!! $postsNewStep3_Val->name !!}</p>
									</a>
								</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                @if(isset($post_hot))
                <div class="home_list_article">
                    <ul class="list_more">
                        @foreach($post_hot as $post_hot_val)
						<div>
							<li>
								<a href="{{ URL::route('getNewsDetailMb', $post_hot_val->slug.'-'.$post_hot_val->id) }}">{!! $post_hot_val->name !!}</a>
							</li>
						</div>
                        @endforeach
                    </ul>
                </div>
                @endif
            </section>
        </div>
    </div>
    @if(isset($postsNewStep3))
    <div class="area_news_live news_new_update_post_default">
        <div class="list_box_item">
            <div class="item paginate_load_item">
				@foreach($postsNewStep3 as $postsNewStep3_val)
                <div class="box_item_live">
                    <a href="{{ URL::route('getNewsDetailMb', $postsNewStep3_val->slug.'-'.$postsNewStep3_val->id) }}"><h3>{!! $postsNewStep3_val->name !!}</h3></a>
                    <div class="media_content">
                        <div class="m_left">
                            <div class="media">
                                @if(!empty($postsNewStep3_val->images))
								<a href="{{ URL::route('getNewsDetailMb', $postsNewStep3_val->slug.'-'.$postsNewStep3_val->id) }}" style="background-image:url({{ url('Uploads/News/'.$postsNewStep3_val->images) }})">
									<img src="{{ url('assets/mobile/img/page-list-item-trans.png') }}" alt="">
								</a>
                                @else
								<a href="{{ URL::route('getNewsDetailMb', $postsNewStep3_val->slug.'-'.$postsNewStep3_val->id) }}" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
									<img src="{{ url('assets/mobile/img/page-list-item-trans.png') }}" alt="">
								</a>
                                @endif
                            </div>
                        </div>
                        <div class="content">
                            <p>{!! $postsNewStep3_val->description !!}</p>
                        </div>
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