<div class="menu">
    <div class="logo">
        <a href="{{url('/')}}">
            <img class="img-responsive" alt="LOGO" src="{{ asset('/assets/images/logo.png') }}"/>
        </a>
    </div>
    <div class="link-menu">
        <ul class="navbar-nav">
            <li {{ isset($menuActive) && $menuActive == '' ? 'class=active' : ''}}>
                <a href="{{url('/')}}" id="3241aa" class="home">
                    Trang chủ
                </a>
            </li>
            @if(isset($menu))
                @foreach($menu as $category)
                <li {{ isset($menuActive) && $menuActive == 'desktop-category-' . $category['id'] ? 'class=active' : ''}}>
                    <a href="{{route('desktop.category', ['slug' => $category['slug']])}}" style="font-size: 13px" class="{{$category['slug']}}" id="3241aa">
                        {{ Illuminate\Support\Str::words($category['name'], 2, '...') }}
                        @if(count($category['sub']))
                            <span class="caret">
                            </span>
                        @endif
                    </a>
                    @if(count($category['sub']))
                    <ul class="child-menu">
                        <span class="arrow-top">
                        </span>
                        @foreach($category['sub'] as $child)
                        <li>
                            <span class="arrow-right">
                            </span>
                            <a href="{{route('desktop.category', ['slug' => $child['slug']])}}">
                                {{$child['name']}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            @endif
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