<?php if(count($errors) > 0): ?>
    <div class="col-md-12">
        <div class="alert alert-danger message_error_show">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
