@if(count($list_care) != 0)
<div class="care">
    <h3>
        Có thể bạn quan tâm
    </h3>
    @foreach($list_care as $care)
    <div class="media">
        <a class="media-left" href="{{url($care->slug.'-'.$care->id).'.html'}}">
            <img class="media-object" src="{{asset($care->images)}}" alt="{{$care->name}}">
        </a>
        <div class="media-body">
             <a class="media-left" href="{{url($care->slug.'-'.$care->id).'.html'}}">
                {{$care->name}}
            </a>
        </div>
    </div>
    @endforeach
</div>
@endif