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
    $sql="SELECT public.insert_e_request_employment_biography(
        '".$_POST['name']."',
        '".$_POST['name_kh']."',
        '".to_pgdate($_POST['birth_date'])."',
        ".$_POST['height'].",
        '".$_POST['nation']."',
        '".$_POST['nationality']."',
        '".$_POST['religion']."',
        '".$_POST['marital']."',
        '".$_POST['birth_village']."',
        '".$_POST['birth_commune']."',
        '".$_POST['birth_district']."',
        '".$_POST['birth_province']."',
        '".$_POST['phone']."',
        '".$_POST['education']."',
        '".$_POST['major']."',
        '".$_POST['school']."',
        '".to_pgdate($_POST['school_start_date'])."',
        '".to_pgdate($_POST['school_end_date'])."',
        '".$_POST['language_skill']."',
        $user_id,
        $form_id
    ) as id";
    $q=$con->prepare($sql);
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
    $id=$r['id'];
        $sql="SELECT public.insert_e_request_employment_biography_spouse(
            $id,
            '".$_POST['spouse_name']."',
            '".to_pgdate($_POST['spouse_birth_date'])."',
            '".$_POST['spouse_nationality']."',
            '".$_POST['spouse_nation']."',
            '".$_POST['spouse_religion']."',
            '".$_POST['spouse_birth_place']."',
            '".$_POST['spouse_current_address']."',
            '".$_POST['spouse_phone']."',
            '".$_POST['spouse_work_place']."',
            '".$_POST['spouse_phone']."',
            '".$_POST['spouse_id_number']."',
            '".$_POST['children_count']."'
        )";
        $q=$con->prepare($sql);
        $q->execute();
        foreach($_POST['relate_name'] as $key=>$re_name){
            if(!empty($re_name)){
                $sql="SELECT public.insert_e_request_employment_biography_relative(
                    $id,
                    '$re_name',
                    '".$_POST['relate_id_number'][$key]."',
                    ".$_POST['relate_position'][$key].",
                    ".$_POST['relate_dept'][$key].",
                    '".$_POST['relation'][$key]."'
                )";
                $q=$con->prepare($sql);
                $q->execute();
            }
        }
        $sql="SELECT public.insert_e_request_employment_biography_parent(
            $id,
            '".$_POST['father_name']."',
            'male',
            '".$_POST['father_age']."',
            '".$_POST['father_stat']."',
            '".$_POST['father_job']."',
            '".$_POST['father_current_address']."',
            '".$_POST['father_phone']."'
        )";
        $q=$con->prepare($sql);
        $q->execute();

        $sql="SELECT public.insert_e_request_employment_biography_parent(
            $id,
            '".$_POST['mother_name']."',
            'female',
            '".$_POST['mother_age']."',
            '".$_POST['mother_stat']."',
            '".$_POST['mother_job']."',
            '".$_POST['mother_current_address']."',
            '".$_POST['mother_phone']."'
        )";
        $q=$con->prepare($sql);
        $q->execute();

        foreach($_POST['child_name'] as $key=>$child_name){
            if(!empty($child_name)){
                $sql="SELECT public.insert_e_request_employment_biography_children(
                    $id,
                    '$child_name',
                    '".to_pgdate($_POST['child_birth_date'][$key])."',
                    '".$_POST['child_marital'.$key]."',
                    '".$_POST['child_sex'][$key]."',
                    '".$_POST['child_job'][$key]."'
                )";
                $q=$con->prepare($sql);
                $q->execute();
            }
        }
        $sql="SELECT public.insert_e_request_employment_biography_address(
            $id,
            null,
            '".$_POST['group']."',
            '".$_POST['home_number']."',
            '".$_POST['street']."',
            '".$_POST['commune']."',
            '".$_POST['village']."',
            '".$_POST['district']."',
            '".$_POST['province']."'
        )";
        $q=$con->prepare($sql);
        $q->execute();

        $sql="SELECT public.insert_e_request_employment_biography_(
            $id,
            '".$_POST['carrer']."',
            ".$_POST['position'].",
            ".$_POST['dept'].",
            '".$_POST['id_number']."',
            '".to_pgdate($_POST['start_work_date'])."',
            '".$_POST['id_card_r_passport']."',
            '".to_pgdate($_POST['id_card_r_passport_date'])."',
            '".$_POST['family_book_number']."',
            '".to_pgdate($_POST['family_book_number_date'])."',
            ''
        )";//".$_POST['image']."
        $q=$con->prepare($sql);
        $q->execute();
}
// $q=$con->prepare($sql);
// $q->execute();
if($q->rowCount()>0){
    header("Location: ../Dashboard.php");
}
?>