<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function list()
    {
        return view('bsc.dashboard.dashboard');
    }
}
