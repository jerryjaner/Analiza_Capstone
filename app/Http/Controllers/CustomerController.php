<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,PersonalInfo};
use Hash;
use Carbon\Carbon;
class CustomerController extends Controller
{
    public function index(Request $request){

        // $customers = User::Where('role', '0')->get();
        // return view('pages.admin.customer.index',compact('customers'));

        if ($request->filled('search'))
        {
            $pagination = false;
            $searchQuery = $request->input('search');
            $customers = User::where('role', '=', '0')
            ->where('account_no', 'LIKE', "%$searchQuery%")
            ->get();
            // dd($customers);

        }
        else
        {
            $pagination = true;
            // $service = Service::paginate(5);
            $customers = User::where('role', '=', '0')->paginate(5);

            // dd($customers);
        }
        return view('pages.admin.customer.index',[
            'customers' => $customers,
            'pagination' => $pagination
        ]);
    }

    public function store(Request $request){

        $validated = $request->validate([

            'account_no' => 'required|string|max:255|unique:users',
            'name' => 'required',
            'house_block_lot' => 'required',
            'street' => 'required',
            'subdivision' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'landmark' => 'required',
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11|unique:users',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|same:password_confirmation',
            // 'gender' => 'required',
            //'dob' => 'required|date|before:today',

        ]);
        $user = User::create([
            'account_no' => $validated['account_no'],
            'name' => $validated['name'],
            'house_block_lot' => $validated['house_block_lot'],
            'street' => $validated['street'],
            'subdivision' => $validated['subdivision'],
            'barangay' => $validated['barangay'],
            'municipality' => $validated['municipality'],
            'province' => $validated['province'],
            'landmark' => $validated['landmark'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'cp' => $validated['cp'],
            'role' => '0',
            'verification' => '1',
           // 'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['municipality'].','.$validated['province'],
           // 'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['barangay'].','.$validated['municipality'].','.$validated['province'],
           'address' => $validated['barangay'],
            // 'is_Approved' => '1',
        ]);



        return redirect()->back()->with('message', 'Customer Successfully Saved!');
    }


    public function update(Request $request){

        $validated = $request->validate([


            'name' => 'required',
            'house_block_lot' => 'required',
            'street' => 'required',
            'subdivision' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'landmark' => 'required',
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email' => 'required|email|string|max:255',
            'verification' => 'required',

        ]);
        $user = User::findOrFail($request->id);
        $user->update([

            'verification' => $validated['verification'],
            'name' => $validated['name'],
            'house_block_lot' => $validated['house_block_lot'],
            'street' => $validated['street'],
            'subdivision' => $validated['subdivision'],
            'barangay' => $validated['barangay'],
            'municipality' => $validated['municipality'],
            'province' => $validated['province'],
            'landmark' => $validated['landmark'],
            'email' => $validated['email'],
            'cp' => $validated['cp'],
            //'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['municipality'].','.$validated['province'],
          //  'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['barangay'].','.$validated['municipality'].','.$validated['province'],
          'address' => $validated['barangay'],
        ]);

        return redirect()->back()->with('message', 'Customer Successfully Updated!');

    }




    // STAFF ACCOUNT ADD CUSTOMER

    public function add_customer(Request $request){

        // $customers = User::Where('role', '0')->get();
        // return view('pages.staff.add-customer',compact('customers'));

        if ($request->filled('search'))
        {
            $pagination = false;
            $searchQuery = $request->input('search');
            $customers = User::where('role', '=', '0')
                             ->Where('account_no', 'LIKE', "%$searchQuery%")
                             ->get();


        }
        else
        {
            $pagination = true;
            $customers = User::where('role', '=', '0')->paginate(5);

        }
        return view('pages.staff.add-customer',[
            'customers' => $customers,
            'pagination' => $pagination
        ]);

    }

    public function customer_store(Request $request){

        $validated = $request->validate([

            'account_no' => 'required|string|max:255|unique:users',
            'name' => 'required',
            'house_block_lot' => 'required',
            'street' => 'required',
            'subdivision' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'landmark' => 'required',
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11|unique:users',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|same:password_confirmation',
            // 'gender' => 'required',
            //'dob' => 'required|date|before:today',

        ]);
        $user = User::create([
            'account_no' => $validated['account_no'],
            'name' => $validated['name'],
            'house_block_lot' => $validated['house_block_lot'],
            'street' => $validated['street'],
            'subdivision' => $validated['subdivision'],
            'barangay' => $validated['barangay'],
            'municipality' => $validated['municipality'],
            'province' => $validated['province'],
            'landmark' => $validated['landmark'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'cp' => $validated['cp'],
            // 'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['municipality'].','.$validated['province'],
            //WITH BRGY
            // 'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['barangay'].','.$validated['municipality'].','.$validated['province'],
            'address' => $validated['barangay'],
            'role' => '0',
            'verification' => '1',
           // 'is_Approved' => '1',
        ]);



        return redirect()->back()->with('message', 'Customer Successfully Saved!');
    }

    public function customer_update(Request $request){

        $validated = $request->validate([

            'name' => 'required',
            'house_block_lot' => 'required',
            'street' => 'required',
            'subdivision' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
            'landmark' => 'required',
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email' => 'required|email|string|max:255',
            'verification' => 'required',

        ]);
        $user = User::findOrFail($request->id);
        $user->update([

            'verification' => $validated['verification'],
            'name' => $validated['name'],
            'house_block_lot' => $validated['house_block_lot'],
            'street' => $validated['street'],
            'subdivision' => $validated['subdivision'],
            'barangay' => $validated['barangay'],
            'municipality' => $validated['municipality'],
            'province' => $validated['province'],
            'landmark' => $validated['landmark'],
            'email' => $validated['email'],
            'cp' => $validated['cp'],
           // 'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['barangay'].','.$validated['municipality'].','.$validated['province'],
           'address' => $validated['barangay'],
        ]);

        return redirect()->back()->with('message', 'Customer Successfully Updated!');

    }

}

