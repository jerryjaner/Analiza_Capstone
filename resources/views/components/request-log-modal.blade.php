<!-- View -->
<div class="modal" id="view">
    <div class="modal__content modal__content--xl p-10">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Request Information</h2> 
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
           
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
        </div>
    </div>
</div>

<!-- Cancel -->
<div class="modal" id="cancel">
    <div class="modal__content">
        <form action="{{route('request.request_cancel')}}" method="post">
            @csrf
            @method('PUT')
            <div class="p-5 text-center"> <i data-feather="slash" class="w-16 h-16 text-gray-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure you want to cancel?</div>
                <div class="text-gray-600 mt-2">Do you really want to cancel these records? This process cannot be undone.</div>
                <input type="hidden" id="data_id" name="id"/>
            </div>
            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">No</button> <button type="submit" class="button w-24 bg-gray-600 text-white">Yes</button> </div>
        </form>
    </div>
</div>