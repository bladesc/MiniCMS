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
           ->select(
               'users.name as nick',
               'users.email',
               'account_information.name',
               'account_information.address',
               'account_information.city',
               'account_information.zip_code',
               'account_information.number',
               'account_information.avatar',
               'account_information.created_at',
               'account_information.updated_at'
           )
           ->leftJoin('account_information', 'users.id', '=', 'account_information.id_users')
           ->where('users.id', '=', Auth::id())
           ->get();
        return view('administrator.account.account', [
            'account' =>  $account
        ]);
    }
}
