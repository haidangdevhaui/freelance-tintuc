<div class="rightpanel">
    <ul class="breadcrumbs">
        <li>
            <a href="dashboard.html">
                <i class="iconfa-home">
                </i>
            </a>
            <span class="separator">
            </span>
        </li>
        <li>
            Bảng điều khiển
        </li>
        <li class="right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                <i class="icon-tint">
                </i>
                Color Skins
            </a>
            <ul class="dropdown-menu pull-right skin-color">
                <li>
                    <a href="default">
                        Default
                    </a>
                </li>
                <li>
                    <a href="navyblue">
                        Navy Blue
                    </a>
                </li>
                <li>
                    <a href="palegreen">
                        Pale Green
                    </a>
                </li>
                <li>
                    <a href="red">
                        Red
                    </a>
                </li>
                <li>
                    <a href="green">
                        Green
                    </a>
                </li>
                <li>
                    <a href="brown">
                        Brown
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="row-fluid">
                <div class="span8" id="dashboard-left">
                    <h5 class="subtitle">
                        Thống kê số lượng
                    </h5>
                    <ul class="shortcuts">
                        <li class="products">
                            <a href="">
                                <span class="shortcuts-icon iconsi-events">
                                </span>
                                <span class="shortcuts-label">
                                    Bài viết
                                </span>
                            </a>
                        </li>
                        <?php if($admin->role == 1): ?>
                        <li class="products">
                            <a href="">
                                <span class="shortcuts-icon iconsi-events">
                                </span>
                                <span class="shortcuts-label">
                                    Video
                                </span>
                            </a>
                        </li>
                        <li class="products">
                            <a href="">
                                <span class="shortcuts-icon iconsi-events">
                                </span>
                                <span class="shortcuts-label">
                                    ADMIN
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>