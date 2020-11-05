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
            if(perms::check_perm_module('HRM_09070101')){ // Permission Add
                $add_perm = '<button type="button" id="HrmAddSchedule" onclick=\'HrmAddSchedule()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Schedule</button>';
            }else{
                    $add_perm='';
            }
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
                $id_user = $row->id;
            }
            if(perms::check_perm_module('HRM_09070104')){ //permission check for CEO and Admin
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_top(); //query 
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_ceo();// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table
            }else if(perms::check_perm_module('HRM_09070105')){//permission each departement
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_top(); //query 
              //  $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_dept($dept);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_ceo();// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_dept($dept);// get query from staff table
            }else{//permission check user
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_staff($userid);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_staff($userid);// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_dept($dept);// get query from staff table
            }
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($schedule as $row){
                $create = $row->create_date;
                $table_perm.= ' 
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->name.'</td>
                        <td>'.$row->date_from.' '.'to'.' '.$row->date_to.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td>'.$row->staff_name.'</td>
                        <td class="text-center">';
                $table_perm.='<a href="#" id="'.$row->id.'" title="List Schedule" onclick=\'go_to("/hrm_performance_staff_schedule/list?plan_id='.$row->id.'")\' class="ListSchedulePeroformance"><i class="fas fa-list"></i></a>';
                $table_perm.= ' 
                            </td>
                        </tr>';
            }
            $table_perm.='</tbody>';
            return view('hrms/performance/performance_schedule/HrmPerformSchedule',['schedule'=>$schedule,'staff'=>$staff,'plan'=>$get_plan,'permission'=>$permission,'add_perm'=>$add_perm,'table_perm'=>$table_perm]); 
        }else{
            return view('no_perms');
        }
    } 
    //function get modal and data for add and Update Schedule
    public function hrm_modal_action_schedule()
    {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
            if(perms::check_perm_module('HRM_09070101')){//module code 
            $get_plan = ModelHrmPlan::hrm_get_plan_detial_ceo();// get query from performance plan
            $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table
             return view('hrms/performance/performance_schedule/HrmModalActionSchedule', ['plan'=>$get_plan,'staff'=>$staff]); 
            }else{
                return view('no_perms');
            }
    }
    /// function get List Schedule 
    public function HrmListPerformSchedule(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        if(perms::check_perm_module('HRM_090701')){//module code list data tables id=96
            $id = $_GET['plan_id'];
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
                $id_user = $row->id;
            }
            if(perms::check_perm_module('HRM_09070104')){ //permission check for CEO and Admin
                $schedule = ModelHrmPerformSchedule::hrm_list_schedule_top($id); //query 
                $plan=ModelHrmPlan::hrm_get_plan($id);// get query from performance plan
                $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail($id);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_ceo();// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table
                
            }else if(perms::check_perm_module('HRM_09070105')){//permission each departement
                $schedule = ModelHrmPerformSchedule::hrm_list_schedule_top($id); //query 
                $plan=ModelHrmPlan::hrm_get_plan($id);// get query from performance plan
                $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail($id);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_ceo();// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table
            }else{//permission check user
                $schedule = ModelHrmPerformSchedule::hrm_list_schedule_staff($id,$userid);
                $plan=ModelHrmPlan::hrm_get_plan_staff($id,$userid);// get query from performance plan
                $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail_staff($id,$userid);
                $get_plan = ModelHrmPlan::hrm_get_plan_detial_staff($userid);// get query from performance plan
                $staff = ModelHrmPermission::hrm_get_staff_ceo();// get query from staff table     
            }
            return view('hrms/performance/performance_schedule/HrmListSchedule',['perform_plan'=>$plan,'perform_plan_detail'=>$plan_detail_get,'schedule'=>$schedule,'plan'=>$get_plan,'staff'=>$staff]); 
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
    // function Show Table Schedule //
    public function HrmCalendarPerformSchedule(){
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
            if(perms::check_perm_module('HRM_09070104')){ //permission check for CEO and Admin
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_top(); //query policy user
            }else if(perms::check_perm_module('HRM_09070105')){//permission each departement
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_dept($dept);
            }else{//permission check user
                $schedule = ModelHrmPerformSchedule::hrm_get_tbl_schedule_staff($userid);
            }
            foreach($schedule as $row)
            {
            $data[] = array(
            'id'   => $row->id,
            'title'   => 'Task:'.' '.$row->name_plan,
            'start'   => $row->date_from,
            'end'   => $row->date_to,
            'constraint' => 'availableForMeeting',
            );
            }
            echo json_encode($data);
        }else{
            return view('no_perms');
        }
    } 

}
