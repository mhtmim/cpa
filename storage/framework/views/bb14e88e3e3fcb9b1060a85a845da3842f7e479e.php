
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
<div class="row">
    <form action="<?php echo e(route('gateway_add')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
        <div class="card">
            <div class="card-header bg-gray-lt pt-2 pb-0">
                <h4 class="text-dark">Add gift item</h4>
            </div>
            <div class="card-body pt-2 row">
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <label class="form-label">Gift value</label>
                    <input type="text" class="form-control" name="amount" placeholder="$10" value="<?php echo e(old('amount')); ?>">
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <label class="form-label">In exchange of <?php echo e(env('CURRENCY_NAME')); ?>s:</label>
                    <input type="text" class="form-control" name="points" placeholder="1000" value="<?php echo e(old('points')); ?>">
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <label class="form-label">Item quantity</label>
                    <input type="text" class="form-control" name="quantity" placeholder="50" value="<?php echo e(old('quantity')); ?>">
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 px-5">
                    <label class="form-label">.</label>
                    <button type="submit" class="btn btn-block btn-dark">Add this item</button>
                </div>
            </div>
        </div>
    </form>
    <div class="col-12">
        <div class="card p-0">
            <div class="card-header text-primary font-weight-bold"><?php echo e($data['name']); ?> items:</div>
            <div class="card-body border-bottom p-0">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>Gift value</th>
                                <th><?php echo e(env('CURRENCY_NAME')); ?>s required</th>
                                <th>Available quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($d->amount); ?></td>
                                <td><?php echo e($d->points); ?></td>
                                <td><?php echo e($d->quantity); ?></td>
                                <td><a class="btn btn-sm btn-secondary" href="<?php echo e(route('gateway_del', ['id' => $d->id])); ?>">Delete</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center pb-0">
            <ul class="pagination">
                <?php echo e($data['items']->appends(request()->except('p'))->links()); ?>

            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/gateway.blade.php ENDPATH**/ ?>