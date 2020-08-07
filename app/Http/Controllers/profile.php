<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\e_request\ere_get_assoc;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profile extends Controller
{
    function get_profile(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['userid'])){
            $user_id=$_SESSION['userid'];
        }else{
            return;
        }
        if(perms::check_perm_module('PRO_07')){//module codes
            $q=DB::select("select s.name,s.name_kh,s.sex, s.email,s.contact,s.address,p.name as ma_position,cd.company,cd.branch,s.create_Date,s.image,s.id_number,s.office_phone
                            from ma_user s
                            join ma_position p on p.id=s.ma_position_id
                            join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=$user_id");
            $r=ere_get_assoc::assoc_($q)[0];
            $pro=$r;
            return view('profile',compact("pro"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
        }else{
            return view('no_perms');
        }
    }
}