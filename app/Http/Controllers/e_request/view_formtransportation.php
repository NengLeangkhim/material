<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_formtransportation extends Controller
{
    function formtransportation(){
        $user_id=0;
        session_start();
        if(isset($_SESSION['userid'])){
            $user_id=$_SESSION['userid'];
        }else{
            return;
        }
        $_SESSION['form_id']=$_GET['id'];
        $add='<th class="bpd" style="text-align:center; width:90px" ><button type="button" name="add" id="add" class="btn btn-success" onclick="addrow_vehicle()">Add</button></th>';
        $route="ere_insert_formtransportation";
        $frm_id="frm_ere_insert_formtransportation";

        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");
        if(isset($v[0])){
            $create_date=$v[0][0]['create_date'];
            $req_by=$v[0][0]['request_by'];
            $q=DB::select("select name from staff where id=$req_by");
            $req_by=ere_get_assoc::assoc_($q)[0];
        }
        if(isset($v[1])){
            $row=$v[1];
        }

        $add=$wddx_add??$add;
        $user_id=$wddx_user_id??$user_id;
        $val=get_defined_vars();
        return view('e_request.formtransportation',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}