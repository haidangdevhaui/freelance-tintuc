@extends('layouts.desktop')
@section('content')
@if(!empty($sub_category))
<div class="menu-drop">
	<nav class="navbar">
		<ul class="navbar-nav">
			@foreach($sub_category as $sub)
			<li>
				<a {{ $post->category_id == $sub->id ? 'style=color:red' :''}} href="{{route('desktop.category', ['slug' => $sub->slug])}}">
					{{$sub->name}}
				</a>
			</li>
			@endforeach
		</ul>
	</nav>
</div>
@endif
<div class="w-content">
	<div class="content">
		<div class="primary">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{{url('/')}}">
						Trang chủ
					</a>
				</li>
				@if(isset($categorySecend))
				<li class="breadcrumb-item active">
					<a href="{{ route('desktop.category', ['slug' => $categorySecend->slug]) }}">
						{{ $categorySecend->name }}
					</a>
				</li>
				@endif
				@if(isset($categoryFirst))
				<li class="breadcrumb-item active">
					<a href="{{ route('desktop.category', ['slug' => $categoryFirst->slug]) }}">
						{{ $categoryFirst->name }}
					</a>
				</li>
				@endif
			</ol>
			<div class="life-detail-content">
				<h3 class="name-article">
					{{$post->name}}
				</h3>
				<div class="row life-detail-auth">
					<div class="pull-left">
						<span class="name-auth">
							{{$post->author}}
						</span>
						<span class="time-create">
							<i class="fa fa-clock-o"></i>
							{{ postTimer($post->created_at) }}
						</span>
					</div>
					<div class="pull-right print">
						<a href="javascript:window.print()">
							<span>
							</span>
							In bài viết
						</a>
					</div>
				</div>
				<div class="life-like">
					<div class="fb-like" data-href="{{url($post->slug.'-'.$post->id).'.html'}}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

				</div>
				<div class="new-same">
					<ul>
						@for($i = 0; $i < count($post->connect); $i ++)
						<li>
							<a href="{{ url(str_slug($post->connect[$i]->name.'-'.$post->connect[$i]->id).'.html') }}">
								{{ $post->connect[$i]->name }}
							</a>
						</li>
						<?php if($i == 2) break; ?>
						@endfor
					</ul>
				</div>
				<div class="left-content" style="text-align: justify !important;">
					<h3 class="title-article">
						{{$post->description}}
					</h3>
					<div class="post-detail-content">
						{!!$post->content!!}
						<br/>
						{!! $post->author ? '<p style="text-align: right !important;">'.$post->author.'</p>': '' !!}
						{!! $post->source ? '<p style="text-align: right !important;">'.$post->source.'</p>': '' !!}
					</div>
				</div>
				<div class="tag row">
					<span>
						Từ Khóa :
					</span>
					@if(isset($post->tags))
						@foreach($post->tags as $tag)
							<a href="{{url('tag/'.$tag->slug)}}">
								{{ $tag->name }}
							</a>
						@endforeach
					@endif
				</div>
				<div class="comment">

					<div class="content-comment-article">
						<div class="row total-comment">
							<div class="fb-comments" data-href="http://songmoi.vn/<?php echo $post->slug . '.html'; ?>" data-numposts="5"></div>
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
