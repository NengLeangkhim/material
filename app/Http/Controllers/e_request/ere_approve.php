<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ere_approve extends Controller
{
    function approve(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $user_id=$_SESSION['userid'];
        $sql="SELECT public.insert_e_request_detail(
            ".$_POST['erid'].",
            $user_id,
            '".$_POST['type']."',
            '".$_POST['comment']."'
            )";
        $q=DB::select($sql);
        if(count($q)>0){
            echo "succ";
        }
    }
}