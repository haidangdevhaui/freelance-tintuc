@include('front_end.desktop.partials.list_menu_children')
@include('front_end.desktop.partials.freeture')
@if(isset($advers_content1))
    <div class="adv">
        @foreach($advers_content1 as $advers_content1_val)
            <a href="{{ $advers_content1_val->url }}">
               @if(!empty($advers_content1_val->images))
                  <img src="{{ url('assets/images/'. $advers_content1_val->images) }}"/>
               @else
                  <img src="{{ url('assets/images/no-image.jpg') }}"/> 
               @endif
            </a>
        @endforeach
    </div>
@endif
@if(isset($post_cats))
<div class="page-live page_new_life">
    <div class="row">
        @foreach($post_cats as $post_cat)
            <div class="item-article">
                <a href="{!! URL::route('getNewsDetail', $post_cat->slug) !!}">
                    @if(!empty($post_cat->images))
                    <div class="img" style="background-image: url({{ url('/'.$post_cat->images) }})">
                        <img src="{{ url('assets/images/transparent_live_substance.png') }}" class="img-responsive"/>
                    </div>
                    @else
                    <div class="img" style="background-image: url({{ url('assets/images/no-image.jpg') }})">
                        <img src="{{ url('assets/images/transparent_live_substance.png') }}" class="img-responsive"/>
                    </div>
                    @endif
                </a>
                <span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 phút trước</span>
                <h3 class="title"><a href="{!! URL::route('getNewsDetail', $post_cat->slug) !!}">{!! $post_cat->name !!}</a></h3>
                <p class="description">{!! $post_cat->description !!}</p>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="pagination">
            {!! $post_cats->links() !!}
        </div>
    </div>
</div>
@endif
</div>
