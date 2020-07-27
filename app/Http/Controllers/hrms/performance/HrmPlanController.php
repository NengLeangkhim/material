<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\performance\ModelHrmPlan;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;

class HrmPlanController extends Controller
{
    //
    // function Show Plan and plan Detail //
    public function HrmIndexPerformPlanDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090704')){//module code list data tables id=99
            return view('hrms/performance/performance_plan/PerformancePlanAndDetail'); 
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
                $group = $row->group_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $perform_plan = ModelHrmPlan::hrm_get_tbl_perform_plan(); //query policy user 
            }else{//permission each departement
                $perform_plan = ModelHrmPlan::hrm_get_tbl_perform_plan_dept($userid);
            }
            return view('hrms/performance/performance_plan/TablePerformancePlan', ['perform_plan' => $perform_plan]); 
        }else{
            return view('no_perms');
        }
    } 
}
