<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ("../connection/DB-connection.php");
include_once ("util.php");
$db = new Database();
$con=$db->dbConnection();
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
?>