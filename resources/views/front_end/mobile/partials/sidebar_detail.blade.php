<style>
    .item a img{
        height: 150px !important;
    }
    .media a img{
        height: 100px !important;
    }
</style>
@if(isset($post_detail_news))
<div class="area_news_live news_new_update_post_default">
	<h3 class="title_list">Tin mới cập nhật</h3>
	<div class="list_box_item">
		@foreach($post_detail_news as $post_detail_news_val)
		<div class="box_item_live">
			<a href="{{ URL::route('m_getNewsDetail', $post_detail_news_val->slug.'-'.$post_detail_news_val->id) }}"><h3>{!! $post_detail_news_val->name !!}</h3></a>
			<div class="media_content">
				<div class="m_left">
					<div class="media">
						<a href="{{ URL::route('m_getNewsDetail', $post_detail_news_val->slug.'-'.$post_detail_news_val->id) }}">
							<img src="{{ asset($post_detail_news_val->images) }}" alt="{{$post_detail_news_val->name}}">
						</a>
					</div>
				</div>
				<div class="content">
					<p>
						{{Illuminate\Support\Str::words($post_detail_news_val->description, 22, '...')}}

					</p>
				</div>
				<div class="clear_fix"></div>
			</div>
		</div>
		@endforeach
		<div class="clear_fix"></div>
	</div>
</div>
@endif
@if(!empty($post_cats))
<div class="area_same_cate">
	<h3 class="title_list">Tin cùng chuyên mục</h3>
	<div class="slider_news">
		<section id="demos">
			<div class="row">
				<div class="large-12 ">
					<div class="loop owl-carousel owl-theme">

						@foreach($post_cats as $post_cats_val)
						<div class="item">
							<a href="{{ URL::route('m_getNewsDetail', $post_cats_val->slug.'-'.$post_cats_val->id) }}">
								<a href="{{ URL::route('m_getNewsDetail', $post_cats_val->slug.'-'.$post_cats_val->id) }}">
									<img src="{{ asset($post_cats_val->images) }}" alt="{{$post_cats_val->name}}">
								</a>
								<p>{!! $post_cats_val->name !!}</p>
							</a>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endif
@if(!empty($post_hot))
<div class="area_same_cate">
	<h3 class="title_list">Tin hay trên Songmoi.vn</h3>
	<div class="slider_news">
		<section id="demos">
			<div class="row">
				<div class="large-12 ">
					<div class="loop owl-carousel owl-theme">

						@foreach($post_hot as $post_hot_val)
						<div class="item">
							<a href="{{ URL::route('m_getNewsDetail', $post_hot_val->slug.'-'.$post_hot_val->id) }}">
								<img src="{{ asset($post_hot_val->images) }}" alt="{{$post_hot_val->name}}">
							</a>
							<p>{!! $post_hot_val->name !!}</p>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endif
@if(!empty($list_videos))
<div class="area_same_cate">
	<h3 class="title_list"> Video trên songmoi.vn</h3>
	<div class="slider_news">
		<section id="demos">
			<div class="row">
				<div class="large-12 ">
					<div class="loop owl-carousel owl-theme">

						@foreach($list_videos as $video)
						<div class="item">
							<a href="{{ URL::route('m_getNewsDetail', $video->slug.'-'.$video->id) }}">
								<div class="video-container">
									<iframe  src="https://www.youtube.com/embed/<?php echo $video->url; ?>" frameborder="0" allowfullscreen></iframe>
								</div>
								<p>{!! $video->name !!}</p>
							</a>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endif
@if(!empty($posts_care))
<div class="area_news_live news_new_update_post_default">
	<h3 class="title_list">Có thể bạn quan tâm</h3>
	<div class="list_box_item">
		<div class="item paginate_load_item">

			@foreach($posts_care as $post_most_view_default_val)
			<div class="box_item_live">
				<a href="{{ URL::route('m_getNewsDetail', $post_most_view_default_val->slug.'-'.$post_most_view_default_val->id) }}"><h3>{!! $post_most_view_default_val->name !!}</h3></a>
				<div class="media_content">
					<div class="m_left">
						<div class="media">
							<a href="{{ URL::route('m_getNewsDetail', $post_most_view_default_val->slug.'-'.$post_most_view_default_val->id) }}">
								<img src="{{ asset($post_most_view_default_val->images) }}" alt="{{$post_most_view_default_val->name}}">
							</a>
						</div>
					</div>
					<div class="content">
						<p>{{Illuminate\Support\Str::words($post_most_view_default_val->description, 22, '...')}}</p>
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
<style>
    .video-container {
		position:relative;
		margin-top: 10px;
		padding-bottom:56.25%;
		padding-top:30px;
		height:0;
		overflow:hidden;
	}

	.video-container iframe, .video-container object, .video-container embed {
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
	}
</style>