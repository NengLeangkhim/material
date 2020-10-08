<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function list()
    {
        return view('bsc.purchase.purchase.purchase_list');
    }

    public function view()
    {
        return view('bsc.purchase.purchase.purchase_view');
    }

    public function form()
    {
        return view('bsc.purchase.purchase.purchase_form');
    }
}
