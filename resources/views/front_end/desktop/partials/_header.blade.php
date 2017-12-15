<div class="header">
    <div class="top">
        <div class="social contai_site_songmoi">
            <i><a href="{{ isset($social) ? $social->link_rss : null }}"><img src="{!! url('assets/images/rss.png') !!}"></a></i>
            <i><a href="{{ isset($social) ? $social->link_google : null }}"><img src="{!! url('assets/images/g+.png') !!}"></a></i>
            <a href="{{ isset($social) ? $social->link_fb : null }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            {{-- <i class="icon-search"><img src="{!! url('assets/images/search.png') !!}"></i> --}}
            <form action="{{ URL::route('getSearchForm') }}" method="get" class="navbar-form navbar-left pull-right form_search_site">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." name="search_form">
                    <span class="input-group-btn">
                        <input class="glyphicon glyphicon-search" value="" type="submit">
                      </span>
                </div>
            </form>
        </div>
    </div>
    <div class="menu contai_site_songmoi page_desktop">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{!! url('assets/images/logo.png') !!}" class="img-responsive"/></a>
        </div>
        <div class="link-menu">
            <ul class="navbar-nav">

                <li class="is_home"><a href="{{ url('/') }}" >Trang chủ</a></li>
                @if(isset($cat_name))
                <?php
                    $cat_color = $cat_name->color;
                ?>
                @endif
                @if(isset($header_cats))
                    @foreach($header_cats as $val_cat)
                        @if($val_cat->parent_id == 0)
                            <li>
                                <a @if(isset($cat_id)) @if($val_cat->id == $cat_id) style="color:<?php echo $cat_color; ?>;border-bottom:4px solid <?php echo $cat_color; ?>"; @endif @endif class="@if(isset($cat_id)) @if($val_cat->id == $cat_id) {{ 'active_menu' }} @endif @endif" id="{{ $val_cat->id }}" href="{{ URL::route('getIndexLivingSubtance', $val_cat->slug) }}">{!! $val_cat->name !!}</a>
                                <ul class="child-menu">
                                    <span class="arrow-top"></span>
                                    @foreach($header_cats as $cat_child)
                                        @if($cat_child->parent_id == $val_cat->id)
                                            <li><span id="{{ $cat_child->id }}" class="arrow-right"></span><a href="{{ URL::route('getNewLife', $cat_child->slug ) }}">{!! $cat_child->name !!}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
