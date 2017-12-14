</div>
<div class="w-menu-bottom">
    <div class="menu-bottom contai_site_songmoi">
        <ul class="navbar-nav">
            <li><a href="#">Trang chủ</a></li>
            @if(isset($header_cats))
                @foreach($header_cats as $header_cats_val)
                    @if($header_cats_val->parent_id == 0)
                        <li>
                            <a href="{{ URL::route('getIndexLivingSubtance', $header_cats_val->slug) }}">{!! $header_cats_val->name !!}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>
<div class="w-footer">
    <div class="footer contai_site_songmoi">
        <div class="info-web">
        <a href="{{ url('/') }}">
            @if(isset($setting_share_view_desktop))
               @if(!empty($setting_share_view_desktop->images))
                   <img src="{!! url('Uploads/Setting/'.$setting_share_view_desktop->images) !!}" class="img-responsive">
               @else
                   <img src="{!! url('assets/images/no-image.jpg') !!}" class="img-responsive">
               @endif
            </a>
            <div class="content_contact_footer">
                {!! $setting_share_view_desktop->content !!}
            </div>

            <div class="contact">
                <div class="text-contact">
                    <h3>Liên hệ quảng cáo</h3>
                    <i class="fa fa-phone" aria-hidden="true"></i><span>{!! $setting_share_view_desktop->phone !!}</span><br/>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i><span>{!! $setting_share_view_desktop->email !!}</span>
                </div>

            </div>
            <ul>
                <li>
                    <a href="#">Thông tin tòa soạn</a>
                </li>
                <li>
                    <a href="#">Liên hệ quảng cáo</a>
                </li>
                <li>
                    <a href="#">Tuyển dụng</a>
                </li>
            </ul>
            @endif
        </div>
        <div class="news-highlight">
            <div class="title">
                <h3>Tin tức nổi bật</h3>
                <span></span>
            </div>
            <div class="item-new-highlight">
                @if(isset($post_hightlights))
                    @foreach($post_hightlights as $post_hightlights_val)
                        <div class="media">
                            <a class="media-left" href="{{ URL::route('getNewsDetail', $post_hightlights_val->slug) }}">
                                @if(!empty($post_hightlights_val->images))
                                   <img class="media-object" src="{!! url('/'.$post_hightlights_val->images) !!}"/>
                                @else
                                   <img class="media-object" src="{!! url('assets/images/no-image.jpg') !!}"/>
                                @endif
                            </a>
                            <div class="media-body">
                                <a href="{{ URL::route('getNewsDetail', $post_hightlights_val->slug) }}">{!! $post_hightlights_val->name !!}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@if(isset($cat_name))
<style>
    .top {
        background-color: {!! $cat_name->color !!} !important;
    }
</style>
@endif
@if(Request::path() == '/')
<style>
    .contai_site_songmoi .link-menu .is_home a{
        border-bottom: 4px solid rgb(50, 65, 170);
        color: rgb(50, 65, 170);
    }
</style>
@else
<style>
    .contai_site_songmoi .link-menu .is_home a{
        border-bottom: none !important;
        color: black !important;
    }
</style>
@endif
