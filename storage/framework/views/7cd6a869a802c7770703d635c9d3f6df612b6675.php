<?php $__env->startSection('content_admin'); ?>

<?php $image_default = "../assets/images/No_image_available.svg";?>
<?php if(isset($video) && $video->image): ?>
<?php $image_default = url($video->image) ?>
<?php endif; ?>

    <?php echo $__env->make('admin.partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partials._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- page content -->
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Forms</a> <span class="separator"></span></li>
            <li>Form Styles</li>
            
            <li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                <ul class="dropdown-menu pull-right skin-color">
                    <li><a href="default">Default</a></li>
                    <li><a href="navyblue">Navy Blue</a></li>
                    <li><a href="palegreen">Pale Green</a></li>
                    <li><a href="red">Red</a></li>
                    <li><a href="green">Green</a></li>
                    <li><a href="brown">Brown</a></li>
                </ul>
            </li>
        </ul>
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="widgetbox box-inverse">
                    <h4 class="widgettitle">Form Bordered</h4>
                    <div class="widgetcontent nopadding">
                        <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <p>
                                <label for="exampleInputEmail1">Tên video: </label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1"
                               placeholder="Nhập tiêu đề video" name="title" value="<?php echo e(isset($video) ? (old('title') ? old('title') : $video->title) : ''); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                <span class="field">
                                    <input type="slug" class="form-control add_slug_cat input-xxlarge" id="exampleInputPassword1" placeholder="Nhập slug"
                               name="slug" value="<?php echo e(isset($video) ? (old('slug') ? old('slug') : $video->slug) : ''); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('slug')); ?></span>
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Url</label>
                                <span class="field">
                                    <input type="url" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập url"
                               name="source" value="<?php echo e(isset($video) ? (old('source') ? old('source') : $video->source) : ''); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('source')); ?></span>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Mô tả </label>
                                <span class="field">
                                    <textarea class="textarea_fix_width_form" name="description" id="" cols="30" rows="10"><?php echo e(isset($video) ? (old('description') ? old('description') : $video->description) : ''); ?></textarea>
                                    <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Nội dung </label>
                                <span class="field">
                                    <textarea class="textarea_fix_width_form" name="content" id=""><?php echo e(isset($video) ? (old('content') ? old('content') : $video->content) : ''); ?></textarea>
                                    <span class="text-danger"><?php echo e($errors->first('content')); ?></span>
                                    <script>
                                        jQuery(function() {
                                            ckeditor('content');
                                        });
                                    </script>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta title </label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta title"
                               name="meta_title" value="<?php echo e(isset($video) ? (old('meta_title') ? old('meta_title') : $video->meta_title) : ''); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('meta_title')); ?></span>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta keyword </label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta keyword"
                               name="meta_keyword" value="<?php echo e(isset($video) ? (old('meta_keyword') ? old('meta_keyword') : $video->meta_keyword) : ''); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('meta_keyword')); ?></span>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta description </label>
                                <span class="field">
                                    <textarea class="textarea_fix_width_form" name="meta_description" id="" cols="30" rows="10"><?php echo e(isset($video) ? (old('meta_description') ? old('meta_description') : $video->meta_description) : ''); ?></textarea>
                                    <span class="text-danger"><?php echo e($errors->first('meta_description')); ?></span>
                                </span>
                            </p>

                            <label for="exampleInputPassword1">Hình ảnh</label>
                            <span class="field">
                                <div class="center-block" id="kv-avatar-errors-1" style="width:800px;display:none">
                                </div>
                                <div action="/avatar_upload.php" class="text-center" enctype="multipart/form-data" method="post">
                                    <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                        <input class="file-loading" id="avatar-1" name="image" type="file">
                                        </input>
                                    </div>
                                </div>
                                <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                            </span>
                            
                            <p class="stdformbutton">
                                <button class="btn btn-primary"><?php echo e(isset($video) ? 'Cap nhat' : 'Thêm'); ?> </button>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
    <?php echo $__env->make('library.bootstrap_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>