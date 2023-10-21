
<!-- View technician -->
<div class="modal" id="view">
    <div class="modal__content modal__content--xl p-10">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Technician Information</h2> 
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-12 mx-auto mb-2"><a id="linkImage" target="_blank"><img id="image" width="200" class="mr-3" alt="" srcset=""></a></div>
            <div class="col-span-12 sm:col-span-4"> <label>Full Name</label> <input type="text" readonly name="name" id="name" class="input w-full mt-2 flex-1"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Sex</label>  <input type="text" readonly name="gender" id="gender" class="input w-full mt-2 flex-1"></div>
            <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" readonly name="address" id="address" class="input w-full mt-2 flex-1"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" readonly name="dob" id="dob" class="input w-full mt-2 flex-1"> </div>
            <div class="col-span-12 sm:col-span-8"> <label>Contact</label> <input type="text" readonly name="cp" id="cp" class="input w-full mt-2 flex-1"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Position</label> <input type="text" readonly name="position" id="position" class="input w-full mt-2 flex-1"> </div>
            <div class="col-span-12 sm:col-span-12"> <label>Email Address</label> <input type="email" readonly name="email" id="email" class="input w-full mt-2 flex-1"> </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
        </div>
    </div>
</div>

<!-- Add technician -->
<div class="modal" id="add">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Add New Technician</h2> 
        </div>
        <form action="{{route('technician.store')}}" name="addForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-4"> <label>Full Name</label> <input type="text" required="" onkeydown="return /[a-z, ]/i.test(event.key)" name="name" class="input w-full border mt-2 flex-1 @error('name') border-theme-6 @enderror" value="{{old('name')}}" placeholder="Input Full Name">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Position</label> <input type="text" required="" name="position" class="input w-full border mt-2 flex-1 @error('position') border-theme-6 @enderror" value="{{old('position')}}" placeholder="Input Position"> 
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Sex</label>
                    <select  required="" name="gender" class="input w-full border mt-2 flex-1 @error('gender') border-theme-6 @enderror">
                        @if(old('gender'))
                        <option>{{old('gender')}}</option>
                        @endif
                        <option value="">--Select--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" required="" name="address" class="input w-full border mt-2 flex-1 @error('address') border-theme-6 @enderror" value="{{old('address')}}" placeholder="Input Address">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" required="" name="dob" class="input w-full border mt-2 flex-1 @error('dob') border-theme-6 @enderror" value="{{old('dob')}}" placeholder="Input Date of Birth">
                </div>
                <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" required="" name="cp" minlength="11" maxlength="11" class="input w-full border mt-2 flex-1 @error('cp') border-theme-6 @enderror" value="{{old('cp')}}" placeholder="Input Contact Number"> 
                </div>
                <div class="col-span-12 sm:col-span-12"> <label>Email Address</label> <input type="email" required="" name="email" class="input w-full border mt-2 flex-1 @error('email') border-theme-6 @enderror" value="{{old('email')}}" placeholder="Input Email"> 
                </div>
                <div class="col-span-12 sm:col-span-6"> <label>Password</label> <input type="password" required="" name="password" id="password" class="input w-full border mt-2 flex-1 @error('password') border-theme-6 @enderror" value="{{old('password')}}" placeholder="Input Password"> 
                </div>
                <div class="col-span-12 sm:col-span-6"> <label>Comfirm Password</label> <input type="password" required="" name="password_confirmation" id="password_confirmation" class="input w-full border mt-2 flex-1 @error('password_confirmation') border-theme-6 @enderror" value="{{old('password_confirmation')}}" placeholder="Input Confirm Password"> 
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
            </div>
        </form>
        
    </div>
</div>

<!-- Edit Image -->
<div class="modal" id="editImage">
    <div class="modal__content">
        <form action="" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto" id="genemp"></h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <div class="col-span-12 sm:col-span-12"> <label>Upload Photo</label> <input type="file" name="image" required class="input w-full border mt-2 flex-1"> 
                    @error('image')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-9 text-white">Update</button> 
            </div>
        </form>
    </div>
</div>


<!-- Edit Password -->
<div class="modal" id="editImage">
    <div class="modal__content">
        <form action="" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto" id="genemp"></h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <div class="col-span-12 sm:col-span-12"> <label>Upload Photo</label> <input type="file" name="image" required class="input w-full border mt-2 flex-1"> 
                    @error('image')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-9 text-white">Update</button> 
            </div>
        </form>
    </div>
</div>

<!-- Edit technician -->
<div class="modal" id="edit">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Edit Technician Information</h2> 
            <p id="gen_emp"></p>
        </div>
        <form action="{{route('technician.update')}}" name="editForm" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-4"> <label>Full Name</label> <input type="text" required="" onkeydown="return /[a-z, ]/i.test(event.key)" name="name" id="name" class="input w-full border mt-2 flex-1 @error('name') border-theme-6 @enderror" value="{{old('name')}}" placeholder="Input Full Name">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Position</label> <input type="text" required="" name="position" id="position" class="input w-full border mt-2 flex-1 @error('position') border-theme-6 @enderror" value="{{old('position')}}" placeholder="Input Position"> 
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Sex</label>
                    <select  required="" name="gender" id="gender" class="input w-full border mt-2 flex-1 @error('gender') border-theme-6 @enderror">
                        @if(old('gender'))
                        <option>{{old('gender')}}</option>
                        @endif
                        <option value="">--Select--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" required="" name="address" id="address" class="input w-full border mt-2 flex-1 @error('address') border-theme-6 @enderror" value="{{old('address')}}" placeholder="Input Address">
                </div>
                <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" required="" name="dob" id="dob" class="input w-full border mt-2 flex-1 @error('dob') border-theme-6 @enderror" value="{{old('dob')}}" placeholder="Input Date of Birth">
                </div>
                <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" required="" name="cp" minlength="11" maxlength="11" id="cp" class="input w-full border mt-2 flex-1 @error('cp') border-theme-6 @enderror" value="{{old('cp')}}" placeholder="Input Contact Number"> 
                </div>
                <div class="col-span-12 sm:col-span-12"> <label>Email Address</label> <input type="email" required="" name="email" id="email" class="input w-full border mt-2 flex-1 @error('email') border-theme-6 @enderror" value="{{old('email')}}" placeholder="Input Email"> 
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button>
            </div>
        </form>
        
    </div>
</div>

<!-- Delete technician -->
<div class="modal" id="delete">
    <div class="modal__content">
        <form action="{{route('technician.delete')}}" method="post">
            @csrf
            @method('DELETE')
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                <input type="hidden" id="data_id" name="id"/>
            </div>
            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button> </div>
        </form>
    </div>
</div>