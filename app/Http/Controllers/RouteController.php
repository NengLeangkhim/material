<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function home(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){
            if(perms::check_perm()){
                $_SESSION['module']=perms:: get_module();
                return view('start');
            }else{
                return view('login');
            }
        }else{
            return view('login');
        }
    }
    public function welcome(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){
            if(perms::check_perm()){
                // $_SESSION['module']=perms:: get_module();
                $user_id=$_SESSION['userid'];
                $head=DB::select("SELECT concat(s.first_name_en,' ',s.last_name_en) as name, concat(s.first_name_kh,' ',s.last_name_kh) as name_kh,s.id_number,s.image ,cdm.type,p.name as ma_position,s.contact
                from ma_company_dept_manager cdm
                join ma_user s on s.ma_position_id=cdm.ma_position_id
                join ma_position p on p.id=s.ma_position_id
                where 't'
				and cdm.id=(select get_dept_manager($user_id))
				and cdm.type<>'normal'
				and s.status='t'");
                $uself=DB::select("SELECT concat(s.first_name_en,' ',s.last_name_en) as name, concat(s.first_name_kh,' ',s.last_name_kh) as name_kh,s.id_number,s.image,p.name as ma_position,s.contact from ma_user s join ma_position p on p.id=s.ma_position_id where s.id=$user_id");
                $dept=DB::select("SELECT name from ma_company_dept where id=(select ma_company_dept_id from ma_user where id=$user_id)");
                return view('welcome',compact("head","uself","dept"));
            }else{
                return view('login');
            }
        }else{
            return view('login');
        }
    }
    public function check(){
        if (DB::connection('myDamnDbConnection')->getDatabaseName())
        {
            return 'Connected to the DB: ' . DB::connection('myDamnDbConnection')->getDatabaseName();
        }
    }
}
