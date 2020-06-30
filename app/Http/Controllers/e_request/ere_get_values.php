<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ere_get_values{
    function get_values(){
        $sql=new getvalues_sql();
        $s="";
        $id=0;
        if(isset($_GET['_sql'])){
            $s=$_GET['_sql'];
        }
        if(isset($_GET['_id'])){
            $id=$_GET['_id'];
        }
        $sql=$sql->sqlst($s,$id);

        $q=DB::select($sql);
        $r=ere_get_assoc::assoc_($q);

        echo json_encode($r);
        }
}