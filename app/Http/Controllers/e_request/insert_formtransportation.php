<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_formtransportation extends Controller{
	function in_formtransportation(){

		if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
			$sql="SELECT public.insert_e_request_vehicle_usage(
				$user_id,$form_id) as id";
			$id=0;
			$q=DB::select($sql);

			$r=ere_get_assoc::assoc_($q)[0];
			$id=$r['id'];
			foreach($_POST['date'] as $key=>$value){
			 $sql="SELECT public.insert_e_request_vehicle_usage_detail(
					$id,
					'".util::to_pgdate($value)."',
					'".util::to_pgdate($value) ." ".util::to_24($_POST['departure_time'][$key])."',
					'".util::to_pgdate($value) ." ".util::to_24($_POST['return_time'][$key])."',
					'".$_POST['destination'][$key]."',
					'".$_POST['objective'][$key]."',
					'".$_POST['other'][$key]."'
				)";
				$q=DB::select($sql);
			}
		}
	}
}
?>