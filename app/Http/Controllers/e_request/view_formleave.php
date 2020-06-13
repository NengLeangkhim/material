<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_formleave extends Controller
{
    function formleave(){
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
        if(isset($v[0])){
            $create_date=$v[0][0]['create_date'];
            $req_by=$v[0][0]['request_by'];
            $leave_kind=$v[0][0]['kind_of_leave_id'];
            $date_from=date('d-m-Y',strtotime   (explode(' ',$v[0][0]['date_from'])[0]));
            $time_from=explode(' ',$v[0][0]['date_from'])[1];
            $date_to=date('d-m-Y',strtotime(explode(' ',$v[0][0]['date_to'])[0]));
            $time_to=explode(' ',$v[0][0]['date_to'])[1];
            $date_resume=date('d-m-Y',strtotime(explode(' ',$v[0][0]['date_resume'])[0]));
            $leave_number=$v[0][0]['number_date_leave'];
            $trans_to=$v[0][0]['transfer_job_to'];
            $reason=$v[0][0]['reason'];
            $user_id=$v[0][0]['request_by'];
        }
        $q=DB::select("select s.name,s.id_number,p.name as position,d.name as dept from position p join staff s on s.position_id=p.id join company_dept d on s.company_dept_id=d.id where s.id=$user_id");
        $r=ere_get_assoc::assoc_($q)[0];
        $pos=$r['position'];
        $name=$r['name'];
        $id_number=$r['id_number'];
        $dept=$r['dept'];

        $q=DB::select("select id,name,name_kh from e_request_leaveapplicationform_leave_kind where status='t'");
        $r=ere_get_assoc::assoc_($q);
        $kindof=$r;

        $q=DB::select("select s.id, s.name from staff s
        join position p on p.id=s.position_id
        where p.group_id <>1 and s.id_number is not null and s.company_dept_id=(select company_dept_id from staff where id=$user_id)
        order by name ");
        $r=ere_get_assoc::assoc_($q);
        $transfer_to=$r;

        $user_id=$wddx_user_id??$user_id;
        $val=get_defined_vars();
        return view('e_request.formleave',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}