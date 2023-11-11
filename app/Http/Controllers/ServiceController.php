<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Service,ServiceRequest};

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->filled('search'))
        {
            $pagination = false;
            $searchQuery = $request->input('search');
            $service = Service::where('name', 'LIKE', "%$searchQuery%")
                ->orWhere('description', 'LIKE', "%$searchQuery%")
                ->get();
        }
        else
        {
            $pagination = true;
            $service = Service::paginate(5);
        }
        return view('pages.admin.service.index',[
            'service' => $service,
            'pagination' => $pagination
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service = new Service([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $service->save();

        return redirect()->back()->with('success', 'Service created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Service::whereId($id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function show(Request $request, $id)
    {

        if ($request->filled('search')) {
            $searchQuery = $request->input('search');

            $request_log = ServiceRequest::with(['service', 'technician'])->where('service_id',$id)
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
            return view('pages.admin.service.show', [
                'request_log' => $request_log,
                'service_name' => Service::findOrFail($id),
                'pagination' => $pagination
            ]);
        } else {
            $pagination = true;


            return view('pages.admin.service.show', [
                'request_log' => ServiceRequest::with(['service', 'technician'])->where('service_id',$id)->paginate(5),
                'service_name' => Service::findOrFail($id),
                'pagination' => $pagination
            ]);
        }
    }

    public function destroy($id)
    {
        //
    }


}
