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
            // $get_arr[] = '';
            // $i = 0;
            // foreach ($all_promote2 as $key => $val) {
            //     if($val->staff_id == $id){
            //         $get_arr[$i] = $val;
            //         $i+=1;
            //     }
                
            // }
            
        }
        // print_r($all_promote2);
        
        return view('hrms\shift_promote\management_view_promote_history\shift_history_listByID', ['allshiftByID' => $all_promote2]);
    
        
    }






    // get all info staff promote by staff id
    public function view_shift_history_detail(){
        echo "out isset of id & num";
        echo $_GET['number'];
        if(isset($_GET['number']) ){
            echo "in isset 213213";
        }

    }



















}
