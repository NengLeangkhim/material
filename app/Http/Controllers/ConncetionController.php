<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConncetionController extends Controller
{
    public function DbConnect(){
                            
        $users = DB::select('select * from menu');   
        // dump($users);     
        return view('menu.left_menu', ['menu' => $users]);
         
   }     
   public function test(){
        $con ="ok";
        return view('test')->with("con",$con);
   }  
}
