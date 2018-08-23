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
        $cms = DB::table('cms')
            ->select('id', 'name', 'html', 'visible')
            ->get();

        return view('administrator.cms.cms', [
            'cms' => $cms
        ]);
    }

    public function Delete()
    {

    }

    public function Modify(Request $request)
    {
        $id = $request->input('id');
        $cms = DB::table('cms')
            ->select('id', 'name', 'html', 'visible')
            ->where('id','=', $id)
            ->get();

        return view('administrator.cms.modify', [
            'cms' => $cms
        ]);
    }
    //
}
