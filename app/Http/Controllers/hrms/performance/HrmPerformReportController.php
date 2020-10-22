<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;
use App\model\hrms\performance\ModelHrmPerformReport;

class HrmPerformReportController extends Controller
{
    //
    // function Show Index Report //
    public function HrmIndexPerformReport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_090706')){//module code list data tables id=101
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if(perms::check_perm_module('HRM_09070601')){ //permission check for CEO and Admin
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database

            }else if(perms::check_perm_module('HRM_09070602')){//permission each departement
                $department = ModelHrmPermission::hrm_get_dept_dept($dept); //query database
            }else{
                $department = ModelHrmPermission::hrm_get_dept_dept($dept); //query database
            }
            return view('hrms/performance/performance_report/HrmPerformanceReport',['dept'=>$department]);
        }else{
            return view('no_perms');
        }
    }
    //function Action Report //
    public function hrm_action_perform_report(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'dept_performance' =>  [  'required'
                                ],
                'from_performance' => [ 'required',
                                 'date'
                                        ],
                'to_performance' => [ 'required',
                                'date',
                                'after_or_equal:from_performance'
                                        ],
            ],
            [
                'dept_performance.required' => 'Please Select Department !!',   //massage validator
                'from_performance.required' => 'Please Select Date !!',
                'to_performance.required' => 'Please Select Date !!',
                'to_performance.after' => 'Please Select Date Larger than Date From!!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('HRM_090706')){//module code list data tables id=101
            $dept = $request->dept_performance;
            $from = $request->from_performance;
            $to = $request->to_performance;
            $report = ModelHrmPerformReport::hrm_get_tbl_perform_report($dept,$from.' '.'00:00:00',$to.' '.'23:59:59'); //query
            return view('hrms/performance/performance_report/HrmTableReportPerform',['report'=>$report]);
            }else{
                return view('no_perms');
            }
        }
    }
}
