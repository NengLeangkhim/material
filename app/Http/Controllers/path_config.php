<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class path_config extends Controller
{
    //
    public static function stock_img_path(){
        return '/media/file/stock/img/';
    }
    public static function profile_img_path(){
        return '/media/file/main_app/profile/img/';
    }
}
