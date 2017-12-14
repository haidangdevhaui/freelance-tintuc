<div class="menu">
    <div class="logo">
        <a href="{{url('/')}}">
            <img class="img-responsive" src="{{ asset('/assets/images/logo.png') }}"/>
        </a>
    </div>
    <div class="link-menu">
        <ul class="navbar-nav">
            <li class="active">
                <a href="{{url('/')}}" id="3241aa" class="home">
                    Trang chủ
                </a>
            </li>
            @foreach($menu as $m)
            <li>
                <a href="{{route('d_getPageCategory', ['slug' => $m['slug']])}}" style="font-size: 13px" id="{{$m['color']}}" class="{{$m['slug']}}">
                    {{$m['name']}}
                    @if(count($m['sub']) > 0)
                        <span class="caret">
                        </span>
                    @endif
                </a>
                @if(count($m['sub']) > 0)
                <ul class="child-menu">
                    <span class="arrow-top">
                    </span>
                    @foreach($m['sub'] as $c)
                    <li>
                        <span class="arrow-right">
                        </span>
                        <a href="{{route('d_getPageCategory', ['slug' => $c['slug']])}}">
                            {{$c['name']}}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@if(isset($active))
<script>
    $(document).ready(function(){
        var color = $('.{{$active}}').attr('id');
        $('.{{$active}}').css({
            'border-bottom': '4px solid #'+ color, 
            'color': '#'+color
        }).addClass('fixed');

        $('.top').css({
            'background': '#' + color
        }).attr('defaultColor', color);
    });
</script>
@endif