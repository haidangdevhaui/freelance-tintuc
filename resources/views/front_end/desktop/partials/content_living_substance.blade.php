@if(isset($advers_content1))
    @foreach($advers_content1 as $advers_content1_val)
        <div class="adv">
            <a href="{{ $advers_content1_val->url }}">
               <img src="{{ url('Uploads/advertisement/'. $advers_content1_val->images) }}"/>
            </a>
        </div>
    @endforeach
@endif
<div class="page-live post_living_substance">
    <div class="row">
        @foreach($post_fulls as $post_full)
            <div class="item-article list_post_living_subtance">
                @if(!empty($post_full->images))
                <div class="img" style="background-image: url({{ url('/'.$post_full->images) }})">
                    <a href="{{ URL::route("getNewsDetail", $post_full->slug) }}">
                        <img src="{{ url('assets/images/transparent_live_substance.png') }}" class="img-responsive"/>
                    </a>
                </div>
                @else
                <div class="img" style="background-image: url({{ url('assets/images/no-image.jpg') }})">
                    <a href="{{ URL::route("getNewsDetail", $post_full->slug) }}">
                        <img src="{{ url('assets/images/transparent_live_substance.png') }}" class="img-responsive"/>
                    </a>
                </div>
                @endif
                <span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 phút trước</span>
                <h3 class="title">
                    <a href="{{ URL::route("getNewsDetail", $post_full->slug) }}">{!! $post_full->name !!}</a>
                </h3>
                <p class="description">
                    {!! $post_full->description !!}
                </p>
            </div>
        @endforeach
    </div>
    <div class="paginate">
        <div class="paginate_link pull-right">{!! $post_fulls->links() !!}</div>
    </div>
</div>
</div>
