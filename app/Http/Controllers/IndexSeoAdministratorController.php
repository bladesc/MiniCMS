<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexSeoAdministratorController extends Controller
{
    public function Seo()
    {
        return view('administrator.seo.seo', [
            'seo' => 'seo'
        ]);
    }
}
