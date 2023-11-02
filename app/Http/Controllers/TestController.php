<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Service,ServiceRequest,User,AssignedTransactionAsset,Asset};
use Auth;
use DB;
class TestController extends Controller
{
    // public function test(){


    // $work_order = ServiceRequest::with(['service', 'technician'])->get();
    //    return view('pages.customer.receipt', compact('work_order'));
    // }

    // public function Customer_AssetList($id){
    //     $service = ServiceRequest::findOrFail($id)->with(['service', 'technician', 'user'])->where('id', $id)->get();
    //     $assignedAssets = AssignedTransactionAsset::where('service_request_id', $id)->get();
    //     $totalPriceAmount = $assignedAssets->sum('total_price_amount');
    //     $totalCostLbc = $assignedAssets->sum('total_cost_lbc');
    //     //dd($service);
    //     return view('pages.customer.customer_asset_list', [
    //         'assets' => Asset::get(),
    //         'assigned_asset' => $assignedAssets,
    //         'req_info' => $service,
    //         'req_id' => $id,
    //         'totalPriceAmount' => $totalPriceAmount,
    //         'totalCostLbc' => $totalCostLbc,
    //     ]);
    // }




}
