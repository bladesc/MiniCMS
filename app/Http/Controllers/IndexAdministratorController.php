<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexAdministratorController extends Controller
{

    public function __construct()
{
    //$this->middleware('auth');
}


    public function Index()
    {
        return view('administrator.index');
    }

    public function Menu()
    {
        $menu = DB::table('menu')
            ->select('id', 'name', 'url', 'visible')
            ->get();

        return view('administrator.menu.menu', [
            'menu' => $menu
        ]);
    }


    public function Delete()
    {

    }

    public function Modify()
    {

    }
    //

}
