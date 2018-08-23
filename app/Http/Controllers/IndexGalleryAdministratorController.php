<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexGalleryAdministratorController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Gallery()
    {
        return view('administrator.gallery.gallery', [
            'gallery' => 'dd'
        ]);
    }
}
