
<?php $__env->startSection('css'); ?>
<style>
    .fixed-img-height {
        height: 200px !important;
        display: block;
        margin: 0 auto;
        object-fit: none;
        object-position: center;
    }

    .fixed-img-bottom {
        background-color: rgba(0, 0, 0, 0.7);
        padding-top: 5px;
        position: absolute;
        bottom: 0;
        color: #ffffff;
    }

    .btns {
        position: absolute;
        top: 0;
        right: 0;
        padding: 3px 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #ffffff
    }

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
<div class="row mt-4">
    <div class="col-lg-4 col-md-6">
        <form class="card" method="post" action="<?php echo e(route('game_html_game')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="type" name="type" value="<?php echo e(old('type', '1')); ?>" />
            <div class="card-header bg-blue-lt font-weight-bold">Create new game</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Game Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="My Awesome Game" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="mb-3 card-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#t-1" id="g_file" class="nav-link <?php if(old('type', '1') == '1'): ?> active <?php endif; ?>" data-toggle="tab">Game File</a></li>
                        <li class="nav-item"><a href="#t-2" id="g_url" class="nav-link <?php if(old('type', '1') == '2'): ?> active <?php endif; ?>" data-toggle="tab">Game URL</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="t-1" class="card card-body tab-pane <?php if(old('type', '1') == '1'): ?> show active <?php endif; ?>">
                            <label class="form-label">Choose game file:</label>
                            <div class="input-group">
                                <select name="game_file" id="select-pack" class="form-select">
                                    <option hidden disabled selected value=""> -- Select -- </option>
                                    <?php $__currentLoopData = $data['files']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->getFileName()); ?>"><?php echo e($d->getFileName()); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="upload">Upload a new game...</option>
                                </select>
                                <span class="input-group-text">
                                    <a href="#" id="delfile">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div id="t-2" class="card card-body tab-pane <?php if(old('type', '1') == '2'): ?> show active <?php endif; ?>">
                            <label class="form-label">Game Name:</label>
                            <input type="text" class="form-control" name="game_url" placeholder="https://" value="<?php echo e(old('game_url')); ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose image file:</label>
                    <div class="input-group">
                        <select name="image_file" id="select-image" class="form-select">
                            <option hidden disabled selected value=""> -- Select -- </option>
                            <?php $__currentLoopData = $data['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d->getFileName()); ?>"><?php echo e($d->getFileName()); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value="upload">Upload a new image...</option>
                        </select>
                        <span class="input-group-text">
                            <a href="#" id="delimg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Screen orientation:</label>
                    <select name="orientation" id="select-image" class="form-select">
                        <option value="0">Portrait</option>
                        <option value="1">Landscape</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add this game</button>
            </div>
        </form>
        <form class="card" method="post" action="<?php echo e(route('game_html_cache')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Game cache refresh time:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="time" value="<?php echo e(env('HTML_GAME_REFRESH')); ?>">
                        <span class="input-group-text">munites</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
    <div class="col-lg-8 col-md-6">
        <div class="row">
            <?php $__currentLoopData = $data['games']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="d-block bg-gray-lt">
                        <img src="<?php echo e($g->image); ?>" class="fixed-img-height w-100">
                    </div>
                    <div class="btns">
                        <a href="<?php echo e(route('game_html_game_del', ['id' => $g->id])); ?>" class="btn-close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                    </div>
                    <div class="fixed-img-bottom w-100 pl-2 pr-2">
                        <span><?php echo e($g->name); ?></span>
                        <div class="small mb-1">Orientation: <?php if($g->orientation == 0): ?> portrait <?php else: ?> landscape <?php endif; ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<form method="post" action="" class="modal modal-blur fade" id="uploadModal" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title uploadModal-file">Upload file:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="card-body pt-3">
                <input type="hidden" name="id" id="qs_id">
                <div class="mb-4 form-file">
                    <input type="file" name="file" class="form-file-input add-file-input" id="addFile">
                    <label class="form-file-label" for="addFile">
                        <span class="form-file-text add-file-choose">Choose an image...</span>
                        <span class="form-file-button">Browse</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>
<form method="post" action="" class="modal modal-blur fade" id="delModal" tabindex="-1" role="dialog" aria-hidden="true">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="del" id="toDel">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>You are about to remove this file from your webhost.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes, delete it</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    $('.add-file-input').on('change', function () {
        var fileName = $(this).val().split('\\').pop();
        $(this).closest('.form-file').find('.add-file-choose').addClass("selected").text(fileName);
    });
    $('#select-pack').change(function () {
        var v3 = $(this).val();
        if (v3 == 'upload') {
            var id1 = $('#uploadModal');
            id1.attr('action', '<?php echo e(route("game_html_file_add")); ?>');
            id1.modal({
                backdrop: 'static',
                keyboard: false
            })
            $(".uploadModal-file").text('Upload your game (.pack) file:');
        };
    });
    $('#select-image').change(function () {
        var v4 = $(this).val();
        if (v4 == 'upload') {
            var id2 = $('#uploadModal');
            id2.attr('action', '<?php echo e(route("game_html_image_add")); ?>');
            id2.modal({
                backdrop: 'static',
                keyboard: false
            });
            $(".uploadModal-file").text('Upload your image file:');
        };
    });
    $('#delfile').click(function () {
        var v1 = $("#select-pack").find(":selected").val();
        if (v1 != '' && v1 != 'upload') {
            var id3 = $('#delModal');
            id3.attr('action', '<?php echo e(route("game_html_file_del")); ?>');
            id3.modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#toDel').val(v1);
        };
    });
    $('#delimg').click(function () {
        var v2 = $("#select-image").find(":selected").val();
        if (v2 != '' && v2 != 'upload') {
            var id3 = $('#delModal');
            id3.attr('action', '<?php echo e(route("game_html_image_del")); ?>');
            id3.modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#toDel').val(v2);
        };
    });
    $('#g_file').click(function () {
        $("#type").val("1");
    });

    $('#g_url').click(function () {
        $("#type").val("2");
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/game_html.blade.php ENDPATH**/ ?>