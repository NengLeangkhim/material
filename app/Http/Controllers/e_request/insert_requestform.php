<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ("../connection/DB-connection.php");
$db = new Database();
$con=$db->dbConnection();
$user_id=1;
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

    $sql="SELECT public.insert_e_request_requestform(
        '".$_POST['no']."',
        $user_id,
        '".$_POST['to']."',
        '".$_POST['subject']."',
        $form_id
    ) as id";
    $id=0;
    $q=$con->prepare($sql);
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
    $id=$r['id'];
    foreach($_POST['description'] as $key=>$value){
        $sql="SELECT public.insert_e_request_requestform_detail(
            $id,
            '$value',
            ".$_POST['qty'][$key].",
            '".$_POST['other'][$key]."',
            ".$_POST['receiver'][$key]."
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