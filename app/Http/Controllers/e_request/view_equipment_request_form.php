<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view_equipment_request_form extends Controller
{
    function equipment_request_form(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['form_id']=$_GET['id'];
        $add='<th class="style_td"><button id="" onclick="addrow_requsest()">Add Row</button></th>';
        $route="ere_insert_equipment_request_form";
        $frm_id="frm_ere_insert_equipment_request";
        $val=get_value_to_view::get_val_view($route,$frm_id);//insert route and form id
        extract($val['val'], EXTR_PREFIX_SAME, "wddx");

        $add=$wddx_add??$add;
        $user_id=$wddx_user_id??$user_id;
        $val=get_defined_vars();
        return view('e_request.equipment_request_form',compact("val"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    }
}