@extends('layouts.desktop')

@section('content')
<div class="w-content">
    <div class="content">
        <div class="primary">
            @include('front_end._partial.slider')
			@if(isset($content))
				@foreach($content as $category)
	            <div class="block-live">
	                <div class="title">
	                    <h3 onclick="window.location.href = '{{route('desktop.category', $category['slug'])}}'">
	                        {{ $category['name'] }}
	                    </h3>
	                </div>
	                <!-- <div class="link-live">
                        <ul class="sub-category-list">
                        	@foreach($category['sub'] as $sub)
                            <li class="active">
                                <a href="{{route('desktop.category', ['slug' => $sub['slug']])}}">
                                    {{ $sub['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
	                </div> -->
	                @if(count($category['posts']))
					<div class="live-primary">
						<a href="{{ url($category['posts'][0]['slug']) }}.html">
							<img class="img-responsive img-main" src="{{ asset($category['posts'][0]['image'])}}" alt="{{ $category['posts'][0]['title'] }}" />
						</a>
						<a href="{{ url($category['posts'][0]['slug']) }}.html" class="live-primary-title">
							{{ $category['posts'][0]['title'] }}
						</a>
						<p class="live-primary-multi-line">
							{{ Illuminate\Support\Str::words($category['posts'][0]['description'], 40, '...') }}
						</p>
					</div>
					@endif
					@if(count($category['posts']) > 1)
					<div class="live-extra">
						@for($i = 1; $i < count($category['posts']); $i ++)
						<div class="item-live">
							<a href="{{ url($category['posts'][$i]['slug']) }}.html">
								<img class="img-responsive" src="{{ asset($category['posts'][$i]['image']) }}" alt="{{ $category['posts'][$i]['title'] }}" />
							</a>
							<div style="overflow: hidden; height: 60px;">
								<a href="{{ url($category['posts'][$i]['slug']) }}.html">
									{{Illuminate\Support\Str::words($category['posts'][$i]['title'], 20, '...')}}
								</a>
							</div>
						</div>
						@endfor
					</div>
	                @endif
	            </div>
	            @endforeach
            @endif
        </div>
        @include('front_end._partial.right_content')
    </div>
    @endsection
</div>