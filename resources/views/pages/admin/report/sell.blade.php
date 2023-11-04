@extends('../../layouts.admin')

@section('title')
Sell Report
@endsection

@section('breadcrumbs')
Sell Report
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Sell Report Management</h2>

        <div class="md:block mx-auto text-gray-600">
            <form method="GET">
                <input type="text" class="input" name="daterange" id="daterange" value="{{ request('daterange', '10/01/2023 - 10/15/2023') }}" />
                <button type="submit" class="rounded-md p-1 w-35 mt-2 mx-auto text-white bg-theme-1 hover:bg-blue-400 flex">Filter by Date</button>
            </form>
        </div>


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
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="bg-theme-1 text-xs text-white">Request No.</th>
                    <th class="bg-theme-1 text-xs text-white">Customer</th>
                    <th class="bg-theme-1 text-xs text-white">Address</th>
                    <th class="bg-theme-1 text-xs text-white">Amount Pay</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($request_log->where('status', 'Completed') as $data)
                    @php
                        $sum = 0;
                        foreach ($assignedAssets as $asset) {
                            if ($asset->service_request_id === $data->id) {
                                $sum += $asset->total_price_amount + $asset->total_cost_lbc;
                            }
                        }
                    @endphp
                    @include('components.request-log-row', [
                        'data' => $data,
                        'formattedDate' => Carbon\Carbon::parse($data->updated_at)->format('M d, Y h:i:s A'),
                        'totalAmount' => $sum,
                    ])
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-red-500">No Data Found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($pagination <> false)
        {!! $request_log->links() !!}
        @endif
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<script src="{{asset('js/html2canvas.js')}}"></script>
@endpush
