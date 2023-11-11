<?php
     $customer_not_approved = \App\Models\user::where('role','0')->where('verification', '0')->count();
?>

<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img class="w-12" src="<?php echo e(asset('img/logo.png')); ?>" style="border-radius:30px;">
        <span class="hidden xl:block text-white text-lg ml-3">SRMS</span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="<?php echo e(url('home')); ?>" class="side-menu <?php echo e((!request()->routeIs('home'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('staff.index')); ?>" class="side-menu <?php echo e((!request()->routeIs('staff.index'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                <div class="side-menu__title"> Staff </div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('technician.index')); ?>" class="side-menu <?php echo e((!request()->routeIs('technician.index'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Technician </div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('customers.index')); ?>" class="side-menu <?php echo e((!request()->routeIs('customers.index'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Customers </div>
                <?php if($customer_not_approved > 0): ?>
                    <span class="badge right" style="background-color:yellow; padding:3px 10px; border-radius:10%; margin-right:10px;    color:black;" title="Not Approved Customer"><?php echo e($customer_not_approved); ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('service.index')); ?>" class="side-menu <?php echo e((!request()->routeIs('service.index'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="tool"></i> </div>
                <div class="side-menu__title"> Services </div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('sell.index')); ?>" class="side-menu  <?php echo e((!request()->routeIs('sell.index'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Sell Report</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('sell.summary')); ?>"  class="side-menu  <?php echo e((!request()->routeIs('sell.summary'))?'bg-theme-1':'bg-blue-500'); ?>">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Summary Report</div>
            </a>
        </li>
        <li>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <a href="#" onclick="event.preventDefault();this.closest('form').submit();" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                <div class="side-menu__title"> Logout</div>
            </a>
        </form>
        </li>

    </ul>
</nav>
<?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/layouts/partials/admin/side-nav.blade.php ENDPATH**/ ?>