
<?php $__env->startSection('css'); ?>
<link href="/public/css/tabler-flags.min.css" rel="stylesheet" />
<style>
    .hover {
        padding: 10px 0px;
        background: #ffffff;
    }

    .hover:hover {
        background: #dddddd;
        transition: all 1s ease;
        -webkit-transition: all 1s ease;
        cursor: pointer;
    }

    .space-between {
        justify-content: space-between;
    }

    .small-btn {
        font-size: 13px;
        padding: 4px 10px !important
    }

    .icon-padding {
        padding: 50px 0px
    }

    .text-avatar {
        font-size: 13px !important
    }
    .line-height-none{
        line-height:11px !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php if($data['users']->isEmpty()): ?>
            <div class="container-xl d-flex flex-column justify-content-center icon-padding">
                <div class="empty">
                    <div class="empty-icon">
                        <img src="/public/img/user_search_icon.png" height="128" class="mb-4" alt="">
                    </div>
                    <p class="empty-title h3">No results found</p>
                    <p class="empty-subtitle text-muted">
                        Try adjusting your search to find what you're looking for.
                    </p>
                </div>
            </div>
            <?php else: ?>
            <div class="card-header space-between">
                <h3 class="card-title"><?php echo e($data['title']); ?></h3>
                <?php echo $data['btn']; ?>

            </div>
            <div class="card-body">
                <div class="row mb-n6">
                    <?php echo $data['htmlcode']; ?>

                </div>
            </div>
            <?php endif; ?>
            <div class="card-footer d-flex align-items-center">
                <ul class="pagination m-0 ml-auto">
                    <?php echo e($data['users']->appends(request()->except('page'))->links()); ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/members.blade.php ENDPATH**/ ?>