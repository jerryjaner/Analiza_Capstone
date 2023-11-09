<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\ServiceRequest;
use App\Models\{Service,ServiceRequest,User,AssignedTransactionAsset,Asset};

class ServiceRequestController extends Controller
{

    public function requestForm(){
        return view('pages.customer.submit-request');
    }

    public function requestLog(Request $request){
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $request_log = ServiceRequest::with(['service', 'technician'])
                ->where('user_id', auth()->user()->id)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%")
                        ->orWhere('causes_of_request', 'LIKE', "%$searchQuery%")
                        ->orWhere('findings', 'LIKE', "%$searchQuery%")
                        ->orWhere('action_taking', 'LIKE', "%$searchQuery%")
                        ->orWhere('date_accomp', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
            return view('pages.customer.request-log', [
                'request_log' => $request_log,
                'pagination' => $pagination
            ]);
        } else {
            $pagination = true;
            return view('pages.customer.request-log', [
                'request_log' => ServiceRequest::with(['service', 'technician'])->where('user_id', auth()->user()->id)->where('status', 'Pending')->paginate(5),
                'pagination' => $pagination
            ]);
        }
    }

    public function requestProcess(Request $request){
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $request_log = ServiceRequest::with(['service', 'technician'])
                ->where('user_id', auth()->user()->id)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%")
                        ->orWhere('causes_of_request', 'LIKE', "%$searchQuery%")
                        ->orWhere('findings', 'LIKE', "%$searchQuery%")
                        ->orWhere('action_taking', 'LIKE', "%$searchQuery%")
                        ->orWhere('date_accomp', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
            return view('pages.customer.request-process', [
                'request_log' => $request_log,
                'pagination' => $pagination
            ]);
        } else {
            $pagination = true;
            return view('pages.customer.request-process', [
                'request_log' => ServiceRequest::with(['service', 'technician'])->where('user_id', auth()->user()->id)->where('status', 'Inprocess')->paginate(5),
                'pagination' => $pagination
            ]);
        }
    }

    public function requestCompleted(Request $request){
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $request_log = ServiceRequest::with(['service', 'technician'])
                ->where('user_id', auth()->user()->id)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%")
                        ->orWhere('causes_of_request', 'LIKE', "%$searchQuery%")
                        ->orWhere('findings', 'LIKE', "%$searchQuery%")
                        ->orWhere('action_taking', 'LIKE', "%$searchQuery%")
                        ->orWhere('date_accomp', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
            return view('pages.customer.request-completed', [
                'request_log' => $request_log,
                'pagination' => $pagination
            ]);
        }
         else {
            $pagination = true;
            return view('pages.customer.request-completed', [
                'request_log' => ServiceRequest::with(['service', 'technician'])->where('user_id', auth()->user()->id)->where('status', 'Completed')->paginate(5),
                'pagination' => $pagination
            ]);
        }
    }

    public function serviceStatus(Request $request){

        //OLD CODE
        // return view('pages.customer.service-status',[
        //     'service_stat' => ServiceRequest::with(['service','technician'])->where('user_id', auth()->user()->id)->orderBy('id','DESC')->first(),
        // ]);

        //NEW CODE
        // $work_order = ServiceRequest::with(['service', 'technician'])->where('user_id', auth()->user()->id)->get();
        // return view('pages.customer.service-status', compact('work_order'));

        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $work_order = ServiceRequest::with(['service', 'technician'])
                ->where('user_id', auth()->user()->id)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        //   ->orWhere('date_assigned', 'LIKE', "%$searchQuery%");
                        ->orWhereRaw("DATE_FORMAT(date_assigned, '%Y-%m-%d') LIKE ?", ["%$searchQuery%"]);
                })->get();

            $pagination = false;
            return view('pages.customer.service-status', [
                'work_order' => $work_order,
                'pagination' => $pagination
            ]);
        }
         else {

            $pagination = true;
            return view('pages.customer.service-status', [
                'work_order' => ServiceRequest::with(['service', 'technician'])->where('user_id', auth()->user()->id)->paginate(5),
                'pagination' => $pagination
            ]);
        }

    }

    public function CustomerAssetList($id){
        $service = ServiceRequest::findOrFail($id)->with(['service', 'technician', 'user'])->where('id', $id)->get();
        $assignedAssets = AssignedTransactionAsset::where('service_request_id', $id)->get();
        $totalPriceAmount = $assignedAssets->sum('total_price_amount');
        $totalCostLbc = $assignedAssets->sum('total_cost_lbc');


        return view('pages.customer.customer_asset_list', [
            'assets' => Asset::get(),
            'assigned_asset' => $assignedAssets,
            'req_info' => $service,
            'req_id' => $id,
            'totalPriceAmount' => $totalPriceAmount,
            'totalCostLbc' => $totalCostLbc,
        ]);
    }



    public function store(Request $request)
    {
        $service_req = ServiceRequest::get();
        $is_exisit = $service_req->where('user_id', auth()->user()->id)->where('status', 'Pending')->count();

        if($is_exisit != 0){
            return redirect()->back()->with('warning', 'We have a record of your service request already. Please get in touch with our team to have your pending request approved, and we will assign a technician to start working on it!');
        }

        $request->validate([
            'account_no' => 'required',
            'service_id' => 'required',
        ]);

        $service_req = ServiceRequest::create([
            'user_id' => auth()->user()->id,
            'account_no' => $request->input('account_no'),
            'service_id' => $request->input('service_id'),
            'concern' => $request->concern,
        ]);

        return redirect()->back()->with('success', 'Service requested successfully');
    }

    public function requestCancel(Request $request){
        $up_service_status = ServiceRequest::findOrFail($request->id);
        $up_service_status->update([
            'status' => 'Cancelled',
        ]);

        return redirect()->back()->with('success', 'Service request cancelled!');
    }

    public function requestCancelList(Request $request){
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $request_log = ServiceRequest::with(['service', 'technician'])
                ->where('user_id', auth()->user()->id)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%")
                        ->orWhere('causes_of_request', 'LIKE', "%$searchQuery%")
                        ->orWhere('findings', 'LIKE', "%$searchQuery%")
                        ->orWhere('action_taking', 'LIKE', "%$searchQuery%")
                        ->orWhere('date_accomp', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
            return view('pages.customer.request-cancelled', [
                'request_log' => $request_log,
                'pagination' => $pagination
            ]);
        } else {
            $pagination = true;
            return view('pages.customer.request-cancelled', [
                'request_log' => ServiceRequest::with(['service', 'technician'])->where('user_id', auth()->user()->id)->where('status', 'Cancelled')->paginate(5),
                'pagination' => $pagination
            ]);
        }
    }

    public function printRequestStatus(){

        return view('pages.customer.print-service-status');
    }

}
