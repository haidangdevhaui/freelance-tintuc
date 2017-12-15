@if(isset($setting_share_view_mobile))
<footer id="footer">
    <a href=""><img src="{{ url('Uploads/Setting/'.$setting_share_view_mobile->images) }}" class="img-responsive"></a>
    <div class="footer_contact_mobile">
        {!! $setting_share_view_mobile->content !!}
    </div>
    <div class="contact">
        <div class="inner_contact">
            <img src="{{ url('assets/mobile/img/home-footer1.png') }}" alt="">
            <h3>Liên hệ quảng cáo</h3>
            <p><i class="fa fa-phone" aria-hidden="true"></i><span>{!! $setting_share_view_mobile->phone !!}</span></p>
            <p><i class="fa fa-envelope-o" aria-hidden="true"></i><span>{!! $setting_share_view_mobile->email !!}</span></p>
        </div>
    </div>
    <ul class="menu_footer">
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
</footer>
</div>
@endif