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
            ->select('id', 'name', 'html', 'visible')
            ->where('visible', '=', true)
            ->get();

        $cmsId = [];
        foreach ($cms as $key=>$value) {
            $cmsId[$value->id]['id'] = $value->id;
            $cmsId[$value->id]['name'] = $value->name;
            $cmsId[$value->id]['html'] = $value->html;
            $cmsId[$value->id]['visible'] = $value->visible;
        }

        return view('home.index', [
            'menu' => $menu,
            'cms' => $cmsId
        ]);
    }
}
