<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;
use App\model\hrms\performance\ModelHrmStaffFollowUp;
use App\model\hrms\performance\ModelHrmPerformScore;
use App\model\hrms\performance\ModelHrmManagerFollowUp;

class HrmManagerFollowUpController extends Controller
{
    //
    // function Show Table Manager Follow Up //
    public function HrmIndexManagerFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090703')){//module code list data tables id=98
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $manager_follow_up = ModelHrmManagerFollowUp::hrm_get_manager_follow_up_top(); //query database
            }else if($group==4){//permission each departement
                $manager_follow_up = ModelHrmManagerFollowUp::hrm_get_manager_follow_up_dept($dept); //query database
            }else{//permission check user
                $manager_follow_up = ModelHrmManagerFollowUp::hrm_get_manager_follow_up_staff($userid); //query database
            }
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($manager_follow_up as $row){
                $create = $row->create_date;
                $table_perm.= ' 
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->staff_name.'</td>
                        <td>'.$row->name_plan.'</td>
                        <td>'.intval($row->percentage).'%'.'</td>
                        <td>'.$row->score.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td>'.$row->username.'</td>
                        <td class="text-center">';
                $table_perm.= '
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                if(perms::check_perm_module('HRM_09070303')){// Permission View
                    $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_view_manager_follow_up">View</button>';
                }
                if(perms::check_perm_module('HRM_09070302')){// Permission Update
                    $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'go_to("/hrm_performance_follow_up_manager/action?edit='.$row->id.'")\' class="dropdown-item hrm_item hrm_update_manager_follow_up">Update</button>';
                }
                $table_perm.= ' </div>
                               </div>
                            </td>
                        </tr>';
            }
            $table_perm.='</tbody>';
            return view('hrms/performance/performance_manager_follow_up/HrmManagerFollowUp',['table_perm'=>$table_perm]); 
        }else{
            return view('no_perms');
        }
    } 
    // function Modal for Action on Staff Follow Up//
    public function HrmActionManagerFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(isset($_GET['add'])){
                if(perms::check_perm_module('HRM_09070301')){//module code list data tables id=151
                    $id = $_GET['add'];
                    $action = 'create';
                    $follow_up_get= ModelHrmStaffFollowUp::hrm_get_edit_follow_up_staff($id); //query form model schedule
                    $score = ModelHrmPerformScore::hrm_get_date_score();// query data performance score
                    return view('hrms/performance/performance_manager_follow_up/HrmManagerActionFollowUp', ['follow_up_get' => $follow_up_get,'action'=>$action,'score'=>$score]);
                    }else{
                        return view('no_perms');
                    }
            }else{
                if(perms::check_perm_module('HRM_09070302')){//module code list data tables id=152
                    $id = $_GET['edit'];
                    $action = 'update';
                    $follow_up_get= ModelHrmManagerFollowUp::hrm_get_edit_manager_follow_up($id); 
                    $score = ModelHrmPerformScore::hrm_get_date_score();// query data performance score
                    return view('hrms/performance/performance_manager_follow_up/HrmManagerActionFollowUp', ['follow_up_get' => $follow_up_get,'action'=>$action,'score'=>$score]);
                    }else{
                        return view('no_perms');
                    }
            }
            
    }
    //function insert Performance manager Follow Up //
    public function hrm_insert_manager_follow_up(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'follow_manage_up_percentage' =>  [  'required','integer','between:1,100'
                                           ],
                'follow_manage_up_score' =>  [  'required',
                                  ],
            ],
            [
                'follow_manage_up_percentage.required' => 'Please Insert Field Percentage !!',   //massage validator
                'follow_manage_up_percentage.integer' => 'Please Insert Integer Number !!',  
                'follow_manage_up_percentage.between' => 'Please Insert From 1% to 100% !!', 
                'follow_manage_up_score.required' => 'Please Select Score !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070301')){//module code list data tables id=151
            $userid= $_SESSION['userid'];
            $schedule_id = $request->schedule_hidden_id;
            $percent = $request->follow_manage_up_percentage;
            $score = $request->follow_manage_up_score;
            $cmt = $request->follow_manage_up_comment;
            $insert_follow_up = ModelHrmManagerFollowUp::hrm_insert_Manager_follow_up($schedule_id,$percent,$score,$userid,$cmt); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
    } 
    //function Update Performance manager Follow Up //
    public function hrm_update_manager_follow_up(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'follow_manage_up_percentage' =>  [  'required','integer','between:1,100'
                                           ],
                'follow_manage_up_score' =>  [  'required',
                                  ],
            ],
            [
                'follow_manage_up_percentage.required' => 'Please Insert Field Percentage !!',   //massage validator
                'follow_manage_up_percentage.integer' => 'Please Insert Integer Number !!',  
                'follow_manage_up_percentage.between' => 'Please Insert From 1% to 100% !!', 
                'follow_manage_up_score.required' => 'Please Select Score !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070302')){//module code list data tables id=152
            $userid= $_SESSION['userid'];
            $id_manager = $request->follow_manage_up_id; // id Performance Manager follow up
            $schedule_id = $request->schedule_hidden_id;// id Performance staff follow up
            $percent = $request->follow_manage_up_percentage;
            $score = $request->follow_manage_up_score;
            $cmt = $request->follow_manage_up_comment;
            $update_follow_up = ModelHrmManagerFollowUp::hrm_update_Manager_follow_up($id_manager,$userid,$schedule_id,$percent,$score,$cmt,'t'); //update data
            return response()->json(['success'=>'Record is successfully Updated']);
            }else{
                return view('no_perms');
            }
        }
        
    } 
    // function View Manager Follow Up Detail//
    public function HrmViewManagerFollowUp(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(perms::check_perm_module('HRM_09070303')){//module code list data tables id=153
            $id = $_GET['id'];
            $follow_up_get= ModelHrmManagerFollowUp::hrm_get_edit_manager_follow_up($id); // get value from table follow up
            return view('hrms/performance/performance_manager_follow_up/HrmModalManagerFollowUp', ['follow_up_get' => $follow_up_get]);
            }else{
                return view('no_perms');
            }
    } 
}
