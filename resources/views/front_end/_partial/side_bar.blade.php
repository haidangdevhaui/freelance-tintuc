@if(isset($rightContent))
<div class="new sidebar-top" style="margin-bottom: 20px">
    
    @foreach($rightContent as $p)
        <div class="media right-slider">
            <a class="media-left" href="{{url($p->slug.'-'.$p->id)}}.html">
                <img class="media-object" src="{{ asset($p->images) }}" style="width: 142px;height: 86px;" alt="{{$p->name}}">
            </a>
            <div class="media-body">
                <a href="{{url($p->slug.'-'.$p->id)}}.html">{{$p->name}}</a>
            </div>
        </div>
    @endforeach
    
</div>
@endif
<div class="new-more-view sidebar-top">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#new" class="text-center">
                Mới Nhất
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#view" class="text-center">
                Đọc Nhiều
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="new">
            @foreach($side_bar['newest'] as $key)
            <div class="media">
                <a class="media-left" href="{{url($key->slug.'-'.$key->id).'.html'}}">
                    <img alt="{{$key->name}}" class="media-object" src="{{asset($key->images)}}">
                </a>
                <div class="media-body">
                  <a href="{{url($key->slug.'-'.$key->id).'.html'}}">
					  {{Illuminate\Support\Str::words($key->name, 10, '...')}}
                </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tab-pane fade" id="view">
            @foreach($side_bar['views'] as $key)
            <div class="media">
                <a class="media-left" href="{{url($key->slug.'-'.$key->id).'.html'}}">
                    <img class="media-object" src="{{asset($key->images)}}" alt="{{$key->name}}">
        
                </a>
                <div class="media-body">
                    <a href="{{url($key->slug.'-'.$key->id).'.html'}}">
						{{Illuminate\Support\Str::words($key->name, 10, '...')}}
                     </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .media-body a{
        color: #464646;
        text-decoration: none;
        font-family: SourceSansPro-Regular;
        font-size: 14px;
    }
    .media{
        height: 73px;
    }
</style>
