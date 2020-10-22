<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;
use App\model\hrms\recruitment\ModelHrmRecruitmentReport;
use App\model\hrms\recruitment\ModelHrmResultCandidate; // for function show modal result candidate

class HrmRecruitmentReportController extends Controller
{
    //
    // function Show Index Report //
    public function HrmIndexRecruitmentReport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_090906')){//module code list data tables id=111
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            return view('hrms/recruitment/report_recruitment/HrmReportRecruitment',['permission'=>$permission]);
        }else{
            return view('no_perms');
        }
    }
    // function Report //
    public function HrmRecruitmentReport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_090906')){//module code list data tables id=111
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            // set from and to date
            $from=date("Y-m-d");
            $to=date("Y-m-d");
            if(isset($_POST['_from'])){
                $from=$_POST['_from'];
                if(empty($from)){
                    $from='1999-01-01';
                }
            }
            if(isset($_POST['_to'])){
                $to=$_POST['_to'];
                if(empty($to)){
                    $to=date("Y-m-d");
                }
            }
            if($to<$from){
                $f=$from;
                $from=$to;
                $to=$f;
            }
            if(isset($_POST['_report'])){
                $output = array();
                $get_all_candidate = ModelHrmRecruitmentReport::get_candidate_apply($from,$to);
                foreach($get_all_candidate as $row){
                    $output["all"] = $row->count;
                }
                $get_candidate_pass = ModelHrmRecruitmentReport::get_candidate_pass($from,$to);
                foreach($get_candidate_pass as $row){
                    $output["app"] = $row->count;
                }
                $get_candidate_pending = ModelHrmRecruitmentReport::get_candidate_pending($from,$to);
                foreach($get_candidate_pending as $row){
                    $output["pen"] = $row->count;
                }
                $get_candidate_reject = ModelHrmRecruitmentReport::get_candidate_reject($from,$to);
                foreach($get_candidate_reject as $row){
                    $output["rej"] = $row->count;
                }
                $output["new"] = ModelHrmRecruitmentReport::get_candidate_new($from,$to);
                $output["taken"] = ModelHrmRecruitmentReport::get_candidate_taken($from,$to);
                echo json_encode($output);
            }else if(isset($_POST['_reportdetail'])){
                $st = $_POST['_type'];
                $get_candidate_result = ModelHrmRecruitmentReport::get_candidate_result($from,$to,$st);
                return view('hrms/recruitment/report_recruitment/HrmTableResultCandidate',['result'=>$get_candidate_result]);
            }else if(isset($_POST['_report_cv_detail'])){
                $get_candidate = ModelHrmRecruitmentReport::get_candidate($from,$to);
                return view('hrms/recruitment/report_recruitment/HrmTableCandidate',['candidate'=>$get_candidate]);
            }
        }else{
            return view('no_perms');
        }
    }
    // function Show Result Candidate //
    public function HrmModalResultCandidate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            if(perms::check_perm_module('HRM_090906')){//module code list data tables id=111
            $id_candidate = $_GET['id'];
            $userid = $_SESSION['userid'];
            $date = $_GET['date'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if(perms::check_perm_module('HRM_09090601')){ //permission check for CEO and Admin
                $candidate = ModelHrmResultCandidate::get_candidate($id_candidate); //query Get data Candidate
                $score = ModelHrmResultCandidate::get_candidate_score($date,$id_candidate);// Query Count true answer
                $time =  ModelHrmResultCandidate::get_candidate_time($date,$id_candidate);// Query Count time candidate did quiz
                $choice = ModelHrmResultCandidate::get_result_choice($date,$id_candidate);// Query Answer choice
                $true_choice = ModelHrmResultCandidate::get_true_choice();// Query true choice for compare with Answer choice
                $answer_text = ModelHrmResultCandidate::get_answer_text($date,$id_candidate);//Query answer text
                $comment = ModelHrmResultCandidate::get_comment_approval($id_candidate);//Query comment of approval
                return view('hrms/recruitment/report_recruitment/HrmModalResultCandidate',['permission'=>$permission,'candidate'=>$candidate,'score'=>$score,'time'=>$time,'choice'=>$choice,'true_choice'=>$true_choice,'answer_text'=>$answer_text,'comment'=>$comment]);
            }else if(perms::check_perm_module('HRM_09090602')){//permission each departement
                $candidate = ModelHrmResultCandidate::get_candidate($id_candidate); //query Get data Candidate
                $score = ModelHrmResultCandidate::get_candidate_score($date,$id_candidate);// Query Count true answer
                $time =  ModelHrmResultCandidate::get_candidate_time($date,$id_candidate);// Query Count time candidate did quiz
                $choice = ModelHrmResultCandidate::get_result_choice($date,$id_candidate);// Query Answer choice
                $true_choice = ModelHrmResultCandidate::get_true_choice();// Query true choice for compare with Answer choice
                $answer_text = ModelHrmResultCandidate::get_answer_text($date,$id_candidate);//Query answer text
                $comment = ModelHrmResultCandidate::get_comment_approval($id_candidate);//Query comment of approval
                return view('hrms/recruitment/report_recruitment/HrmModalResultCandidate',['permission'=>$permission,'candidate'=>$candidate,'score'=>$score,'time'=>$time,'choice'=>$choice,'true_choice'=>$true_choice,'answer_text'=>$answer_text,'comment'=>$comment]);
            }else{//permission check user
                $candidate = ModelHrmResultCandidate::get_candidate($id_candidate); //query Result for Normal User
            }
        }else{
            return view('no_perms');
        }
    }
}
