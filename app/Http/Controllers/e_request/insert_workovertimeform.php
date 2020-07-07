<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;


class insert_workovertimeform extends Controller {
    function in_workovertimeform(){
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

        }else{
            $form_id=$_SESSION['form_id'];
            $type=$_POST['type'];
            $e_request_id=(empty($_POST['e_request_id']))?'null':$_POST['e_request_id'];
            if($type=='request'){
                $date=util::to_pgdate($_POST['request_date']);
                $start_time=$date.' '.util::to_24($_POST['time_req_from']);
                $end_time=$date.' '.util::to_24($_POST['time_req_to']);
                $rest_time_start=$date.' '.util::to_24($_POST['time_req_from_rest']);
                $rest_time_end=$date.' '.util::to_24($_POST['time_req_to_rest']);
                $actual_work_time=$_POST['req_work_time'];
                $reason=$_POST['req_reason'];
            }else if ($type=='actual'){
                $date=util::to_pgdate($_POST['actual_date']);
                $start_time=$date.' '.util::to_24($_POST['time_act_from']);
                $end_time=$date.' '.util::to_24($_POST['time_act_to']);
                $rest_time_start=$date.' '.util::to_24($_POST['time_act_from_rest']);
                $rest_time_end=$date.' '.util::to_24($_POST['time_act_to_rest']);
                $actual_work_time=$_POST['act_work_time'];
                $reason=$_POST['act_reason'];
            }
            $sql="SELECT public.insert_e_request_overtime(
                $user_id,
                $e_request_id,
                $form_id
            ) as id";
            $id=1;
            $q=DB::select($sql);

            if(count($q)>0){
                $r=ere_get_assoc::assoc_($q)[0];
                $id=$r['id'];
                $sql="SELECT public.insert_e_request_overtime_detail(
                    $id,
                    '$date',
                    '$start_time',
                    '$end_time',
                    '$reason',
                    '$type',
                    '$rest_time_start',
                    '$rest_time_end',
                    $actual_work_time,
                    $user_id
                )";
                $q=DB::select($sql);

            }
        }
    }
}
