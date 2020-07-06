<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\util;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class insert_formleave extends Controller{
	function in_formleave(){
		if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
			$q=DB::select($sql);
		}else if(isset($_POST['pending'])){
			$sql="SELECT public.insert_e_request_detail(
				".$_POST['erid'].",
				$user_id,
				'pending',
				'".$_POST['comment']."'
			)";
			$q=DB::select($sql);
		}else if(isset($_POST['reject'])){
			$sql="SELECT public.insert_e_request_detail(
				".$_POST['erid'].",
				$user_id,
				'reject',
				'".$_POST['comment']."'
			)";
			$q=DB::select($sql);
		}
		else{
			$form_id=$_SESSION['form_id'];
			$kindof=$_POST['kindof'];
			$date_from=util::to_pgdate($_POST['start_date']).' '.util::to_24($_POST['start_hour']);
			$date_to=util::to_pgdate($_POST['end_date']).' '.util::to_24($_POST['end_hour']);
			$date_resume=util::to_pgdate($_POST['date_resume']);
			$numer_date_leave=$_POST['number_of_leave'];
			$reason=$_POST['reason'];
			if(isset($_POST['transfer_to'])){
				$transfer=$_POST['transfer_to'];
			}
			$transfer=(empty($transfer))?'null':$transfer;
			//variable
		    $sql="select insert_e_request_leave_application_form
			($user_id,$kindof,'$date_from','$date_to','$date_resume',$numer_date_leave,$transfer,'$reason',$form_id)";
			$q=DB::select($sql);
		}
	}
}

?>