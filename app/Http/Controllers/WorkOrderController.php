<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ServiceRequest,User,Asset,AssignedTransactionAsset};

class WorkOrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');
            $work_order = ServiceRequest::with(['service', 'technician'])
                ->where(function ($query) use ($searchQuery) {
                    $query->where('req_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('account_no', 'LIKE', "%$searchQuery%")
                        ->orWhere('status', 'LIKE', "%$searchQuery%")
                        ->orWhere('causes_of_request', 'LIKE', "%$searchQuery%")
                        ->orWhere('findings', 'LIKE', "%$searchQuery%")
                        ->orWhere('action_taking', 'LIKE', "%$searchQuery%")
                        ->orWhere('date_accomp', 'LIKE', "%$searchQuery%")
                        ->orWhere('priority', 'LIKE', "%$searchQuery%");
                })->get();
            $pagination = false;
        } else {
            $pagination = true;
            $work_order = ServiceRequest::with(['service', 'technician'])
                ->where('status', 'Inprocess')
                ->orWhere('status', 'Completed')
                ->orWhere('status', 'Cancelled')
                ->paginate(5);
        }
        return view('pages.staff.work-order', [
            'pagination' => $pagination,
            'work_order' => $work_order,
            'user_technician' => User::where('role', '2')->get(),
        ]);
    }

    public function pendingRequest(Request $request){
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');
            $work_order = ServiceRequest::with(['service', 'technician'])
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
        } else {
            $pagination = true;
            $work_order = ServiceRequest::with(['service', 'technician'])
                 ->where('status', 'Pending')
                ->paginate(5);
        }


        return view('pages.staff.request-list', [
            'pagination' => $pagination,
            'work_order' => $work_order,
            'user_technician' => User::where('role', '2')->where('is_Online', '1')->get(),
        ]);
    }

    public function assignTechnician(Request $request, $id){
        $service = ServiceRequest::findOrFail($id);
        $service->date_assigned = \Carbon\Carbon::today()->format('Y-m-d');
        $service->techinician_id = $request->technician;
        $service->status = 'Inprocess';
        $service->update();
        return redirect()->route('workorder.index')->with('success','Technician Successfully Assigned!');
    }

    public function updatePriority(Request $request, $id){
        $service = ServiceRequest::findOrFail($id);
        $service->priority = $request->priority;
        $service->update();
        return redirect()->back()->with('success','Priority Status Successfully Updated!');
    }

    public function updateServiceCompleted(Request $request, $id){
        $service = ServiceRequest::findOrFail($id);
        $service->status = 'Completed';
        $service->date_assigned = \Carbon\Carbon::today()->format('Y-m-d');
        $service->update();
        return redirect()->back()->with('success','Status Successfully Updated!');
    }

    public function assetList($id){
        $service = ServiceRequest::findOrFail($id);
        $assignedAssets = AssignedTransactionAsset::where('service_request_id', $id)->get();
        $totalPriceAmount = $assignedAssets->sum('total_price_amount');
        $totalCostLbc = $assignedAssets->sum('total_cost_lbc');

        return view('pages.staff.assigned-asset', [
            'assets' => Asset::get(),
            'assigned_asset' => $assignedAssets,
            'req_info' => $service,
            'req_id' => $id,
            'totalPriceAmount' => $totalPriceAmount,
            'totalCostLbc' => $totalCostLbc,
        ]);
    }

    public function createAssetList(Request $request, $id){
        $request->validate([
            'asset_id' => 'required',
            'qty' => 'nullable|numeric',
        ]);

        $ass_already_exist = AssignedTransactionAsset::where('service_request_id', $id)->where('asset_id', $request->asset_id)->first();

        if ($ass_already_exist) {
            return redirect()->back()->with('warning', 'Data Already Exists!');
        }

        $get_asset = Asset::findOrFail($request->asset_id);
        $unit_price = $get_asset->unit_price;
        $unit_cost_lbc = $get_asset->unit_cost_lbc;

        if(isset($request->qty)){
            $qty = $request->qty;
            $total_price_amount = $unit_price * $qty;
            $total_cost_lbc = $unit_cost_lbc * $qty;
        }else {
            $qty = null;
            $total_price_amount = $unit_price ?? '0';
            $total_cost_lbc = $unit_cost_lbc ?? '0';
        }

        AssignedTransactionAsset::create([
            'service_request_id' => $id,
            'asset_id' => $request->asset_id,
            'qty' => $qty,
            'unit_price' => $unit_price,
            'unit_cost_lbc' => $unit_cost_lbc,
            'total_price_amount' => $total_price_amount == '0' ? null : $total_price_amount,
            'total_cost_lbc' => $total_cost_lbc == '0' ? null : $total_cost_lbc,
        ]);

        return redirect()->back()->with('success', 'Data Successfully Added!');
    }

    public function deleteAssetList($id)
    {
        $assasset = AssignedTransactionAsset::findOrFail($id);
        $assasset->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function assetListTech($id){
        $service = ServiceRequest::findOrFail($id);
        $assignedAssets = AssignedTransactionAsset::where('service_request_id', $id)->get();
        $totalPriceAmount = $assignedAssets->sum('total_price_amount');
        $totalCostLbc = $assignedAssets->sum('total_cost_lbc');

        return view('pages.technician.assigned-asset', [
            'assets' => Asset::get(),
            'assigned_asset' => $assignedAssets,
            'req_info' => $service,
            'req_id' => $id,
            'totalPriceAmount' => $totalPriceAmount,
            'totalCostLbc' => $totalCostLbc,
        ]);
    }
}
