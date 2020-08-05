<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment\ModelHrmResultCandidate; 
use App\model\hrms\ModelHrmPermission; // get permission
use App\Http\Controllers\perms;

class HrmResultCandidateController extends Controller
{
    //
    // function Show Table Schedule //
    public function HrmIndexResultCandidate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090902')){//module code list data tables id=107
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->group_id;
                $dept = $row->company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $result = ModelHrmResultCandidate::get_tbl_result_candidate_ceo(); //query Result for Top CEO 
            }else if($group==4){//permission each departement
                $result = ModelHrmResultCandidate::get_tbl_result_candidate_dept(); //query Result for Head Of Department 
            }else{//permission check user
                $result = ModelHrmResultCandidate::get_tbl_result_candidate_dept(); //query Result For HR_Admin
            }
            return view('hrms/recruitment/result_candidate/HrmResultCandidate',['permission'=>$permission,'result'=>$result]); 
        }else{
            return view('no_perms');
        }
    } 

    // function Show Result Candidate //
    public function HrmGotoResultCandidate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090902')){//module code list data tables id=107
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->group_id;
                $dept = $row->company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $result = ModelHrmResultCandidate::get_tbl_result_candidate_ceo(); //query Result for Top CEO 
            }else if($group==4){//permission each departement
                $result = ModelHrmResultCandidate::get_tbl_result_candidate_dept(); //query Result for Head Of Department 
            }else{//permission check user
                $result = ModelHrmResultCandidate::get_tbl_result_candidate_dept(); //query Result For HR_Admin
            }
            return view('hrms/recruitment/result_candidate/HrmResultCandidate',['permission'=>$permission,'result'=>$result]); 
        }else{
            return view('no_perms');
        }
    } 
}
