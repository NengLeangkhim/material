<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\shift_promote\management_promoteModel; 

class shift_promote_reportController extends Controller
{
    


    // function to show select shift promote report
    public function selectReportPromote(){
        $dept = management_promoteModel::getDept();
        // dd($r);
        if(count($dept) > 0){

            return view('hrms.shift_promote.promote_report.shift_promote_report',compact('dept'));
        }
        echo 'no data query';
    }


    //function for get date from & date to & department to search shift promote 
    public function promote_report_view(){
        if(isset($_GET['_from']) && isset($_GET['_to']) && isset($_GET['dept_id'])){
            $deptID = $_GET['dept_id'];
            // echo $deptID; exit;
            $date_from = $_GET['_from'];
            if(empty($date_from)){
                $date_from='2010-01-01';
            }
            $date_to = $_GET['_to'];
            if(empty($date_to)){
                $date_to=date("Y-m-d");
            }
            if( $date_to<$date_from){
                $f=$date_from;
                $date_from= $date_to;
                $date_to=$f;
            }

            $promote_report = management_promoteModel::get_promoteByDate($date_from, $date_to, $deptID);
            
            if(count($promote_report) > 0){
                foreach ($promote_report as $key => $val) {
                    if($val->old_position_id != ''){
                        $old_position[$key] = management_promoteModel::getPositionById($val->old_position_id);
                    }else{
                        $old_position[$key] = '';
                    }
                }
            }else{
                $promote_report = 0;
                $old_position = 0;
            }
            return view('hrms/shift_promote/promote_report/shift_promote_report_show', ['promote_report' => $promote_report,'old_position' => $old_position]);
        }
        
    }


 
    



    public function promote_report_view_detail(){
        if(isset($_GET['staffid']) && isset($_GET['date'])){
            $id = $_GET['staffid'];
            $date = $_GET['date'];
            $r =  management_promoteModel::promote_report_detailByID_Date($id,$date);
            if(count($r) > 0){
                if($r[0]->old_position_id != ''){
                    $old_position = management_promoteModel::getPositionById($r[0]->old_position_id);
                }else{
                    $old_position = "";
                }
                // $old_position = management_promoteModel::getPositionById($r[0]->old_position_id);
            }
            // dd($old_position[0]->old_position);
            return view('hrms/shift_promote/promote_report/shift_promote_report_detail', ['report_detail' => $r,'old_position'=>$old_position]);

        }   
        
    }

















}
