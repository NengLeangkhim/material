<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_formuseElectronic extends Controller
{
    function formuseElectronic(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['form_id']=$_GET['id'];
        $pos="";
        $name="";
        $dept="";
        $id_number="";
        $route="ere_insert_formuseElectronic";
        $frm_id="frm_ere_insert_formuseElectronic";

        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");
        $user_id=$wddx_user_id??$user_id;

        if(isset($v[0])){
            $create_date=$v[0][0]['create_date'];
            $req_by=$v[0][0]['request_to'];
            $user_id=$req_by;
            $q=DB::select("select s.name,p.name as position,d.name as dept,s.id_number from ma_user s join ma_position p on p.id=s.ma_position_id join ma_company_dept d on d.id=s.ma_company_dept_id where s.id=$user_id");
            $r=ere_get_assoc::assoc_($q)[0];
           if($r){
                $pos=$r['position'];
                $name=$r['name'];
                $dept=$r['dept'];
                $id_number=$r['id_number'];
            }
            $q=DB::select("select s.name from ma_user s where s.id=".$v[0][0]['request_by']);
            $r=ere_get_assoc::assoc_($q)[0];
            $req_by=$r['name'];
            if(isset($v[1])){
                $use=$v[1];
            }else{
                $use=array();
            }
        }
        $q=DB::select("SELECT id, name, name_kh FROM public.e_request_use_electronic_use where parent_id is null;");
        $r=ere_get_assoc::assoc_($q);
        $useof=$r;

        $q=DB::select("select s.id, s.name from ma_user s
        join ma_position p on p.id=s.ma_position_id
        where p.ma_group_id <>1 and s.id_number is not null order by s.name");
        $r=ere_get_assoc::assoc_($q);
        $req=$r;

        $val=get_defined_vars();
        return view('e_request.formuseElectronic',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}