<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Dashboard
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="file" class="text-theme-10"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo e($count_request); ?></div>
                    <div class="text-base text-gray-600 mt-1">Today's Request Received</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-11"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo e($count_technician); ?></div>
                    <div class="text-base text-gray-600 mt-1">No. of Technician</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-9"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo e($count_staff); ?></div>
                    <div class="text-base text-gray-600 mt-1">No. of Staff</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-7"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo e($count_customer); ?></div>
                    <div class="text-base text-gray-600 mt-1">No. of Customer</div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-span-12 mt-8">
    <div class="grid grid-cols-12 gap-12  mt-5">
        <div class="col-span-4 xl:col-span-4 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Request Status Chart
                     </h2>
                    <canvas  class="text-3xl font-bold leading-8 mt-6" id="PieChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-span-6 xl:col-span-8 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Monthly Request
                     </h2>
                     <canvas id="monthlyRequestsChart" width="1000"></canvas>
                </div>
            </div>
        </div>
    </div>


</div>



<div style="width: 80%;">
    <canvas id="monthlyChart"></canvas>
</div>
    
<div class="col-span-12 lg:col-span-6">


</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function generateRandomColor() {
        // Generate a random hex color
        return '#' + Math.floor(Math.random()*16777215).toString(16);
    }

    var ctx = document.getElementById('PieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pending', 'In Process', 'Completed', 'Cancelled' ],
            datasets: [{
                data: [<?php echo json_encode($data['pending'], 15, 512) ?>, <?php echo json_encode($data['inprocess'], 15, 512) ?>, <?php echo json_encode($data['completed'], 15, 512) ?>, <?php echo json_encode($data['cancelled'], 15, 512) ?> ],
                backgroundColor: [
                    generateRandomColor(),
                    generateRandomColor(),
                    generateRandomColor(),
                    generateRandomColor(),
                ],
            }],
        },
    });
</script>

<script>
    var ctx = document.getElementById('monthlyRequestsChart').getContext('2d');
    var data = {
        labels: <?php echo $monthlyRequests->pluck('month'); ?>,
        datasets: [{
            label: 'Total Requests',
            data: <?php echo $monthlyRequests->pluck('total'); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/admin/index.blade.php ENDPATH**/ ?>