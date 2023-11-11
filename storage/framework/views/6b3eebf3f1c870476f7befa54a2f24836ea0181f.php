<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible">
        <div class="h-20 grid grid-cols-4 gap-4 content-end text-center">
            <div><a type="submit" href="<?php echo e(route('request.request_log')); ?>" class="<?php echo e((!request()->routeIs('request.request_log'))?'bg-theme-1':'bg-blue-500'); ?> button w-20 xl:w-40 hover:bg-blue-700 text-white text-center rounded-full"><i class="mx-auto" data-feather="clock"></i>Pending</a></div>
            <div><a type="submit" href="<?php echo e(route('request.request_process')); ?>" class="<?php echo e((!request()->routeIs('request.request_process'))?'bg-theme-1':'bg-blue-500'); ?> button w-20 xl:w-40 hover:bg-blue-700 text-white text-center rounded-full"><i class="mx-auto" data-feather="refresh-cw"></i>Inprocess</a></div>
            <div><a type="submit" href="<?php echo e(route('request.request_completed')); ?>" class="<?php echo e((!request()->routeIs('request.request_completed'))?'bg-theme-1':'bg-blue-500'); ?> button w-20 xl:w-40 hover:bg-blue-700 text-white text-center rounded-full"><i class="mx-auto" data-feather="check-circle"></i>Completed</a></div>
            <div><a type="submit" href="<?php echo e(route('request.request_list_cancel')); ?>" class="<?php echo e((!request()->routeIs('request.request_list_cancel'))?'bg-theme-1':'bg-blue-500'); ?> button w-20 xl:w-40 hover:bg-blue-700 text-white text-center rounded-full"><i class="mx-auto" data-feather="slash"></i>Cancelled</a></div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/customer/inc-button.blade.php ENDPATH**/ ?>