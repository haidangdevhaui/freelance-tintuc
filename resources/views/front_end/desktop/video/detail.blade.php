@extends('layouts.desktop')
@section('content')
<div class="w-content">
	<div class="content">
		<div class="primary">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{{url('/')}}">
						Trang chủ
					</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="{{ route('desktop.video') }}">
						Video
					</a>
				</li>
			</ol>
			<div class="life-detail-content">
				<h3 class="name-article">
					{{$video->title}}
				</h3>
				<div class="row life-detail-auth">
					<div class="pull-left">
						<span class="time-create">
							<i class="fa fa-clock-o"></i>
							{{ postTimer($video->created_at) }}
						</span>
					</div>
				</div>
				<div class="left-content" style="text-align: justify !important;">
					<h3 class="title-article">
						{{ $video->description }}
					</h3>
					<div class="post-detail-content">
						<iframe allowfullscreen="" frameborder="0" height="400" src="https://www.youtube.com/embed/{{ str_replace('https://www.youtube.com/watch?v=', '', $video->source) }}" width="100%">
                    	</iframe>
					</div>
					<br>
					<div class="post-detail-content">
						{!! $video->content !!}
						<br/>
					</div>
				</div>
				<div class="tag row">
					<span>
						Từ Khóa :
					</span>
					@if(isset($video->tags))
						@foreach($video->tags as $tag)
							<a href="{{url('tag/'.$tag->slug)}}">
								{{ $tag->name }}
							</a>
						@endforeach
					@endif
				</div>
				<div class="comment">
					<div class="content-comment-article">
						<div class="row total-comment">
							<div class="fb-comments" data-href="http://songmoi.vn/<?php echo $video->slug . '.html'; ?>" data-numposts="5"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">
            @include('front_end._partial.side_bar')

            @include('front_end._partial.care')
            <!-- Care -->
        </div>
		<div class="news-good">
			<div class="title">
				<h3>
					Tin hay
				</h3>
			</div>
			@if(isset($postHigh))
				@foreach($postHigh as $post)
				<div class="new-good">
					<a href="{{ route('desktop.post', $post['slug']) }}">
						<img class="img-responsive" src="{{ url($post['image']) }}" alt="{{ $post['title'] }}" />
					</a>
					<div  style="height: 50px">
						<a href="{{ route('desktop.post', $post['slug']) }}">
							<h3>{{ Illuminate\Support\Str::words($post['title'], 15, '...') }}</h3>
						</a>
					</div>
				</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection

<!-- cmt fb -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id))
			return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=272807766472266";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<!-- like and share fb -->
