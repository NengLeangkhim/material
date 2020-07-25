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
        $get_array[] = ''; 
        for($i=0; $i< count($all_promote); $i++){
            $get_array[0] = $all_promote[0];
            if($get_array[$x]->staff_id != $all_promote[$i]->staff_id){
                $get_array[$x+=1] = $all_promote[$i];
                
            }
        }        

        return view('hrms\shift_promote\management_view_promote_history\shift_promote_staff_history', ['allstaffpromote' => $get_array]);
    }



    // get all info staff promote by staff id
    public function all_staff_promoteByID(){

        if( isset($_GET['staffid'])){
            $id = $_GET['staffid'];
            $all_promote2 = management_promoteModel::all_shift_promoteByID($id); 
        }
        return view('hrms\shift_promote\management_view_promote_history\shift_history_listByID', ['allshiftByID' => $all_promote2]);
    
    }
    // end function






    // get all info staff promote by staff id
    public function view_shift_history_detail(){  
        if(isset($_GET['number']) && isset($_GET['staffid']) ){
            $id = $_GET['staffid'];
            $num = $_GET['number'];
            $all_promote3 = management_promoteModel::all_shift_promoteByID($id); 
            for($i=0; $i<count($all_promote3); $i++){
                if( $num == $i){
                    $r = $all_promote3[$i]; 
                }

            }
            return view('hrms\shift_promote\management_view_promote_history\shift_history_listDetail', ['his_listDetail' => $r]);

        }

    }
    // end function



















}
