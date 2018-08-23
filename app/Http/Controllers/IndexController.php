<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index()
    {
        $menu = DB::table('menu')
            ->select('name', 'url', 'visible')
            ->where('visible', '=', true)
            ->get();

        $cms = DB::table('cms')
            ->select('name', 'html', 'visible')
            ->where('visible', '=', true)
            ->get();

        return view('home.index', [
            'menu' => $menu,
            'cms' => $cms
        ]);
    }
}
