<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\performance\ModelHrmPlan;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;
use App\model\hrms\performance\ModelHrmPlanDetail;

class HrmPlanController extends Controller
{
    //
    // function Show Plan and plan Detail //
    public function HrmIndexPerformPlanDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_09060101')){ // Permission Add
                $add_perm = '<button type="button" id="HrmAddPerformPlan" onclick=\'HrmAddPerformPlan()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Plan</button>';
        }else{
                 $add_perm='';
        }
        if(perms::check_perm_module('HRM_090704')){//module code list data tables id=99
            return view('hrms/performance/performance_plan/PerformancePlanAndDetail',['add_perm'=>$add_perm]); 
        }else{
            return view('no_perms');
        }
    } 
    // function Show table Plan //
    public function HrmTablePerformPlan(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090704')){//module code list data tables id=99
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid);
            foreach($permission as $row){
                $group = $row->ma_group_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $perform_plan = ModelHrmPlan::hrm_get_tbl_perform_plan(); //query policy user 
            }else{//permission each departement
                $perform_plan = ModelHrmPlan::hrm_get_tbl_perform_plan_dept($userid);
            }
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($perform_plan as $row){
                $create = $row->create_date;
                $table_perm.= ' 
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->name.'</td>
                        <td>'.$row->date_from.' '.'to'.' '.$row->date_to.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td>'.$row->username.'</td>
                        <td class="text-center">';
                $table_perm.= '
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                if(perms::check_perm_module('HRM_09070403')){// Permission View
                    $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'go_to("/hrm_list_plan_performance/plan/modal?id='.$row->id.'")\' class="dropdown-item hrm_item hrm_view_plan_detail">View</button>';
                }
                if(perms::check_perm_module('HRM_09070402')){// Permission Update
                    $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_update_perform_plan">Update</button>';
                }
                if(perms::check_perm_module('HRM_09070404')){// Permission Add Performance Detail
                    $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_add_plan_detail">Add Plan Detail</button>';
                }
                $table_perm.= ' </div>
                               </div>
                            </td>
                        </tr>';
            }
            $table_perm.='</tbody>';
            return view('hrms/performance/performance_plan/TablePerformancePlan', ['table_perm' => $table_perm]); 
        }else{
            return view('no_perms');
        }
    } 
    //function insert plan //
    public function hrm_insert_perform_plan(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'plan_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_plan','name')
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'plan_from' => [ 'required',
                                 'date'
                                        ],
                'plan_to' => [ 'required',
                                'date',
                                'after:plan_from'
                                        ],
            ],
            [
                'plan_name.required' => 'The Plan Name is Required !!',   //massage validator
                'plan_from.required' => 'Please Select Date !!',
                'plan_to.required' => 'Please Select Date !!',
                'plan_name.unique' => 'The Plan Name is Already exist !!',   //massage validator
                'plan_to.after' => 'Please Select Date Larger than Date From!!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070401')){//module code list data tables id=139
            $userid= $_SESSION['userid'];
            $plan_name = $request->plan_name;
            $start = $request->plan_from;
            $to = $request->plan_to;
            $insert_plan = ModelHrmPlan::hrm_insert_perform_plan($plan_name,$start,$to,$userid); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
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
    //function update plan //
    public function hrm_update_perform_plan(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'plan_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_plan','name')->ignore($request->plan_id)// ingore by id 
                                         ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'plan_from' => [ 'required',
                                 'date'
                                        ],
                'plan_to' => [ 'required',
                                'date',
                                'after:plan_from'
                                        ],
            ],
            [
                'plan_name.required' => 'The Plan Name is Required !!',   //massage validator
                'plan_from.required' => 'Please Select Date !!',
                'plan_to.required' => 'Please Select Date !!',
                'plan_name.unique' => 'The Plan Name is Already exist !!',   //massage validator
                'plan_to.after' => 'Please Select Date Larger than Date From!!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070402')){//module code list data tables id=140
            $userid= $_SESSION['userid'];
            $id_plan = $request->plan_id;
            $plan_name = $request->plan_name;
            $start = $request->plan_from;
            $to = $request->plan_to;
            $insert_plan = ModelHrmPlan::hrm_update_perform_plan($id_plan,$userid,$plan_name,$start,$to,'t'); //insert data
            return response()->json(['success'=>'Record is successfully updated']);
            }else{
                return view('no_perms');
            }
        }
    }
    // function View Plan Detail//
    public function HrmViewPerformPlan(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id = $_GET['id'];
            $plan = ModelHrmPlan::hrm_get_plan($id);
            foreach($plan as $row){
                $id_plan = $row->id;
            }
            $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail($id_plan); 
            return view('hrms/performance/performance_plan/HrmViewPerformPlan', ['perform_plan' => $plan,'perform_plan_detail' =>$plan_detail_get]);
    } 
}
