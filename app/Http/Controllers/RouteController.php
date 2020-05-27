<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function home(){

        $menu = DB::select('select * from menu');    
        // dump($menu->name);
        // foreach($menu as $id){
        //     $menuid=$id->id;
        //     $sub_menu = DB::select('select * from sub_menu where menu_id=?',[$menuid]); 
        //     // dump($sub_menu);
        // }
        $sub_menu = DB::select('select * from sub_menu');
        return view('index', ['menu' => $menu],['sub_menu'=>$sub_menu]);     
    }
    public function check(){
        if (DB::connection('myDamnDbConnection')->getDatabaseName())
        {
            return 'Connected to the DB: ' . DB::connection('myDamnDbConnection')->getDatabaseName();
        }
    }
}
