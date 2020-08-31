<?php

namespace App\Http\Controllers\hrms\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxationController extends Controller
{
    function Taxation(){
        return view('hrms/Setting/Taxation');
    }
}
