<?php

namespace App\Http\Controllers\stock\dashboard;

use App\Http\Controllers\Controller;
use App\model\stock\dashboard\dashboard;
use Illuminate\Http\Request;

class stock_dashbordController extends Controller
{
    // get count company
    public static function stock_company(){
        $count_company=dashboard::get_count_company();
        return $count_company[0]->count;
    }
}
