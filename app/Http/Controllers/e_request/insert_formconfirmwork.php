<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_formconfirmwork extends Controller{
	function in_formconfirmwork(){
		session_start();
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
			$q=DB::select($sql);
		}
	}
}
?>