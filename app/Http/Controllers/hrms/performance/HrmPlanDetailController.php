<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\performance\ModelHrmPlanDetail;
use App\model\hrms\performance\ModelHrmPlan;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;

class HrmPlanDetailController extends Controller
{
    //
      // function Show table Plan Detail//
      public function HrmTablePerformPlanDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090704')){//module code list data tables id=99
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid);
            foreach($permission as $row){
                $group = $row->group_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $plan_detail = ModelHrmPlanDetail::hrm_get_tbl_perform_plan_detail(); //query policy user 
            }else{//permission each departement
                $plan_detail = ModelHrmPlanDetail::hrm_get_tbl_perform_plan_detail_dept($userid);
            }
            return view('hrms/performance/performance_plan_detail/TablePerformPlanDetail', ['perform_plan_detail' => $plan_detail]); 
        }else{
            return view('no_perms');
        }
    } 
    //function get modal and data for add plan detail
    public function hrm_modal_data_perform_plan_detail()
    {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
            if(perms::check_perm_module('HRM_09070404')){//module code list data tables id=142
             $id = $_GET['id'];
             $plan_get= ModelHrmPlan::hrm_get_plan($id); 
             foreach($plan_get as $row){
                 $id_plan = $row->id;
             }
             $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail($id_plan);
             return view('hrms/performance/performance_plan_detail/HrmModalAddPlanDetail', ['perform_plan' => $plan_get,'plan_detail'=>$plan_detail_get]); 
            }else{
                return view('no_perms');
            }
    }
    //function insert plan detail //
    public function hrm_insert_perform_plan_detail(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'plan_detail_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_plan_detail','name')
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'plan_detail_task' => [ 'required',
                                        ],
                'plan_detail_from' => [ 'required',
                                 'date'
                                        ],
                'plan_detail_to' => [ 'required',
                                'date',
                                'after:plan_detail_from'
                                        ],
            ],
            [
                'plan_detail_name.required' => 'The Plan Detail Name is Required !!',   //massage validator
                'plan_detail_from.required' => 'Please Select Date !!',
                'plan_detail_to.required' => 'Please Select Date !!',
                'plan_detail_name.unique' => 'The Plan Detail Name is Already exist !!',   //massage validator
                'plan_detail_to.after' => 'Please Select Date Larger than Date From!!',
                'plan_detail_task.required' => 'The Task Field is Required !!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            $userid= $_SESSION['userid'];
            $id_plan = $request ->id_plan;
            $p_detail_name = $request->plan_detail_name;
            $start = $request->plan_detail_from;
            $to = $request->plan_detail_to;
            $task = $request->plan_detail_task;
            $parent = $request->plan_detail_parent;
            $insert_plan_datail = ModelHrmPlanDetail::hrm_insert_perform_plan_detail($id_plan,$p_detail_name,$task,$start,$to,$userid,$parent); //insert data
            return response()->json(['success'=>'Record is successfully added']);
        }
    }
    //function get modal and data for Update plan detail
    public function hrm_get_data_perform_plan_detail()
    {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
            if(perms::check_perm_module('HRM_09070405')){//module code list data tables id=143
             $id = $_GET['id'];
             $plan_detail_get = ModelHrmPlanDetail::hrm_get_plan_detail_update($id);
             return response()->json($plan_detail_get);
            }else{
                return view('no_perms');
            }
    }
    //function update plan detail //
    public function hrm_update_perform_plan_detail(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'plan_detail_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_plan_detail','name')->ignore($request->plan_datail_id)
                                    ->where(function ($query) use ($request) {
                                       return $query->where('is_deleted', 'f');})
                                        ],
                'plan_detail_task' => [ 'required',
                                        ],
                'plan_detail_from' => [ 'required',
                                 'date'
                                        ],
                'plan_detail_to' => [ 'required',
                                'date',
                                'after:plan_detail_from'
                                        ],
            ],
            [
                'plan_detail_name.required' => 'The Plan Detail Name is Required !!',   //massage validator
                'plan_detail_from.required' => 'Please Select Date !!',
                'plan_detail_to.required' => 'Please Select Date !!',
                'plan_detail_name.unique' => 'The Plan Detail Name is Already exist !!',   //massage validator
                'plan_detail_to.after' => 'Please Select Date Larger than Date From!!',
                'plan_detail_task.required' => 'The Task Field is Required !!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            $userid= $_SESSION['userid'];
            $id_plan_detail = $request->plan_datail_id;
            $id_plan = $request ->id_plan;
            $p_detail_name = $request->plan_detail_name;
            $start = $request->plan_detail_from;
            $to = $request->plan_detail_to;
            $task = $request->plan_detail_task;
            $parent = $request->plan_detail_parent;
            $insert_plan_datail = ModelHrmPlanDetail::hrm_update_perform_plan_detail($id_plan_detail,$userid,$id_plan,$p_detail_name,$task,$start,$to,$parent); //insert data
            return response()->json(['success'=>'Record is successfully update']);
        }
    }
    // function View Plan Detail//
    public function HrmViewPlanDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id = $_GET['id'];
            $plan_detail = ModelHrmPlanDetail::hrm_get_plan_detail_view($id);
            return view('hrms/performance/performance_plan_detail/HrmModalViewPlanDetail', ['perform_plan_detail' => $plan_detail]);
    } 

}
