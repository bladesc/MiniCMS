<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminStatisticsController extends Controller
{
    public function Index()
    {
        return view('administrator.statistics.statistics');
    }
}
