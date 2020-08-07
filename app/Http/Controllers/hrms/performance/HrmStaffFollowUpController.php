<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;
use App\model\hrms\performance\ModelHrmStaffFollowUp;
use App\model\hrms\performance\ModelHrmPerformSchedule;
class HrmStaffFollowUpController extends Controller
{
    //
    // function Show Table Follow Up //
    public function HrmIndexPerformFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090702')){//module code list data tables id=97
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->group_id;
                $dept = $row->ma_company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $follow_up = ModelHrmStaffFollowUp::hrm_get_tbl_follow_up_top(); //query database
                
            }else if($group==4){//permission each departement
                $follow_up = ModelHrmStaffFollowUp::hrm_get_tbl_follow_up_dept($dept); //query database
                
            }else{//permission check user
                $follow_up = ModelHrmStaffFollowUp::hrm_get_tbl_follow_up_staff($userid); //query database
              
            }
            return view('hrms/performance/performance_staff_follow_up/HrmPerformStaffFollowUp',['follow_up'=>$follow_up,'permission'=>$permission]); 
        }else{
            return view('no_perms');
        }
    } 
    // function Modal for Action on Staff Follow Up//
    public function HrmActionStaffFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(isset($_GET['add'])){
                if(perms::check_perm_module('HRM_09070201')){//module code list data tables id=148
                    $id = $_GET['add'];
                    $action = 'create';
                    $schedule_get= ModelHrmPerformSchedule::hrm_get_date_schedule_update($id); //query form model schedule
                    return view('hrms/performance/performance_staff_follow_up/HrmModalActionStaffFollowUp', ['schedule_get' => $schedule_get,'action'=>$action]);
                    }else{
                        return view('no_perms');
                    }
            }else{
                if(perms::check_perm_module('HRM_09070202')){//module code list data tables id=149
                    $id = $_GET['edit'];
                    $action = 'update';
                    $schedule_get= ModelHrmStaffFollowUp::hrm_get_edit_follow_up_staff($id); 
                    return view('hrms/performance/performance_staff_follow_up/HrmModalActionStaffFollowUp', ['schedule_get' => $schedule_get,'action'=>$action]);
                    }else{
                        return view('no_perms');
                    }
            }
            
    }
    //function insert Performance Staff Follow Up //
    public function hrm_insert_staff_follow_up(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'follow_up_percentage' =>  [  'required','integer','between:1,100'
                                ],
                'follow_up_from' => [ 'required',
                                 'date'
                                        ],
                'follow_up_to' => [ 'required',
                                'date',
                                'after:follow_up_from'
                                        ],
                'schedule_id' =>  [  'required',
                                    ],
            ],
            [
                'follow_up_percentage.required' => 'Please Insert Field Percentage !!',   //massage validator
                'follow_up_percentage.integer' => 'Please Insert Integer Number !!',  
                'follow_up_percentage.between' => 'Please Insert From 1% to 100% !!', 
                'follow_up_from.required' => 'Please Select Date !!',
                'follow_up_to.required' => 'Please Select Date !!',
                'follow_up_to.after' => 'Please Select Date Larger than Date From!!',
                'schedule_id.required' => 'Schedule Not Found !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070201')){//module code list data tables id=148
            $userid= $_SESSION['userid'];
            $schedule_id = $request->schedule_id;
            $percent = $request->follow_up_percentage;
            $from = $request->follow_up_from;
            $to = $request->follow_up_to;
            $cmt = $request->follow_up_comment;
            $reason = $request->follow_up_reason;
            $challenge = $request->follow_up_challenge;
            $insert_follow_up = ModelHrmStaffFollowUp::hrm_insert_staff_follow_up($schedule_id,$percent,$reason,$challenge,$userid,$cmt,$from,$to); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
    } 
    //function insert Performance Staff Follow Up //
    public function hrm_update_staff_follow_up(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'follow_up_percentage' =>  [  'required','integer','between:1,100'
                                ],
                'follow_up_from' => [ 'required',
                                 'date'
                                        ],
                'follow_up_to' => [ 'required',
                                'date',
                                'after:follow_up_from'
                                        ],
                'schedule_id' =>  [  'required',
                                    ],
            ],
            [
                'follow_up_percentage.required' => 'Please Insert Field Percentage !!',   //massage validator
                'follow_up_percentage.integer' => 'Please Insert Integer Number !!',  
                'follow_up_percentage.between' => 'Please Insert From 1% to 100% !!', 
                'follow_up_from.required' => 'Please Select Date !!',
                'follow_up_to.required' => 'Please Select Date !!',
                'follow_up_to.after' => 'Please Select Date Larger than Date From!!',
                'schedule_id.required' => 'Schedule Not Found !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070202')){//module code list data tables id=149
            $userid= $_SESSION['userid'];
            $id_follow_up = $request->follow_up_id;
            $schedule_id = $request->schedule_id;
            $percent = $request->follow_up_percentage;
            $from = $request->follow_up_from;
            $to = $request->follow_up_to;
            $cmt = $request->follow_up_comment;
            $reason = $request->follow_up_reason;
            $challenge = $request->follow_up_challenge;
            $update_follow_up = ModelHrmStaffFollowUp::hrm_update_staff_follow_up($id_follow_up,$userid,$schedule_id,$percent,$reason,$challenge,$cmt,$from,$to); //Update data
            return response()->json(['success'=>'Record is successfully update']);
            }else{
                return view('no_perms');
            }
        }
    } 
    // function View Staff Follow Up Detail//
    public function HrmViewStaffFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(perms::check_perm_module('HRM_09070203')){//module code list data tables id=150
            $id = $_GET['id'];
            $follow_up_get= ModelHrmStaffFollowUp::hrm_get_edit_follow_up_staff($id); // get value from table follow up
            return view('hrms/performance/performance_staff_follow_up/HrmModalViewStaffFollowUp', ['follow_up_get' => $follow_up_get]);
            }else{
                return view('no_perms');
            }
    } 
   
    
}
