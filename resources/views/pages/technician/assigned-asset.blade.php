@extends('layouts.technician')

@section('title')
Assets List
@endsection

@section('breadcrumbs')
Assets List
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <button type="button" class="button bg-theme-1 flex items-center w-20 border text-white dark:border-dark-5 dark:text-white" onclick="window.history.go(-1); return false;"><i data-feather="arrow-left"></i> Back</button>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Assigned Materials and Installation Fee - <b>Request No. : </b><u> {{$req_info->req_no}}</u></h2>
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <form method="GET">
        <div class="w-full sm:w-auto sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
            </div>
        </div>
        </form>
    </div>
   
</div>

@if (session()->has('success'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ session('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
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
                </tr>
            </thead>
            <tbody>
                @forelse($assigned_asset as $data)
                <tr class="intro-x">
                    <td class="w-40">
                        <p class="text-xs">{{$data->qty ?? 'n/a'}}</p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs">{{$data->asset->unit ?? 'n/a'}}</p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs">{{$data->asset->materials ?? 'n/a'}}</p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs">{{number_format($data->unit_price, 2, '.', ',') ?? 'n/a'}}</p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs">{{number_format($data->total_price_amount, 2, '.', ',') ?? 'n/a'}}</p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs">{{number_format($data->unit_cost_lbc, 2, '.', ',') ?? 'n/a'}}</p>
                    </td>
                    <td class="w-40">
                        <p class="text-xs">{{number_format($data->total_cost_lbc, 2, '.', ',') ?? 'n/a'}}</p>
                    </td>
                </tr>

                <div class="modal" id="delete{{$data->id}}">
                    <div class="modal__content">
                        <form action="{{route('workorder.assetList.delete',$data->id)}}" method="post">
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
                @empty
                <tr>
                    <td colspan="8" class="text-center text-red-500">No Data Found!</td>
                </tr>
               @endforelse
               <tr>
                    <td colspan="6">
                        <p class="text-xl font-extrabold text-right">Total Amount : </p>
                    </td>
                    <td colspan="2">
                        <p class="text-xl font-extrabold ">{{number_format($totalCostLbc + $totalPriceAmount, 2, '.', ',')}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-3">
            
        </div>
    </div>
</div>


@endsection
@push('custom-scripts')
<script src="{{asset('js/html2canvas.js')}}"></script>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>
@endpush