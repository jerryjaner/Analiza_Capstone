<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,PersonalInfo,ServiceRequest};
use Auth;
class PageController extends Controller
{
    public function index(Request $request){
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
                ->paginate(5);


        }

        $role = auth()->user()->role;
        $searchQuery = today()->format('Y-m-d');
        if($role=='1'){

            $data = [
                'pending' => ServiceRequest::with(['service', 'technician'])->where('status', 'Pending')->count(),
                'completed' => ServiceRequest::with(['service', 'technician'])->where('status', 'Completed')->count(),
                'cancelled' =>ServiceRequest::with(['service', 'technician'])->where('status', 'Cancelled')->count(),
                'inprocess' => ServiceRequest::with(['service', 'technician'])->where('status', 'Inprocess')->count(),
            ];


            $monthlyRequests = ServiceRequest::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
                                        ->groupBy('month')
                                        ->orderBy('month')
                                        ->get();


                return view('pages.admin.index',[
                    'count_customer' => User::where('role', '0')->count(),
                    'count_staff' => User::where('role', '3')->count(),
                    'count_technician' => User::where('role', '2')->count(),
                    'work_order' => $work_order,
                    'data' => $data,
                    'user_technician' => User::where('role', '2')->get(),
                    'count_request' => ServiceRequest::where('created_at', 'like', "%$searchQuery%")->count(),
                    'monthlyRequests' => $monthlyRequests,
                ]);


        }elseif($role=='2'){
            return view('pages.technician.index',[
                'person_info' => PersonalInfo::where('user_id', auth()->user()->id)->first(),
            ]);
        }
        elseif($role=='3'){
            return view('pages.staff.index',[
                'person_info' => PersonalInfo::where('user_id', auth()->user()->id)->first(),
            ]);
        }else{

            if(Auth::check() && Auth::User()-> verification == '1'){

                return view('pages.customer.index');
            }
            else{

                Auth::guard('web')->logout(); // Log the user out using the Auth facade
                 return redirect()->route('login')
                                  ->with('error_message', 'Please wait for the administrator approval.'); // Add a flash message

            }


        }
    }


}
