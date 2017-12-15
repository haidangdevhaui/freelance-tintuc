<div class="w-menu-bottom">
    <div class="menu-bottom">
        <ul class="navbar-nav">
            <li>
                <a href="<?php echo e(url('/')); ?>">
                    Trang chủ
                </a>
            </li>
            <?php if(isset($menu)): ?>
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('desktop.category', ['slug' => $m['slug']])); ?>">
                            <?php echo e($m['name']); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="w-footer">
    <div class="footer">
        <div class="info-web">
            <img class="img-responsive" src="<?php echo e(asset('/assets/images/logo.jpg')); ?>">
                <p>
                    Tòa soạn: 34/19/9  Kim Đồng, Hoàng Mai, Hà Nội
                </p>
                <p>
                    SĐT: 08. 3820 8200 Fax: 08. 3820 8201
                </p>
                <p>
                    Văn phòng phía Nam : Số 21 Huỳnh Tịnh Của, Phường 8, Quận 3, Tp. Hồ Chí Minh
                </p>
                <p>
                    Giấy phép số: 307/GP-BTTTT
                </p>
                <p>
                    Tổng biên tập: Trần Mạnh Chung
                </p>
                <p>
                    E-mail: toasoan@songmoi.vn
                </p>
                <p>
                    <i>
                        *Sống Mới giữ bản quyền nội dung website này.
                    </i>
                </p>
                <div class="contact">
                    <div class="text-contact">
                        <h3>
                            Liên hệ quảng cáo
                        </h3>
                        <i aria-hidden="true" class="fa fa-phone">
                        </i>
                        <span>
                            08.38455927
                        </span>
                        <br/>
                        <i aria-hidden="true" class="fa fa-envelope-o">
                        </i>
                        <span>
                            toasoan@songmoi.vn
                        </span>
                    </div>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            Thông tin tòa soạn
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Liên hệ quảng cáo
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Tuyển dụng
                        </a>
                    </li>
                </ul>
            </img>
        </div>
        <div class="news-highlight">
            <div class="title">
                <h3>
                    Tin tức nổi bật
                </h3>
                <span>
                </span>
            </div>
            <div class="item-new-highlight">
                <?php if(isset($postHot)): ?>
                    <?php $__currentLoopData = $postHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="media">
                            <a class="media-left" href="<?php echo e(url($post['slug'])); ?>.html">
                                <img class="media-object" src="<?php echo e(asset($post['image'])); ?>" alt="<?php echo e($post['title']); ?>">
                            </a>
                            <div class="media-body">
                                <a href="<?php echo e(url($post['slug'])); ?>.html">
                                    <?php echo e(Illuminate\Support\Str::words($post['title'], 15, '...')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

