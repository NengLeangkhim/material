<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\e_request\ere_get_assoc;

class change_password extends Controller{
    public function change_pass(){
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    if(isset($_SESSION['userid'])){
        $user_id=$_SESSION['userid'];
    }else{
        return;
    }
    $pass='';
    if(isset($_POST['_oldpass'])){
        $pass=$_POST['_oldpass'];
        $q=DB::select("select username from staff_detail where status='t' and ma_user_id=$user_id and password='".en_de::aes_en($pass,'1941a39eed11fdef7f9de6d597df9f4b')."'");
        if(isset(ere_get_assoc::assoc_($q)[0])){
            echo json_encode(ere_get_assoc::assoc_($q)[0]);
        }
    }
    if(isset($_POST['_newpass'])){
        $pass=$_POST['_newpass'];
        $q=DB::select("SELECT public.exec_change_password(
            $user_id,
            '".en_de::aes_en($pass,'1941a39eed11fdef7f9de6d597df9f4b')."'
        )");
        if(isset(ere_get_assoc::assoc_($q)[0])){
            echo json_encode(ere_get_assoc::assoc_($q)[0]);
        }
    }
        }
}