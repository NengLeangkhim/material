<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_stand_by extends Controller{
    function in_stand_by(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
            $month=$_POST['formonth'];
            $year=$_POST['foryear'];
            $num_day=cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $sql="SELECT public.insert_e_request_stand_by(
                null,
                $user_id,
                $form_id
            ) as id";
            $id=0;
            $q=DB::select($sql);
            $r=ere_get_assoc::assoc_($q)[0];
            $id=$r['id'];
            for($i=1;$i<=$num_day;$i++){
                $d=$year.'-'.$month.'-'.$i;
                if(isset($_POST['stid_'.$d])){
                    foreach ($_POST['stid_'.$d] as $rr){
                        $sql="SELECT public.insert_e_request_stand_by_detail(
                                $id,
                                $rr,
                                '$d',
                                '{$_POST['start_t_'.$d]}',
                                '{$_POST['end_t_'.$d]}',
                                $user_id
                            )";
                        $q=DB::select($sql);
                    }
                }
            }
        }
    }
}