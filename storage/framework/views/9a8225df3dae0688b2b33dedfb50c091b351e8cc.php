<div>
    <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
        <div class="mb-6">
            <div class="col-span-12 sm:col-span-4"> <label>Request Selection Info</label>
                <select wire:model="selectService" required="" name="service_id" id="service_id" class="input w-full border border-gray-300 mt-2 flex-1 <?php $__errorArgs = ['service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Select a service</option>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div wire:loading>
            <h4>Loading...</h4>
        </div>
        <?php if($selectedService): ?>
            <div class="mb-6">
                <div class="col-span-12 sm:col-span-4">
                    <label>Request Description:</label>
                    <textarea  class="input w-full border-gray-300 mt-2 flex-1" name="description" id="description" cols="30" rows="5" readonly><?php echo e($selectedService->description); ?></textarea>
                </div>
            </div>
        <?php endif; ?>

    </div>

</div>
<?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/livewire/service-selection.blade.php ENDPATH**/ ?>