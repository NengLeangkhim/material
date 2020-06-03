<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LeadController extends Controller
{
    public function getlead(){
        return view('Lead.index');
        
    }
    public function addlead(){
         return view('Lead.addlead');
    }
    public function detaillead(){
        return view('Lead.detaillead');
    }
}
