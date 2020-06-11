<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    public function login(){
        $id_=str_replace("'","''",$_POST['username']);
        $pa_=$this->en($_POST['password']);
        $q=DB::select("SELECT public.exec_check_password_main_app('$id_','$pa_') as id");
        // dump($q);
        $user=$q[0]->id;
        if($user<0){
            return view('login',['message'=>'Wrong Username and Password']);
        }elseif($user==0){
            return view('login',['message'=>'BLOCKED!']);
        }else{
            // return view('login');
            session_start();
            $_SESSION['userid']=$user;
            if(perms::check_perm()){
                $_SESSION['module']=perms::get_module();
                // header("Location:/");
                return view('index');
            }else{
                return view('login',['message'=>'Permission Denied!']);
            }
        }
    }
    public function logout(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        return view('login');
    }
    public function check_login(){
        if(perms::check_perm()){
            $_SESSION['module']=perms::get_module();
            return view('start');
        }else{
            return view('login',['message'=>'Permission Denied!']);
        }
    }
    private function en($st){
        $r="";
        for($i=0;$i<strlen($st);$i++){
            $r.=ord(substr($st,$i,1));
        }
        $rr=md5($r);
        return $rr;
    }
}
