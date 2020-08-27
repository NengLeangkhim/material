<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\shift_promote\management_promoteModel; 

class staff_view_promoteController extends Controller
{
        /* function to select staff was promote by staff id */
        public function view_promoteByID(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            // $userid = 262;
            $r = management_promoteModel::get_shift_promoteByID($userid);
            return view('hrms/shift_promote/staff_view_promote/shift_promote_for_staff_view', ['shift_promoteByID' => $r]);
            // return view('hrms\shift_promote\staff_view_promote\staff_view_promote_detail', ['shift_promoteByID' => $r]);
        }


        // function staff to view their promote
        public function staff_view_detail(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            // $userid = 262;
            $r = management_promoteModel::get_promote_staff_detail($userid);
            // print_r($r);
            // echo count($r)-1;
            return view('hrms/shift_promote/staff_view_promote/staff_view_promote_detail', ['view_promote_detail' => $r]);
        }








}
