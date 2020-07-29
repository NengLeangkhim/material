<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\performance\ModelHrmPerformScore;
use Illuminate\Validation\Rule;
class HrmPerformScoreController extends Controller
{
    //
    // function Index Performance Score // hrm_performance_score
    public function HrmIndexPerformScore(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090705')){//module code list data tables id=100
            $perform_score = ModelHrmPerformScore::hrm_get_tbl_perform_score();
            return view('hrms/performance/performance_score/HrmPerformScore',['perform_score'=>$perform_score]); 
        }else{
            return view('no_perms');
        }
    } 
    //function insert Performance Score //
    public function hrm_insert_perform_score(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'score_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_score','name')
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'score_value' =>  [ 'required',
                                    'integer',
                                    'between:1,100',
                                    Rule::unique('hr_performance_score','value')
                                                ->where(function ($query) use ($request) {
                                                return $query->where('is_deleted', 'f');})
                                            ],
            ],
            [
                'score_name.required' => 'The Score Name is Required !!',   //massage validator
                'score_value.required' => 'Please Insert Number !!',
                'score_name.unique' => 'The Score Name is Already exist !!',  
                'score_value.unique' => 'The Score Value is Already exist !!',   
                'score_value.integer' => 'Please Insert only Number !!',
                'score_value.between' => 'Please Insert From 1 to 100 !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070501')){//module code list data tables id=154
            $userid= $_SESSION['userid'];
            $score_name = $request->score_name;
            $value = $request->score_value;
            $insert_score = ModelHrmPerformScore::hrm_insert_perform_score($score_name,$value,$userid); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
    }
    //function get data for update score
    public function hrm_get_data_perform_score()
    {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             $id = $_GET['id'];
             $score_get = array();
             $score_get= ModelHrmPerformScore::hrm_get_score($id); 
             return response()->json($score_get);
    }
    //function Update Performance Score //
    public function hrm_update_perform_score(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'score_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_score','name')->ignore($request->performance_score_id)// ingore by id 
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'score_value' =>  [ 'required',
                                    'integer',
                                    'between:1,100',
                                    Rule::unique('hr_performance_score','value')->ignore($request->performance_score_id)// ingore by id 
                                                ->where(function ($query) use ($request) {
                                                return $query->where('is_deleted', 'f');})
                                            ],
            ],
            [
                'score_name.required' => 'The Score Name is Required !!',   //massage validator
                'score_value.required' => 'Please Insert Number !!',
                'score_name.unique' => 'The Score Name is Already exist !!',  
                'score_value.unique' => 'The Score Value is Already exist !!',   
                'score_value.integer' => 'Please Insert only Number !!',
                'score_value.between' => 'Please Insert From 1 to 100 !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070502')){//module code list data tables id=155
            $userid= $_SESSION['userid'];
            $id_score = $request->performance_score_id;
            $score_name = $request->score_name;
            $value = $request->score_value;
            $update_score = ModelHrmPerformScore::hrm_update_perform_score($id_score,$userid,$score_name,$value); //Update data
            return response()->json(['success'=>'Record is successfully Update']);
            }else{
                return view('no_perms');
            }
        }
    }
    // function deleted Score Performance //
    public function hrm_delete_perform_score(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09070503')){//module code list data tables id=156
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type_sugg=ModelHrmPerformScore::hrm_delete_perform_score($id,$userid);
        }else{
            return view('no_perms');
        }
    }
}
