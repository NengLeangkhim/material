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
        session_start();
        if(isset($_SESSION['userid'])){
            $user_id=$_SESSION['userid'];
        }else{
            return;
        }
        $_SESSION['form_id']=$_GET['id'];
        $trans_to='';
        $leave_kind='';

        $val=get_value_to_view::get_val_view();
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");

        if(isset($v0)){//this from the above
            $via=$v[0][0]['via'];
            $object=$v[0][0]['object'];
            $reason=$v[0][0]['reason'];
            $create_date=$v[0][0]['create_date'];
            $user_id=$v[0][0]['request_by'];
        }
        $q=DB::select("select s.name,p.name as position,d.name as dept,s.sex,s.id_number from staff s join position p on p.id=s.position_id join company_dept d on d.id=s.company_dept_id where s.id=$user_id");
        $r=ere_get_assoc::assoc_($q)[0];
        $pos=$r;

        $user_id=$wddx_user_id??$user_id;
        $val=get_defined_vars();
        return view('e_request.formconfirmwork',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}