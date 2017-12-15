@extends('layouts.desktop')
@section('content')
@if(isset($subCategories))
<div class="menu-drop" style="height: 40px;">
	<nav class="navbar">
		<ul class="navbar-nav">
			@foreach($subCategories as $sub)
				<li {{ $sub['id'] == $category->id ? 'class=active' : '' }}>
					<a href="{{ route('desktop.category', $sub['slug']) }}">
						{{ $sub['name'] }}
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
			@include('front_end._partial.slider')

			<div class="page-live">
				<div class="row">
					@if(isset($posts))
						@foreach($posts as $post)
						<div class="item-article">
							<a href="{{ route('desktop.post', $post['slug']) }}">
								<img class="img-responsive" src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}"/>
							</a>
							<span class="time">
								<i aria-hidden="true" class="fa fa-clock-o">
								</i>
								{{ \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post['created_at'])) }}
							</span>
							<a href="{{ route('desktop.post', $post['slug']) }}">
								{{ $post['title'] }}
							</a>
							<p>
								{{ Illuminate\Support\Str::words($post['description'], 20, '...') }}
							</p>
						</div>
						@endforeach
					@endif
				</div>

				<div class="row">
					<div class="pagination phantrang">
						@include('vendor.pagination', ['data' => $posts])
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">
			@include('front_end._partial.side_bar')
	        <div class="video">
		        <div class="title">
		            <span class="arrow-left">
		            </span>
		            <h3>
		                Video
		            </h3>
		        </div>
		        
		        <div class="text">
		            @if(isset($videos))
		                @if(count($videos))
		                    <iframe allowfullscreen="" frameborder="0" height="165" src="https://www.youtube.com/embed/{{ str_replace('https://www.youtube.com/watch?v=', '', $videos[0]['source']) }}" width="100%">
		                    </iframe>
		                    <a href="{{ route('desktop.video.detail', $videos[0]['slug']) }}">
		                        {{ $videos[0]['title'] }}
		                    </a>
		                @endif
		                @if(count($videos) > 1)
		                <ul>
		                    @for($i=1; $i < count($videos); $i++)
		                         <li>
		                            <a href="{{ route('desktop.video.detail', $videos[$i]['slug']) }}">
		                               {{$videos[$i]['title']}}
		                            </a>
		                        </li>
		                   @endfor
		                </ul>
		                @endif
		            @endif
		        </div>
		    </div>

		    <div class="Reporting">
		        <div class="title">
		            <span class="arrow-left">
		            </span>
		            <h3>
		                Phóng sự ảnh
		            </h3>
		        </div>
		        <div class="text">
		            @if(isset($images))
		                @if(count($images))
		                <img class="img-responsive" src="{{ asset($images[0]['images']) }}" alt="{{$images[0]['name']}}">
		                <a href="{{url($images[0]['slug'].'-'.$images[0]['id'])}}.html">
		                    {{$images[0]['name']}}
		                </a>
		                @endif
		                <?php 
		                    $posts = $images;
		                    array_shift($posts);
		                ?>
		                <ul>
		                    @foreach($posts as $post)
		                    <li>
		                        <a href="{{url($post['slug'].'-'.$post['id'])}}.html">
		                            {{$post['name']}}
		                        </a>
		                    </li>
		                    @endforeach
		                </ul>
		            @endif
		        </div>
		    </div>
			@include('front_end._partial.care')
		</div>
	</div>
	@endsection