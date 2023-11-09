@extends('../../layouts.print')

@section('title')
Request Log
@endsection

@section('breadcrumbs')
Request History Log
@endsection

@section('content')
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 text-center">
        <h1 class="text-xl"><b>Print Service Status</b></h1>
    </div>
</div>
<div class="w-full max-w-xxl mx-auto">
   <div class="overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <tbody>
                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold">Request Status</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            @if(isset($service_stat->status))
                                @if($service_stat->status == 'Pending')
                                <span class="text-red-700">{{$service_stat->status ?? 'N/A'}}</span>
                                @elseif($service_stat->status == 'Inprocess')
                                <span class="text-blue-700">{{$service_stat->status ?? 'N/A'}}</span>
                                @elseif($service_stat->status == 'Completed')
                                <span class="text-green-700">{{$service_stat->status ?? 'N/A'}}</span>
                                @else
                                <span class="text-gray-700">{{'Cancelled'}}</span>
                                @endif
                            @else
                                <span>N/A</span>
                            @endif
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold">Request Information</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{$service_stat->service->name ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold">Request Description</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{$service_stat->service->description ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold">Customer Name</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{auth()->user()->name ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold">Customer Email</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{auth()->user()->email ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold"> Address</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{-- {{auth()->user()->address ?? 'N/A'}} --}}
                            {{$data->user->house_block_lot}} {{$data->user->street}} {{$data->user->subdivision}} {{$data->user->barangay}} {{$data->user->municipality}} {{$data->user->province}}

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold"> Landmark</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{auth()->user()->landmark ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold"> Phone No.</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{auth()->user()->cp ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold"> Technician</p>
                        </div>
                    </td>
                    <td>
                        @if(isset($service_stat->technician->name))
                            {{$service_stat->technician->name}}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="flex">
                            <p class="text-md font-semibold"> Assigned Date</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            {{$service_stat->date_assigned ?? 'N/A'}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
window.onafterprint = function(){
    window.location.href = '{{ url()->previous() }}';
}
</script>
@endpush
