<header id="header">
    <div class="header_top">
        <div class="inner_header_top">
            <div class="logo m_w20 m_left">
                <a href="{{route('m_getIndex')}}" style="margin-left: 7px;">
                    <img alt="songmoi.vn" src="{{asset('assets/mobile/img/logo.png')}}" class="icon-header" />
                </a>
            </div>
            <div class="page_active m_w52 m_left">
                <a href="{{isset($category) ? route('m_getPageCategory', $category->slug) : route('m_getIndex')}}"
                >
                    <h3
                    @if(isset($category))
                    style="color: #{{$category->color}}" 
                    @endif>
                        {{ isset($category) ? $category->name : 'Trang chủ' }}
                    </h3>
                </a>
            </div>
            <div class="search m_w12 m_left m_text_right">
                <button class="click_show_form" type="button">
                    <img alt="" src="{{asset('assets/mobile/img/search.png')}}" class="icon-header" />
                </button>
                <form action="{{url('mobile/tim-kiem')}}" class="form_search" method="POST">
                    <input class="input_search name" name="q" type="text" required="" value="{{isset($q) ? $q : ''}}">
                    <button type="submit">
                        <img alt="" src="{{asset('assets/mobile/img/search.png')}}" class="icon-header" />
                    </button>
                </form>
            </div>
            <i aria-hidden="true" class="fa fa-hand-paper-o">
            </i>
            <div class="show_menu m_w12 m_left m_text_right">
                <a>
                    <img alt="" class="open icon-header" src="{{asset('assets/mobile/img/menu-click-show.png')}}"/>
                </a>
            </div>
        </div>
        <div class="clear_fix">
        </div>
    </div>
    <nav class="main_menu">
        <ul class="nav navbar-nav">
            <li class="active">
                <span class="menu-icon home">
                    <img alt="" src="{{asset('assets/mobile/img/menu-home.png')}}"/>
                </span>
                <a href="{{url('mobile')}}">
                    Trang chủ
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-live.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'song-chat'])}}">
                    Sống chất
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-see.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'goc-nhin'])}}">
                    Góc nhìn
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-news.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'tin-len-ke'])}}">
                    Tin liên kệ
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-orginative.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'sang-tao'])}}">
                    Sáng tạo
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-techonogy.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'cong-nghe'])}}">
                    Công nghệ
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-entertainment.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'giai-tri'])}}">
                    Giải trí
                </a>
            </li>
            <li>
                <span class="menu-icon">
                    <img alt="" src="{{asset('assets/mobile/img/menu-reporting.png')}}"/>
                </span>
                <a href="{{route('m_getPageCategory', ['slug' => 'phong-su-anh'])}}">
                    Phóng sự ảnh
                </a>
            </li>
        </ul>
    </nav>
</header>