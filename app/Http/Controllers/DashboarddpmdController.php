<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboarddpmdController extends Controller
{
    public function indexdashboard()
    {
        return view('admindpmd.dashboarddpmd');
    }
}
