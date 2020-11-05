<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;
use App\model\hrms\performance\ModelHrmStaffFollowUp;
use App\model\hrms\performance\ModelHrmPerformSchedule;
use App\model\hrms\performance\ModelHrmPlan;
use App\model\hrms\performance\ModelHrmPlanDetail;
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
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if(perms::check_perm_module('HRM_09070204')){ //permission check for CEO and Admin
                $get_plan = ModelHrmPerformSchedule::hrm_get_tbl_schedule_top(); //query 
                $follow_up = ModelHrmStaffFollowUp::hrm_get_tbl_follow_up_top(); //query database

            }else if(perms::check_perm_module('HRM_09070205')){//permission each departement
                $get_plan = ModelHrmPerformSchedule::hrm_get_tbl_schedule_top(); //query 
                $follow_up = ModelHrmStaffFollowUp::hrm_get_tbl_follow_up_dept($dept); //query database

            }else{//permission check user
                $get_plan = ModelHrmPerformSchedule::hrm_get_tbl_schedule_staff($userid);
                $follow_up = ModelHrmStaffFollowUp::hrm_get_tbl_follow_up_staff($userid); //query database
                
            }
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($get_plan as $row){
                $create = $row->create_date;
                $table_perm.= '
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->name.'</td>
                        <td>'.$row->date_from.' '.'to'.' '.$row->date_to.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td>'.$row->staff_name.'</td>
                        <td class="text-center">';
                $table_perm.='<a href="#" id="'.$row->id.'" title="List Schedule" onclick=\'go_to("/hrm_performance_follow_up/assign?plan_id='.$row->id.'")\' class="ListSchedulePeroformance"><i class="fas fa-list"></i></a>';
                $table_perm.= '
                            </td>
                        </tr>';
            }
            $table_perm.='</tbody>';
            return view('hrms/performance/performance_staff_follow_up/HrmPerformStaffFollowUp',['table_perm'=>$table_perm,'permission'=>$permission]);
        }else{
            return view('no_perms');
        }
    }
    /// function get List Schedule 
    public function HrmViewAssign(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        if(perms::check_perm_module('HRM_090702')){//module code list data tables id=96
            $id = $_GET['plan_id'];
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
                $id_user = $row->id;
            }
            if(perms::check_perm_module('HRM_09070204')){ //permission check for CEO and Admin
                $schedule = ModelHrmPerformSchedule::hrm_list_schedule_top($id); //query 
                $plan=ModelHrmPlan::hrm_get_plan($id);// get query from performance plan
                $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail($id);
                
            }else if(perms::check_perm_module('HRM_09070205')){//permission each departement
                $schedule = ModelHrmPerformSchedule::hrm_list_schedule_top($id); //query policy user
                $plan=ModelHrmPlan::hrm_get_plan($id);// get query from performance plan
                $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail($id);
            }else{//permission check user
                $schedule = ModelHrmPerformSchedule::hrm_list_schedule_staff($id,$userid);
                $plan=ModelHrmPlan::hrm_get_plan_staff($id,$userid);// get query from performance plan
                $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail_staff($id,$userid);
               
            }
            return view('hrms/performance/performance_staff_follow_up/HrmListAssign',['perform_plan'=>$plan,'perform_plan_detail'=>$plan_detail_get,'schedule'=>$schedule]); 
        }else{
            return view('no_perms');
        }
    }
    // function View Staff Follow Up List//
    public function HrmListStaffFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            if(perms::check_perm_module('HRM_090702')){//module code list data tables id=150
            $id = $_GET['id'];
            $userid = $_SESSION['userid'];
            $button_perm='';
            $schedule= ModelHrmPerformSchedule::hrm_get_date_schedule_update($id); // get value from table follow up
            $follow_up = ModelHrmStaffFollowUp::hrm_list_tbl_follow_up($id); //query database
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($follow_up as $row){
                $create = $row->create_date;
                $table_perm.= '
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.intval($row->percentage).'%'.'</td>
                        <td>'.$row->action_date_from.' '.'to'.' '.$row->action_date_to.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td class="text-center">';
                $table_perm.= '
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                if(perms::check_perm_module('HRM_09070203')){// Permission View
                    $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_view_perform_staff_follow_up">View</button>';
                }
                if(perms::check_perm_module('HRM_09070202')&& $row->ma_user_id==$userid){// Permission Update
                    $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'go_to("/hrm_performance_follow_up/modal/action?edit='.$row->id.'")\' class="dropdown-item hrm_item hrm_update_perform_staff_follow_up">Update</button>';
                }
                $table_perm.= '</div> 
                              </div>
                            </td>
                        </tr>';
                if(perms::check_perm_module('HRM_09070301')){// Permission Add Staff Follow Up
                    if(is_null($row->delete) || $row->delete=='t'){// check can follow up one time only
                        $button_perm= '<label for="manager_follow_up">Please Evaluate This'."'".'s Schedule :</label><button type="button" id="'.$row->id.'" onclick=\'go_to("/hrm_performance_follow_up_manager/action?add='.$row->id.'")\' class="btn btn-primary hrm_add_manager_follow_up">Submit</button> ';
                    }
                } 
            }
            $table_perm.='</tbody>';
            return view('hrms/performance/performance_staff_follow_up/HrmListFollowUp', ['schedule' => $schedule,'table_perm'=>$table_perm,'button_perm'=>$button_perm]);
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
                    $schedule_get= ModelHrmStaffFollowUp::hrm_get_follow_up_staff($id); //query form model schedule
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
    //function update Performance Staff Follow Up //
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
            $update_follow_up = ModelHrmStaffFollowUp::hrm_update_staff_follow_up($id_follow_up,$userid,$schedule_id,$percent,$reason,$challenge,$cmt,'t',$from,$to); //Update data
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
