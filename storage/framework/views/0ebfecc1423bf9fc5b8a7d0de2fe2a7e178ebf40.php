<?php if($data->count()): ?>
<ul class="pagination">
    <?php if(PaginateRoute::hasPreviousPage()): ?>
    <li class="disabled">
        <a href="<?php echo e(PaginateRoute::previousPageUrl()); ?>">«</a>
    </li>
    <?php else: ?>
    <li class="disabled">
        <span>
            «
        </span>
    </li>
    <?php endif; ?>
    <?php for($i = 1; $i <= $data->lastPage(); $i++): ?>
        <?php if($i > $data->currentPage() - 4): ?>
            <li class="<?php echo e(($data->currentPage() == $i) ? ' active' : ''); ?>">
                <a href="<?php echo e(PaginateRoute::pageUrl($i)); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endif; ?>
        <?php if($i > $data->currentPage() + 3): ?>
        <li class="disabled">
            <span>
                ...
            </span>
        </li>
        <?php break; ?>
        <?php endif; ?>
    <?php endfor; ?>
    <li>
        <a href="<?php echo e(PaginateRoute::pageUrl($data->lastPage())); ?>">
            Trang Cuối
        </a>
    </li>
    <?php if(PaginateRoute::hasNextPage($data)): ?>
        <li>
            <a href="<?php echo e(PaginateRoute::nextPageUrl($data)); ?>" rel="next">
                »
            </a>
        </li>
    <?php else: ?>
        <li class="disabled">
            <span>
                »
            </span>
        </li>
    <?php endif; ?>
    
</ul>
<?php endif; ?>