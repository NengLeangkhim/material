<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ("../connection/DB-connection.php");
include_once ("../controller/util.php");
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
}else{
    $form_id=$_SESSION['form_id'];
    $type=$_POST['type'];
    $e_request_id=(empty($_POST['e_request_id']))?'null':$_POST['e_request_id'];
    if($type=='request'){
        $date=to_pgdate($_POST['request_date']);
        $start_time=$date.' '.to_24($_POST['time_req_from']);
        $end_time=$date.' '.to_24($_POST['time_req_to']);
        $rest_time_start=$date.' '.to_24($_POST['time_req_from_rest']);
        $rest_time_end=$date.' '.to_24($_POST['time_req_to_rest']);
        $actual_work_time=$_POST['req_work_time'];
        $reason=$_POST['req_reason'];
    }else if ($type=='actual'){
        $date=to_pgdate($_POST['actual_date']);
        $start_time=$date.' '.to_24($_POST['time_act_from']);
        $end_time=$date.' '.to_24($_POST['time_act_to']);
        $rest_time_start=$date.' '.to_24($_POST['time_act_from_rest']);
        $rest_time_end=$date.' '.to_24($_POST['time_act_to_rest']);
        $actual_work_time=$_POST['act_work_time'];
        $reason=$_POST['act_reason'];
    }
    $sql="SELECT public.insert_e_request_overtime(
        $user_id,
        $e_request_id,
        $form_id
    ) as id";
    $id=1;
    $q=$con->prepare($sql);
    $q->execute();
    if($q->rowCount()>0){
        $r=$q->fetch(PDO::FETCH_ASSOC);
        $id=$r['id'];
        $sql="SELECT public.insert_e_request_overtime_detail(
            $id,
            '$date',
            '$start_time',
            '$end_time',
            $actual_work_time,
            '$rest_time_start',
            '$rest_time_end',
            '$reason',
            '$type'
        )";
        $q=$con->prepare($sql);
        $q->execute();
    }
}
if($q->rowCount()>0){
    header("Location: ../Dashboard.php");
}
?>