@extends('layouts.customer')

@section('title')
Service Status
@endsection

@section('breadcrumbs')
Service Status
@endsection

@push('custom-links')
@endpush

@section('content')
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Service Status
        </h2>
        <div class="intro-x text-center xl:text-left flex">
            <a href="{{route('request.request_print')}}" class=" rounded-md p-3 text-white text-center hover:bg-blue-400 bg-theme-9 xl:mr-3 flex" type="submit"><i data-feather="printer"></i></a>
        </div>
    </div>
</div>

<div class="w-full max-w-xxl mx-auto">
   <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-md font-semibold text-white" style="border-top-left-radius: 20px;">Service Label</th>
                    <th class="bg-theme-1 text-md font-semibold text-white" style="border-top-right-radius: 20px;">Information</th>
                </tr>
            </thead>
            <tbody>
                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold">Request Status</p>
                        </div>
                    </td>
                    <td class="w-60">
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

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold">Request Information</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            {{$service_stat->service->name ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold">Request Description</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            {{$service_stat->service->description ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold">Customer Name</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            {{auth()->user()->name ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold">Customer Email</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            {{auth()->user()->email ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold"> Address</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            {{auth()->user()->address ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold"> Phone No.</p>
                        </div>
                    </td>
                    <td class="w-60">
                        <div class="flex">
                            {{auth()->user()->cp ?? 'N/A'}}
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold"> Technician</p>
                        </div>
                    </td>
                    <td class="w-60">
                        @if(isset($service_stat->technician->name))
                            {{$service_stat->technician->name}}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-md font-semibold"> Assigned Date</p>
                        </div>
                    </td>
                    <td class="w-60">
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
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>
@endpush