<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use App\model\hrms\performance\ModelHrmPlan;
use App\model\hrms\performance\ModelHrmPlanDetail;
use Illuminate\Validation\Rule;
use App\model\hrms\performance\ModelHrmPerformSchedule;

class HrmPerformScheduleController extends Controller
{
    //
    // function Show Table Schedule //
    public function HrmIndexPerformSchedule(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090701')){//module code list data tables id=96
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_top(); //query policy user 
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_ceo();// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table
            }else if($group==4){//permission each departement
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_dept($userid);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_user($userid);// get query from performance plan 
                $staff = ModelHrmPermission::hrm_get_staff_dept($dept);// get query from staff table
            }else{//permission check user
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_staff($userid);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_user($userid);// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table
            }
            return view('hrms/performance/performance_schedule/HrmPerformSchedule',['schedule'=>$schedule,'staff'=>$staff,'plan'=>$get_plan,'permission'=>$permission]); 
        }else{
            return view('no_perms');
        }
    } 
    /// Function get combobox plan detail
    public function hrm_get_plan_detail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id = $_GET['id'];// get id from plan onclick 
            $plan_detail = ModelHrmPlanDetail::hrm_get_plan_detail($id);
        return view('hrms/performance/performance_schedule/HrmComboboxPlanDetail',['plan_detail'=>$plan_detail]);
    }
    //function get data for update plan
    public function hrm_get_data_perform_plan()
     {
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
              }
              $id = $_GET['id'];
              $plan_get = array();
              $plan_get= ModelHrmPlan::hrm_get_plan($id); 
              return response()->json($plan_get);
     }
    //function get data for Detail plan detail
    public function hrm_get_data_perform_plan_detail()
    {
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
              }
              $id = $_GET['id'];
              $plan_detail_get = array();
              $plan_detail_get= ModelHrmPlanDetail::hrm_get_plan_detail_update($id); 
              return response()->json($plan_detail_get);
    }
    //function insert Performance Schedule //
    public function hrm_insert_perform_schedule(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'staff_schedule' =>  [  'required',
                                ],
                'staff_from_schedule' => [ 'required',
                                 'date'
                                        ],
                'staff_to_schedule' => [ 'required',
                                'date',
                                'after:staff_from_schedule'
                                        ],
                'staff_comment_schedule' =>  [
                                    'max:255',
                                    ],
                'plan_schedule' =>  [  'required',
                                    ],
                'plan_detail_schedule' =>  [  'required',
                                    ],
            ],
            [
                'staff_schedule.required' => 'Please Select Staff !!',   //massage validator
                'staff_comment_schedule.max' => 'Maximum character!!',
                'staff_from_schedule.required' => 'Please Select Date !!',
                'staff_to_schedule.required' => 'Please Select Date !!',
                'staff_to_schedule.after' => 'Please Select Date Larger than Date From!!',
                'plan_schedule.required' => 'Please Select Plan !!',
                'plan_detail_schedule.required' => 'Please Select Plan Detail !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070101')){//module code list data tables id=145
            $userid= $_SESSION['userid'];
            $staff_id = $request->staff_schedule;
            $plan_detail_id = $request->plan_detail_schedule;
            $start = $request->staff_from_schedule;
            $to = $request->staff_to_schedule;
            $cmt = $request->staff_comment_schedule;
            $insert_schedule = ModelHrmPerformSchedule::hrm_insert_perform_schedule($staff_id,$start,$to,$userid,$plan_detail_id,$cmt); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
    }
    //function get data for update schedule
    public function hrm_get_data_perform_schedule()
    {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             $id = $_GET['id'];
             $schedule_get = array();
             $schedule_get= ModelHrmPerformSchedule::hrm_get_date_schedule_update($id); 
             return response()->json($schedule_get);
    }
    //function update Performance Schedule //
    public function hrm_update_perform_schedule(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'staff_schedule' =>  [  'required',
                                ],
                'staff_from_schedule' => [ 'required',
                                 'date'
                                        ],
                'staff_to_schedule' => [ 'required',
                                'date',
                                'after:staff_from_schedule'
                                        ],
                'staff_comment_schedule' =>  [
                                    'max:255',
                                    ],
                'plan_schedule' =>  [  'required',
                                    ],
                'plan_detail_schedule' =>  [  'required',
                                    ],
            ],
            [
                'staff_schedule.required' => 'Please Select Staff !!',   //massage validator
                'staff_comment_schedule.max' => 'Maximum character!!',
                'staff_from_schedule.required' => 'Please Select Date !!',
                'staff_to_schedule.required' => 'Please Select Date !!',
                'staff_to_schedule.after' => 'Please Select Date Larger than Date From!!',
                'plan_schedule.required' => 'Please Select Plan !!',
                'plan_detail_schedule.required' => 'Please Select Plan Detail !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070102')){//module code list data tables id=146
            $userid= $_SESSION['userid'];
            $id_schedule= $request->schedule_plan_id;
            $staff_id = $request->staff_schedule;
            $plan_detail_id = $request->plan_detail_schedule;
            $start = $request->staff_from_schedule;
            $to = $request->staff_to_schedule;
            $cmt = $request->staff_comment_schedule;
            $insert_schedule = ModelHrmPerformSchedule::hrm_update_perform_schedule($id_schedule,$userid,$staff_id,$start,$to,$plan_detail_id,$cmt,'t'); //Update data
            return response()->json(['success'=>'Record is successfully Updated']);
            }else{
                return view('no_perms');
            }
        }
    }
    // function View Schedule Detail//
    public function HrmViewPerformSchedule(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(perms::check_perm_module('HRM_09070103')){//module code list data tables id=147
            $id = $_GET['id'];
            $schedule_get= ModelHrmPerformSchedule::hrm_get_date_schedule_update($id); 
            return view('hrms/performance/performance_schedule/HrmModalViewSchedule', ['schedule_get' => $schedule_get]);
            }else{
                return view('no_perms');
            }
    } 

}
