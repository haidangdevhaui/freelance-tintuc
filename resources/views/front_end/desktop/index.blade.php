@extends('layouts.desktop')

@section('content')
<style type="text/css">
    .img-main{
        width: 367.438px;
        /*height: 276.531px;*/
        height: 252.531px;
        margin-bottom: 10px;
    }
    .item-live img{
        width: 181.219px;
        height: 130.188px;
        margin-bottom: 10px;
    }
	.item-live{
		height: 210px !important;
	}
	.title h3{
		cursor: pointer;
	}

	hr{
		width: 100%;
		height: 4px;
		border:none;
		background: #EAEBF0;
		margin: 5px 0 0;
	}
</style>

<div class="w-content">
    <div class="content">
        <div class="primary">
            @include('front_end._partial.slider')

            @if(isset($ads))
				@if(isset($ads[1]))
					@foreach($ads[1] as $ad)
						<div class="adv ad1">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad1">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

            <div class="block-live">
                <div class="title">
                    <h3 onclick="window.location.href = '{{route('d_getPageCategory', ['slug' => 'song-chat'])}}'">
                        Sống chất
                    </h3>
                </div>
                <div class="link-live">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="myNavbar1">
                                <ul class="nav navbar-nav">
                                    <li class="active">
                                        <a href="{{route('d_getPageCategory', ['slug' => 'ngon'])}}">
                                            Ngon
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('d_getPageCategory', ['slug' => 'dep'])}}">
                                            Đẹp
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('d_getPageCategory', ['slug' => 'song'])}}">
                                            Sống
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('d_getPageCategory', ['slug' => 'di'])}}">
                                            Đi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('d_getPageCategory', ['slug' => 'xem'])}}">
                                            Xem
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                @if(isset($content['song-chat']))
				@if($content['song-chat']['top1'])
				<div class="live-primary">
					<a href="{{url($content['song-chat']['top1']['slug'].'-'.$content['song-chat']['top1']['id'])}}.html">
						<img class="img-responsive img-main" src="{{asset($content['song-chat']['top1']['images'])}}" alt="{{$content['song-chat']['top1']['name']}}" />
					</a>
					<a href="{{url($content['song-chat']['top1']['slug'].'-'.$content['song-chat']['top1']['id'])}}.html" class="live-primary-title">
						{{$content['song-chat']['top1']['name']}}
					</a>
					<p class="live-primary-multi-line">
						{{Illuminate\Support\Str::words($content['song-chat']['top1']['description'], 40, '...')}}
					</p>
				</div>
				@endif
				<div class="live-extra">
					@foreach($content['song-chat']['top2'] as $post)
					<div class="item-live">
						<a href="{{url($post['slug'].'-'.$post['id'])}}.html">
							<img class="img-responsive" src="{{asset($post['images'])}}" alt="{{$post['name']}}" />
						</a>
						<div style="overflow: hidden; height: 60px;">
							<a href="{{url($post['slug'].'-'.$post['id'])}}.html">
								{{Illuminate\Support\Str::words($post['name'], 20, '...')}}
							</a>
						</div>
					</div>
					@endforeach
				</div>
                @endif
            </div>

            @if(isset($ads))
				@if(isset($ads[2]))
					@foreach($ads[2] as $ad)
						<div class="adv ad2">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad1">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

            <!-- <hr> -->

            <div class="block-new" style="margin-top: 10px;">
                <div class="title">
                    <h3 onclick="window.location.href = '{{route('d_getPageCategory', ['slug' => 'tin-len-ke'])}}'">
                        Tin lên kệ
                    </h3>
                </div>
                @if(isset($content['tin-len-ke']))
				@if($content['tin-len-ke']['top1'])
				<div class="live-primary">
				<a href="{{url($content['tin-len-ke']['top1']['slug'].'-'.$content['tin-len-ke']['top1']['id'])}}.html" >
					<img class="img-responsive img-main" src="{{asset($content['tin-len-ke']['top1']['images'])}}" alt="{{$content['tin-len-ke']['top1']['name']}}" />
				</a>
					<a href="{{url($content['tin-len-ke']['top1']['slug'].'-'.$content['tin-len-ke']['top1']['id'])}}.html" class="live-primary-title">
						{{$content['tin-len-ke']['top1']['name']}}
					</a>
					<p class="live-primary-multi-line">
						{{Illuminate\Support\Str::words($content['tin-len-ke']['top1']['description'], 40, '...')}}
					</p>
				</div>
				@endif

				<div class="live-extra">
					@foreach($content['tin-len-ke']['top2'] as $post)
					<div class="item-live">
						<a href="{{url($post['slug'].'-'.$post['id'])}}.html">
							<img class="img-responsive" src="{{asset($post['images'])}}" alt="{{$post['name']}}" />
						</a>
						<div style="overflow: hidden; height: 60px;">
							<a href="{{url($post['slug'].'-'.$post['id'])}}.html" class="live-primary-title">
								{{Illuminate\Support\Str::words($post['name'], 20, '...')}}
							</a>
						</div>
					</div>
					@endforeach
				</div>
                @endif
            </div>
			
			@if(isset($ads))
				@if(isset($ads[3]))
					@foreach($ads[3] as $ad)
						<div class="adv ad3">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad3">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

            <!-- <hr style="margin-bottom: 10px"> -->

            <div class="block-view-create">
                <div class="view">
                    <div class="title">
                        <h3 onclick="window.location.href = '{{route('d_getPageCategory', ['slug' => 'sang-tao'])}}'">
                            Sáng tạo
                        </h3>
                    </div>
                    @if(isset($content['sang-tao']))
					@if(count($content['sang-tao']) > 0)
					<a href="{{url($content['sang-tao'][0]['slug'].'-'.$content['sang-tao'][0]['id'])}}.html">
						<img class="img-responsive img-main" src="{{asset($content['sang-tao'][0]['images'])}}" alt="{{$content['sang-tao'][0]['name']}}" />
					</a>	
					<h3 class="live-primary-h3">
						<a href="{{url($content['sang-tao'][0]['slug'].'-'.$content['sang-tao'][0]['id'])}}.html" class="live-primary-title">
							{{$content['sang-tao'][0]['name']}}
						</a>
					</h3>
					@endif
					<?php
					$posts = $content['sang-tao'];
					array_shift($posts);
					?>
					<ul>
						@foreach($posts as $p)
						<li>
							<a href="{{url($p['slug'].'-'.$p['id'])}}.html">
								{{$p['name']}}
							</a>
						</li>
						@endforeach
					</ul>
                    @endif
                </div>
                <div class="create">
                    <div class="title">
                        <h3 onclick="window.location.href = '{{route('d_getPageCategory', ['slug' => 'giai-tri'])}}'">
                            Giải trí
                        </h3>
                    </div>
                    @if(isset($content['giai-tri']))
					@if(count($content['giai-tri']) > 0)
					<img class="img-responsive img-main" src="{{asset($content['giai-tri'][0]['images'])}}" alt="{{$content['giai-tri'][0]['name']}}" />
					<h3 class="live-primary-h3">
						<a href="{{url($content['giai-tri'][0]['slug'].'-'.$content['giai-tri'][0]['id'])}}.html">
							{{$content['giai-tri'][0]['name']}}
						</a>
					</h3>
					@endif
					<?php
					$posts = $content['giai-tri'];
					array_shift($posts);
					?>
					<ul>
						@foreach($posts as $p)
						<li>
							<a href="{{url($p['slug'].'-'.$p['id'])}}.html">
								{{$p['name']}}
							</a>
						</li>
						@endforeach
					</ul>
                    @endif
                </div>
            </div>

            @if(isset($ads))
				@if(isset($ads[4]))
					@foreach($ads[4] as $ad)
						<div class="adv ad4">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad4">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

            <div class="block-tech-entertain">
                <div class="tech">
                    <div class="title">
                        <h3 onclick="window.location.href = '{{route('d_getPageCategory', ['slug' => 'goc-nhin'])}}'">
                            Góc nhìn
                        </h3>
                    </div>
                    @if(isset($content['goc-nhin']))
					@if(count($content['goc-nhin']) > 0)
					<a href="{{url($content['goc-nhin'][0]['slug'].'-'.$content['goc-nhin'][0]['id'])}}.html" >
						<img class="img-responsive img-main" src="{{asset($content['goc-nhin'][0]['images'])}}" alt="{{$content['goc-nhin'][0]['name']}}" />
					</a>
					<h3 class="live-primary-h3">
						<a href="{{url($content['goc-nhin'][0]['slug'].'-'.$content['goc-nhin'][0]['id'])}}.html" class="live-primary-title">
							{{$content['goc-nhin'][0]['name']}}
						</a>
					</h3>
					@endif
					<?php
					$posts = $content['goc-nhin'];
					array_shift($posts);
					?>
					<ul>
						@foreach($posts as $p)
						<li>
							<a href="{{url($p['slug'].'-'.$p['id'])}}.html">
								{{$p['name']}}
							</a>
						</li>
						@endforeach
					</ul>
                    @endif
                </div>
                <div class="entertain">
                    <div class="title">
                        <h3 onclick="window.location.href = '{{route('d_getPageCategory', ['slug' => 'cong-nghe'])}}'">
                            Công nghệ
                        </h3>
                    </div>
                    @if(isset($content['cong-nghe']))
					@if(count($content['cong-nghe']) > 0)
					<a href="{{url($content['cong-nghe'][0]['slug'].'-'.$content['cong-nghe'][0]['id'])}}.html">
						<img class="img-responsive img-main" src="{{asset($content['cong-nghe'][0]['images'])}}" alt="{{$content['cong-nghe'][0]['name']}}" />
					</a>
					<h3 class="live-primary-h3">
						<a href="{{url($content['cong-nghe'][0]['slug'].'-'.$content['cong-nghe'][0]['id'])}}.html">
							{{$content['cong-nghe'][0]['name']}}
						</a>
					</h3>
					@endif
					<?php
					$posts = $content['cong-nghe'];
					array_shift($posts);
					?>
					<ul>
						@foreach($posts as $p)
						<li>
							<a href="{{url($p['slug'].'-'.$p['id'])}}.html">
								{{$p['name']}}
							</a>
						</li>
						@endforeach
					</ul>
                    @endif
                </div>
            </div>
        </div>
        @include('front_end._partial.right_content')
    </div>
    @endsection
</div>