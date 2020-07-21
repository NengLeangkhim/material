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
            $question_type_sugg = model_question_type::get_tbl_suggestion_question_type();
            return view('hrms/suggestion/question_type/question_type_sugg', ['question_type_sugg' => $question_type_sugg]);
        }else{
            return view('no_perms');
        }
         //var_dump($question_type_sugg);
    }

   //function show modal //
    public function modal_question_type_sugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09080201')){//module code add question type id=129
            $m='
            <form method="post" name="question_type_sugg_form" id="question_type_sugg_form">
                <input type="hidden" name="_token" id="token" value="'.csrf_token().'">
                <!-- modal -->
                <div class="modal fade" id="q_type_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header text-center" style="background-color:#1fa8e0;">
                        <h5 class="modal-title" id="model_title">Add New </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="question_type_sugg">Question Type<span class="text-danger">*</span></label>
                                        <input type="text" required class="form-control" id="question_type_sugg" aria-describedby="question_type" placeholder="" name="question_type_sugg">
                                    </div>
                                </div>
                            </div> 
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="action_q_t_sugg_id" id="action_q_t_sugg_id"/>
                        <button type="button" onclick="HrmAddQuestionTypeSugg()" name="action_q_t_sugg" id="action_q_t_sugg" class="btn btn-outline-primary">Create</button>
                        </div>
                    </div>
                </div>
                </div>
            </form>
            ';  
            echo $m; 
           // return view('hrms/suggestion/question_type/modal_add_question_type');
        }else{
            return view('no_perms');
        }
    }
    //function insert ////
    public function AddQuestionTypeSugg(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator= $request->validate([
            'question_type_sugg' => 'bail|required|unique:hr_suggestion_question_type,name|max:255'
        ]);
        $name= $_POST['question_name'];
        $userid = $_SESSION['userid'];
        $question_type= model_question_type::hrm_insert_question_type($name,$userid);

    }
    public function EditQuestionTypeSugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator= $request->validate([
                'question_type_sugg' => 'bail|required|unique:hr_suggestion_question_type,name|max:255'
            ]);
            $id=$_POST['id'];
            $name= $_POST['question_name'];
            $userid = $_SESSION['userid'];
            $question_type= model_question_type::hrm_update_question_type($id,$userid,$name);
    }
    public function GetEditQuestionTypeSugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_GET['id'];
            $question_type = array();
            $question_type= model_question_type::hrm_get_update_question_type($id);
            return response()->json($question_type);
    }
}
