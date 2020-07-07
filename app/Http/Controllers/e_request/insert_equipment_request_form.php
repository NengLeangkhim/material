<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_equipment_request_form extends Controller{
	public function in_equipment_request_form(){
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

			//variable
			$fdate=(!empty($_POST['finish_date']))?"'".util::to_pgdate($_POST['finish_date'])." ".util::to_24($_POST['finish_time'])."'":'null';
			 $sql="SELECT public.insert_e_request_equipment_request_form(
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
			$q=DB::select($sql);
			$r=ere_get_assoc::assoc_($q)[0];
			$id=$r['id'];

			foreach($_POST['product_name'] as $key=>$value){
				if(!empty($value)){
					 $sql="SELECT public.insert_e_request_equipment_request_form_detail(
						$id,
						'$value',
						".$_POST['qty'][$key].",
						".$_POST['price'][$key].",
						'".$_POST['type'][$key]."',
						'".$_POST['modal'][$key]."',
                        $user_id
                    )";
					$q=DB::select($sql);
				}
			}

		}
	}
}
?>
