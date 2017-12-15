<div class="sidebar">
    <div class="new sidebar-top">
        @if(isset($rightContent))
            @foreach($rightContent as $p)
                <div class="media right-slider">
                    <a class="media-left" href="{{url($p['slug'])}}.html">
                        <img class="media-object" src="{{ asset($p['image']) }}" style="width: 142px;height: 86px;" alt="{{$p['title']}}">
                    </a>
                    <div class="media-body">
                        <a href="{{url($p['slug'])}}.html">
                            {{Illuminate\Support\Str::words($p['title'], 10, '...')}}
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

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
</div>
