<?php
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
	$via=$_POST['via'];
	$object=$_POST['object'];
	$reason=$_POST['reason'];
	$form_id=$_SESSION['form_id'];
	$sql="SELECT public.insert_e_request_employment_certificate(
		$user_id,
		'$via',
		'$object',
		'$reason',
		$form_id
	)";
	$q=$con->prepare($sql);
	$q->execute();
}
if($q->rowCount()>0){
    header("Location: ../Dashboard.php");
}
?>