<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    public function Index()
    {


        $users = DB::table('users')
            ->leftJoin('account_information', 'users.id', '=', 'account.users_id')
            ->get();

        return view('administrator.account.users',
            [
                'users' => $users
            ]);
    }
}
