<?php
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
$form_id=$_SESSION['form_id'];

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
    $sql="SELECT public.insert_e_request_vehicle_usage(
        $user_id,$form_id) as id";
    $id=0;
    $q=$con->prepare($sql);
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
    $id=$r['id'];
    foreach($_POST['date'] as $key=>$value){
       echo $sql="SELECT public.insert_e_request_vehicle_usage_detail(
            $id,
            '".to_pgdate($value)."',
            '".to_pgdate($value) ." ".to_24($_POST['departure_time'][$key])."',
            '".to_pgdate($value) ." ".to_24($_POST['return_time'][$key])."',
            '".$_POST['destination'][$key]."',
            '".$_POST['objective'][$key]."',
            '".$_POST['other'][$key]."'
        )";
        $q=$con->prepare($sql);
        $q->execute();
    }
}
// $q=$con->prepare($sql);
// $q->execute();
if($q->rowCount()>0){
    header("Location: ../Dashboard.php");
}
?>