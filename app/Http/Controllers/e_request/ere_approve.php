<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ere_approve extends Controller
{
    public function test(){
        dump(perms::get_module());
        DB::select($sql);
        $result = array_map(function ($value) {
            return (array)$value;
        }, $result);
    }
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    // session_start();
    // include_once ("../connection/DB-connection.php");
    // $db = new Database();
    // $con=$db->dbConnection();
    // $user_id=1;
    // if(isset($_SESSION['userid'])){
    //     $user_id=$_SESSION['userid'];
    // }else{
    //     return;
    // }
    // $sql="SELECT public.insert_e_request_detail(
    //     ".$_POST['erid'].",
    //     $user_id,
    //     '".$_POST['type']."',
    //     '".$_POST['comment']."'
    // )";
    // $q=$con->prepare($sql);
    // $q->execute();
    // if($q->rowCount()>0){
    //     echo "succ";
    // }
}