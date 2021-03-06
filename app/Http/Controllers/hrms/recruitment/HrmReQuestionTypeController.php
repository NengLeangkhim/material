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
            if(perms::check_perm_module('HRM_09090501')){//module code 
                $add_perm = '<button type="button" id="AddNewQuestionType" onclick=\'AddNewQuestionType()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Question Type</button>';
             }else{
                 $add_perm='';
            }
            $question_type = ModelHrmReQuestionType::get_tbl_recruitment_question_type(); //get database  from model
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($question_type as $row){
                $table_perm.= ' 
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->name.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($row->create_date)).'</td>
                        <td>'.$row->username.'</td>
                        <td class="text-center">';
                         if(perms::check_perm_module('HRM_09090502')){// Permission Update
                            $table_perm.= '<a href="#" id="'.$row->id.'" title="Update" class="update_qestion_type"><i class="far fa-edit"></i></a>';
                         }
                         if(perms::check_perm_module('HRM_09090503')){// Permission Delete
                            $table_perm.= '<a href="#" id="'.$row->id.'" title="Delete" onclick="delete_q_t_recruitment('.$row->id.')" class="delete_qestion_type"><i style="color:red;margin-left:10px;" class="fas fa-trash"></i></a>';
                         }
                $table_perm.= ' </td>
                               </tr>';
                }
                $table_perm.= '</tbody>';
            return view('hrms/recruitment/question_type/HrmReQuestionType', ['table_perm' => $table_perm,'add_perm'=>$add_perm]);
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
        $check_question=ModelHrmReQuestionType::hrm_check_delete_question_type_re($id);
        foreach($check_question as $check){
            $ch = $check->question;
        }
        if(!isset($ch)){
            $question_type=ModelHrmReQuestionType::hrm_delete_question_type($id,$userid);
            return response()->json(['success'=>'Record is successfully Delete']);
        }else{
            return response()->json(['errors'=>'Record can not Delete']);
        }
        }else{
            return view('no_perms');
        }
    }
}
