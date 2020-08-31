<?php

namespace App\Http\Controllers\hrms\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandardPriceController extends Controller
{
    function StandardPrice(){
        return view('hrms\setting\StandardPrice');
    }
}
