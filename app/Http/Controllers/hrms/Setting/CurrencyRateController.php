<?php

namespace App\Http\Controllers\hrms\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    function CurrencyRate(){
        return view('hrms/setting/CurrencyRate');

    }
}
