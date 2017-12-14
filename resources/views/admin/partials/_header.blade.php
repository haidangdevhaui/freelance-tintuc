<div class="mainwrapper">
    <div class="header">
        <div class="logo">
            <a href="{{ url('admin') }}"><h4>{{config('role_admin')[$admin->role]}} sống mới</h4> </a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="odd">
                    <a class="dropdown-toggle" target="_blank" href="{{ url('/') }}">
                        <span class="head-icon head-bar"></span>
                        <span class="headmenu-label">Xem Website</span>
                    </a>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        @if(Auth::check())
                            @if(!empty(Auth::user()->images))
                               <img style="background-image: url({{ url(Auth::user()->images) }})" src="{{ url('assets/images/admin_avatar.png') }}" alt="..." class="img_admin_avatar profile_img">
                            @else
                               <img src="{{ url('assets/images/avatar.jpg') }}" alt="..." class=" profile_img">
                            @endif
                        @endif
                        <div class="userinfo">
                            <h5>
                                @if(Auth::check())
                                   {!! Auth::user()->name !!}
                                   <small>{!! "- " . Auth::user()->email !!}</small>
                                @endif
                            </h5>
                            <ul>
                                <li><a href="{{ Route::has('getEditProfile') ? URL::route("getEditProfile") : null }}">Hồ sơ </a></li>
                                @if($admin->role == 1)
                                <li><a href="{{ Route::has('getSettingGeneral') ? URL::Route('getSettingGeneral') : null }}">Câu hình hệ thống</a></li>
                                @endif
                                <li><a href="{{ Route::has('logout') ? URL::route('logout') : null }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <!--headmenu-->
        </div>
    </div>
