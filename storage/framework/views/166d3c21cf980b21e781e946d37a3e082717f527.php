

<?php $__env->startSection('title'); ?>
Request Log
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Request History Log
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('profile.updatePassword')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <h2 class="intro-y text-lg font-medium mr-5 text-center">Change Account Password</h2>
            <div class="hidden md:block mx-auto text-gray-600"></div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-8 xxl:col-span-8">
        <div class="intro-y box lg:mt-5">
            
            <?php if(session()->has('error')): ?>
            <div id="alert-border-3" class="flex items-center p-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ml-3 text-sm font-medium">
                    <?php echo e(session('error')); ?>

                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-orange-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
            <?php endif; ?>
            <div class="p-5">
                <div>
                    <label>Old Password</label>
                    <input type="password" name="old_password" class="input w-full border mt-2" placeholder="Input Old Password" required>
                </div>
                <div class="mt-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="input w-full border mt-2" placeholder="Input New Password" required>
                </div>
                <div class="mt-3">
                    <label>Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="input w-full border mt-2" placeholder="Re-Type Password" required>
                </div>
                <button type="submit" class="button bg-theme-1 text-white mt-4">Change Password</button>
            </div>
        </div>
    </div>
    </div>
    
</form>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/customer/changepass.blade.php ENDPATH**/ ?>