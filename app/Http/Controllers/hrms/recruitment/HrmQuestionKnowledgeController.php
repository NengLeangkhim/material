<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\recruitment\ModelHrmQuestionKnowledge;
use App\model\hrms\ModelHrmPermission; // get permission
use Illuminate\Validation\Rule;

class HrmQuestionKnowledgeController extends Controller
{
    //
    //function show table//
    public function tbl_question_knowledge()
    {     
     if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        if(perms::check_perm_module('HRM_090903')){//module code list data tables id=108
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
                $question_knowledge = ModelHrmQuestionKnowledge::hrm_get_tbl_question_knowledge();
            }else if($group==4){//permission each departement
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
                $question_knowledge = ModelHrmQuestionKnowledge::hrm_get_tbl_question_knowledge_dept($dept);
            }else{//permission check user
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
                $question_knowledge = ModelHrmQuestionKnowledge::hrm_get_tbl_question_knowledge();
            }
            return view('hrms/recruitment/knowledge_question/HrmKnowLedgeQuestion', ['question_knowledge' => $question_knowledge,'dept'=>$department]);
        }else{
            return view('no_perms');
        }
    }
    //function insert Question //
    public function AddQuestionKnowledge(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_knowledge' =>  [  'required',
                                            'max:255',
                                        ],
                'departement_knowledge' => [ 'required',
                                    ],
            ],
            [
                'question_knowledge.required' => 'The Question Name is Required !!',   //massage validator
                'departement_knowledge.required' => 'Please Select Departement !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090301')){//module code list data tables id=164
                $question_name= $request->question_knowledge;
                $dept_id = $request->departement_knowledge;
                $userid = $_SESSION['userid'];
                $question= ModelHrmQuestionKnowledge::hrm_insert_question_knowledge($question_name,$dept_id,$userid); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function get value to show on modal when update //
    public function GetEditQuestionKnowledge(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_GET['id'];
            $question = array();
            $question= ModelHrmQuestionKnowledge::hrm_get_question_knowledge($id); 
            return response()->json($question);
    }
    //function Update Question //
    public function UpdateQuestionKnowledge(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_knowledge' =>  [  'required',
                                            'max:255',
                                        ],
                'departement_knowledge' => [ 'required',
                                    ],
            ],
            [
                'question_knowledge.required' => 'The Question Name is Required !!',   //massage validator
                'departement_knowledge.required' => 'Please Select Departement !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090302')){//module code list data tables id=165
                $question_id = $request->question_knowledge_id;
                $question_name= $request->question_knowledge;
                $dept_id = $request->departement_knowledge;
                $userid = $_SESSION['userid'];
                $question= ModelHrmQuestionKnowledge::hrm_update_question_knowledge($question_id,$userid,$question_name,$dept_id,'t'); //get function insert from model
                return response()->json(['success'=>'Record is successfully Update']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function deleted question knowledge //
    public function delete_question_knowledge(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09090302')){//module code list data tables id=166
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question= ModelHrmQuestionKnowledge::hrm_delete_question_knowledge($id,$userid); //get function insert from model
        //var_dump($question_type_sugg);
        }else{
            return view('no_perms');
        }
    }
}
