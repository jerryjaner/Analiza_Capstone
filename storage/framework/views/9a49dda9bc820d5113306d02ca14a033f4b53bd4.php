

<?php $__env->startSection('title'); ?>
Assigned Work Order
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Assigned Work Order
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Assigned Work Order</h2>
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
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible">
    <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="bg-theme-1 text-xs text-white">Request Number</th>
                    <th class="bg-theme-1 text-xs text-white">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white">Customer Name</th>
                    <th class="bg-theme-1 text-xs text-white">Address</th>
                    <th class="bg-theme-1 text-xs text-white">Landmark</th>
                    <th class="bg-theme-1 text-xs text-white">Mobile</th>
                    <th class="bg-theme-1 text-xs text-white">Status</th>
                    <th class="bg-theme-1 text-xs text-white">Priority Status</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $work_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($data->priority == 'High'): ?>
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e(Carbon\Carbon::parse($data->updated_at)->format('M d, Y') ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->req_no ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->service->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            
                            <?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?>

                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->landmark ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->cp ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->status == 'Pending')? 'text-red-500' : ($data->status == 'Inprocess' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->status ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->priority == 'High')? 'text-red-500' : ($data->priority == 'Medium' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->priority ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>
                            <a href="<?php echo e(route('workorder.assetListTech',$data->id)); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="database"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal" id="cancel<?php echo e($data->id); ?>">
                    <div class="modal__content">
                        <form action="<?php echo e(route('request.request_cancel')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="p-5 text-center"> <i data-feather="slash" class="w-16 h-16 text-gray-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure you want to cancel?</div>
                                <div class="text-gray-600 mt-2">Do you really want to cancel these records? This process cannot be undone.</div>
                                <input type="hidden" value="<?php echo e($data->id); ?>" name="id"/>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">No</button> <button type="submit" class="button w-24 bg-gray-600 text-white">Yes</button> </div>
                        </form>
                    </div>
                </div>
                <!-- View Service Information -->
                <div class="modal" id="view<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.request.complete',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Assigned Work Details</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->priority ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php if($data->status == 'Completed'): ?>
                                    <label>Date Accomplished</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_accomp)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

                 <!-- Assign Technician -->
                 <div class="modal" id="edit<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.update.priority',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Update Priority Status</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <select  required="" name="priority" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                <button type="submit" class="button w-30 bg-theme-1 text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($data->priority == 'Medium'): ?>
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e(Carbon\Carbon::parse($data->updated_at)->format('M d, Y') ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->req_no ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->service->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            
                            <?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->landmark ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->cp ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->status == 'Pending')? 'text-red-500' : ($data->status == 'Inprocess' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->status ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->priority == 'High')? 'text-red-500' : ($data->priority == 'Medium' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->priority ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>
                            <a href="<?php echo e(route('workorder.assetListTech',$data->id)); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="database"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal" id="cancel<?php echo e($data->id); ?>">
                    <div class="modal__content">
                        <form action="<?php echo e(route('request.request_cancel')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="p-5 text-center"> <i data-feather="slash" class="w-16 h-16 text-gray-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure you want to cancel?</div>
                                <div class="text-gray-600 mt-2">Do you really want to cancel these records? This process cannot be undone.</div>
                                <input type="hidden" value="<?php echo e($data->id); ?>" name="id"/>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">No</button> <button type="submit" class="button w-24 bg-gray-600 text-white">Yes</button> </div>
                        </form>
                    </div>
                </div>
                <!-- View Service Information -->
                <div class="modal" id="view<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.request.complete',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Assigned Work Details</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->priority ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php if($data->status == 'Completed'): ?>
                                    <label>Date Accomplished</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_accomp)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

                 <!-- Assign Technician -->
                 <div class="modal" id="edit<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.update.priority',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Update Priority Status</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <select  required="" name="priority" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                <button type="submit" class="button w-30 bg-theme-1 text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($data->priority == 'Low'): ?>
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e(Carbon\Carbon::parse($data->updated_at)->format('M d, Y') ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->req_no ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->service->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            
                            <?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?>

                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->landmark ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->cp ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->status == 'Pending')? 'text-red-500' : ($data->status == 'Inprocess' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->status ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->priority == 'High')? 'text-red-500' : ($data->priority == 'Medium' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->priority ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>
                            <a href="<?php echo e(route('workorder.assetListTech',$data->id)); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="database"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal" id="cancel<?php echo e($data->id); ?>">
                    <div class="modal__content">
                        <form action="<?php echo e(route('request.request_cancel')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="p-5 text-center"> <i data-feather="slash" class="w-16 h-16 text-gray-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure you want to cancel?</div>
                                <div class="text-gray-600 mt-2">Do you really want to cancel these records? This process cannot be undone.</div>
                                <input type="hidden" value="<?php echo e($data->id); ?>" name="id"/>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">No</button> <button type="submit" class="button w-24 bg-gray-600 text-white">Yes</button> </div>
                        </form>
                    </div>
                </div>
                <!-- View Service Information -->
                <div class="modal" id="view<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.request.complete',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Assigned Work Details</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->priority ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php if($data->status == 'Completed'): ?>
                                    <label>Date Accomplished</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_accomp)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

                 <!-- Assign Technician -->
                 <div class="modal" id="edit<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.update.priority',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Update Priority Status</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <select  required="" name="priority" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                <button type="submit" class="button w-30 bg-theme-1 text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($data->priority == ''): ?>
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e(Carbon\Carbon::parse($data->updated_at)->format('M d, Y') ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->req_no ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->service->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->name ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            
                            <?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?> <?php echo e($data->user->house_block_lot); ?> <?php echo e($data->user->street); ?> <?php echo e($data->user->subdivision); ?> <?php echo e($data->user->barangay); ?> <?php echo e($data->user->municipality); ?> <?php echo e($data->user->province); ?>

                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->landmark ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <?php echo e($data->user->cp ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->status == 'Pending')? 'text-red-500' : ($data->status == 'Inprocess' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->status ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex <?php echo e(($data->priority == 'High')? 'text-red-500' : ($data->priority == 'Medium' ? 'text-orange-500' : 'text-green-500')); ?>">
                            <?php echo e($data->priority ?? 'N/A'); ?>

                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view<?php echo e($data->id); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>
                            <a href="<?php echo e(route('workorder.assetListTech',$data->id)); ?>"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="database"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal" id="cancel<?php echo e($data->id); ?>">
                    <div class="modal__content">
                        <form action="<?php echo e(route('request.request_cancel')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="p-5 text-center"> <i data-feather="slash" class="w-16 h-16 text-gray-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure you want to cancel?</div>
                                <div class="text-gray-600 mt-2">Do you really want to cancel these records? This process cannot be undone.</div>
                                <input type="hidden" value="<?php echo e($data->id); ?>" name="id"/>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">No</button> <button type="submit" class="button w-24 bg-gray-600 text-white">Yes</button> </div>
                        </form>
                    </div>
                </div>
                <!-- View Service Information -->
                <div class="modal" id="view<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.request.complete',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Assigned Work Details</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->priority ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php if($data->status == 'Completed'): ?>
                                    <label>Date Accomplished</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_accomp)->format('M d, Y') ?? 'N/A'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

                 <!-- Assign Technician -->
                 <div class="modal" id="edit<?php echo e($data->id); ?>">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="<?php echo e(route('workorder.update.priority',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Update Priority Status</h2>
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
                                    <textarea class="input w-full border mt-2 flex-1" value="" readonly><?php echo e($data->user->landmark ?? 'N/A'); ?></textarea>
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
                                    <label>Assign Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="<?php echo e($data->technician->name ?? 'N/A'); ?>" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-8">
                                    <label>Priority Status</label>
                                    <select  required="" name="priority" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-blue-500"><?php echo e($data->status ?? 'N/A'); ?></p>
                                    <label>Date Assigned</label>
                                    <p class="text-blue-500"><?php echo e(\Carbon\Carbon::parse($data->date_assigned)->format('M d, Y') ?? 'N/A'); ?></p>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                <button type="submit" class="button w-30 bg-theme-1 text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9" class="text-center text-red-500">No Data Found!</td>
                </tr>
               <?php endif; ?>
            </tbody>
        </table>
        <?php if($pagination <> false): ?>
        <?php echo $work_order->links(); ?>

        <?php endif; ?>
    </div>
</div>

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

    $(document).on("click", ".delete-dialog", function () {
        var id = $(this).data('id');
        $('.modal__content #data_id').val(id);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/technician/assigned-request.blade.php ENDPATH**/ ?>