
<?php $__env->startSection('css'); ?>
<script type="text/javascript" src="/public/js/jquery-1.11.2.min.js"></script>
<style>
    .text-small {
        font-size: 10px !important;
        padding: 2px !important;
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
    <?php echo $errors->first(); ?>

</div>
<?php endif; ?>
<div class="card">
    <div class="card-header pt-2 pb-0">
        <span class="h4 nav-link active font-weight-bold">SDK Offerwalls</span>
    </div>
    <div class="card-body row mt-2 pb-1">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card bg-gray-lt">
                <div class="card-header py-2">
                    <img src="<?php echo e($d['image']); ?>" class="rounded text-truncate img-thumbnail text-small avatar-md mr-2" alt="<?php echo e($d['name']); ?>">
                    <h3 class="card-title text-dark"><?php echo e($d['name']); ?></h3>
                    <div class="card-actions">
                        <a href="<?php echo e(route('networks_sdk_edit', ['id' => $d['of_id']])); ?>">
                            Edit configuration
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body py-3">
                    <dl class="row">
                        <dt class="col-5 text-truncate text-dark h4 my-0">Status:</dt>
                        <dd class="col-7 text-truncate text-muted h5">
                            <?php if($d['status'] == '1'): ?>
                            <span class="text-green">Enabled</span>
                            <?php else: ?>
                            <span class="text-danger">Disabled</span>
                            <?php endif; ?>
                        </dd>
                        <dt class="col-5 text-truncate text-dark h4 my-0">Postback URL:</dt>
                        <dd class="col-7 text-muted h5 d-flex cevent">
                            <div class="text-truncate cpy mr-1"><?php echo e($d['postback']); ?></div>
                            <span class="copy-event cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md text-dark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                                </svg>
                            </span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    $(document).on("click", ".copy-event", function () {
        var field = $(this).closest('.cevent').find('.cpy');
        var copyText = field.text();
        if (copyText == 'None') {
            field.html('<span class="text-red">Nothing to copy!</span>')
        } else {
            var temp = $("<input>");
            $("body").append(temp);
            temp.val(copyText).select();
            document.execCommand("copy");
            temp.remove();
            $(this).addClass('d-none');
            field.html('<span class="text-blue">Text copied!</span>')
        }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/networks_sdk.blade.php ENDPATH**/ ?>