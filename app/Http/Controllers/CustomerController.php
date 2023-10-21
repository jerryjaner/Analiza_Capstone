<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(){

        $customers = User::Where('role', '0')->get();
        return view('pages.admin.customer.index',compact('customers'));
    }
}
