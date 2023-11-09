@extends('../layouts.customer')

@section('title')
Request Log
@endsection

@section('breadcrumbs')
Request History Log
@endsection

@section('content')

@include('pages.customer.inc-button')

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Request History Log</h2>
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
                    <th class="bg-theme-1 text-xs text-white">Account Number</th>
                    <th class="bg-theme-1 text-xs text-white">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white">Status</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($request_log->where('status', 'Inprocess') as $data)
                <tr class="intro-x">
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs">{{Carbon\Carbon::parse($data->updated_at)->format('M d, Y h:i:s A')}}</p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs">{{$data->req_no}}</p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs">{{$data->account_no}}</p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <p class="text-xs">{{$data->service->name}}</p>
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            @if(isset($data->status))
                                @if($data->status == 'Pending')
                                <span class="text-red-700">{{$data->status ?? 'N/A'}}</span>
                                @elseif($data->status == 'Inprocess')
                                <span class="text-blue-700">{{$data->status ?? 'N/A'}}</span>
                                @elseif($data->status == 'Completed')
                                <span class="text-green-700">{{$data->status ?? 'N/A'}}</span>
                                @else
                                <span class="text-gray-700">{{'Cancelled'}}</span>
                                @endif
                            @else
                                <span>N/A</span>
                            @endif
                        </div>
                    </td>
                    <td class="w-10">
                        <div class="flex">
                            <a href="/chatify/3"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="message-circle"></i>
                            </a>

                            <a href="javascript:;"
                                data-id="{{$data->id}}"
                                data-toggle="modal"
                                data-target="#view{{$data->id}}"
                                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex">
                                <i data-feather="eye"></i>
                            </a>

                        </div>
                    </td>
                </tr>

                  <!-- View Service Information -->
                  <div class="modal" id="view{{$data->id}}">
                    <div class="modal__content modal__content--lg p-5">
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">View Details</h2>
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
                                <div class="col-span-12">
                                    <label>Technician</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->technician->name ?? 'Waiting for technician assigned'}}" readonly>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                                {{-- @if($data->status == 'Inprocess')
                                 <button type="submit" class="button w-30 bg-theme-1 text-white">Completed</button>
                                @endif --}}
                            </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-red-500">No Data Found!</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@if($pagination <> false)
{!! $request_log->links() !!}
@endif
<x-request-log-modal />
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
        var position = $(this).data('position');
        var fname = $(this).data('fname');
        var lname = $(this).data('lname');
        var gender = $(this).data('gender');
        var address = $(this).data('address');
        var dob = $(this).data('dob');
        var cp = $(this).data('cp');
        var email = $(this).data('email');
        var image = $(this).data('image');
        $('.modal__content #id').val(id);
        $('.modal__content #position').val(position);
        $('.modal__content #fname').val(fname);
        $('.modal__content #lname').val(lname);
        $('.modal__content #gender').val(gender);
        $('.modal__content #address').val(address);
        $('.modal__content #dob').val(dob);
        $('.modal__content #email').val(email);
        $('.modal__content #cp').val(cp);
        $('#linkImage').attr('href',image);
        $('#image').attr('src',image);
    });

    $(document).on("click", ".cancel-dialog", function () {
        var id = $(this).data('id');
        $('.modal__content #data_id').val(id);
    });
</script>
@endpush
