<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index()
    {
        $menu = DB::table('menu')->select('name', 'email as user_email')->get();
    }
}
