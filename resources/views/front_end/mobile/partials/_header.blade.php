<div class="wrapper_site">
    <header id="header">
        <div class="header_top">
            <div class="inner_header_top">
                <div class="logo m_w20 m_left">
                    <a href="{{ url('mb') }}"><img src="{{ url('assets/mobile/img/logo.png') }}" alt=""></a>
                </div>
                <div class="page_active m_w52 m_left"><a href="javascript:void(0)"><h3>
                    @if(isset($cateFirts))
                        {!! $cateFirts->name !!}
                    @else 
                        {!! "Trang chủ" !!}
                    @endif
                </h3></a></div>
                <div class="search m_w12 m_left m_text_right">
                    <button class="click_show_form submit_search_mobile type="button"><img src="{{ url('assets/mobile/img/search.png') }}" alt=""></button>
                    <form action="{{ URL::route('getSearchFormMb') }}" method="get" class="form_search">
                        <input type="text" class="input_search" name="search_form_mb">
                        <button type="submit" class="submit_search_mobile"><img src="{{ url('assets/mobile/img/search.png') }}" alt=""></button>
                    </form>
                </div>
                <i class="fa fa-times" aria-hidden="true"></i>
                <div class="show_menu m_w12 m_left m_text_right">
                    <a href=""><img class="open" src="{{ url('assets/mobile/img/menu-click-show.png') }}" alt=""></a>
                </div>
            </div>
            <div class="clear_fix"></div>
        </div>
        <nav class="main_menu">
            <ul class="nav navbar-nav">
                <li class="active">
                    <span class="menu-icon home"><img src="{{ url('assets/mobile/img/icon1.png') }}" alt=""></span>
                    <a href="{{ url('mb')}}">Trang chủ</a>
                </li>
                <?php $list_cat_mobile = 2; ?>
                @if(isset($header_cats))
                    @foreach($header_cats as $header_cats_val)
                        @if($header_cats_val->parent_id == 0)
                        <li>
                            <span class="menu-icon"><img src="{{ url('assets/mobile/img/icon'.$list_cat_mobile.'.png' ) }}" alt=""></span>
                            <a href="{{ URL::route('getIndexPageMb', $header_cats_val->slug) }}">{!! $header_cats_val->name !!}</a>
                        </li>
                        @endif
                        <?php $list_cat_mobile++; ?>
                    @endforeach
                @endif
            </ul>
        </nav>
        <!-- MENU LEVEL 2 -->
        <nav class="sub_menu">
            <ul>
                @if(isset($cate_children))
                    @foreach($cate_children as $cate_children_val)
                      <li><a class="@if(isset($cate_find) && ($cate_find->id == $cate_children_val->id)) {{ 'active_brown' }} @endif" href="{{ URL::route('getIndexCateMb', $cate_children_val->slug) }}">{!! $cate_children_val->name !!}</a></li>
                    @endforeach
                @endif
            </ul>
            <div class="clear_fix"></div>
        </nav>
    </header>
