<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\suggestion\model_question_type;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\DB;

class question_typeController extends Controller
{  
    //function show table//
    public function tbl_suggestion_question_type()
    {     
     if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        if(perms::check_perm_module('HRM_090802')){//module code list data tables id=104
            $question_type_sugg = model_question_type::get_tbl_suggestion_question_type(); //get database  from model
            return view('hrms/suggestion/question_type/question_type_sugg', ['question_type_sugg' => $question_type_sugg]);
        }else{
            return view('no_perms');
        }
         //var_dump($question_type_sugg);
    }
    //function insert //
    public function AddQuestionTypeSugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        //     $validator= $request->validate([
        //     'question_type_sugg' => 'bail|required|unique:hr_suggestion_question_type,name|max:255'
        // ]);
        if(perms::check_perm_module('HRM_090801')){//module code list data tables id=129
        $name= $_POST['question_name'];
        $userid = $_SESSION['userid'];
        $question_type= model_question_type::hrm_insert_question_type($name,$userid); //get function insert from model
        }else{
            return view('no_perms');
        }
    }
    //function update question type //
    public function EditQuestionTypeSugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            // $validator= $request->validate([
            //     'question_type_sugg' => 'bail|required|unique:hr_suggestion_question_type,name|max:255'
            // ]);
            $id=$_POST['id'];
            $name= $_POST['question_name'];
            $userid = $_SESSION['userid'];
            $question_type= model_question_type::hrm_update_question_type($id,$userid,$name); //get function insert from model
    }
    // function get value to show on modal when update //
    public function GetEditQuestionTypeSugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_GET['id'];
            $question_type = array();
            $question_type= model_question_type::hrm_get_update_question_type($id);
            return response()->json($question_type);
    }
    // function deleted question type //
    public function delete_question_type_sugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09080202')){//module code list data tables id=130
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type_sugg=model_question_type::hrm_delete_question_type($id,$userid);
        var_dump($question_type_sugg);
        }else{
            return view('no_perms');
        }
    }
}
