<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_formuseElectronic extends Controller{
    function in_formuseElectronic(){
        session_start();
        if(isset($_SESSION['userid'])){
            $user_id=$_SESSION['userid'];
        }else{
            return;
        }
        if(isset($_POST['approve'])){
            $sql="SELECT public.insert_e_request_detail(
                ".$_POST['erid'].",
                $user_id,
                'approve',
                '".$_POST['comment']."'
            )";
            $q=DB::select($sql);
        }else if(isset($_POST['pending'])){
            $sql="SELECT public.insert_e_request_detail(
                ".$_POST['erid'].",
                $user_id,
                'pending',
                '".$_POST['comment']."'
            )";
            $q=DB::select($sql);
        }else if(isset($_POST['reject'])){
            $sql="SELECT public.insert_e_request_detail(
                ".$_POST['erid'].",
                $user_id,
                'reject',
                '".$_POST['comment']."'
            )";
            $q=DB::select($sql);
        }
        else{
            $form_id=$_SESSION['form_id'];
            $useof=$_POST['use'];
            $q=DB::select("select id_number from staff where id=".$_POST['req_to']);

            $r=ere_get_assoc::assoc_($q)[0];
            $id_number=$r['id_number'];
            $sql="SELECT public.insert_e_request_use_electronic(
                '$id_number',
                $user_id,
                ".$_POST['req_to'].",
                $form_id
            ) as id";
            $q=DB::select($sql);
            $id=ere_get_assoc::assoc_($q)[0]['id'];
            foreach($useof as $rr){
                if($rr=='6'&&(!empty($_POST['useof_other']))){
                    $sql="INSERT INTO public.e_request_use_electronic_use(
                        name, parent_id)
                        VALUES ('".$_POST['useof_other']."', $rr) returning id;";
                    $q=DB::select($sql);

                    $r=ere_get_assoc::assoc_($q)[0];
                    $rr=$r['id'];
                }
                $sql="SELECT public.insert_e_request_use_electronic_detail(
                    $id,
                    $rr
                )";
                $q=DB::select($sql);
            }
        }
    }
}
?>