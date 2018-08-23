<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexSeoAdministratorController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Seo()
    {
        return view('administrator.seo.seo', [
            'seo' => 'seo'
        ]);
    }
}
