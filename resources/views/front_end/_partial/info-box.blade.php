@foreach($boxs as $box)
    <div class="info-box">
        <div class="box-title" style="background: url('{{ asset($box->banner_img) }}')"></div>
        <div class="box-content">
            @if($box->style == 1)
                @foreach($box->posts as $post)
                <div class="media">
                    <a class="media-left" href="{{url($post->slug.'-'.$post->id).'.html'}}">
                        <img class="media-object" src="{{asset($post->images)}}" alt="{{$post->name}}" width="110" height="70">
                    </a>
                    <div class="media-body">
                         <a class="media-left" href="{{url($post->slug.'-'.$post->id).'.html'}}">
                            {{$post->name}}
                        </a>
                    </div>
                </div>
                @endforeach
            @elseif($box->style == 2)
                @if(count($box->posts) > 0)
                    <div class="media">
                        <a class="media-left" href="{{url($box->posts[0]->slug.'-'.$box->posts[0]->id).'.html'}}">
                            <img class="media-object" src="{{asset($box->posts[0]->images)}}" alt="{{$box->posts[0]->name}}" width="110" height="70">
                        </a>
                        <div class="media-body" style="border:none">
                             <a class="media-left" href="{{url($box->posts[0]->slug.'-'.$box->posts[0]->id).'.html'}}">
                                {{$box->posts[0]->name}}
                            </a>
                        </div>
                    </div>
                    <hr style="margin-top:10px; margin-bottom: 10px">
                @endif
                @if(count($box->posts) > 1)
                    <ul class="info-box-list">
                    @for($i = 1; $i < count($box->posts); $i ++)
                        <li>
                            <a href="{{ url($box->posts[$i]->slug.'-'.$box->posts[$i]->id.'.html') }}">
                                {{ $box->posts[$i]->name }}
                            </a>
                        </li>
                    @endfor
                    </ul>
                @endif
            @else
                @if(count($box->posts) > 0)
                    <div>
                        <p>
                            <a class="media-left" href="{{url($box->posts[0]->slug.'-'.$box->posts[0]->id).'.html'}}">
                                <img src="{{asset($box->posts[0]->images)}}" alt="{{$box->posts[0]->name}}" width="280" height="170">
                            </a>
                        </p>
                        <p>
                            <a class="media-left" href="{{url($box->posts[0]->slug.'-'.$box->posts[0]->id).'.html'}}">
                                <b>{{$box->posts[0]->name}}</b>
                            </a>
                        </p>
                    </div>
                    <hr style="margin-top:10px; margin-bottom: 10px">
                @endif
                @if(count($box->posts) > 1)
                    @for($i = 1; $i < count($box->posts); $i ++)
                        <div class="media">
                            <a class="media-left" href="{{url($box->posts[$i]->slug.'-'.$box->posts[$i]->id).'.html'}}">
                                <img class="media-object" src="{{asset($box->posts[$i]->images)}}" alt="{{$box->posts[$i]->name}}" width="110" height="70">
                            </a>
                            <div class="media-body" style="border:none">
                                 <a class="media-left" href="{{url($box->posts[$i]->slug.'-'.$box->posts[$i]->id).'.html'}}">
                                    {{$box->posts[$i]->name}}
                                </a>
                            </div>
                        </div>
                    @endfor
                @endif
            @endif
        </div>
    </div>
@endforeach