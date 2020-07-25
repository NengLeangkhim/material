<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\shift_promote\management_promoteModel; 

class shift_promote_reportController extends Controller
{
    



 

    

    public function promote_report_view(){
        if(isset($_GET['_from']) && isset($_GET['_to'])){
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
            $promote_report = management_promoteModel::get_promoteByDate($date_from, $date_to);
            return view('hrms\shift_promote\promote_report\shift_promote_report_show', ['promote_report' => $promote_report]);
        }
        
    }


 
    



    public function promote_report_view_detail(){
        if(isset($_GET['staffid']) && isset($_GET['date'])){
            $id = $_GET['staffid'];
            $date = $_GET['date'];
            $r =  management_promoteModel::promote_report_detailByID_Date($id,$date);
            return view('hrms\shift_promote\promote_report\shift_promote_report_detail', ['report_detail' => $r]);

        }   
        
    }

















}
