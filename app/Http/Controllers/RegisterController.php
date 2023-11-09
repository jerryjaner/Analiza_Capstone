<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Hash;
class RegisterController extends Controller
{
    public function signup(Request $request){

        $validated = $request->validate([
            'account_no' => 'required', 'string','max:255|unique:users',
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
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
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
            //'address' => $validated['house_block_lot'].','.$validated['street'].','.$validated['subdivision'].','.$validated['municipality'].','.$validated['province'],
             'address' => $validated['barangay'],
             'role' => '0',
           // 'is_Approved' => '0',
            'verification' => '0',
        ]);

        return Redirect()->back()->with('message', 'Account is succesfully registerd');

    }
}
