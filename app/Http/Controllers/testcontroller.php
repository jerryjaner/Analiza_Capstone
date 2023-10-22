<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,PersonalInfo};
class testcontroller extends Controller
{
    //
    public function test(){

        $customers = PersonalInfo::with('user')
        ->wherehas('user', function ($query) {

            $query->where('role', '=', '0');
        })
        ->get();

        dd($customers);
    }
}
