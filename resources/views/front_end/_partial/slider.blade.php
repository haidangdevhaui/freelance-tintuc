<div class="slide">
    <div class="owl-carousel owl-theme" id="owl-demo">
        @if(isset($slider))
			@foreach($slider as $s)
				<?php $s = (object)$s; ?>
				<div class="item">
					<div class="title">
						<a href="{{url($s->slug.'-'.$s->id)}}.html">
							<h3>
								{{$s->name}}
							</h3>
						</a>
						<p>
							{{Illuminate\Support\Str::words($s->description, 50, '...')}}
						</p>
					</div>
					<div class="shaw">
					</div>
					<img data-u="image" src="{{ asset($s->images) }}"/>
				</div>
			@endforeach
        @endif
    </div>
</div>
