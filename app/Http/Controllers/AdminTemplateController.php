<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTemplateController extends Controller
{
    public function Index()
    {
        return view('administrator.template.template');
    }

    public function AddLogo()
    {
        return view('administrator.template.addlogo');
    }

    public function AddHeader()
    {
        return view('administrator.template.addheader');
    }

    public function AddLogoProve()
    {

    }

    public function AddHeaderProve()
    {

    }
}
