
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center mt-4">
    <div class="col-md-10 row">
        <div class="col-md-12">
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
        </div>
        <div class="col-md-6">
            <form method="post" class="card px-0 mb-4" action="<?php echo e(route('admins_update')); ?>">
                <?php echo csrf_field(); ?>
                <div class="card-header bg-dark-lt text-dark">
                    <span class="card-title">Admin Profile Settings</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Full name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $data->name)); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo e(old('email', $data->email)); ?>">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">New password:</label>
                            <input type="password" class="form-control" name="password_1" value="<?php echo e(old('password_1')); ?>">
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Confirm new password:</label>
                            <input type="password" class="form-control" name="password_2" value="<?php echo e(old('password_2')); ?>">
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Current password:</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Update Settings</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="post" class="card px-0" action="<?php echo e(route('admins_change')); ?>">
                <?php echo csrf_field(); ?>
                <div class="card-header bg-secondary text-white">
                    <span class="card-title">Transfer Admin rights:</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Email address of new Admin:</label>
                        <input type="text" class="form-control" name="a_email" value="<?php echo e(old('a_email')); ?>">
                    </div>
                    <div>
                        <label class="form-label">Current password:</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Change Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/admins.blade.php ENDPATH**/ ?>