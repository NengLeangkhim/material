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
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
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
            $id_candidate = $_GET['id'];
            $date = $_GET['date'];
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $candidate = ModelHrmResultCandidate::get_candidate($id_candidate); //query Get data Candidate
                $score = ModelHrmResultCandidate::get_candidate_score($date,$id_candidate);// Query Count true answer
                $time =  ModelHrmResultCandidate::get_candidate_time($id_candidate);// Query Count time candidate did quiz
                $choice = ModelHrmResultCandidate::get_result_choice($date,$id_candidate);// Query Answer choice
                $true_choice = ModelHrmResultCandidate::get_true_choice();// Query true choice for compare with Answer choice
                $answer_text = ModelHrmResultCandidate::get_answer_text($id_candidate);//Query answer text
                $comment = ModelHrmResultCandidate::get_comment_approval($id_candidate);//Query comment of approval
                return view('hrms/recruitment/result_candidate/HrmActionResultCandidateCeo',['permission'=>$permission,'candidate'=>$candidate,'score'=>$score,'time'=>$time,'choice'=>$choice,'true_choice'=>$true_choice,'answer_text'=>$answer_text,'comment'=>$comment]); 
            }else if($group==4){//permission each departement
                $candidate = ModelHrmResultCandidate::get_candidate($id_candidate); //query Get data Candidate
                $score = ModelHrmResultCandidate::get_candidate_score($date,$id_candidate);// Query Count true answer
                $time =  ModelHrmResultCandidate::get_candidate_time($id_candidate);// Query Count time candidate did quiz
                $choice = ModelHrmResultCandidate::get_result_choice($date,$id_candidate);// Query Answer choice
                $true_choice = ModelHrmResultCandidate::get_true_choice();// Query true choice for compare with Answer choice
                $answer_text = ModelHrmResultCandidate::get_answer_text($id_candidate);//Query answer text
                $comment = ModelHrmResultCandidate::get_comment_approval($id_candidate);//Query comment of approval
                $button = ModelHrmResultCandidate::get_button_approval($id_candidate);// Query for permission button
                return view('hrms/recruitment/result_candidate/HrmActionResultCandidate',['permission'=>$permission,'candidate'=>$candidate,'score'=>$score,'time'=>$time,'choice'=>$choice,'true_choice'=>$true_choice,'answer_text'=>$answer_text,'comment'=>$comment,'button'=>$button]); 
            }else{//permission check user
                $candidate = ModelHrmResultCandidate::get_candidate($id_candidate); //query Result for Normal User
            }
        }else{
            return view('no_perms');
        }
    } 
    // function Show Resume and CV //
    public function HrmModalViewCv(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090902')){//module code list data tables id=107
            $id_candidate = $_GET['id'];
            $candidate = ModelHrmResultCandidate::get_candidate($id_candidate);
            return view('hrms/recruitment/result_candidate/HrmModalCV',['candidate'=>$candidate]); 
        }else{
            return view('no_perms');
        }
    } 
    // function Show KnowLedge Question by Department //
    public function HrmModalViewKnowledgeQuestion(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090902')){//module code list data tables id=107
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $dept = $row->ma_company_dept_id;
            }
            $knowledge = ModelHrmResultCandidate::get_knowledge_question_dept($dept);
            return view('hrms/recruitment/result_candidate/HrmModalKnowledgeQuestion',['knowledge'=>$knowledge]); 
        }else{
            return view('no_perms');
        }
    } 
    /// Function Submit approval
    public function HrmSubmitApproval(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_09090201')){//module code list data tables id=172
            $userid = $_SESSION['userid'];
            $id_candidate= $_POST['user_id'];
            $appr_type= $_POST['type'];
            $comment = $_POST['comment'];
            $knowledge = ModelHrmResultCandidate::hrm_submit_approval($id_candidate,$appr_type,$comment,$userid);
            // if($appr_type=='approve'){
            // $candidate = ModelHrmResultCandidate::get_candidate($id_candidate);
            // foreach($candidate as $row){
            //     $fname = $row->fname;
            //     $lname = $row->lname;
            //     $email = $row->email;
            //     $position_id = $row->ma_position_id;
            //     $name_kh = $row->name_kh;
            // }
            // $name = $fname.' '.$lname;
            // $move =   ModelHrmResultCandidate::hrm_move_candidate($name,$email,$position_id,$name_kh,$userid);
            // }
            return 'successfully submit'; 
        }else{
            return view('no_perms');
        }
    } 

}
