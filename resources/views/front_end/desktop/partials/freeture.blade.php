<div class="w-content">
    <div class="content">
        <div class="primary">
            <div class="slide">
                <div class="owl-carousel owl-theme" id="owl-demo">
                    @if(isset($slider_globals))
                        @foreach($slider_globals as $slider_global)
                    <div class="item">
                        <div class="title">
                            <div class="text_container_slider">
                                <h3>
                                    {!! $slider_global->name !!}
                                </h3>
                                <p>
                                    {!! $slider_global->description !!}
                                </p>
                            </div>
                        </div>
                        <div class="shaw">
                        </div>
                        <a href="{{ URL::route('getNewsDetail', $slider_global->slug) }}">
                            @if(!empty($slider_global->images))
                            <img data-u="image" src="{!! url('/'. $slider_global->images) !!}"/>
                            @else
                            <img data-u="image" src="{!! url('assets/images/no-image.jpg') !!}"/>
                            @endif
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>