<!doctype html>
<html lang="en">

<head>
    <title>Installation</title>
    <link href="/public/css/jqvmap/jqvmap.min.css" rel="stylesheet" />
    <link href="/public/css/tabler.min.css" rel="stylesheet" />
    <link href="/public/css/tablerd.min.css" rel="stylesheet" />
</head>

<body class="antialiased">
    <div class="page">
        <div class="content">
            <div class="container-xl col-11 col-md-10 col-lg-8">
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
                <form id="form" class="card m-0" method="post" action="<?php echo e(route('install')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-header bg-primary text-white font-weight-bold">Backend Installation</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Backend name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Mintly" value="<?php echo e(old('name')); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <?php echo $data['url']; ?>

                            </div>
                        </div>
                        <div class="hr-text text-blue font-weight-bold mt-4 mb-3">Database configuration</div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Database host:</label>
                                <input type="text" class="form-control" name="db_host" value="<?php echo e(old('db_host','localhost')); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Database port:</label>
                                <input type="text" class="form-control" name="db_port" value="<?php echo e(old('db_port','3306')); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Database name:</label>
                                <input type="text" class="form-control" name="db_name" placeholder="my_database" value="<?php echo e(old('db_name')); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Database user:</label>
                                <input type="text" class="form-control" name="db_user" placeholder="mysql_user" value="<?php echo e(old('db_user')); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Database password:</label>
                                <input type="text" class="form-control" name="db_pass" placeholder="dbpassword" value="<?php echo e(old('db_pass')); ?>">
                            </div>
                        </div>
                        <div class="hr-text text-blue font-weight-bold mt-4 mb-3">Permissions</div>
                        <div class="row">
                            <?php echo $data['config']; ?>

                            <?php echo $data['upload']; ?>

                            <?php echo $data['storage']; ?>

                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <?php echo $data['btn']; ?>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/public/js/jquery-1.11.2.min.js"></script>
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#form').submit(function () {
            $(this).find(':submit').text('Please wait...')
            $(this).find(':submit').attr('disabled', 'disabled');
        });

    </script>
</body>

</html>
<?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/install.blade.php ENDPATH**/ ?>