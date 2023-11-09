<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProfileController extends Controller
{

    // public function updateProfile(Request $request){

    //     $validated = $request->validate([
    //         'name'        => 'required',
    //         'address'     => 'required',
    //         'email'       => 'required',
    //         'cp'          => 'required',
    //         'image_prof'  => 'nullable',
    //         'gender'      => 'nullable',
    //         'position'    => 'nullable',
    //         'dob'         => 'nullable',
    //         // 'house_block_lot'        => 'required',
    //         // 'street'        => 'required',
    //         // 'subdivision'        => 'required',
    //         // 'barangay'        => 'required',
    //         // 'municipality'        => 'required',
    //         // 'province'        => 'required',
    //         // 'landmark'        => 'required',
    //     ]);

    //     if($request->hasFile('image_prof')){
    //         $filenameWithExt = $request->file('image_prof')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('image_prof')->getClientOriginalExtension();
    //         $fileToStore = $filename.'_'.time().'.'.$extension;
    //         $path = $request->file('image_prof')->storeAs('public/user_profile/',$fileToStore);
    //     }

    //     $user = User::findOrFail(auth()->user()->id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->cp = $request->cp;
    //     $user->is_Online = $request->is_Online;
    //     $user->address = $request->address;
    //     // $user->address = $request->house_block_lot.' '.$request->street .' '.$request->subdivision .' '.$request->barangay .' '. $request->municipality .' '.$request->province;
    //     // $user->house_block_lot = $request->house_block_lot;
    //     // $user->street = $request->street;
    //     // $user->subdivision = $request->subdivision;
    //     // $user->barangay = $request->barangay;
    //     // $user->municipality = $request->municipality;
    //     // $user->province = $request->province;
    //     // $user->landmark = $request->landmark;

    //     // dd($user);

    //     if(isset($fileToStore)){
    //         $user->image_prof = $fileToStore;
    //     }
    //     $user->update();
    //     $role = auth()->user()->role;

    //     if ($role == '2' || $role == '3') {
    //         auth()->user()->personal_info()->updateOrCreate(
    //             ['user_id' => auth()->user()->id],
    //             [
    //                 'gender' => $validated['gender'],
    //                 'position' => $validated['position'],
    //                 'dob' => Carbon::parse($validated['dob'])->format('Y-m-d'),
    //             ]
    //         );
    //     }

    //     return back()->with("success","Successfully updated!");
    // }

    public function updateProfile(Request $request){

        $validated = $request->validate([
            'name'        => 'required',
            // 'address'     => 'required',
            'email'       => 'required|email',
            'cp'          => 'required',
            'image_prof'  => 'nullable',
            'gender'      => 'nullable',
            'position'    => 'nullable',
            'dob'         => 'nullable',
        ]);

        if($request->hasFile('image_prof')){
            $filenameWithExt = $request->file('image_prof')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_prof')->getClientOriginalExtension();
            $fileToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image_prof')->storeAs('public/user_profile/',$fileToStore);
        }

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cp = $request->cp;

        if(isset($fileToStore)){
            $user->image_prof = $fileToStore;
        }


         if(auth()->user()->role == '0'){

            $user->house_block_lot = $request->house_block_lot;
            $user->street = $request->street;
            $user->subdivision = $request->subdivision;
            $user->barangay = $request->barangay;
            $user->municipality = $request->municipality;
            $user->province = $request->province;
          //  $user->address = $request->house_block_lot.' '.$request->street.' '.$request->subdivision.' '.$request->barangay.' '.$request->municipality.' '.$request->province;
            $user->address = $request->barangay;
            $user->landmark = $request->landmark;
        }
        else{

            $user->address = $request->address;

        }


        if(auth()->user()->role == 2){

            $user->is_Online = $request->is_Online;
        }

        $user->update();
        $role = auth()->user()->role;



        if ($role == '2' || $role == '3') {
            auth()->user()->personal_info()->updateOrCreate(
                ['user_id' => auth()->user()->id],
                [
                    'gender' => $validated['gender'],
                    'position' => $validated['position'],
                    'dob' => Carbon::parse($validated['dob'])->format('Y-m-d'),
                ]
            );
        }

       return back()->with("success","Successfully updated!");
    }
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        if($request->new_password != $request->new_password_confirmation){
            return back()->with("error", "Confirmation Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }

    public function showChangePassword(){
        return view('pages.customer.changepass');
    }

}
