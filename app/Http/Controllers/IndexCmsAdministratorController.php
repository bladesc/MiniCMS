<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexCmsAdministratorController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Index()
    {
        return view('administrator.index');
    }

    public function Cms()
    {
        $menu = DB::table('cms')
            ->select('id', 'name', 'html', 'visible')
            ->get();

        return view('administrator.cms', [
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
