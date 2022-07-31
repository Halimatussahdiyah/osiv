<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardmasyarakatController extends Controller
{
    public function index()
    {
        return view('masyarakat.dashboardmasyarakat');
    }
}
