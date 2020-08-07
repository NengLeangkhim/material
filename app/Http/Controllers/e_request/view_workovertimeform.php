<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_workovertimeform extends Controller
{
    function workovertimeform(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['form_id']=$_GET['id'];
        $type='request';
        $route="ere_insert_workovertimeform";
        $frm_id="frm_ere_insert_workovertimeform";

        $run=new get_row();
        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");
        $user_id=$wddx_user_id??$user_id;

        if(isset($v[1])){
            $e_r_id=$v['id'];
            if($v[1][0]['type']=='request'){
            $type='actual';
            $req_date=explode(' ',$v[1][0]['date'])[0];
            $req_start=explode(' ',$v[1][0]['start_time'])[1];
            $req_end=explode(' ',$v[1][0]['end_time'])[1];
            $req_t=date_diff(date_create($v[1][0]['start_time']), date_create($v[1][0]['end_time']))->format('%H:%I:%S');
            $req_rest_s=explode(' ',$v[1][0]['rest_time_start'])[1];
            $req_rest_e=explode(' ',$v[1][0]['rest_time_end'])[1];
            $req_t_r=date_diff(date_create($v[1][0]['rest_time_start']), date_create($v[1][0]['rest_time_end']))->format('%H:%I:%S');
            $req_act_work=$v[1][0]['actual_work_time'];
            $req_reason=$v[1][0]['reason'];
            $req_create_date=$v[0][0]['create_date'];
            $req_apr_by=$v['approve_by'];
            $req_apr_date=$v['approve_date'];
            $user_id=$v[0][0]['request_by'];
            if(empty($req_apr_by)){
                $btn_sub="";
                $d1='disabled';
            }else{
                if($_SESSION['userid']!=$v[0][0]['request_by']){
                    $btn_sub="";
                    $dd1='disabled';
                }else{
                    $btn_sub='<input type="submit" class="btn btn-primary">';
                    $dd1='';
                }
            }
            if(!empty($v[0][0]['related_to_e_request_id'])){
                $e_r_id=$v[0][0]['related_to_e_request_id'];
                $btn_sub="";
                $dd1='disabled';
                $vv=$run->get_related_row($_GET['id'],$v[0][0]['related_to_e_request_id']);
                if(isset($v[1])){
                    $act_date=explode(' ',$vv[1][0]['date'])[0];
                    $act_start=explode(' ',$vv[1][0]['start_time'])[1];
                    $act_end=explode(' ',$vv[1][0]['end_time'])[1];
                    $act_t=date_diff(date_create($vv[1][0]['start_time']), date_create($v[1][0]['end_time']))->format('%H:%I:%S');
                    $act_rest_s=explode(' ',$vv[1][0]['rest_time_start'])[1];
                    $act_rest_e=explode(' ',$vv[1][0]['rest_time_end'])[1];
                    $act_t_r=date_diff(date_create($vv[1][0]['rest_time_start']), date_create($v[1][0]['rest_time_end']))->format('%H:%I:%S');
                    $act_work=$vv[1][0]['actual_work_time'];
                    $act_reason=$vv[1][0]['reason'];
                }
                $act_create_date=$vv[0][0]['create_date'];
                $act_apr_by=$vv['approve_by'];
                $act_apr_date=$vv['approve_date'];
            }
        }else{
            $btn_sub="";
            $d1="disabled";
            $vv=$run->get_related_row($_GET['id'],$v[0][0]['related_to_e_request_id']);
            $e_r_id=$v['id'];
            if(isset($vv[1])){
                $req_date=explode(' ',$vv[1][0]['date'])[0];
                $req_start=explode(' ',$vv[1][0]['start_time'])[1];
                $req_end=explode(' ',$vv[1][0]['end_time'])[1];
                $req_t=date_diff(date_create($vv[1][0]['start_time']), date_create($vv[1][0]['end_time']))->format('%H:%I:%S');
                $req_rest_s=explode(' ',$vv[1][0]['rest_time_start'])[1];
                $req_rest_e=explode(' ',$vv[1][0]['rest_time_end'])[1];
                $req_t_r=date_diff(date_create($v[1][0]['rest_time_start']), date_create($vv[1][0]['rest_time_end']))->format('%H:%I:%S');
                $req_act_work=$vv[1][0]['actual_work_time'];
                $req_reason=$vv[1][0]['reason'];
                $req_create_date=$vv[0][0]['create_date'];
                $req_apr_by=$vv['approve_by'];
                $req_apr_date=$vv['approve_date'];
                $user_id=$vv[0][0]['request_by'];
            }
            if(isset($v[1])){
                $act_date=explode(' ',$v[1][0]['date'])[0];
                $act_start=explode(' ',$v[1][0]['start_time'])[1];
                $act_end=explode(' ',$v[1][0]['end_time'])[1];
                $act_t=date_diff(date_create($v[1][0]['start_time']), date_create($v[1][0]['end_time']))->format('%H:%I:%S');
                $act_rest_s=explode(' ',$v[1][0]['rest_time_start'])[1];
                $act_rest_e=explode(' ',$v[1][0]['rest_time_end'])[1];
                $act_t_r=date_diff(date_create($v[1][0]['rest_time_start']), date_create($v[1][0]['rest_time_end']))->format('%H:%I:%S');
                $act_work=$v[1][0]['actual_work_time'];
                $act_reason=$v[1][0]['reason'];
            }
            $act_create_date=$v[0][0]['create_date'];
            $act_apr_by=$v['approve_by'];
            $act_apr_date=$v['approve_date'];
        }
        $q=DB::select("select s.name from ma_user s where s.id=".$v[0][0]['request_by']);
        $r=ere_get_assoc::assoc_($q)[0];
        $req_by=$r['name'];
        }

        $q=DB::select("select s.name,p.name as position,d.name as dept from ma_user s join ma_position p on p.id=s.ma_position_id join ma_company_dept d on d.id=s.ma_company_dept_id where s.id=$user_id");
        $r=ere_get_assoc::assoc_($q)[0];
        $pos=empty($r['position'])?'':$r['position'];
        $name=empty($r['name'])?'':$r['name'];
        $dept=empty($r['dept'])?'':$r['dept'];


        $val=get_defined_vars();
        return view('e_request.workovertimeform',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}