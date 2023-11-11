@extends('layouts.staff')

@section('title')
Customers List
@endsection

@section('breadcrumbs')
Customers
@endsection

@section('content')


<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Customers Management</h2>
        <div class="intro-x text-center xl:text-left">
            <a href="javascript:;" data-toggle="modal" data-target="#addcustomer" class="rounded-full p-2 w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex"><i data-feather="plus"></i><i data-feather="users"></i></a>
        </div>
        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div>
        </div>
        </form>
    </div>
</div>
@if (session()->has('message'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ session('message') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
@if (session()->has('err'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800" role="alert">
    <div class="ml-3 text-sm font-medium">
        {{ session('err') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-orange-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif



<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">#</th>
                    <th class="bg-theme-1 text-xs text-white">Account Number</th>
                    <th class="bg-theme-1 text-xs text-white">Full Name</th>
                    <th class="bg-theme-1 text-xs text-white">Address</th>
                    <th class="bg-theme-1 text-xs text-white">Landmark</th>
                    <th class="bg-theme-1 text-xs text-white">Email</th>
                    <th class="bg-theme-1 text-xs text-white">Mobile No.</th>
                    <th class="bg-theme-1 text-xs text-white">Account Verification</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @forelse($customers as $data)
                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs">{{$i++}}</p>
                            <p class="text-xs" hidden>{{$data->id}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->account_no}}</p>
                        </div>
                    </td>
                    <td class="w-20">
                        <div class="flex">
                            <p class="text-xs">{{$data->name}}</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            <p class="text-xs">{{$data->house_block_lot}} {{$data->street}} {{$data->subdivison}}
                                {{$data->barangay}} {{$data->municipality}} {{$data->province}}
                           </p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->landmark}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->email}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->cp}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            @if ($data->verification == "0")
                                <p class="text-xs" style="color:red;">Not Verified</p>
                            @else
                                <p class="text-xs" style="color:green;">Verified</p>
                            @endif

                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">

                            <!-- Modal toggle -->
                            <a href="javascript:;"
                                data-id="{{$data->id}}"
                                data-name="{{$data->name}}"
                                data-account_no="{{$data->account_no}}"
                                data-is_Approved="{{$data->is_Approved}}"
                                data-email="{{$data->email}}"
                                data-cp="{{$data->cp}}"
                                data-house_block_lot="{{$data->house_block_lot}}"
                                data-street="{{$data->street}}"
                                data-verification="{{$data->verification}}"
                                data-subdivision="{{$data->subdivision}}"
                                data-barangay="{{$data->barangay}}"
                                data-municipality="{{$data->municipality}}"
                                data-province="{{$data->province}}"
                                data-landmark="{{$data->landmark}}"
                                data-toggle="modal"
                                data-target="#editcustomer"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-9 hover:bg-green-400 xl:mr-3 flex">
                                <i data-feather="edit"></i>
                            </a>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-red-500">No Data Found!</td>
                </tr>

                @endforelse
            </tbody>
        </table>

    </div>
</div>
@if($pagination <> false)
{!! $customers->links() !!}
@endif

<x-staff-modal />
@endsection
@push('custom-scripts')
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );

    $(document).on("click", ".view-dialog", function () {
        var id = $(this).data('id');

        var name = $(this).data('name');
         var account_no = $(this).data('account_no');
        var cp = $(this).data('cp');
        var email = $(this).data('email');
        var street = $(this).data('street');
        var verification = $(this).data('verification');
        var is_Approved = $(this).data('is_Approved');
        var house_block_lot = $(this).data('house_block_lot');
        var subdivision = $(this).data('subdivision');
        var barangay = $(this).data('barangay');
        var municipality = $(this).data('municipality');
        var province = $(this).data('province');
        var landmark = $(this).data('landmark');


        $('.modal__content #id').val(id);
        $('.modal__content #name').val(name);
        $('.modal__content #account_no').val(account_no);
        $('.modal__content #email').val(email);
        $('.modal__content #cp').val(cp);
        $('.modal__content #street').val(street);
        $('.modal__content #verification').val(verification);
        $('.modal__content #is_Approved').val(is_Approved);
        $('.modal__content #house_block_lot').val(house_block_lot);
        $('.modal__content #subdivision').val(subdivision);
        $('.modal__content #barangay').val(barangay);
        $('.modal__content #municipality').val(municipality);
        $('.modal__content #province').val(province);
        $('.modal__content #landmark').val(landmark);


    });

    // $(document).on("click", ".delete-dialog", function () {
    //     var id = $(this).data('id');
    //     $('.modal__content #data_id').val(id);
    // });

</script>
@endpush
