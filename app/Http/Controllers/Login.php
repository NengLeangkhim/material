<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    public function login(Request $request){
        $userController = new UserController();
        $request->request->add(['email'=>$request->username]);
        $result = $userController->authenticate($request);
        if($result->getStatusCode() == 200){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['token']=$result->getData()->token;
            $userid = Auth::id();
            $_SESSION['userid']=$userid;
            if(perms::check_perm()){
                $_SESSION['module']=perms::get_module();
                return redirect('/');//to prevent /login or /logout
            }else{
                return view('login',['message'=>'Permission Denied!','old'=>$request->username]);
            }
        } else if($result->getStatusCode() == 403){
            // User status = false or isDeleted = true
            return view('login',['message'=>'BLOCKED!','old'=>$request->username]);
        } else {
            return view('login',['message'=>'Wrong Username and Password','old'=>$request->username]);
        }

        // $id_=str_replace("'","''",$_POST['username']);
        // $pa_=en_de::aes_en($_POST['password'],'1941a39eed11fdef7f9de6d597df9f4b');
        // $q=DB::select("SELECT public.exec_check_password('$id_','$pa_') as id");
        // // dump($q);
        // $user=$q[0]->id;
        // if($user<0){
        //     return view('login',['message'=>'Wrong Username and Password','old'=>$id_]);
        // }elseif($user==0){
        //     return view('login',['message'=>'BLOCKED!','old'=>$id_]);
        // }else{
        //     // return view('login');
        //     if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        //     $_SESSION['userid']=$user;
        //     if(perms::check_perm()){
        //         $_SESSION['module']=perms::get_module();
        //         return redirect('/');//to prevent /login or /logout
        //     }else{
        //         return view('login',['message'=>'Permission Denied!','old'=>$id_]);
        //     }
        // }

    }

    public function logout(){
        if (session_status() == PHP_SESSION_NONE) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
        session_destroy();
        return view('login');
    }

    public function check_login(){
        if(perms::check_perm()){
            $_SESSION['module']=perms::get_module();
            return view('start');
        }else{
            return view('login',['message'=>'Permission Denied!','old'=>$id_]);
        }
    }

}
