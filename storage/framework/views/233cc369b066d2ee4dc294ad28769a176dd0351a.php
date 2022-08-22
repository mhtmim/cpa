
<?php $__env->startSection('css'); ?>
<style>
    .fixed-height {
        height: 150px !important;
    }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(\Session::has('success')): ?>
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo \Session::get('success'); ?>

</div>
<?php elseif(\Session::has('error')): ?>
<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo \Session::get('error'); ?>

</div>
<?php elseif($errors->any()): ?>
<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>
<div class="d-flex">
    <span class="page-title text-nowrap">Scratch Cards</span>
    <div class="ml-auto">
        <a href="<?php echo e(route('game_scratcher')); ?>" class="btn btn-primary mx-2 my-1 btn-sm">Add a card</a>
        <a href="<?php echo e(route('game_scratcher_clean')); ?>" class="btn btn-danger my-1 btn-sm">Clean up expired cards</a>
    </div>
</div>
<div class="hr my-2"></div>
<div class="row">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card card-sm">
            <a href="<?php echo e(route('game_scratcher', ['id' => $d->id])); ?>" class="d-block text-center"><img src="<?php echo e($d->card); ?>" class="card-img-top fixed-height"></a>
            <div class="card-body">
                <div class="font-weight-bold mb-1"><?php echo e($d->name); ?></div>
                <div class="small"><?php echo e(env('CURRENCY_NAME')); ?>s range: <span class="font-italic"><?php echo e($d->min.' - '.$d->max); ?></span></div>
                <div class="small font-italic">Card expires after <?php echo e($d->days); ?> days</div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="col-lg-12 d-flex justify-content-center mt-3">
    <ul class="pagination">
        <?php echo e($data->appends(request()->except('page'))->links()); ?>

    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/game_scratch_cat.blade.php ENDPATH**/ ?>