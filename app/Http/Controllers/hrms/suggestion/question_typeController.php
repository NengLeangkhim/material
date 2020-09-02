<?php

namespace App\Http\Controllers\hrms\suggestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\suggestion\model_question_type;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
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
    public function AddQuestionTypeSugg(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_type_sugg' =>  [  'required',
                                            'max:255',
                                            Rule::unique('hr_suggestion_question_type','name')
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],//validate update for ignore unique if leave field not update,
            ],
            [
                'question_type_sugg.unique' => 'The Question Type is aleady exist',   //massage validator
                'question_type_sugg.required' => 'The Question Type is Require !!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            // $error = array();
            // $error= $validator->messages()->all();
            // return response()->json(['errors'=>$error]);
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09080201')){//module code list data tables id=129
                $name= $request->question_type_sugg;
                $userid = $_SESSION['userid'];
                $question_type= model_question_type::hrm_insert_question_type($name,$userid); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
    //function update question type //
    public function EditQuestionTypeSugg(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_type_sugg' => ['required',
                                         'max:255',
                                         Rule::unique('hr_suggestion_question_type','name')->ignore($request->action_q_t_sugg_id)
                                         ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],//validate update for ignore unique if leave field not update
            ]
            ,
            [
                'question_type_sugg.unique' => 'The Question Type is aleady exist',   //massage validator
                'question_type_sugg.required' => 'The Question Type is Require !!'
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                // if(perms::check_perm_module('HRM_090801')){//module code list data tables id=129
                    $id=$request->action_q_t_sugg_id;
                    $name= $request->question_type_sugg;
                    $userid = $_SESSION['userid'];
                    $question_type= model_question_type::hrm_update_question_type($id,$userid,$name); //get function insert from model
                    return response()->json(['success'=>'Record is successfully update']);
                    // }else{
                    //     return view('no_perms');
                    // }
            }
         
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
        $check_question=model_question_type::hrm_check_delete_question_type_sugg($id);
        foreach($check_question as $check){
            $ch = $check->question;
        }
        if(!isset($ch)){
            $question_type_sugg=model_question_type::hrm_delete_question_type($id,$userid);
            return response()->json(['success'=>'Record is successfully Delete']);
        }else{
            return response()->json(['errors'=>'Record can not Delete']);
        }
        //var_dump($question_type_sugg);
        }else{
            return view('no_perms');
        }
    }
}
