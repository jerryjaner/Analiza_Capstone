<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,PersonalInfo};
use Hash;
use Carbon\Carbon;
class CustomerController extends Controller
{
    public function index(){

         $customers = User::Where('role', '0')->get();
        // $customers = PersonalInfo::with('user')
        //     ->whereHas('user', function ($query) {
        //         $query->where('role', '=', '0');
        //     })
        //     ->get()
        //     ->pluck('user');

        // $customers = PersonalInfo::with('user')
        // ->wherehas('user', function ($query) {

        //     $query->where('role', '=', '0');
        // })
        // ->get();
        // $customers = PersonalInfo::join('users', 'personal_infos.user_id', '=', 'users.id')
        //             ->where('users.role', '=', '0')
        //             ->get();

        return view('pages.admin.customer.index',compact('customers'));
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
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|same:password_confirmation',
            'gender' => 'required',
            'dob' => 'required|date|before:today',

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
            'is_Approved' => '1',
        ]);

        $user->personal_info()->create([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'dob' => Carbon::parse($validated['dob'])->format('Y-m-d'),
        ]);


        // dd($user);

        return redirect()->back()->with('message', 'Customer Successfully Saved!');
    }


    public function update(Request $request){

        $validated = $request->validate([
            'verification' => 'required',

        ]);
        $user = User::findOrFail($request->id);
        $user->update([
            'verification' => $validated['verification'],
        ]);



        return redirect()->back()->with('message', 'Customer Successfully Updated!');

    }
}

