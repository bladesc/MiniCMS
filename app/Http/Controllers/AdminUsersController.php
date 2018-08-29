<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    public function Index()
    {
        $users = DB::table('users')
            ->select('users.id', 'users.name as nick', 'users.email', 'account_information.name')
            ->leftJoin('account_information', 'users.id', '=', 'account_information.id_users')
            ->paginate(12);

        return view('administrator.users.users',
            [
                'users' => $users
            ]);
    }
}
