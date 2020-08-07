<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class get_storage_location extends Controller
{
    //
    public function get_loc(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            // $storage=$_SESSION['warehouse'];
            // $sql="SELECT id,name from storage_location where stock_storage_id=$storage";
            $sql="";
            if(isset($_GET['pid'])){
                $id=$_GET['pid'];
                $sql="select distinct sd.storage_location_id as id,sd.location as name from product_qty q
                join storage_detail sd on sd.id=q.storage_detail_id
                where q.product_id=$id and status='t'";
            }
            if(isset($_GET['_id'])){
                $id=$_GET['_id'];
                $sql="select id, name from storage_location where stock_storage_id=$id and status='t'";
            }
            $q=DB::select($sql);
            return response()->json(array('response'=> $q), 200);
        }
    }
}
