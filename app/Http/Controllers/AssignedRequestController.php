<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ServiceRequest,User};

class AssignedRequestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');
            $work_order = ServiceRequest::with(['service', 'technician'])
                ->where('techinician_id', auth()->user()->id)
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
                ->where('techinician_id', auth()->user()->id)
                ->where('status', 'Inprocess')

                ->paginate(5);
              //  ->orWhere('status', 'Completed')
        }
        return view('pages.technician.assigned-request', [
            'pagination' => $pagination,
            'work_order' => $work_order,
            'user_technician' => User::where('role', '2')->get(),
        ]);
    }
}
