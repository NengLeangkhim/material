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
    public static function abc(){

    }
    public static function img_en($st){
        $extension=explode('.',$st)[1];
        $st=md5(time().$st).'.'.$extension;
        return $st;
    }
    public static function movefile($file,$path){
        return null;
    }
}
