<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\suggestion\ModelHrmSuggestion;

class HrmSuggestionController extends Controller
{
    //
    //function index suggestion comment//
    public function index_suggestion()
    {      if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            if(perms::check_perm_module('SUGG_1001')){//module code list data tables id=169

                return view('hrms/suggestion/suggestion_survey/HrmSuggestionComment');
            }else{
                return view('no_perms');
            }
    }
    //function insert Question //
    public function SubmitSuggEmployee(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'employee_sugg' =>  [  'required',
                                        ],
            ],
            [
                'employee_sugg.required' => 'This Field is required !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('SUGG_1001')){//module code list data tables id=169
                $userid = $_SESSION['userid'];
                $suggestion= $request->employee_sugg;
                $submit= ModelHrmSuggestion::hrm_submit_suggestion(12,Null,$suggestion,$userid); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
    //function index suggestion Suvery//
    public function index_suggestion_survey()
    {      if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            if(perms::check_perm_module('SUGG_1002')){//module code list data tables id=170
                $question = ModelHrmSuggestion::hrm_get_question_sugg();
                $answer = ModelHrmSuggestion::hrm_get_answer_sugg();
                return view('hrms/suggestion/suggestion_survey/HrmSurveySuggestion',['question'=>$question,'answer'=>$answer]);
            }else{
                return view('no_perms');
            }
    }
    //function Submit Survey //
    public function SubmitSuggSurvey(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $question_radio = $request->question_radio;
            $rules = array(   
                'answer_text'    => 'required|array',
                "answer_text.*"  => "required", );
            foreach($question_radio as $key=>$value){
            $rules['radio_ans.'.$value] =  'required';
            }
                $validator = \Validator::make($request->all(),$rules,
                [
                    'answer_text.*.required' => 'This Field is required !!',   //massage validator
                    'radio_ans.*.required' => 'This Field is required !!',   //massage validator
                    ]
                );
           
            
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('SUGG_1002')){//module code list data tables id=170
                $userid = $_SESSION['userid'];
                $question_text = $request->question_text;
                $answer_text= $request->answer_text;
                $answer_radio= $request->radio_ans;
                foreach( $question_text as $key => $question ) 
                {
                    $submit= ModelHrmSuggestion::hrm_submit_suggestion($question,Null,$answer_text[$key],$userid); //get function insert from model
                }
                foreach( $question_radio as $key => $question ) 
                {
                    $submit_answer= ModelHrmSuggestion::hrm_submit_suggestion($question,$answer_radio[$question],Null,$userid); //get function insert from model
                }
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
}
