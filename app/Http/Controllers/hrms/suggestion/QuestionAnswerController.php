<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\suggestion\ModelQuestionAnswer;
class QuestionAnswerController extends Controller
{
    //
     //function show table//
     public function tbl_suggestion_question_answer()
     {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090801')){//module code list data tables id=103
                  $question_sugg = ModelQuestionAnswer::hrm_get_tbl_suggestion_question();
                  $question_type = ModelQuestionAnswer::hrm_get_question_type();
                 return view('hrms/suggestion/question_answer/QuestionAnswerSugg', ['question_sugg' => $question_sugg,'question_type'=>$question_type]);
             }else{
                 return view('no_perms');
             }
          //var_dump($question_type_sugg);
     }
    //function insert Question //
    public function AddQuestionSugg(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_name_sugg' =>  [  'required',
                                            'max:255',
                                        ],
                'question_type_id_sugg' => [ 'required',
                                        ],
            ],
            [
                'question_name_sugg.required' => 'The Question Name is Required !!',   //massage validator
                'question_type_id_sugg.required' => 'Please Select Question Type !!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09080101')){//module code list data tables id=131
                $name= $request->question_name_sugg;
                $question_type_id = $request->question_type_id_sugg;
                $userid = $_SESSION['userid'];
                $question_type= ModelQuestionAnswer::hrm_insert_question_sugg($name,$question_type_id,$userid); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function get value to show on modal when update //
    public function GetEditQuestionSugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_GET['id'];
            $question_sugg = array();
            $question_sugg= ModelQuestionAnswer::hrm_get_update_question($id); 
            return response()->json($question_sugg);
    }
    //function update question type //
    public function EditQuestionSugg(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
        $validator = \Validator::make($request->all(), [
            'question_name_sugg' =>  [  'required',
                                        'max:255',
                                    ],
            'question_type_id_sugg' => [ 'required',
                                    ],
        ],
        [
            'question_name_sugg.required' => 'The Question Name is Required !!',   //massage validator
            'question_type_id_sugg.required' => 'Please Select Question Type !!'
            ]
        );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09080102')){//module code list data tables id=132
                $name= $request->question_name_sugg;
                $question_type_id = $request->question_type_id_sugg;
                $userid = $_SESSION['userid'];
                $id= $request->q_sugg_id;
                $question_type= ModelQuestionAnswer::hrm_update_questions($id,$userid,$name,$question_type_id); //get function insert from model
                return response()->json(['success'=>'Record is successfully Update']);
                }else{
                    return view('no_perms');
                }
        }
            
    }
    // function deleted question//
    public function delete_question_sugg()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09080103')){//module code list data tables id=133
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type_sugg=ModelQuestionAnswer::hrm_delete_question($id,$userid);
        //var_dump($question_type_sugg);
        }else{
            return view('no_perms');
        }
    }
    // function get data question //
    public function hrm_modal_add_answer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_09080104')){ //module code list data tables id=134
            $id= $_GET['id'];
            $question_sugg_get = ModelQuestionAnswer::hrm_get_question_sugg($id); //query question suggestion
            return view('hrms/suggestion/question_answer/ModalAddAnswerSugg', ['question_sugg_get' => $question_sugg_get]);
        }else{
            return view('no_perms');
        }
        
    }

    //function insert Answer //
    public function AddAnswerSugg(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'answer_name_sugg' => [ 'required',
                                        ],
            ],
            [
                'answer_name_sugg.required' => 'The Answer Field is Required !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
                $answer_name= $request->answer_name_sugg;
                $id_question = $request->question_sugg_id;
                $userid = $_SESSION['userid'];
                $answer= ModelQuestionAnswer::hrm_insert_answer_sugg($id_question,$answer_name,$userid); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);   
        }
    }
    // function view modal detail question and answer //
    public function hrm_view_detail_qestion_answer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id= $_GET['id'];
            $question_sugg_view = ModelQuestionAnswer::hrm_get_question_sugg($id); //query question suggestion
            $answer_sugg_get = ModelQuestionAnswer::hrm_get_answer_sugg($id); //query answer suggestion
            return view('hrms/suggestion/question_answer/ModalDetailQuestionAnswerSugg', ['question_sugg_view' => $question_sugg_view,'answer_sugg'=>$answer_sugg_get]);    
    }
    // function update modal detail question and answer //
    public function hrm_update_detail_qestion_answer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(perms::check_perm_module('HRM_09080105')){ //module code list data tables id=135
            $id= $_GET['id'];
            $question_sugg_view = ModelQuestionAnswer::hrm_get_question_sugg($id); //query question suggestion
            $answer_sugg_get = ModelQuestionAnswer::hrm_get_answer_sugg($id); //query answer suggestion
            return view('hrms/suggestion/question_answer/ModalUpdateQuestionAnswerSugg', ['question_sugg_view' => $question_sugg_view,'answer_sugg'=>$answer_sugg_get]);    
            }else{
                return view('no_perms');
            }
    }
    // function update detail question and answer //
    public function hrm_edit_detail_qestion_answer(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $validator = \Validator::make($request->all(), [
                'question_name1' => [ 'required'
                                        ],
                'answer_name' => [ 'required', 'array'
                                        ],
                "answer_name.*"  => "required|string|distinct",
            ],
            [   
                'question_name1.required' => 'The Question Field is Required !!',   //massage validator
                'statusType1.required'=> 'Please Select Status Question !!',
                'answer_name.required' => 'The Answer Field is Required !!',
                'status_answer.required' => 'Please Select Status Answer !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            $userid = $_SESSION['userid'];
            //update question
            $name_question= $request->question_name1;
            $status_question = $request->statusType1;
            $id_question= $request->question_id1;
            $question_update= ModelQuestionAnswer::hrm_edit_question_option_sugg($name_question,$status_question,$id_question,$userid); //get function insert from model
            //update answer
            $answer_name_edit= $request->answer_name;
            $answer_status = $request->status_answer;
            $answer_id = $request->answer_id;
            $userid = $_SESSION['userid'];
            foreach( $answer_name_edit as $key => $answer ) {
            $answer= ModelQuestionAnswer::hrm_edit_answer_sugg($answer,$answer_status[$key],$answer_id[$key],$userid); //get function insert from model
            }
            return response()->json(['success'=>'Record is successfully Update']);   
        }
    }
    // function deleted delete question and answer//
    public function delete_detail_question_answer_sugg()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09080103')){//module code list data tables id=133
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type_sugg=ModelQuestionAnswer::hrm_delete_question($id,$userid);
        $answer_get = ModelQuestionAnswer::hrm_get_answer_sugg($id);
        foreach($answer_get as $row){ // Get id from Answer by id question
            $id_answer[] = $row->id;
        }
        foreach( $id_answer as $key => $answer ) { //Delete answer by id question 
        ModelQuestionAnswer::hrm_delete_answer_sugg($answer,$userid);
        }
        }else{
            return view('no_perms');
        }
    }
}
