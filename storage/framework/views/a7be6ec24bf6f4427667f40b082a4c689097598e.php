
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
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="px-3 py-3 bg-blue-lt">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <?php if($data['userinfo']->avatar != ''): ?>
                        <span class="avatar avatar-xl avatar-thumb" style="background-image: url(<?php echo e($data['userinfo']->avatar); ?>)"></span>
                        <?php else: ?>
                        <span class="avatar avatar-xl avatar-thumb text-gray"><?php echo e(strtoupper(substr($data['userinfo']->name, 0, 2))); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <div class="h4 mb-0">
                            ID: <?php echo e($data['userinfo']->userid); ?>

                            <?php if($data['banned']): ?>
                            <span class="badge bg-red ml-1">banned!</span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-2 small">Member since: <?php echo e(strtok($data['userinfo']->created_at, " ")); ?></div>
                        <span class="badge bg-blue">Balance<span class="badge-addon "><?php echo e($data['userinfo']->balance.' '.env('CURRENCY_NAME').'s'); ?></span>
                            <a href="#" class="px-1 ml-2 text-white" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-balance-p">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                            <a href="#" class="ml-1 text-white" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-balance-n">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </span>
                        <span class="badge bg-gray">Pending<span class="badge-addon "><?php echo e($data['userinfo']->pending.' '.env('CURRENCY_NAME').'s'); ?></span></span>
                    </div>
                </div>
            </div>
            <form class="card-body" method="post" action="<?php echo e(route('userinfo_update')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="userid" value="<?php echo e($data['userinfo']->userid); ?>">
                <div class="mb-2">
                    <span class="form-label mb-1">Name of user:</span>
                    <input type="text" class="form-control" name="name" value="<?php echo e($data['userinfo']->name); ?>">
                </div>
                <div class="mb-2">
                    <span class="form-label mb-1">Email address:</span>
                    <input type="text" class="form-control" name="email" value="<?php echo e($data['userinfo']->email); ?>">
                </div>
                <div class="mb-3">
                    <span class="form-label mb-1">Avatar URL:</span>
                    <input type="text" class="form-control" name="avatar" value="<?php echo e($data['userinfo']->avatar); ?>">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">Referred by:</span>
                    <input type="text" class="form-control" name="refby" value="<?php echo e($data['userinfo']->refby); ?>">
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text">Device ID:</span>
                    <input type="text" class="form-control" value="<?php echo e($data['userinfo']->device_id); ?>" readonly="">
                </div>
                <div class="mt-3 mb-3">
                    <span class="form-label mb-1">New password:</span>
                    <input type="text" class="form-control" name="pass" value="">
                </div>
                <input type="submit" class="btn btn-block btn-primary" name="submit" value="Update user data">
            </form>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <form method="post" action="<?php echo e(route('push_msg_post')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="uid" value="<?php echo e($data['userinfo']->userid); ?>">
                            <input type="submit" class="btn btn-block btn-outline-info" name="submit" value="Send push message">
                        </form>
                    </div>
                    <div class="col-6">
                        <?php if($data['banned']): ?>
                        <a href="<?php echo e(route('unban',['uid' => $data['userinfo']->userid])); ?>" type="submit" class="btn btn-block btn-outline-success">Unban this user</a>
                        <?php else: ?>
                        <a href="#" class="btn btn-block btn-outline-danger" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-ban">Ban this user</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-8">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-3 text-nowrap">Withdrawals</h3>
                <div class="ml-auto">
                    <span class="text-nowrap"><kbd>Country: <?php echo e($data['country']); ?></kbd></span>
                </div>
            </div>
            <div class=" table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Mtehod</th>
                            <th><?php echo e(env('CURRENCY_NAME')); ?>s</th>
                            <th>Status</th>
                            <th style="width:180px">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['wdraw']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($w->g_name); ?></td>
                            <td><?php echo e($w->points); ?></td>
                            <td>
                                <?php if($w->is_completed == 1): ?>
                                <span class="text-green">completed</span>
                                <?php else: ?>
                                <a href="<?php echo e(route('withdraw')); ?>" class="text-red">pending
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md text-azure" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5"></path>
                                        <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5"></path>
                                    </svg>
                                </a>
                                <?php endif; ?>
                            </td>
                            <td class="text-nowrap"><?php echo e($w->created_at); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span><?php echo e($data['wdraw']->firstItem()); ?></span> to <span><?php echo e($data['wdraw']->lastItem()); ?></span> of <span><?php echo e($data['wdraw']->total()); ?></span> entries</p>
                <ul class="pagination m-0 ml-auto">
                    <?php echo e($data['wdraw']->appends(request()->except('w'))->links()); ?>

                </ul>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-3 text-nowrap">Activities history</h3>
                <div class="ml-auto">
                    <span class="text-nowrap"><kbd>Signed-up IP: <?php echo e($data['userinfo']->ip); ?></kbd></span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>From</th>
                            <th>IP</th>
                            <th><?php echo e(env('CURRENCY_NAME')); ?>s</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['hist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($h->offerid); ?></td>
                            <td><?php echo e($h->network); ?></td>
                            <td>
                                <?php if($h->is_lead == 1): ?>
                                Ad Network
                                <?php elseif($h->is_lead == 2): ?>
                                Game
                                <?php else: ?>
                                Internal
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($h->ip); ?></td>
                            <td><?php echo e($h->points); ?></td>
                            <td><?php echo e($h->created_at); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span><?php echo e($data['hist']->firstItem()); ?></span> to <span><?php echo e($data['hist']->lastItem()); ?></span> of <span><?php echo e($data['hist']->total()); ?></span> entries</p>
                <ul class="pagination m-0 ml-auto">
                    <?php echo e($data['hist']->appends(request()->except('h'))->links()); ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<form method="post" action="<?php echo e(route('ban')); ?>" class="modal modal-blur fade" id="modal-ban" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="userid" value="<?php echo e($data['userinfo']->userid); ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ban this user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" /></svg>
                </button>
            </div>
            <div class="modal-body">
                <label class="form-label">What is the reason for banning?</label>
                <textarea class="form-control" name="reason" placeholder="Write down a reason for your action."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Ban now</button>
            </div>
        </div>
    </div>
</form>
<form method="post" action="<?php echo e(route('penalty')); ?>" class="modal modal-blur fade" id="modal-balance-n" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="userid" value="<?php echo e($data['userinfo']->userid); ?>">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">How much <?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s you want to deduct?</div>
                <div><input type="text" class="form-control" name="points" value="100"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Give panalty</button>
            </div>
        </div>
    </div>
</form>
<form method="post" action="<?php echo e(route('reward')); ?>" class="modal modal-blur fade" id="modal-balance-p" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="userid" value="<?php echo e($data['userinfo']->userid); ?>">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">How much <?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s you want to reward?</div>
                <div><input type="text" class="form-control" name="points" value="100"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Give reward</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/member_info.blade.php ENDPATH**/ ?>