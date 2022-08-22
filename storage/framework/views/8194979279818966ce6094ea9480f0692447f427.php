
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
<?php endif; ?>
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-auto">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                Overview
            </div>
            <h2 class="page-title">
                Dashboard
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <a href="<?php echo e(route('clear_dash')); ?>" class="btn btn-white d-none d-sm-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M12 17l-2 2l2 2m-2 -2h9a2 2 0 0 0 1.75 -2.75l-.55 -1" />
                    <path d="M12 17l-2 2l2 2m-2 -2h9a2 2 0 0 0 1.75 -2.75l-.55 -1" transform="rotate(120 12 13)" />
                    <path d="M12 17l-2 2l2 2m-2 -2h9a2 2 0 0 0 1.75 -2.75l-.55 -1" transform="rotate(240 12 13)" /></svg>
                Clear Dashboard Cache
            </a>
            <span class="d-none ml-3 d-sm-inline">
                <a href="<?php echo e(route('push_msg')); ?>" class="btn btn-primary">Send Message</a>
            </span>
        </div>
    </div>
</div>
<div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-primary">New Users</div>
                    <div class="ml-auto lh-1 text-muted">Last 30 days</div>
                </div>
                <div class="h1 mb-3"><?php echo e($data['users']['total']); ?></div>
                <div id="chart-active-users" class="chart-sm"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-warning">Leads</div>
                    <div class="ml-auto lh-1 text-muted">Last 30 days</div>
                </div>
                <div class="h1 mb-3"><?php echo e($data['leads']['total']); ?></div>
                <div id="chart-leads-bg" class="chart-sm"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-success">Earnings (<?php echo e(env('USD_EQ')); ?>)</div>
                    <div class="ml-auto lh-1 text-muted">Last 30 days</div>
                </div>
                <div class="h1 mb-3"><?php if(env('USD_EQ') == 'USD'): ?>$<?php endif; ?><?php echo e($data['earns']['total']); ?></div>
                <div id="chart-revenue-bg" class="chart-sm"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader text-danger">Withdrawn (<?php echo e(env('USD_EQ')); ?>)</div>
                    <div class="ml-auto lh-1 text-muted">Last 30 days</div>
                </div>
                <div class="h1 mb-3"><?php if(env('USD_EQ') == 'USD'): ?>$<?php endif; ?><?php echo e($data['withs']['total']); ?></div>
                <div id="chart-withdrawn-bg" class="chart-sm"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Latest leads</h4>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Network</th>
                        <th>Amount</th>
                        <th>Date / Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['lhist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('userinfo', ['userid' => $l->userid])); ?>"><?php echo e($l->userid); ?></a></td>
                        <td><?php echo e($l->network); ?></td>
                        <td>$<?php echo e($l->points / env('CASHTOPTS')); ?></td>
                        <td><?php echo e($l->created_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Top countries</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <div class="embed-responsive-item">
                        <div id="map-world" class="w-100 h-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="/public/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/public/js/apexcharts.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.vmap.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.vmap.world.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '60%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Members",
                data: <?php echo json_encode($data['users']['count']) ?>
            }],
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: <?php echo json_encode($data['users']['date']) ?>,
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-leads-bg'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            fill: {
                opacity: 1,
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "stepline",
            },
            series: [{
                name: "Completed",
                data: <?php echo json_encode($data['leads']['count']) ?>
            }],
            grid: {
                strokeDashArray: 4,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: <?php echo json_encode($data['leads']['date']) ?>,
            colors: ["#ff922b"],
            legend: {
                show: false,
            },
        })).render();
    });
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "<?php echo e(env('USD_EQ')); ?>",
                data: <?php echo json_encode($data['earns']['count']) ?>
            }],
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: <?php echo json_encode($data['earns']['date']) ?>,
            colors: ["#5eba00"],
            legend: {
                show: false,
            },
        })).render();
    });

    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-withdrawn-bg'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "<?php echo e(env('USD_EQ')); ?>",
                data: <?php echo json_encode($data['withs']['count']) ?>
            }],
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: <?php echo json_encode($data['withs']['date']) ?>,
            colors: ["#ff0000"],
            legend: {
                show: false,
            },
        })).render();
    });
    document.addEventListener("DOMContentLoaded", function () {
        $('#map-world').vectorMap({
            map: 'world_en',
            backgroundColor: 'transparent',
            color: 'rgba(120, 130, 140, .1)',
            borderColor: 'transparent',
            scaleColors: ["#d2e1f3", "#206bc4"],
            normalizeFunction: 'polynomial',
            values: (chart_data = {
                <?php echo $data['online']; ?>

            }),
            onLabelShow: function (event, label, code) {
                if (chart_data[code] > 0) {
                    label.append(': <strong>' + chart_data[code] + '</strong>');
                }
            },
            onRegionClick: function (element, code) {
                window.open("<?php echo e(route('members')); ?>?cc=" + code, "_self")
            }
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\1-websites\wp.mintservice.ltd\resources\views/admin/index.blade.php ENDPATH**/ ?>