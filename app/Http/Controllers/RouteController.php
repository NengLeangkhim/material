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
                $head=DB::select("select s.name,s.name_kh,s.id_number,s.image ,cdm.type,p.name as position,s.contact
                from company_dept_manager cdm
                join staff s on s.position_id=cdm.position_id
                join position p on p.id=s.position_id
                where (cdm.type='mid' or cdm.type='top') and s.status='t'
                and s.company_dept_id=(select company_dept_id from staff where id=$user_id)");
                $uself=DB::select("select s.name,s.name_kh,s.id_number,s.image,p.name as position,s.contact from staff s join position p on p.id=s.position_id where s.id=$user_id");
                $dept=DB::select("select name from company_dept where id=(select company_dept_id from staff where id=$user_id)");
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
