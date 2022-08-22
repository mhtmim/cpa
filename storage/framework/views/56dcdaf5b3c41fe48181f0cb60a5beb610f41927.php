
<?php $__env->startSection('css'); ?>
<style>
    .fixed-img-height {
        height: 130px !important;
        display: block;
        margin: 0 auto;
        object-fit: none;
        object-position: center;
    }

    .btns {
        position: absolute;
        top: 0;
        right: 0;
        padding: 3px 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #ffffff
    }

    .btn-edit,
    .btn-close {
        color: #ffffff;
        padding: 0px 5px;
    }

</style>
<script type="text/javascript" src="/public/js/jquery-1.11.2.min.js"></script>
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
    <div class="col-lg-4 col-md-5 col-sm-12">
        <form class="card px-0" method="post" action="<?php echo e(route('game_jpz_category_add')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-header bg-blue-lt px-3 py-1">
                <span class="card-title">Add a Category <h5>Jigsaw Puzzle</h5></span>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Category name:</label>
                    <input type="text" class="form-control" name="jpz_category_name" placeholder="Basic Puzzle" value="<?php echo e(old('jpz_category_name')); ?>">
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Columns:</label>
                            <input type="text" class="form-control" name="jpz_category_col" placeholder="4" value="<?php echo e(old('jpz_category_col')); ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Rows:</label>
                            <input type="text" class="form-control" name="jpz_category_row" placeholder="3" value="<?php echo e(old('jpz_category_row')); ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Time limit per puzzle:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="jpz_category_time" placeholder="30" value="<?php echo e(old('jpz_category_time')); ?>">
                        <span class="input-group-text">secconds</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label">Cost:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="jpz_category_cost" placeholder="100" value="<?php echo e(old('jpz_category_cost')); ?>">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label">Reward:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="jpz_category_reward" placeholder="500" value="<?php echo e(old('jpz_category_reward')); ?>">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add this category</button>
            </div>
        </form>
        <div class="card card-body">
            <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#cat-update" data-backdrop="static" data-keyboard="false">Update Settings</a>
        </div>
    </div>
    <div class="col-lg-8 col-md-7 col-sm-12">
        <div class="alert alert-info">Click on a category to administer questions.</div>
        <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card fixed-img-height d-flex justify-content-center">
                    <a href="<?php echo e(route('game_jpz', ['id' => $c->id])); ?>" class="d-block text-center">
                        <span class="h1"><?php echo e($c->col); ?> X <?php echo e($c->row); ?></span><br>
                        <span class="h4"><?php echo e($c->title); ?></span>
                    </a>
                    <div class="btns">
                        <a href="#" class="btn-close" data-id="<?php echo e($c->id); ?>" data-toggle="modal" data-target="#cat-del" data-backdrop="static" data-keyboard="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                        <a href="#" class="btn-edit" data-id="<?php echo e($c->id); ?>" data-title="<?php echo e($c->title); ?>" data-cost="<?php echo e($c->cost); ?>" data-reward="<?php echo e($c->reward); ?>" data-time="<?php echo e($c->time); ?>" data-row="<?php echo e($c->row); ?>" data-col="<?php echo e($c->col); ?>" data-toggle="modal" data-target="#cat-edit" data-backdrop="static" data-keyboard="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" /></svg>
                        </a>
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
    </div>
</div>
<form method="post" action="<?php echo e(route('game_jpz_category_del')); ?>" class="modal modal-blur fade" id="cat-del" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id" id="cat-id">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>You are about to remove this category and all of its puzzles from your database.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, delete it</button>
            </div>
        </div>
    </div>
</form>
<form method="post" action="<?php echo e(route('game_jpz_category_edit')); ?>" class="modal modal-blur fade" id="cat-edit" tabindex="-1" role="dialog" aria-hidden="true" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id" id="cat-edit-id">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Category name:</label>
                    <input type="text" class="form-control" name="update_category_name" id="cat-name">
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Columns:</label>
                            <input type="text" class="form-control" name="update_category_col" id="cat-col">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Rows:</label>
                            <input type="text" class="form-control" name="update_category_row" id="cat-row">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Time limit per puzzle:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="update_category_time" id="cat-time">
                        <span class="input-group-text">secconds</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label">Cost:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="update_category_cost" id="cat-cost">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label">Reward:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="update_category_reward" id="cat-reward">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update category</button>
            </div>
        </div>
    </div>
</form>

<form method="post" action="<?php echo e(route('game_jpz_settings_update')); ?>" class="modal modal-blur fade" id="cat-update" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Solving time offset:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="time" value="<?php echo e(env('JPZ_TIME_OFFSET')); ?>">
                        <span class="input-group-text">seconds</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Maximum round per day:</label>
                    <input type="text" class="form-control" name="round" value="<?php echo e(env('JPZ_MAX_ROUND')); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Help cost:</label>
                    <input type="text" class="form-control" name="piece" value="<?php echo e(env('JPZ_PIECE_COST')); ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update settings</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    $(document).on("click", ".btn-close", function (ev) {
        ev.preventDefault();
        $("#cat-id").val($(this).data('id'));
    });
    $(document).on("click", ".btn-edit", function (ev) {
        ev.preventDefault();
        $("#cat-edit-id").val($(this).data('id'));
        $("#cat-name").val($(this).data('title'));
        $("#cat-cost").val($(this).data('cost'));
        $("#cat-reward").val($(this).data('reward'));
        $("#cat-time").val($(this).data('time'));
        $("#cat-row").val($(this).data('row'));
        $("#cat-col").val($(this).data('col'));
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/game_jpz_category.blade.php ENDPATH**/ ?>