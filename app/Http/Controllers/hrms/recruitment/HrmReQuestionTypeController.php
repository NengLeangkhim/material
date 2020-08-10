<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment\ModelHrmReQuestionType;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HrmReQuestionTypeController extends Controller
{
    //
    //function show table//
    public function tbl_recruitment_question_type()
    {     
     if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        if(perms::check_perm_module('HRM_090905')){//module code list data tables id=110
            $question_type = ModelHrmReQuestionType::get_tbl_recruitment_question_type(); //get database  from model
            return view('hrms/recruitment/question_type/HrmReQuestionType', ['question_type' => $question_type]);
        }else{
            return view('no_perms');
        }
    }
    //function insert //
    public function AddQuestionTypeRe(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_type' =>  [  'required',
                                            'max:255',
                                            Rule::unique('hr_recruitment_question_type','name')
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],//validate update for ignore unique if leave field not update,
            ],
            [
                'question_type.unique' => 'The Question Type is aleady exist',   //massage validator
                'question_type.required' => 'The Question Type is Require !!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090501')){//module code list data tables id=157
                $name= $request->question_type;
                $userid = $_SESSION['userid'];
                $question_type= ModelHrmReQuestionType::hrm_insert_question_type($name,$userid); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function get value to show on modal when update //
    public function GetEditQuestionTypeRe(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_GET['id'];
            $question_type = array();
            $question_type= ModelHrmReQuestionType::hrm_get_update_question_type($id); 
            return response()->json($question_type);
    }
    //function update //
    public function UpdateQuestionTypeRe(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_type' =>  [  'required',
                                            'max:255',
                                            Rule::unique('hr_recruitment_question_type','name')->ignore($request->question_type_id)
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],//validate update for ignore unique if leave field not update,
            ],
            [
                'question_type.unique' => 'The Question Type is aleady exist',   //massage validator
                'question_type.required' => 'The Question Type is Require !!'
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090502')){//module code list data tables id=158
                $id = $request->question_type_id;
                $name= $request->question_type;
                $userid = $_SESSION['userid'];
                $question_type_update= ModelHrmReQuestionType::hrm_update_question_type($id,$userid,$name,'t'); //get function update from model
                return response()->json(['success'=>'Record is successfully Update']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function deleted question type //
    public function delete_question_type_re(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09090503')){//module code list data tables id=159
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type=ModelHrmReQuestionType::hrm_delete_question_type($id,$userid);
        echo $question_type;
        }else{
            return view('no_perms');
        }
    }
}
