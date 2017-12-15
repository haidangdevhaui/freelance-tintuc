<div class="leftpanel">
    <div class="leftmenu">
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-header">Navigation</li>
            <li>
                <a href="<?php echo e(url('admin')); ?>">
                    <span class="iconfa-laptop"></span> Bảng điều khiển
                </a>
            </li>
            <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Quản lý quản trị</a>
                <ul>
                    <li><a href="<?php echo e(url('admin/list-admin')); ?>">Danh sách quản trị </a></li>
                    <li><a href="<?php echo e(url('admin/add-admin')); ?>">Thêm quản trị </a></li>
                </ul>
            </li>
            <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Quản lý danh mục</a>
                <ul>
                    <li><a href="">Danh sách danh mục </a></li>
                    <li><a href="">Thêm danh mục </a></li>
                </ul>
            </li>
            <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Quản lý tin tức</a>
                <ul>
                    <li><a href="<?php echo e(URL::route('getListNews')); ?>">Danh sách tin tức </a></li>
                    <li><a href="<?php echo e(URL::route('post_create')); ?>">Thêm tin tức </a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--leftmenu-->
</div>
<!-- leftpanel -->
