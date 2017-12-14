<div class="col-md-12">
    <?php if(Session::has('flash_message')): ?>
        <div class="alert alert-<?php echo Session::get('flash_level'); ?>">
            <?php echo Session::get('flash_message'); ?>

        </div>
    <?php endif; ?>
</div>