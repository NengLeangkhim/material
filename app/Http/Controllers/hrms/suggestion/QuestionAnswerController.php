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
    // function deleted question type //
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

}
