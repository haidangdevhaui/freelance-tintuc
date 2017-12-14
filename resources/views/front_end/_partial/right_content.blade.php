<div class="sidebar">
    <div class="new sidebar-top">
        @if(isset($rightContent))
            @if($rightContent['rightSlider'])
                @foreach($rightContent['rightSlider'] as $p)
                    <div class="media right-slider">
                        <a class="media-left" href="{{url($p->slug.'-'.$p->id)}}.html">
                            <img class="media-object" src="{{ asset($p->images) }}" style="width: 142px;height: 86px;" alt="{{$p->name}}">
                        </a>
                        <div class="media-body">
                            <a href="{{url($p->slug.'-'.$p->id)}}.html">{{$p->name}}</a>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>

    @if(isset($ads))
        @if(isset($ads[5]))
            @foreach($ads[5] as $ad)
                <div class="adv ad5">
                    @if($ad->type == 1)
                    <img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
                    @elseif($ad->type == 2)
                    {!! $ad->iframe !!}
                    @elseif($ad->type == 3)
                    <embed src="{{ asset($ad->images) }}" class="ad5"></embed>
                    @endif
                </div>
            @endforeach
        @else
        
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
                @if(count($videos) > 1)
                <ul>
                    @for($i=1; $i < count($videos); $i++)
                         <li>
                            <a href="{{url($videos[$i]['slug'].'-'.$videos[$i]['id'].'.html')}}">
                               {{$videos[$i]['name']}}
                            </a>
                        </li>
                   @endfor
                </ul>
                @endif
            </div>
        </div>
    @endif
    @endif
    <div class="Reporting">
        <div class="title">
            <span class="arrow-left">
            </span>
            <h3>
                Phóng sự ảnh
            </h3>
        </div>
        <div class="text">
            @if(isset($content['phong-su-anh']))
                @if(count($content['phong-su-anh']) > 0)
                <img class="img-responsive" src="{{ asset($content['phong-su-anh'][0]['images']) }}" alt="{{$content['phong-su-anh'][0]['name']}}">
                <a href="{{url($content['phong-su-anh'][0]['slug'].'-'.$content['phong-su-anh'][0]['id'])}}.html">
                    {{$content['phong-su-anh'][0]['name']}}
                </a>
                @endif
                <?php 
                    $posts = $content['phong-su-anh'];
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

    @if(isset($ads))
        @if(isset($ads[6]))
            @foreach($ads[6] as $ad)
                <div class="adv ad6">
                    @if($ad->type == 1)
                    <img alt="" src="{{asset($ad->images)}}" onclick="window.open('{{ url('/adv/'.$ad->id) }}', '_blank')" />
                    @elseif($ad->type == 2)
                    {!! $ad->iframe !!}
                    @elseif($ad->type == 3)
                    <embed src="{{ asset($ad->images) }}" class="ad6"></embed>
                    @endif
                </div>
            @endforeach
        @else
        
        @endif
    @endif

    @if(isset($boxs))
        @if(isset($boxs[2]))
            @include('front_end._partial.info-box', ['boxs' => $boxs[2]])
        @endif
    @endif

</div>
