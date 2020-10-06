<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartAccountController extends Controller
{
    public function list()
    {
        return view('bsc.chart_account.chart_account_list');
    }

    public function form()
    {
        return view('bsc.chart_account.chart_account_form');
    }
    public function edit()
    {
        return view('bsc.chart_account.chart_account_list_edit');
    }
}
