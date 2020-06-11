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
include_once ("../controller/util.php");
$db = new Database();
$con=$db->dbConnection();
$user_id=null;
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
	return;
}
//variable
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

	//variable
	$fdate=(!empty($_POST['finish_date']))?"'".to_pgdate($_POST['finish_date'])." ".to_24($_POST['finish_time'])."'":'null';
    echo $sql="SELECT public.insert_e_request_equipment_request_form(
		$user_id,
		'".$_POST['technician_name']."',
		'".$_POST['customer_name']."',
		'".$_POST['customer_account_name']."',
		'".$_POST['customer_address']."',
		'".$_POST['customer_phone']."',
		'".$_POST['customer_email']."',
		'".$_POST['connection']."',
		'".$_POST['speed']."',
		'".$_POST['pop']."',
		".$fdate.",
		'".$_POST['note']."',
		$form_id
	) as id";
    $q=$con->prepare($sql);
	$q->execute();
	$r=$q->fetch(PDO::FETCH_ASSOC);
	$id=$r['id'];

	foreach($_POST['product_name'] as $key=>$value){
		if(!empty($value)){
			echo $sql="SELECT public.insert_e_request_equipment_request_form_detail(
				$id,
				'$value',
				'".$_POST['qty'][$key]."',
				'".$_POST['price'][$key]."',
				'".$_POST['type'][$key]."',
				'".$_POST['modal'][$key]."'
			)";
			$q=$con->prepare($sql);
			$q->execute();
		}
	}

}
if($q->rowCount()>0){
    header("Location: ../Dashboard.php");
}
?>