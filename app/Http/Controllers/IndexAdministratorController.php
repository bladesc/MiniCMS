<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class IndexAdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index() {
        return view('administrator.index');
    }
    //
}
