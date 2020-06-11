<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ("../connection/DB-connection.php");
include_once ("util.php");
include_once ("get_path.php");
$db = new Database();
$con=$db->dbConnection();
$user_id=null;
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
	return;
}
echo $url_path;
$t=time();
if($_FILES["_img"]["error"]==4){
    echo 'error';
}else{
    $file_path=$img_path.$t.basename($_FILES["_img"]["name"]);
    $p=$url_path.$file_path;
    $file_path=str_replace("'","''",$file_path);
    if(move_uploaded_file($_FILES["_img"]["tmp_name"],$p)){
      $sql=" SELECT public.update_staff_img(
                $user_id,
                '../$file_path'
            )";
        $q=$con->prepare($sql);
        $q->execute();
        if($q->rowCount()>0){
            echo 'succ';
        }else{
            echo 'insert fail';
        }
    }else{
        echo 'fail';
    }
}

?>