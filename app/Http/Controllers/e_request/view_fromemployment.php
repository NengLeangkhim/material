<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_fromemployment extends Controller
{
    function fromemployment(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['form_id']=$_GET['id'];
        $trans_to='';
        $leave_kind='';
        $route="ere_insert_fromemployment";
        $frm_id="frm_ere_insert_fromemployments";

        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");
        $user_id=$wddx_user_id??$user_id;

        if(isset($v[0])){
            $req_by=$v[0][0]['request_by'];
            $q=DB::select("select name from staff where id=$req_by");
            $r=ere_get_assoc::assoc_($q)[0];
            $req_by=$r['name'];
        }
        if(isset($v[1])){
            $v1=$v[1][0];
        }
        if(isset($v[2])){
            $v2=$v[2][0];
        }
        if(isset($v[3])){
            $v3=$v[3];
        }
        if(isset($v[4])){
            $v4=$v[4][0];
        }
        if(isset($v[5])){
            $v5=$v[5];
        }
        if(isset($v[6])){
            if($v[6][0]['parent_gender']=='male'){
                $father=$v[6][0];
            }else{
                $father=$v[6][1];
            }
            if($v[6][0]['parent_gender']=='female'){
                $mother=$v[6][0];
            }else{
                $mother=$v[6][1];
            }
        }
        $q=DB::select("select id,name from position where group_id<>1 and group_id<>6");
        $r=ere_get_assoc::assoc_($q);
        $pos=$r;

        $q=DB::select("select id,name from ma_company_dept where company_id=8");
        $r=ere_get_assoc::assoc_($q);
        $dept=$r;

        $val=get_defined_vars();
        return view('e_request.fromemployment',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}