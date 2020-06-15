<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_requestform extends Controllerស{
    function in_requestform(){
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

            $sql="SELECT public.insert_e_request_requestform(
                '".$_POST['no']."',
                $user_id,
                '".$_POST['to']."',
                '".$_POST['subject']."',
                $form_id
            ) as id";
            $id=0;
            $q=DB::select($sql);

            $r=ere_get_assoc::assoc_($q)[0];
            $id=$r['id'];
            foreach($_POST['description'] as $key=>$value){
                $sql="SELECT public.insert_e_request_requestform_detail(
                    $id,
                    '$value',
                    ".$_POST['qty'][$key].",
                    '".$_POST['other'][$key]."',
                    ".$_POST['receiver'][$key]."
                )";
                $q=DB::select($sql);

        }
        }
    }
}