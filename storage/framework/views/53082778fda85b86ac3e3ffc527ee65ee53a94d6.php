
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
    <form class="card" action="<?php echo e(route('settings_update')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="card-header d-flex pt-3 pb-1">
            <div class="h3 font-weight-bold">System Settings</div>
            <div class="ml-auto pb-2"><a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#cat-cache" data-backdrop="static" data-keyboard="false">Clear system cache</a></div>
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Backend name:</label>
                        <input type="text" class="form-control" name="backend_name" value="<?php echo e(env('APP_NAME')); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Backend URL:</label>
                        <input type="text" class="form-control" name="backend_url" value="<?php echo e(env('APP_URL')); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">App-Backend encryption key:</label>
                        <input type="text" class="form-control" name="enc_key" value="<?php echo e(env('ENC_KEY')); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">App Debug :<span class="small text-danger mx-2">[keep it disabled]</span></label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item text-no-wrap">
                                <input type="radio" name="debug" value="1" class="form-selectgroup-input" <?php echo e(env('APP_DEBUG') == 'true' ? 'checked' : ''); ?>>
                                <span class="form-selectgroup-label">Enabled</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="debug" value="0" class="form-selectgroup-input" <?php echo e(env('APP_DEBUG') == 'true' ? '' : 'checked'); ?>>
                                <span class="form-selectgroup-label">Disabled</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Firebase push messaging server key:</label>
                        <input type="text" class="form-control" name="fcm_key" value="<?php echo e(env('FCM_SERVER_KEY')); ?>">
                    </div>
                </div>
            </div>
            <div class="hr-text my-4 text-cyan">App interactions</div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">In-app Currency name:</label>
                        <input type="text" class="form-control" name="currency_name" value="<?php echo e(env('CURRENCY_NAME')); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">USD equivalent:</label>
                        <input type="text" class="form-control" name="usd-eq" value="<?php echo e(env('USD_EQ')); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">How much is 1 <?php echo e(env('USD_EQ')); ?> ? </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cash_to_points" value="<?php echo e(env('CASHTOPTS')); ?>">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Profit share from offers:</label>
                        <div class="input-group">
                            <span class="input-group-text">you pay the user</span>
                            <input type="text" class="form-control" name="pay_percent" value="<?php echo e(env('PAY_PCT')); ?>">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Who referred the user:</label>
                        <div class="input-group">
                            <span class="input-group-text">will receieve</span>
                            <input type="text" class="form-control" name="pay_referral" value="<?php echo e(env('REF_LINK_REWARD')); ?>">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Who entered referral code:</label>
                        <div class="input-group">
                            <span class="input-group-text">will receieve</span>
                            <input type="text" class="form-control" name="pay_referred" value="<?php echo e(env('REF_USER_REWARD')); ?>">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Earning notification:</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item text-no-wrap">
                                <input type="radio" name="earning_notification" value="1" class="form-selectgroup-input" <?php echo e(env('EARNING_NOTIFICATION') == '1' ? 'checked' : ''); ?>>
                                <span class="form-selectgroup-label">Enabled</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="earning_notification" value="0" class="form-selectgroup-input" <?php echo e(env('EARNING_NOTIFICATION') == '1' ? '' : 'checked'); ?>>
                                <span class="form-selectgroup-label">Disabled</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Balance syncing interval:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="balance_interval" value="<?php echo e(env('balance_interval')); ?>">
                            <span class="input-group-text">seconds</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr-text my-4 text-primary">Daily Leaderboard ranking system</div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Leaderboard ranking reward:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="leaderboard_reward" value="<?php echo e(env('LEADERBOARD_REWARD')); ?>">
                            <span class="input-group-text"><?php echo e(strtolower(env('CURRENCY_NAME'))); ?>s per day</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">How many users will be ranked?</label>
                        <div class="input-group">
                            <input id='lbl' type="text" class="form-control" value="<?php echo e(env('LEADERBOARD_LIMIT')); ?>" readonly="">
                            <span class="input-group-text">users per day</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-dark">Update system settings</button>
        </div>
    </form>
</div>
<form method="post" action="<?php echo e(route('clear_system')); ?>" class="modal modal-blur fade" id="cat-cache" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>You are about to reset system cache. Live users might get affected for this action such as ongoing Quiz Tournament. Make sure there is not any ongoing live game.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, clean it</button>
            </div>
        </div>
    </div>
</form>
<form method="post" action="<?php echo e(route('clear_system')); ?>" class="modal modal-blur fade" id="lbl-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">Daily leaderboard ranking</div>
            <div id='modal-err'></div>
            <div id="lbl-content" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button id="modal-submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<script type="text/javascript" src="/public/js/jquery-1.11.2.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    var can_submit = 0;
    var element = document.getElementById("lbl-content");
    $(document).on("click", "#lbl", function (ev) {
        ev.preventDefault();
        can_submit = 0;
        $("#lbl-modal").modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
        $("#modal-err").html('');
        $("#modal-submit").text('Submit');
        element.innerHTML =
            '<div class="mb-3">' +
            '<label class="form-label">How many users will be ranked?</label>' +
            '<div class="input-group">' +
            '<input id="modal-limit" type="text" class="form-control" name="balance_interval">' +
            '<span class="input-group-text">users</span>' +
            '</div>' +
            '</div>';
    });

    $(document).on("input", "#modal-limit", function () {
        this.value = Number(this.value.replace(/\D/g, ''));
    });
    var limit = 0;
    $(document).on("click", "#modal-submit", function (ev) {
        ev.preventDefault();
        if (can_submit == 1) {
            var dta = {};
            dta['limit'] = limit;
            for (var i = 0; i < limit; i++) {
                var key = 'rank_' + (i + 1);
                dta[key] = $("#" + key).val();
            }
            $.ajax({
                type: 'GET',
                url: '<?php echo e(route("settings_update_lb")); ?>',
                data: dta,
                success: function (data) {
                    if (data.status == 1) {
                        $("#modal-err").html('');
                        element.innerHTML = '<div class="text-center">Update successfull.</div>';
                        can_submit = 2;
                        $("#modal-submit").text('Close dialog');
                        $("#lbl").val(limit);
                    } else {
                        $("#modal-err").html('<div class="alert alert-danger mx-3">' + data.message + '</div>');
                    }
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        } else if (can_submit == 0) {
            limit = $("#modal-limit").val();
            if (limit == 0) return;
            var htmls = '<input type="hidden" name="limit" value="' + limit + '">';
            for (var i = 0; i < limit; i++) {
                htmls += addInput(i + 1);
            }
            element.innerHTML = htmls;
            can_submit = 1;
        } else if (can_submit == 2) {
            $("#lbl-modal").modal('hide');
        }
    });

    function addInput(id) {
        return '<div class="mb-3">' +
            '<label class="form-label">Percentage for rank ' + id + '</label>' +
            '<div class="input-group">' +
            '<input id="rank_' + id + '" type="text" class="form-control" name="balance_interval">' +
            '<span class="input-group-text">percent</span>' +
            '</div>' +
            '</div>';
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/settings.blade.php ENDPATH**/ ?>