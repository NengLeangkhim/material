<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_formconfirmwork extends Controller
{
    function formconfirmwork(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['form_id']=$_GET['id'];
        $trans_to='';
        $leave_kind='';
        $route="ere_insert_formconfirmwork";
        $frm_id="frm_ere_insert_formconfirmwork";

        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");
        $user_id=$wddx_user_id??$user_id;

        if(isset($v0)){//this from the above
            $via=$v[0][0]['via'];
            $object=$v[0][0]['object'];
            $reason=$v[0][0]['reason'];
            $create_date=$v[0][0]['create_date'];
            $user_id=$v[0][0]['request_by'];
        }
        $q=DB::select("select s.name,p.name as position,d.name as dept,s.sex,s.id_number from ma_user s join ma_position p on p.id=s.ma_position_id join ma_company_dept d on d.id=s.ma_company_dept_id where s.id=$user_id");
        $r=ere_get_assoc::assoc_($q)[0];
        $pos=$r;

        $val=get_defined_vars();
        return view('e_request.formconfirmwork',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}