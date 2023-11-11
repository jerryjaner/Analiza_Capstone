<!-- Add Staff -->
<div class="modal" id="addcustomer">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Add Customer</h2>
        </div>
        <form action="<?php echo e(route('customers.store')); ?>" name="addForm" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>

                <div class="col-span-12 sm:col-span-6">
                    <label>Account Number</label>
                    <input type="text" required="" pattern="[0-9]{3}-{1}[0-9]{2}-[0-9]{5}" minlength="12" maxlength="12"  name="account_no" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['account_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('account_no')); ?>" placeholder="Input Account Number">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label>Full Name</label>
                    <input type="text" required="" onkeydown="return /[a-z, ]/i.test(event.key)" name="name" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" placeholder="Input Full Name">
                </div>

                

                <div class="col-span-12 sm:col-span-4">
                    <label>House / Block / Lot</label>
                    <input type="text" required="" name="house_block_lot" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['house_block_lot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('house_block_lot')); ?>" placeholder="Input House / Block / Lot">
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <label>Street</label>
                    <input type="text" required="" name="street" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('street')); ?>" placeholder="Input Street">
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <label>Subdivision</label>
                    <input type="text" required="" name="subdivision" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['subdivision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('subdivision')); ?>" placeholder="Input Subdivision">
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <label>Barangay</label>
                    <input type="text" required="" name="barangay" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['barangay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('barangay')); ?>" placeholder="Input Barangay">
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <label>Municipality</label>
                    <input type="text" required="" name="municipality" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['municipality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('municipality')); ?>" placeholder="Input Municipality">
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <label>Province</label>
                    <input type="text" required="" name="province" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('province')); ?>" placeholder="Input Province">
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label>Landmark</label>
                    <textarea  name="landmark" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('landmark')); ?>" placeholder="Input Landmark" required> </textarea>
                </div>



                
                <div class="col-span-12 sm:col-span-6">
                    <label>Contact No.</label>
                    <input type="text" required="" name="cp" minlength="11" maxlength="11" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['cp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('cp')); ?>" placeholder="Input Contact Number">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label>Email Address</label>
                    <input type="email" required="" name="email" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" placeholder="Input Email">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label>Password</label>
                    <input type="password" required="" name="password" id="password" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" placeholder="Input Password">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label>Comfirm Password</label>
                    <input type="password" required="" name="password_confirmation" id="password_confirmation" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password_confirmation')); ?>" placeholder="Input Confirm Password">
                </div>

            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
            </div>
        </form>

    </div>
</div>


<!-- Edit Staff -->
<div class="modal" id="editcustomer">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Edit Customer Information</h2>
            <p id="gen_emp"></p>
        </div>
        <form action="<?php echo e(route('customers.update')); ?>" name="editForm" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-6"> <label>Full Name</label> <input type="text" required="" onkeydown="return /[a-z, ]/i.test(event.key)" name="name" id="name" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" placeholder="Input Full Name">
                </div>


                <div class="col-span-12 sm:col-span-6"> <label>Account Verification</label>
                    <select  required="" name="verification" id="verification" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['verification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php if(old('verification')): ?>
                          <option><?php echo e(old('verification')); ?></option>
                        <?php endif; ?>
                        <option value="">--Select--</option>
                        <option value="1">Verified</option>
                        <option value="0">Not Verified</option>
                    </select>
                </div>

                <div class="col-span-12 sm:col-span-4"> <label>House / Block / Lot</label>
                    <input type="text" required="" name="house_block_lot" id="house_block_lot" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['house_block_lot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('house_block_lot')); ?>" placeholder="Input House / Block / Lot">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Street</label>
                     <input type="text" required="" name="street" id="street" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('street')); ?>" placeholder="Input street">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Subdivision</label>
                    <input type="text" required="" name="subdivision" id="subdivision" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['subdivision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('subdivision')); ?>" placeholder="Input street">
               </div>

                <div class="col-span-12 sm:col-span-4"> <label>Barangay</label>
                    <input type="text" required="" name="barangay" id="barangay" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['barangay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('barangay')); ?>" placeholder="Input Barangay">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Municipality</label>
                     <input type="text" required="" name="municipality" id="municipality" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['municipality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('municipality')); ?>" placeholder="Input Municipality">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Province</label>
                    <input type="text" required="" name="province" id="province" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('province')); ?>" placeholder="Input Province">
                </div>
                <div class="col-span-12 sm:col-span-12"> <label>Landmark</label>
                    <textarea  class="input w-full mt-2 flex-1 border" id="landmark" placeholder="Enter your Landmark here for example: Front of the SSU Campus" name="landmark"  value="<?php echo e(old('landmark')); ?>" autofocuscols="30" rows="5"></textarea>
                </div>



                
                <div class="col-span-12 sm:col-span-12"> <label>Contact No.</label> <input type="text" required="" name="cp" minlength="11" maxlength="11" id="cp" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['cp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('cp')); ?>" placeholder="Input Contact Number">
                </div>
                <div class="col-span-12 sm:col-span-12"> <label>Email Address</label> <input type="email" required="" name="email" id="email" class="input w-full border mt-2 flex-1 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-theme-6 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" placeholder="Input Email">
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button>
            </div>
        </form>

    </div>
</div>



<?php /**PATH C:\Users\Admin\Desktop\Analiza_Capstone\resources\views/components/admin-customer-modal.blade.php ENDPATH**/ ?>