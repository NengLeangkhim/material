<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function home(){
    session_start();
    $_SESSION['userid']=1;
    if(perms::check_perm()){//module codes
        $_SESSION['module']=perms:: get_module();
        return view('index');
    }else{
        return view('no_perms');
    }
    }
    public function check(){
        if (DB::connection('myDamnDbConnection')->getDatabaseName())
        {
            return 'Connected to the DB: ' . DB::connection('myDamnDbConnection')->getDatabaseName();
        }
    }
}
