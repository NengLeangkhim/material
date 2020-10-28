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
            $r = management_promoteModel::get_shift_promoteByID($userid);
            // dd($r);
            // if(count($r) > 2){
            //     $data = $r;
            // }else{
            //     $data = '';
            // }
            return view('hrms/shift_promote/staff_view_promote/shift_promote_for_staff_view', ['shift_promoteByID' => $r]);

        }


        // function staff to view their promote
        public function staff_view_detail(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_GET['id'])){
                    $shift_id = $_GET['id'];
                    $userid = $_SESSION['userid'];
                    $r = management_promoteModel::get_promote_staff_detail($shift_id);
                    if(count($r) > 0){
                        if($r[0]->old_position_id != ''){
                            $old_pos = management_promoteModel::getPositionById($r[0]->old_position_id);
                        }else{
                            $old_pos = '';
                        }

                    }
                    // dd($old_pos);
                    return view('hrms/shift_promote/staff_view_promote/staff_view_promote_detail', ['promote_detail' => $r,'old_position'=>$old_pos]);
            }
        }








}
