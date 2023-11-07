<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class SearchAccountController extends Controller
{
    public function search(Request $request){


            $query = $request->input('account_no');
            $accounts = User::where('role', '=', '0')
                            ->where('account_no', 'like', "%$query%")->get();

            return view('auth.account-search',compact('accounts'));



    }


}
