<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,PersonalInfo};
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search'))
        {
            $pagination = false;
            $searchQuery = $request->input('search');
            $staff = PersonalInfo::with('user')
                ->whereHas('user', function ($query) use ($searchQuery) {
                    $query->Where('name', 'LIKE', "%$searchQuery%")
                        ->orWhere('address', 'LIKE', "%$searchQuery%")
                        ->orWhere('cp', 'LIKE', "%$searchQuery%")
                        ->orWhere('email', 'LIKE', "%$searchQuery%");
                })
                ->where(function ($subquery) {
                    $subquery->whereHas('user', function ($query) {
                        $query->where('role', '3');
                    });
                })
                ->get();
            $staff->map(function ($item) {
                $user = $item->user;
                $item->name = $user->name;
                $item->address = $user->address;
                $item->cp = $user->cp;
                $item->email = $user->email;
            });
        }
        else
        {
            $pagination = true;
            $staff = PersonalInfo::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('role', '3');
                })
                ->paginate(5);
        }
        return view('pages.admin.staff.index',[
            'staff' => $staff,
            'pagination' => $pagination
        ]);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|same:password_confirmation',
            'gender' => 'required',
            'position' => 'required',
            'dob' => 'required|date|before:today',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'cp' => $validated['cp'],
            'role' => '3',
          //  'is_Approved' => '1',
            'verification' => '1',
        ]);
        $user->personal_info()->create([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'position' => $validated['position'],
            'dob' => Carbon::parse($validated['dob'])->format('Y-m-d'),
        ]);

        return redirect()->back()->with('message', 'Staff Successfully Saved!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cp' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'email' => 'required|email|string|max:255',
            'gender' => 'required',
            'position' => 'required',
            'dob' => 'required|date|before:today',
        ]);
        $user = User::findOrFail($request->id);
        $user->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'cp' => $validated['cp'],
        ]);
        $user->personal_info()->update([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'position' => $validated['position'],
            'dob' => Carbon::parse($validated['dob'])->format('Y-m-d'),
        ]);

        return redirect()->back()->with('message', 'Staff Successfully Saved!');
    }

    public function destroy(Request $request)
    {
        $user = User::findorFail($request->id);
        if($user){
            $location = 'storage/staff_image/'.$user->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $user->delete();
        }
        return redirect()->back()->with('err', 'Staff Successfully Deleted!');
    }



}
