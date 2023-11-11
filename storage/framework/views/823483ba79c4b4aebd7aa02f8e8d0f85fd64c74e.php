

<?php $__env->startSection('title'); ?>
Service List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Service
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Service Management</h2>

        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            
        </div>
        </form>
    </div>
</div>
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Location</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Count of Complaints</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $usersByBarangay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barangay => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.brgy-row', [
                            'brgy' => $barangay,
                            'count' => $count,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if($pagination <> true): ?>
        <?php echo $usersByBarangay->links(); ?>

        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script src="<?php echo e(asset('js/html2canvas.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('../../layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/admin/report/summary.blade.php ENDPATH**/ ?>