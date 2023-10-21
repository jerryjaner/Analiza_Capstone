@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('breadcrumbs')
Dashboard
@endsection

@section('content')
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Dashboard
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="file" class="text-theme-10"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{$count_request}}</div>
                    <div class="text-base text-gray-600 mt-1">Today's Request Received</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-11"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{$count_technician}}</div>
                    <div class="text-base text-gray-600 mt-1">No. of Technician</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-9"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{$count_staff}}</div>
                    <div class="text-base text-gray-600 mt-1">No. of Staff</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-7"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">{{$count_customer}}</div>
                    <div class="text-base text-gray-600 mt-1">No. of Customer</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
    <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Date Created</th>
                    <th class="bg-theme-1 text-xs text-white">Request Number</th>
                    <th class="bg-theme-1 text-xs text-white">Requested Service</th>
                    <th class="bg-theme-1 text-xs text-white">Customer Name</th>
                    <th class="bg-theme-1 text-xs text-white">Address</th>
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
                            {{$data->user->address ?? 'N/A'}}
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

                        </div>
                    </td>
                </tr>

                <!-- Assign Technician -->
                <div class="modal" id="view{{$data->id}}">
                    <div class="modal__content modal__content--lg p-5">
                        <form action="" method="post">
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
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Address</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->address}}" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->email}}" readonly>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Customer CP#</label>
                                    <input type="text" class="input w-full border mt-2 flex-1" value="{{$data->user->cp}}" readonly>
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
                                <div class="col-span-12 sm:col-span-8">
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <label>Status</label>
                                    <p class="text-red-500">{{$data->status ?? 'N/A'}}</p>
                                </div>
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-red-500">No Data Found!</td>
                </tr>
               @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
