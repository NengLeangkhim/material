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
$db = new Database();
$con=$db->dbConnection();
$user_id=null;
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
    return;
}

if(isset($_POST['approve'])){
	$sql="SELECT public.insert_e_request_detail(
		".$_POST['erid'].",
		$user_id,
		'approve',
		'".$_POST['comment']."'
	)";
	$q=$con->prepare($sql);
	$q->execute();
}else if(isset($_POST['pending'])){
	$sql="SELECT public.insert_e_request_detail(
		".$_POST['erid'].",
		$user_id,
		'pending',
		'".$_POST['comment']."'
	)";
	$q=$con->prepare($sql);
	$q->execute();
}else if(isset($_POST['reject'])){
	$sql="SELECT public.insert_e_request_detail(
		".$_POST['erid'].",
		$user_id,
		'reject',
		'".$_POST['comment']."'
	)";
	$q=$con->prepare($sql);
	$q->execute();
}
else{
    $form_id=$_SESSION['form_id'];
    $useof=$_POST['use'];
    $q=$con->prepare("select id_number from staff where id=".$_POST['req_to']);
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
    $id_number=$r['id_number'];
    $sql="SELECT public.insert_e_request_use_electronic(
        '$id_number',
        $user_id,
        ".$_POST['req_to'].",
        $form_id
    ) as id";
    $q=$con->prepare($sql);
    $q->execute();
    $id=$q->fetch(PDO::FETCH_ASSOC)['id'];
    foreach($useof as $rr){
        if($rr=='6'&&(!empty($_POST['useof_other']))){
            $sql="INSERT INTO public.e_request_use_electronic_use(
                name, parent_id)
                VALUES ('".$_POST['useof_other']."', $rr) returning id;";
            $q=$con->prepare($sql);
            $q->execute();
            $r=$q->fetch(PDO::FETCH_ASSOC);
            $rr=$r['id'];
        }
        $sql="SELECT public.insert_e_request_use_electronic_detail(
            $id,
            $rr
        )";
        $q=$con->prepare($sql);
        $q->execute();
    }

}
if($q->rowCount()>0){
    header("Location: ../Dashboard.php");
}
?>