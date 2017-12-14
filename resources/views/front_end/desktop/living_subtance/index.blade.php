@extends('layouts.desktop')
@section('content')
<?php if (!empty($sub_menu)) { ?>
	<div class="menu-drop" style="height: 40px;">
		<nav class="navbar">
			<ul class="navbar-nav">
				@foreach($sub_menu as $sub)
					<li {{ $sub->id == $id ? 'class=active' : '' }}>
						<a href="{{route('d_getPageCategory', ['slug' => $sub->slug])}}">
							{{ $sub->name }}
						</a>
					</li>
				@endforeach
			</ul>
		</nav>
	</div>
<?php } ?>
<div class="w-content">
	<div class="content">
		<div class="primary">
			@include('front_end._partial.slider')
			
			@if(isset($ads))
				@if(isset($ads[7]))
					@foreach($ads[7] as $ad)
						<div class="adv ad7">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
		                    @elseif($ad->type == 3)
		                    <embed src="{{ asset($ad->images) }}" class="ad7"></embed>
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad7">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				<style>
					.page-live{
						margin-top: 20px;
					}
				</style>
				@endif
            @endif

			<div class="page-live">
				<div class="row">
					<?php $stop = 4;?>
					@if(isset($postFixed))
						@if(count($postFixed))
							@foreach($postFixed as $post)
							<?php $post = (object)$post; ?>
			            	<div class="item-article">
								<a href="{{url($post->slug.'-'.$post->id).'.html'}}">
									<img class="img-responsive" src="{{asset($post->images)}}" alt="{{$post->name}}"/>
								</a>
								<span class="time">
									<i aria-hidden="true" class="fa fa-clock-o">
									</i>
									<?php
									echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post->created_at));
									?>
								</span>
								<a href="{{url($post->slug.'-'.$post->id).'.html'}}">
									{{$post->name}}
								</a>
								<p>
									{{Illuminate\Support\Str::words($post->description, 20, '...')}}
								</p>
							</div>
							@endforeach
							<?php $stop = $stop - count($postFixed); ?>
		            	@endif
	            	@endif

					<?php $i = 0; ?>
					@foreach($post_fulls as $key)
					<?php $i ++; ?>
					<div class="item-article">
						<a href="{{url($key->slug.'-'.$key->id).'.html'}}">
							<img class="img-responsive" src="{{asset($key->images)}}" alt="{{$key->name}}"/>
						</a>
						<span class="time">
							<i aria-hidden="true" class="fa fa-clock-o">
							</i>
							<?php
							echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($key->created_at));
							?>
						</span>
						<a href="{{url($key->slug.'-'.$key->id).'.html'}}">
							{{$key->name}}
						</a>
						<p>
							{{Illuminate\Support\Str::words($key->description, 20, '...')}}
						</p>
					</div>
					@if($i == $stop)
						<?php break; ?>
					@endif
					@endforeach
				</div>
				
				@if(isset($ads))
					@if(isset($ads[10]))
					<div class="row">
						@foreach($ads[10] as $ad)
							<div class="adv ad10">
								@if($ad->type == 1)
								<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
								@elseif($ad->type == 2)
								{!! $ad->iframe !!}
			                    @elseif($ad->type == 3)
			                    <embed src="{{ asset($ad->images) }}" class="ad10"></embed>
								@endif
							</div>
						@endforeach
					</div>
					@else
					<!-- <div class="row">
						<div class="adv ad10">
							<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
						</div>
					</div> -->
					@endif
	            @endif

				@if(count($post_fulls) > $stop)
		            <div class="row" style="margin-top: 10px;">
						@for($i = $stop; $i < count($post_fulls); $i ++)
						<div class="item-article">
							<a href="{{url($post_fulls[$i]->slug.'-'.$post_fulls[$i]->id).'.html'}}">
								<img class="img-responsive" src="{{asset($post_fulls[$i]->images)}}" alt="{{$post_fulls[$i]->name}}"/>
							</a>
							<span class="time">
								<i aria-hidden="true" class="fa fa-clock-o">
								</i>
								<?php
								echo \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post_fulls[$i]->created_at));
								?>
							</span>
							<a href="{{url($post_fulls[$i]->slug.'-'.$post_fulls[$i]->id).'.html'}}">
								{{$post_fulls[$i]->name}}
							</a>
							<p>
								{{Illuminate\Support\Str::words($post_fulls[$i]->description, 20, '...')}}
							</p>
						</div>
						@endfor
					</div>
				@endif

				<div class="row">
					<div class="pagination phantrang">
						@include('vendor.pagination', ['data' => $post_fulls])
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">

			@if(isset($ads))
				@if(isset($ads[8]))
					@foreach($ads[8] as $ad)
						<div class="adv ad8">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}		
		                    @elseif($ad->type == 3)
		                    <embed src="{{ asset($ad->images) }}" class="ad8"></embed>
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad8">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

			@include('front_end._partial.side_bar')
			
			@if(isset($ads))
				@if(isset($ads[9]))
					@foreach($ads[9] as $ad)
						<div class="adv ad9">
							@if($ad->type == 1)
							<img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
							@elseif($ad->type == 2)
							{!! $ad->iframe !!}
		                    @elseif($ad->type == 3)
		                    <embed src="{{ asset($ad->images) }}" class="ad9"></embed>
							@endif
						</div>
					@endforeach
				@else
				<!-- <div class="adv ad9">
					<img alt="" src="{{asset('images/no-adv.jpg')}}"/>
				</div> -->
				@endif
            @endif

			@if(isset($boxs))
		        @if(isset($boxs[1]))
		            @include('front_end._partial.info-box', ['boxs' => $boxs[1]])
		        @endif
		    @endif
		    
			@if(isset($videos))
				@if(count($videos) > 0)
			        <div class="video">
			            <div class="title">
			                <span class="arrow-left">
			                </span>
			                <h3>
			                    Video
			                </h3>
			            </div>
			            
			            <div class="text">
			                <iframe allowfullscreen="" frameborder="0" height="165" src="https://www.youtube.com/embed/{{$videos[0]['url']}}" width="100%">
			                </iframe>
			                <a href="{{url($videos[0]['slug'].'-'.$videos[0]['id'].'.html')}}">
			                    {{$videos[0]['name']}}
			                </a>
			                <ul>
			                <?php if (count($videos)>1) {
			                    for ($i=1; $i < count($videos); $i++) { ?>
			                         <li>
			                            <a href="{{url($videos[$i]['slug'].'-'.$videos[$i]['id'].'.html')}}">
			                               {{$videos[$i]['name']}}
			                            </a>
			                        </li>
			                   <?php 
			                   }
			                    }
			                 ?>
			                </ul>
			            </div>
			        </div>
		        @endif
		    @endif

		    @if(isset($boxs))
		        @if(isset($boxs[2]))
		            @include('front_end._partial.info-box', ['boxs' => $boxs[2]])
		        @endif
		    @endif
			@include('front_end._partial.care')
		</div>
	</div>
	@endsection
