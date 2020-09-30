<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment\ModelHrmQuestionAnswer;
use App\model\hrms\recruitment\ModelHrmReQuestionType; // get model question type
use App\model\hrms\ModelHrmPermission; // get permission
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HrmQuestionAnswerController extends Controller
{
    //
    //function show table//
    public function tbl_recruitment_question()
    {     
     if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        if(perms::check_perm_module('HRM_090904')){//module code list data tables id=109
            if(perms::check_perm_module('HRM_09090401')){ // Permission Add
                $add_perm = '<button type="button" id="AddNewQuestionRe" onclick=\'AddNewQuestionRe()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Question</button>';
             }else{
                 $add_perm='';
            }
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid); // get query permission
            foreach($permission as $row){
                $group = $row->ma_group_id;
                $dept = $row->ma_company_dept_id;
            }
            if($group==5 || $group==1){ //permission check for CEO and Admin
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
                $position = ModelHrmPermission::hrm_get_position(); //query database
                $question_type = ModelHrmReQuestionType::hrm_get_question_type();
            }else if($group==4){//permission each departement
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
                $position = ModelHrmPermission::hrm_get_position(); //query database
                $question_type = ModelHrmReQuestionType::hrm_get_question_type();
            }else{//permission check user
                $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
                $position = ModelHrmPermission::hrm_get_position(); //query database
                $question_type = ModelHrmReQuestionType::hrm_get_question_type();
            }
            $question = ModelHrmQuestionAnswer::hrm_get_tbl_recruitment_question(); //get database  from model
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
          foreach($question as $row){
              $create = $row->create_date;
            $table_perm.= ' 
              <tr>
                  <th>'.$i++.'</th>
                  <td>'.$row->question.'</td>
                  <td>'.$row->question_type.'</td>
                  <td>'.$row->name.'</td>
                  <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                  <td>'.$row->username.'</td>';    
            if($row->hr_recruitment_question_type_id==1){ //condition check for question option
                  $table_perm.='<td class="text-center">';
                  $table_perm.= '
                      <div class="dropdown">
                          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                          </button>
                          <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                  if(perms::check_perm_module('HRM_09090404')){// Permission View
                      $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_re_detail_question_answer">View Detail</button>';
                  }
                  if(perms::check_perm_module('HRM_09090402')){// Permission Update
                      $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_question_answer_re">Update Detail</button>';
                  }
                  if(perms::check_perm_module('HRM_09090403')){// Permission Delete
                      $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'hrm_delete('.$row->id.',"hrm_question/deletedetail","/hrm_question","Question And Answer Has Been Deleted")\' class="dropdown-item hrm_item hrm_delete_question_answer_re">Delete</button>';
                  }
                  if(perms::check_perm_module('HRM_09090405')){// Permission Add Answer
                      if(is_null($row->delete)||$row->delete == 1){
                        $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item add_answer_re">Add Choice</button>';
                      }
                  }
                  $table_perm.= ' </div>
                                  </div>
                              </td>';
           }else{// Condition Check normal question
              $table_perm.='<td class="text-center">';
                  $table_perm.= '
                      <div class="dropdown">
                          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                          </button>
                          <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                  if(perms::check_perm_module('HRM_09090402')){// Permission Update
                      $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item update_question">Update</button>';
                  }
                  if(perms::check_perm_module('HRM_09090403')){// Permission Delete
                      $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'hrm_delete('.$row->id.',"hrm_question/delete","/hrm_question","Question Has Been Deleted")\'  class="dropdown-item hrm_item delete_question">Delete</button>';
                  }
                  $table_perm.= ' </div>
                                  </div>
                              </td>';
           }
            $table_perm.='</tr>';
          }//end foreach
            $table_perm.='</tbody>';
            return view('hrms/recruitment/question_answer/HrmQuestionAnswer', ['add_perm' => $add_perm,'table_perm'=>$table_perm,'question_type'=>$question_type,'dept'=>$department,'position'=>$position]);
        }else{
            return view('no_perms');
        }
    }
    //function insert Question //
    public function AddQuestionRecruitment(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_name' =>  [  'required',
                                            'max:255',
                                        ],
                'question_type' => [ 'required',
                                        ],
                'departement' => [ 'required',
                                    ],
                'position' => [ 'required',
                                        ],
            ],
            [
                'question_name.required' => 'The Question Name is Required !!',   //massage validator
                'question_type.required' => 'Please Select Question Type !!',
                'departement.required' => 'Please Select Departement !!',
                'position.required' => 'Please Select Position !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090401')){//module code list data tables id=160
                $question= $request->question_name;
                $question_type = $request->question_type;
                $dept = $request->departement;
                $position = $request->position;
                $userid = $_SESSION['userid'];
                $question= ModelHrmQuestionAnswer::hrm_insert_question($question,$dept,$question_type,$userid,$position); //get function insert from model
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function get value to show on modal when update //
    public function GetEditQuestion(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_GET['id'];
            $question = array();
            $question= ModelHrmQuestionAnswer::hrm_get_update_question($id); 
            return response()->json($question);
    }
    //function Updates Question //
    public function UpdateQuestionRecruitment(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_name' =>  [  'required',
                                            'max:255',
                                        ],
                'question_type' => [ 'required',
                                        ],
                'departement' => [ 'required',
                                    ],
                'position' => [ 'required',
                                        ],
            ],
            [
                'question_name.required' => 'The Question Name is Required !!',   //massage validator
                'question_type.required' => 'Please Select Question Type !!',
                'departement.required' => 'Please Select Departement !!',
                'position.required' => 'Please Select Position !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090402')){//module code list data tables id=161
                $id_question = $request->hr_recruitment_question_id;
                $question= $request->question_name;
                $question_type = $request->question_type;
                $dept = $request->departement;
                $position = $request->position;
                $userid = $_SESSION['userid'];
                $question= ModelHrmQuestionAnswer::hrm_update_question($id_question,$userid,$question,$dept,$question_type,'t',$position); //get function Update from model
                return response()->json(['success'=>'Record is successfully Update']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function deleted question//
    public function delete_question()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09090403')){//module code list data tables id=162
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type=ModelHrmQuestionAnswer::hrm_delete_question($id,$userid);
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
        if(perms::check_perm_module('HRM_09090401')){//module code list data tables id=160
            $id= $_GET['id'];
            $question_get = ModelHrmQuestionAnswer::hrm_get_question($id); //query question
            return view('hrms/recruitment/question_answer/HrmModalAddAnswer', ['question_get' => $question_get]);
        }else{
            return view('no_perms');
        }
        
    }
    //function insert Answer //
    public function HrmAddAnswer(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'answer_name' => [ 'required', 'array'
                                        ],
                "answer_name.*"  => "required|string|distinct",
            ],
            [
                'answer_name*.required' => 'The Answer Field is Required !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
                $answer_name= $request->answer_name;
                $id_question = $request->id_question;
                $right_wrong = $request->wrong_right;
                $userid = $_SESSION['userid'];
                foreach( $answer_name as $key => $answer ) 
                {
                    $answer= ModelHrmQuestionAnswer::hrm_insert_answer($answer,$id_question,$right_wrong[$key],$userid); //get function insert from model
                }
                return response()->json(['success'=>'Record is successfully added']);   
        }
    }
    // function view modal detail question and answer //
    public function hrm_re_detail_qestion_answer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id= $_GET['id'];
            $question_view = ModelHrmQuestionAnswer::hrm_get_recruitment_question($id); //query question 
            $answer_get = ModelHrmQuestionAnswer::hrm_get_answer($id); //query answer 
            return view('hrms/recruitment/question_answer/HrmModalDetailQuestionRe', ['question_view' => $question_view,'answer'=>$answer_get]);    
    }
    // function update modal detail question and answer //
    public function hrm_update_detail_qestion_answer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            if(perms::check_perm_module('HRM_09090402')){//module code list data tables id=161
            $id= $_GET['id'];
            $department = ModelHrmPermission::hrm_get_dept_ceo(); //query database
            $position = ModelHrmPermission::hrm_get_position(); //query database
            $question_type = ModelHrmReQuestionType::hrm_get_question_type();
            $answer_get = ModelHrmQuestionAnswer::hrm_get_answer($id); //query answer suggestion
            return view('hrms/recruitment/question_answer/HrmModalUpdateDetailQA', ['answer'=>$answer_get,'dept'=>$department,'position'=>$position,'question_type'=>$question_type]);    
            }else{
                return view('no_perms');
            }
    }
    //function Update Question and anwer //
    public function UpdateQuestionAnswerRecruitment(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'question_name_edit' =>  [  'required',
                                            'max:255',
                                        ],
                'question_type_edit' => [ 'required',
                                        ],
                'departement_edit' => [ 'required',
                                    ],
                'position_edit' => [ 'required',
                                        ],
                'answer_name_edit' => [ 'required', 'array'
                                    ],
                "answer_name_edit.*"  => "required|string|distinct",                              
                ],
            [
                'question_name_edit.required' => 'The Question Name is Required !!',   //massage validator
                'question_type_edit.required' => 'Please Select Question Type !!',
                'departement_edit.required' => 'Please Select Departement !!',
                'position_edit.required' => 'Please Select Position !!',
                'answer_name_edit*.required' => 'The Answer Field is Required !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09090402')){//module code list data tables id=161
                // Update Question
                $id_question = $request->question_id_edit;
                $question= $request->question_name_edit;
                $question_type = $request->question_type_edit;
                $dept = $request->departement_edit;
                $position = $request->position_edit;
                $userid = $_SESSION['userid'];
                $question= ModelHrmQuestionAnswer::hrm_update_question($id_question,$userid,$question,$dept,$question_type,'t',$position); //get function Update from model
                // Update Anwer
                $id_choice = $request->answer_id_edit;
                $answer_name= $request->answer_name_edit;
                $right_wrong = $request->wrong_right_edit;
                $userid = $_SESSION['userid'];
                foreach( $answer_name as $key => $answer ) 
                {
                    $answer= ModelHrmQuestionAnswer::hrm_edit_answer($id_choice[$key],$userid,$answer_name[$key],$id_question,$right_wrong[$key],'t'); //get function insert from model
                }
                return response()->json(['success'=>'Record is successfully Update']);
                }else{
                    return view('no_perms');
                }
        }
    }
    // function deleted delete question and answer//
    public function delete_detail_question_answer()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09090403')){//module code list data tables id=162
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question=ModelHrmQuestionAnswer::hrm_delete_question($id,$userid);
        $answer= ModelHrmQuestionAnswer::hrm_get_answer($id);
        foreach($answer as $row){ // Get id from Answer by id question
            $id_answer[] = $row->id;
        }
        foreach( $id_answer as $key => $answer ) { //Delete answer by id question 
            ModelHrmQuestionAnswer::hrm_delete_answer($answer,$userid);
        }
        }else{
            return view('no_perms');
        }
    }

}
