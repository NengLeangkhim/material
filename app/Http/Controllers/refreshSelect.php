<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class refreshSelect extends Controller
{
    //
    public function refresh_sel(){
        $_id=$_GET['_id'];
        $q=DB::select($this->target($_id));
        return response()->json(array('response'=> $q), 200);
    }
    private function target($t){
        $tar=array();
        $tar['ibrand']="SELECT id ,name from product_brand";
        $tar['iunit_type']="SELECT id, name from measurement";
        $tar['icurrency']="SELECT id, name from currency";
        $tar['icompany']="SELECT id, name from company";
        $tar['isupplier']="SELECT id, name from supplier";
        $tar['istorage']="SELECT id, name from storage";
        $tar['icustomer']="SELECT id, name from customer";
        $tar['istaff']="SELECT id, name from staff";
        $tar['iptype']="SELECT id, name_en as name from product_type";

        return $tar[$t];
    }
}
