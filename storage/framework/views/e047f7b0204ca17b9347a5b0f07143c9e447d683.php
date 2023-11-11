

<?php $__env->startSection('title'); ?>
Request Submission
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Request Submission
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-links'); ?>
<style>
    .img-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
        color: #333;
    }

    p {
        color: #666;
    }

    .logo {
        width: 100px;
        height: 100px;
        margin: 20px auto;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Request Submission
        </h2>
    </div>
</div>
<?php if(session()->has('success')): ?>
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        <?php echo e(session('success')); ?>

    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        <?php echo e(session('warning')); ?>

    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-orange-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
<?php endif; ?>
<div class="intro-y w-full max-w-xxl mx-auto">
    <div class="border-b border-gray-200 dark:border-dark-5 text-center sm:text-left">
        <div class="flex flex-col lg:flex-row px-5 sm:px-20 pt-10 pb-10 sm:pb-20">
            <div class="">
                <div class="text-theme-1 dark:text-theme-10 font-semibold text-3xl">Request Form</div>
                <div class="mt-1">Date: <?php echo e(Carbon\Carbon::Now()->format('M d, Y')); ?></div>
            </div>
            <div class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                <div class="text-lg font-medium text-theme-1 dark:text-theme-10 mt-3"><?php echo e(auth()->user()->name); ?></div>
                <div class="mt-1"><?php echo e(auth()->user()->address); ?>, Bulan, Sorsogon</div>
                <div class="mt-1"><?php echo e(auth()->user()->email); ?></div>
                <div class="mt-1"><?php echo e(auth()->user()->cp); ?></div>
                <div class="mt-1"><?php echo e(auth()->user()->landmark); ?></div>
            </div>
        </div>
    </div>
    <form action="<?php echo e(route('request.store')); ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <div class="col-span-12 sm:col-span-4">
                <label>Account Number:</label>
                <input type="text" name="account_no" pattern="[0-9]{3}-{1}[0-9]{2}-[0-9]{5}" minlength="12" maxlength="12" class="input w-full border border-gray-300 mt-2 flex-1" value="<?php echo e(auth()->user()->account_no); ?>">
            </div>

        </div>
        <div class="mb-4">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('service-selection', [])->html();
} elseif ($_instance->childHasBeenRendered('X3DNV0W')) {
    $componentId = $_instance->getRenderedChildComponentId('X3DNV0W');
    $componentTag = $_instance->getRenderedChildComponentTagName('X3DNV0W');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('X3DNV0W');
} else {
    $response = \Livewire\Livewire::mount('service-selection', []);
    $html = $response->html();
    $_instance->logRenderedChild('X3DNV0W', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <div class="col-span-12 sm:col-span-4">
                <label>Concerns:</label>
                <textarea name="concern" cols="5" rows="5" class="input w-full border border-gray-300 mt-2 flex-1"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button>
            </div>
        </div>


    </form>
</div>
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

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/customer/submit-request.blade.php ENDPATH**/ ?>