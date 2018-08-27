<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function Index()
    {
        $account = "3";
        return view('administrator.account.account', [
            'account' =>  $account
        ]);
    }
}
