<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class change_password extends Controller{
    public function change_pass(){
    session_start();
    if(isset($_SESSION['userid'])){
        $user_id=$_SESSION['userid'];
    }else{
        return;
    }
    $pass='';
    if(isset($_POST['_oldpass'])){
        $pass=$_POST['_oldpass'];
        $q=$con->prepare("select username from staff_detail where status='t' and staff_id=$user_id and password='".en($pass)."'");
        $q->execute();
        echo json_encode($q->fetch(PDO::FETCH_ASSOC));
    }
    if(isset($_POST['_newpass'])){
        $pass=$_POST['_newpass'];
        $q=$con->prepare("SELECT public.exec_change_password(
            $user_id,
            '".en($pass)."'
        )");
        $q->execute();
        echo json_encode($q->fetch(PDO::FETCH_ASSOC));
    }
        }
}