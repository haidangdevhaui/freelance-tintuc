<div class="mainwrapper">
    <div class="header">
        <div class="logo">
            <a href="<?php echo e(url('admin')); ?>"><h4><?php echo e(config('role_admin')[$admin->role]); ?> sống mới</h4> </a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="odd">
                    <a class="dropdown-toggle" target="_blank" href="<?php echo e(url('/')); ?>">
                        <span class="head-icon head-bar"></span>
                        <span class="headmenu-label">Xem Website</span>
                    </a>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        <?php if(Auth::check()): ?>
                            <?php if(!empty(Auth::user()->images)): ?>
                               <img style="background-image: url(<?php echo e(url(Auth::user()->images)); ?>)" src="<?php echo e(url('assets/images/admin_avatar.png')); ?>" alt="..." class="img_admin_avatar profile_img">
                            <?php else: ?>
                               <img src="<?php echo e(url('assets/images/avatar.jpg')); ?>" alt="..." class=" profile_img">
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="userinfo">
                            <h5>
                                <?php if(Auth::check()): ?>
                                   <?php echo Auth::user()->name; ?>

                                   <small><?php echo "- " . Auth::user()->email; ?></small>
                                <?php endif; ?>
                            </h5>
                            <ul>
                                <li><a href="<?php echo e(Route::has('getEditProfile') ? URL::route("getEditProfile") : null); ?>">Hồ sơ </a></li>
                                <?php if($admin->role == 1): ?>
                                <li><a href="<?php echo e(Route::has('getSettingGeneral') ? URL::Route('getSettingGeneral') : null); ?>">Câu hình hệ thống</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(Route::has('logout') ? URL::route('logout') : null); ?>">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <!--headmenu-->
        </div>
    </div>
