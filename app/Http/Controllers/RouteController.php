<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function home(){
    // session_start();
    // $_SESSION['userid']=1;
    // $_SESSION['module']=perms:: get_module();
        return view('start');
    }
    public function check(){
        if (DB::connection('myDamnDbConnection')->getDatabaseName())
        {
            return 'Connected to the DB: ' . DB::connection('myDamnDbConnection')->getDatabaseName();
        }
    }
}
