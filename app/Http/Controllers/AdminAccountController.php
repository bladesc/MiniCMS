<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminAccountController extends Controller
{
    public function Index()
    {
       $account = DB::table('users')
           ->leftJoin('account_information', 'users.id', '=', 'account_information.id_users')
           ->where('users.id', '=', Auth::id())
           ->get();
        return view('administrator.account.account', [
            'account' =>  $account
        ]);
    }
}
