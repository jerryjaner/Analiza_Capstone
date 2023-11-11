@extends('layouts.staff')

@section('title')
Work Order
@endsection

@section('breadcrumbs')
Work Order
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">List of Pending Requests</h2>
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

<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="bg-theme-1 text-xs text-white">Request Number</th>
                    <th class="bg-theme-1 text-xs text-white">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white">Customer Name</th>
                    <th class="bg-theme-1 text-xs text-white">Address</th>
                    <th class="bg-theme-1 text-xs text-white">Landmark</th>
                    <th class="bg-theme-1 text-xs text-white">Mobile</th>
                    <th class="bg-theme-1 text-xs text-white">Technician</th>
                    <th class="bg-theme-1 text-xs text-white">Assigned Date</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($work_order->where('status', 'Pending') as $data)
                <tr>
                    <td class="w-40">
                        <div class="flex">
                            {{Carbon\Carbon::parse($data->created_at)->format('M d, Y') ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->req_no ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->service->name ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->user->name ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{-- {{$data->user->address ?? 'N/A'}} --}}
                            {{$data->user->house_block_lot}} {{$data->user->street}} {{$data->user->subdivision}} {{$data->user->barangay}} {{$data->user->municipality}} {{$data->user->province}}
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            {{$data->user->landmark ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            {{$data->user->cp ?? 'N/A'}}
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                        N/A
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                        Not Assigned
                        </div>
                    </td>

                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#view{{$data->id}}"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="users"></i>
                            </a>

                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#cancel{{$data->id}}"
                                class="cancel-dialog rounded-md p-1 w-35 text-white bg-theme-6 hover:bg-red-400 xl:mr-3 flex">
                                <i data-feather="delete"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <!--Cancelled -->
                <div class="modal" id="cancel{{$data->id}}">
                    <div class="modal__content">
                        <form action="{{route('request.request_cancel')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="p-5 text-center"> <i data-feather="slash" class="w-16 h-16 text-gray-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure you want to cancel?</div>
                                <div class="text-gray-600 mt-2">Do you really want to cancel these records? This process cannot be undone.</div>
                                <input type="hidden" value="{{$data->id}}" name="id"/>
                            </div>
                            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">No</button> <button type="submit" class="button w-24 bg-gray-600 text-white">Yes</button> </div>
                        </form>
                    </div>
                </div>
                <!-- Assign Technician -->
                <div class="modal" id="view{{$data->id}}">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="{{route('workorder.assign.technician',$data->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">Assign Technician</h2>
                                <p>Request No. <u>{{$data->req_no ?? 'N/A'}}</u></p>
                            </div>
                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Name</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->name}}" readonly>
                                </div>
                                {{-- <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Address</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->address}}" readonly>
                                </div> --}}
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Address</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->house_block_lot}} {{$data->user->street}} {{$data->user->subdivision}} {{$data->user->barangay}} {{$data->user->municipality}} {{$data->user->province}} "readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->email}}" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer CP#</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->cp}}" readonly>
                                </div>
                                <div class="col-span-12">
                                    <label>Landmark</label>
                                    <textarea class="input w-full border mt-2 flex-1"  readonly>{{$data->user->landmark ?? 'N/A'}}</textarea>
                                </div>
                                <hr class="col-span-12 mt-2">
                                <div class="col-span-12">
                                    <label>Request Information</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->service->name ?? 'N/A'}}" readonly>
                                </div>

                                <div class="col-span-12">
                                    <label>Request Description</label>
                                    <textarea class="input w-full mt-2 flex-1 border" id="" cols="30" rows="5" readonly>{{$data->service->description ?? 'N/A'}}</textarea>
                                </div>
                                <div class="col-span-12">
                                    <label>Concerns</label>
                                    <textarea class="input w-full mt-2 flex-1 border" id="" cols="30" rows="5" readonly>{{$data->concern ?? 'N/A'}}</textarea>
                                </div>
                                <div class="col-span-12 sm:col-span-8"> <label>Assign Technician</label>
                                    <select  required="" name="technician" class="input w-full border mt-2 flex-1 @error('technician') border-theme-6 @enderror">
                                        <option value="">--Select--</option>
                                        @foreach($user_technician as $newTechnician)
                                        <option value="{{$newTechnician->id}}">{{$newTechnician->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-red-500">{{$data->status ?? 'N/A'}}</p>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                <button type="submit" class="button w-20 bg-theme-1 text-white">Process</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-red-500">No Data Found!</td>
                </tr>
               @endforelse
            </tbody>
        </table>
        @if($pagination <> false)
        {!! $work_order->links() !!}
        @endif
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

    $(document).on("click", ".delete-dialog", function () {
        var id = $(this).data('id');
        $('.modal__content #data_id').val(id);
    });
</script>
@endpush
