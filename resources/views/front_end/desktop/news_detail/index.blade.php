@extends('layouts.desktop')
@section('content')
@if(!empty($sub_category))
<div class="menu-drop">
	<nav class="navbar">
		<ul class="navbar-nav">
			@foreach($sub_category as $sub)
			<li>
				<a {{ $post_detail->category_id == $sub->id ? 'style=color:red' :''}} href="{{route('d_getPageCategory', ['slug' => $sub->slug])}}">
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
				<li class="breadcrumb-item active">
					<a href="{{route('d_getPageCategory', ['slug' => $link[0]->slug])}}">
						{{$link[0]->name}}
					</a>
				</li>
				@if(isset($link[1]))
				<li class="breadcrumb-item active">
					<a href="{{route('d_getPageCategory', ['slug' => $link[1]->slug])}}">
						{{$link[1]->name}}
					</a>
				</li>
				@endif
			</ol>
			<div class="life-detail-content">
				<h3 class="name-article">
					{{$post_detail->name}}
				</h3>
				<div class="row life-detail-auth">
					<div class="pull-left">
						<span class="name-auth">
							{{$post_detail->author}}
						</span>
						<span class="time-create">
							<i class="fa fa-clock-o"></i>
							{{ postTimer($post_detail->created_at) }}
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
					<div class="fb-like" data-href="{{url($post_detail->slug.'-'.$post_detail->id).'.html'}}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

				</div>
				<div class="new-same">
					<ul>
						@for($i = 0; $i < count($post_detail->connect); $i ++)
						<li>
							<a href="{{ url(str_slug($post_detail->connect[$i]->name.'-'.$post_detail->connect[$i]->id).'.html') }}">
								{{ $post_detail->connect[$i]->name }}
							</a>
						</li>
						<?php if($i == 2) break; ?>
						@endfor
					</ul>
				</div>
				<div class="left-content" style="text-align: justify !important;">
					<h3 class="title-article">
						{{$post_detail->description}}
					</h3>
					<div class="post-detail-content">
						{!!$post_detail->content!!}
						<br/>
						{!! $post_detail->author ? '<p style="text-align: right !important;">'.$post_detail->author.'</p>': '' !!}
						{!! $post_detail->source ? '<p style="text-align: right !important;">'.$post_detail->source.'</p>': '' !!}
					</div>
				</div>
				<div class="tag row">
					<span>
						Từ Khóa :
					</span>
					@foreach($post_detail->tags as $tag)
						<a href="{{url('tag/'.$tag->slug)}}">
							{{ $tag->name }}
						</a>
					@endforeach
				</div>
				@if(count($post_detail->connect) >= 3)
				<div class="new-same">
					<ul>
						@for($i = 3; $i < count($post_detail->connect); $i ++)
						<li>
							<a href="{{ url(str_slug($post_detail->connect[$i]->name.'-'.$post_detail->connect[$i]->id).'.html') }}">
								{{ $post_detail->connect[$i]->name }}
							</a>
						</li>
						@endfor
					</ul>
				</div>
				@endif
				<div class="comment">

					<div class="content-comment-article">
						<div class="row total-comment">
							<div class="fb-comments" data-href="http://songmoi.vn/<?php echo $post_detail->slug . '.html'; ?>" data-numposts="5"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">
			@if(isset($ads))
				@if(isset($ads[14]))
					@foreach($ads[14] as $ad)
						<div class="adv ad14">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
		                    @elseif($ad->type == 3)
		                    <embed src="{{ asset($ad->images) }}" class="ad14"></embed>
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad14">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

            @include('front_end._partial.side_bar')
			
			@if(isset($ads))
				@if(isset($ads[15]))
					@foreach($ads[15] as $ad)
						<div class="adv ad15">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
		                    @elseif($ad->type == 3)
		                    <embed src="{{ asset($ad->images) }}" class="ad15"></embed>
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad15">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

			@if(isset($boxs))
		        @if(isset($boxs[1]))
		            @include('front_end._partial.info-box', ['boxs' => $boxs[1]])
		        @endif
		    @endif

            @include('front_end._partial.care')

            @if(isset($boxs))
		        @if(isset($boxs[2]))
		            @include('front_end._partial.info-box', ['boxs' => $boxs[2]])
		        @endif
		    @endif
            <!-- Care -->
        </div>
		<div class="news-good">
			<div class="title">
				<h3>
					Tin hay trên songmoi.vn
				</h3>
			</div>
			<?php $i = 0; ?>
			@foreach($post_hightlight as $hightlight )
			<?php $i++; ?>
			<div class="new-good">
				<a href="{{route('d_getNewsDetail', $hightlight->slug.'-'.$hightlight->id)}}">
					<img class="img-responsive" src="{{url($hightlight->images)}}" alt=" {{$hightlight->name}}" />
				</a>
				<div  style="height: 50px">
					<a href="{{route('d_getNewsDetail', $hightlight->slug.'-'.$hightlight->id)}}">
						<h3>{{$hightlight->name}}</h3>
					</a>
				</div>
			</div>
			@endforeach
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
