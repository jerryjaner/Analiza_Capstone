

<?php $__env->startSection('title'); ?>
Request Log
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Request History Log
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('pages.customer.inc-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Request History Log</h2>
        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="<?php echo e(request()->get('search')); ?>" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="bg-theme-1 text-xs text-white">Request Number</th>
                    <th class="bg-theme-1 text-xs text-white">Account Number</th>
                    <th class="bg-theme-1 text-xs text-white">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white">Status</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $request_log->where('status', 'Cancelled'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs"><?php echo e(Carbon\Carbon::parse($data->updated_at)->format('M d, Y h:i:s A')); ?></p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs"><?php echo e($data->req_no); ?></p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs"><?php echo e($data->account_no); ?></p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs"><?php echo e($data->service->name); ?></p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <?php if(isset($data->status)): ?>
                                <?php if($data->status == 'Pending'): ?>
                                <span class="text-red-700"><?php echo e($data->status ?? 'N/A'); ?></span>
                                <?php elseif($data->status == 'Inprocess'): ?>
                                <span class="text-blue-700"><?php echo e($data->status ?? 'N/A'); ?></span>
                                <?php elseif($data->status == 'Completed'): ?>
                                <span class="text-green-700"><?php echo e($data->status ?? 'N/A'); ?></span>
                                <?php else: ?>
                                <span class="text-gray-700"><?php echo e('Cancelled'); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span>N/A</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">

                            <a href="javascript:;"
                                data-id="<?php echo e($data->id); ?>"
                                data-toggle="modal"
                                data-target="#view<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>

                        </div>
                    </td>
                </tr>
                 <!-- View Service Information -->
                 <div class="modal" id="view<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">View Details</h2>
                                <p>Request No. <u><?php echo e($data->req_no ?? 'N/A'); ?></u></p>
                            </div>
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Name</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->user->name); ?>" readonly>
                                </div>
                                
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Address</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?> "readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->user->email); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer CP#</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->user->cp); ?>" readonly>
                                </div>
                                <div class="col-span-12">
                                    <label>Landmark</label>
                                    <textarea class="input w-full border mt-2 flex-1"  readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
                                </div>
                                <hr class="col-span-12 mt-2">
                                <div class="col-span-12">
                                    <label>Request Information</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->service->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12">
                                    <label>Request Description</label>
                                    <textarea class="input w-full mt-2 flex-1 border" id="" cols="30" rows="5" readonly><?php echo e($data->service->description ?? 'N/A'); ?></textarea>
                                </div>
                                <div class="col-span-12">
                                    <label>Concerns</label>
                                    <textarea class="input w-full mt-2 flex-1 border" id="" cols="30" rows="5" readonly><?php echo e($data->concern ?? 'N/A'); ?></textarea>
                                </div>
                                <div class="col-span-12">
                                    <label>Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                <?php if($data->status == 'Inprocess'): ?>
                                <button type="submit" class="button w-30 bg-theme-1 text-white">Completed</button>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center text-red-500">No Data Found!</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>
<?php if($pagination <> false): ?>
<?php echo $request_log->links(); ?>

<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.request-log-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('request-log-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );

    $(document).on("click", ".view-dialog", function () {
        var id = $(this).data('id');
        var position = $(this).data('position');
        var fname = $(this).data('fname');
        var lname = $(this).data('lname');
        var gender = $(this).data('gender');
        var address = $(this).data('address');
        var dob = $(this).data('dob');
        var cp = $(this).data('cp');
        var email = $(this).data('email');
        var image = $(this).data('image');
        $('.modal__content #id').val(id);
        $('.modal__content #position').val(position);
        $('.modal__content #fname').val(fname);
        $('.modal__content #lname').val(lname);
        $('.modal__content #gender').val(gender);
        $('.modal__content #address').val(address);
        $('.modal__content #dob').val(dob);
        $('.modal__content #email').val(email);
        $('.modal__content #cp').val(cp);
        $('#linkImage').attr('href',image);
        $('#image').attr('src',image);
    });

    $(document).on("click", ".cancel-dialog", function () {
        var id = $(this).data('id');
        $('.modal__content #data_id').val(id);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('../layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/customer/request-cancelled.blade.php ENDPATH**/ ?>