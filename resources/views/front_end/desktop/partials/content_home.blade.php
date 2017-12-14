@if(isset($advers_content1))
    @foreach($advers_content1 as $advers_content1_val)
        <div class="adv">
            <a href="{{ $advers_content1_val->url }}"><img src="{!! url('Uploads/advertisement/'.$advers_content1_val->images) !!}"/></a>
        </div>
    @endforeach
@endif
@foreach($cats_collection as $val_cats)
    @if($val_cats->parent_id == 0)
        <div class="block-live list_post_home_content">
            <div class="title">
                <h3>{!! $val_cats->name !!}</h3>
            </div>
            <div class="link-live">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="myNavbar1">
                            <ul class="nav navbar-nav">
                                @foreach($cat_full as $list_cats)
                                    @if($list_cats->parent_id == $val_cats->id)
                                        <li class="active"><a href="{{ URL::route('getNewLife', $list_cats->slug) }}">{!! $list_cats->name !!}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="list_post_show">
                @foreach($val_cats->posts as $post)
                    <div class="live-primary ">
                        @if(!empty($post->images))
                        <div class="img" style="background-image: url({{ url("/".$post->images) }})">
                            <a href="{{ URL::route('getNewsDetail', $post->slug) }}">
                               <img src="{{ url('assets/images/transparent.png')}}" class="img-responsive"/>
                            </a>
                        </div>
                        @else
                        <div class="img" style="background-image: url({{ url('assets/images/no-image.jpg') }})">
                            <a href="{{ URL::route('getNewsDetail', $post->slug) }}">
                               <img src="{{ url('assets/images/transparent.png')}}" class="img-responsive"/>
                            </a>
                        </div>
                        @endif
                        <h3 class="title"><a href="{{ URL::route('getNewsDetail', $post->slug) }}">{!! $post->name !!}</a>
                        </h3>
                        <p class="description">
                            {!! $post->description !!}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endforeach
@if(isset($advers_content2))
    @foreach($advers_content2 as $advers_content2_val)
        <div class="adv">
            <a href="{{ $advers_content2_val->url  }}">
                <img src="{!! url('assets/images/'. $advers_content2_val->images) !!}"/>
            </a>
        </div>
    @endforeach
@endif
<div class="block-view-create show_list_stem_in_cat row">
    @foreach($cats_collection_step2 as $val_step2)
        @if($val_step2->parent_id == 0)
            <div class="view">
                <div class="title">
                    <h3>{!! $val_step2->name !!}</h3>
                </div>

                <ul class="step_post_list_show">
                    @foreach($val_step2->posts as $post_step2)
                        <li>
                            @if(!empty($post_step2->images))
                            <div class="img" style="background-image:url({{ url('/'.$post_step2->images) }})">
                                <a href="{{ URL::route('getNewsDetail', $post_step2->slug) }}">
                                   <img src="{{ url('assets/images/transparent_step2.png') }}" alt="">
                                </a>
                            </div>
                            @else
                            <div class="img" style="background-image:url({{ url('assets/images/no-image.jpg') }})">
                                <a href="{{ URL::route('getNewsDetail', $post_step2->slug) }}">
                                   <img src="{{ url('assets/images/transparent_step2.png') }}" alt="">
                                </a>
                            </div>
                            @endif
                            <h3 class="title">
                                <a href="{{ URL::route('getNewsDetail', $post_step2->slug) }}">{!! $post_step2->name !!}</a>
                            </h3>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endforeach
</div>