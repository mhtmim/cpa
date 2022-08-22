
<?php $__env->startSection('css'); ?>
<script type="text/javascript" src="/public/js/jquery-1.11.2.min.js"></script>
<style>
    .btn-del {
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px 10px;
        color: #ff0000;
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
<div class="row">
    <div class="col-lg-5 col-md-6">
        <div class="card">
            <div class="card-header font-weight-bold bg-dark-lt">Lotto Game settings</div>
            <form class="card-body" role="form" method="post" action="<?php echo e(route('game_lotto_update')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">Round cost:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cost" value="<?php echo e(env('GAME_LOTTO_COST')); ?>">
                            <span class="input-group-text"><?php echo e($data['coins']); ?></span>
                        </div>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">Daily chances:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="daily" value="<?php echo e(env('GAME_LOTTO_DAILY')); ?>">
                            <span class="input-group-text">times</span>
                        </div>
                    </div>
                </div>
                <div class="hr-text my-4 text-primary font-weight-bold">Reward for</div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">1 set:</span>
                    <input type="text" class="form-control" name="m_1" value="<?php echo e(env('GAME_LOTTO_MATCH_1')); ?>">
                    <span class="input-group-text"><?php echo e($data['coins']); ?></span>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">2 sets:</span>
                    <input type="text" class="form-control" name="m_2" value="<?php echo e(env('GAME_LOTTO_MATCH_2')); ?>">
                    <span class="input-group-text"><?php echo e($data['coins']); ?></span>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">3 sets:</span>
                    <input type="text" class="form-control" name="m_3" value="<?php echo e(env('GAME_LOTTO_MATCH_3')); ?>">
                    <span class="input-group-text"><?php echo e($data['coins']); ?></span>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">4 sets:</span>
                    <input type="text" class="form-control" name="m_4" value="<?php echo e(env('GAME_LOTTO_MATCH_4')); ?>">
                    <span class="input-group-text"><?php echo e($data['coins']); ?></span>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">5 sets:</span>
                    <input type="text" class="form-control" name="m_5" value="<?php echo e(env('GAME_LOTTO_MATCH_5')); ?>">
                    <span class="input-group-text"><?php echo e($data['coins']); ?></span>
                </div>
            </form>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update settings</button>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-6">
        <form class="card" method="post" action="<?php echo e(route('game_lotto_addwinner')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-header font-weight-bold">Add a <span class="text-info mx-2">5 sets</span> winner</div>
            <div class="card-body row">
                <div class="col-9">
                    <input type="text" class="form-control" name="s" placeholder='Enter "Email Address" or "User ID"' value="<?php echo e(old('email')); ?>">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">Add this</button>
                </div>
            </div>
        </form>
        <?php $__currentLoopData = $data['future_winner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body align-items-center d-flex">
                    <div class="float-left mr-3">
                        <span class="avatar avatar-md" style="background-image: url(<?php echo e($w->avatar); ?>)"></span>
                    </div>
                    <div class="lh-sm">
                        <div class="strong text-truncate"><?php echo e($w->name); ?></div>
                        <div class="text-muted text-truncate">
                            <h5 class="my-0 line-height-small"><?php echo e($w->email); ?></h5>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('game_lotto_delwinner', ['d' => $w->id])); ?>" class="btn-del">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/game_lotto.blade.php ENDPATH**/ ?>