<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_requestform extends Controller
{
    function requestform(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['form_id']=$_GET['id'];
        $add='<th><button id="rowFornRequestAdd" onclick="addrow()">Add Row</button></th>';
        $route="ere_insert_requestform";
        $frm_id="frm_ere_insert_requestform";

        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id

        extract($val['val'], EXTR_PREFIX_SAME, "wddx");
        $add=$wddx_add??$add;
        $user_id=$wddx_user_id??$user_id;

        if(isset($v0)){
            $q=DB::select("select concat(s.first_name_en,' ',s.last_name_en) as name ,p.name as position,d.name as dept from ma_user s join ma_position p on p.id=s.ma_position_id join ma_company_dept d on d.id=s.ma_company_dept_id where s.id=".$v0['to']);
            $r=ere_get_assoc::assoc_($q)[0];
            $topos=$r['position'];
            $toname=$r['name'];
            $todept=$r['dept'];
        }
        $q=DB::select("select id,name from e_request_requestform_subject where status='t'");
        $r=ere_get_assoc::assoc_($q);
        $sub=$r;

        $q=DB::select("select concat(s.first_name_en,' ',s.last_name_en) as name,p.name as position,d.name as dept from ma_user s join ma_position p on p.id=s.ma_position_id join ma_company_dept d on d.id=s.ma_company_dept_id where s.id=$user_id");
        $r=ere_get_assoc::assoc_($q)[0];
        if($r){
            $pos=$r['position'];
            $name=$r['name'];
            $dept=$r['dept'];
        }

        $q=DB::select("SELECT s.id, concat(s.first_name_en,' ',s.last_name_en) as name from ma_user s
        join ma_position p on p.id=s.ma_position_id
        where p.ma_group_id <>1 and s.id_number is not null and s.ma_company_dept_id=(select ma_company_dept_id from ma_user where id=$user_id)
        order by name ");
        $r=ere_get_assoc::assoc_($q);
        $staff=$r;

        $val=get_defined_vars();
        return view('e_request.requestform',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}