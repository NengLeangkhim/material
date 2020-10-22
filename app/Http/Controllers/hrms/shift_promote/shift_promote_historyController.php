<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\shift_promote\management_promoteModel; 


class shift_promote_historyController extends Controller
{


    public function all_staff_promote(){
        $all_promote = management_promoteModel::all_shift_promote();
        $x = 0;
        $staff_was_promote = '';
        if(count($all_promote) > 0){
            $get_array[$x] = $all_promote[0];
            for($i=0; $i< count($all_promote); $i++){
                if($get_array[$x]->ma_user_id != $all_promote[$i]->ma_user_id){                    
                    $r = management_promoteModel::all_shift_promoteByID($all_promote[$i]->ma_user_id);
                    if(count($r) > 1){
                        $get_array[$x+=1] = $all_promote[$i];
                        $data[]  = $all_promote[$i];
                    }
                }
            }  
            // dd($staff_was_promote);
            $staff_was_promote = $data;
        }      
        return view('hrms/shift_promote/management_view_promote_history/shift_promote_staff_history', ['allstaffpromote' => $staff_was_promote]);

    }



    // get all info staff promote by staff id
    public function all_staff_promoteByID(){

        if( isset($_GET['staffid'])){
            $id = $_GET['staffid'];
            $all_promote2 = management_promoteModel::all_shift_promoteByID($id); 
            if(count($all_promote2) > 1){
                return view('hrms/shift_promote/management_view_promote_history/shift_history_listByID', ['allshiftByID' => $all_promote2]);
            }
            // dump($all_promote2);
        }
    
    }
    // end function






    // get all info staff promote by staff id
    public function view_shift_history_detail(){  
        if(isset($_GET['number']) && isset($_GET['staffid']) ){
            $id = $_GET['staffid'];
            $num = $_GET['number'];
            $all_promote3 = management_promoteModel::all_shift_promoteByID($id); 
            // if(count($all_promote3) > 1){

            //     if(($num+1) != count($all_promote3)){
            //         for($i=0; $i<count($all_promote3); $i++){
            //             if($num == $i){
            //                 $current_position = $all_promote3[$i]; 
            //             }
            //             if(($num+1) == $i){
            //                 $old_position = $all_promote3[$i];
            //             }
            //         }
            //     }else{
            //         // echo 'this need get data from base salary11';
            //         // $r = management_promoteModel::all_shift_promoteByIdFromPayroll($id);
            //         // dd($r[0]->create_date);
            //     }

            // }else{
            //     // echo 'this need get data from base salary22';
            //         // $r = management_promoteModel::all_shift_promoteByIdFromPayroll($id);
                    
            //     // dd($r->);
            // }
            if(count($all_promote3) > 0){
                for($i=0; $i<count($all_promote3); $i++){
                    if($num == $i){
                        $current_position = $all_promote3[$i]; 
                    }
                    if(($num+1) == $i){
                        $old_position = $all_promote3[$i];
                    }
                }
            }

            return view('hrms/shift_promote/management_view_promote_history/shift_history_listDetail', compact('current_position','old_position'));
        }

    }
    // end function



















}
