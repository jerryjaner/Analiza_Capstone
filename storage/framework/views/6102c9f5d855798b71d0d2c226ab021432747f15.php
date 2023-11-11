

<?php $__env->startSection('title'); ?>
Assets List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
Assets List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <button type="button" class="button bg-theme-1 flex items-center w-20 border text-white dark:border-dark-5 dark:text-white" onclick="window.history.go(-1); return false;"><i data-feather="arrow-left"></i> Back</button>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Assigned Materials and Installation Fee - <b>Request No. : </b><u> <?php echo e($req_info->req_no); ?></u></h2>
        <div class="intro-x text-center xl:text-left">
            <a href="javascript:;" data-toggle="modal" data-target="#add" class="rounded-full p-2 w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex"><i data-feather="plus"></i><i data-feather="tool"></i></a>
            <!-- Modal show -->
            <div class="modal" id="add">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Add Materials
                        </h2>
                    </div>

                    <form action="<?php echo e(route('workorder.assetList.store',$req_id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-12">
                                <label for="asset_id">Material:</label>
                                <select  required="" name="asset_id" id="asset_id" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['asset_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="" disabled selected>--Select Material--</option>
                                    <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"
                                            data-unit="<?php echo e($data->unit ?? 'n/a'); ?>"
                                            data-unit-price="<?php echo e($data->unit_price ?? 'n/a'); ?>"
                                            data-unit-cost="<?php echo e($data->unit_cost_lbc ?? 'n/a'); ?>"><?php echo e($data->materials); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <div id="additional-info" class="mt-2 mb-3" style="display: none;">
                                    <p id="unit-info"></p>
                                    <p id="unit-price-info"></p>
                                    <p id="unit-cost-info"></p>
                                </div>
                            </div>


                            <div class="col-span-12 sm:col-span-12" id="qty_hide">
                                <label for="qty">Quantity :</label>
                                <input type="number" name="qty" min="1" max="50" class="input w-full" id="qty">
                            </div>

                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                            <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Modal end -->
        </div>
        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            
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
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
<?php endif; ?>
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Qty</th>
                    <th class="bg-theme-1 text-xs text-white">Unit</th>
                    <th class="bg-theme-1 text-xs text-white">Materials</th>
                    <th class="bg-theme-1 text-xs text-white">Unit Price</th>
                    <th class="bg-theme-1 text-xs text-white">Amount</th>
                    <th class="bg-theme-1 text-xs text-white">Labor Charges/Unit Cost</th>
                    <th class="bg-theme-1 text-xs text-white">Amount</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $assigned_asset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="intro-x">
                    <td class="w-40">
                        <p class="text-xs"><?php echo e($data->qty ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs"><?php echo e($data->asset->unit ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs"><?php echo e($data->asset->materials ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs"><?php echo e(number_format($data->unit_price, 2, '.', ',') ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs"><?php echo e(number_format($data->total_price_amount, 2, '.', ',') ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs"><?php echo e(number_format($data->unit_cost_lbc, 2, '.', ',') ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs"><?php echo e(number_format($data->total_cost_lbc, 2, '.', ',') ?? 'n/a'); ?></p>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;" data-toggle="modal" data-target="#delete<?php echo e($data->id); ?>"
                            class="delete-dialog rounded-md p-1 w-35 text-white bg-red-500 hover:bg-red-400 xl:mr-3 flex"><i data-feather="delete"></i></a>
                        </div>
                    </td>
                </tr>

                <div class="modal" id="delete<?php echo e($data->id); ?>">
                    <div class="modal__content">
                        <form action="<?php echo e(route('workorder.assetList.delete',$data->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                                <input type="hidden" id="data_id" name="id"/>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button> </div>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center text-red-500">No Data Found!</td>
                </tr>
               <?php endif; ?>
               <tr>
                    <td colspan="6">
                        <p class="text-xl font-extrabold text-right">Total Amount : </p>
                    </td>
                    <td colspan="2">
                        <p class="text-xl font-extrabold "><?php echo e(number_format($totalCostLbc + $totalPriceAmount, 2, '.', ',')); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-3">

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
<script src="<?php echo e(asset('js/html2canvas.js')); ?>"></script>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>

<script>
    $(document).ready(function () {
        $('#qty_hide').hide();
        $('#additional-info').hide();
        var qtyInput = document.getElementById("qty");

        $('#asset_id').on('change', function () {
            var selectedOption  = $(this).find(':selected');
            var selectedUnit = selectedOption.data('unit');
            var unitPrice = selectedOption.data('unit-price');
            var unitCost = selectedOption.data('unit-cost');

            if (selectedUnit === 'n/a') {
                $('#qty_hide').hide();
                $('#additional-info').show();
                $('#unit-info').hide();
                $('#unit-price-info').text('Unit Price: ' + unitPrice);
                $('#unit-cost-info').text('Unit Cost: ' + unitCost);
                qtyInput.removeAttribute("required");
            } else {
                $('#qty_hide').show();
                $('#additional-info').show();
                $('#unit-info').show();
                $('#unit-info').text('Unit: ' + selectedUnit);
                $('#unit-price-info').text('Unit Price: ' + unitPrice);
                $('#unit-cost-info').text('Unit Cost: ' + unitCost);
                qtyInput.setAttribute("required", "required");
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/pages/staff/assigned-asset.blade.php ENDPATH**/ ?>