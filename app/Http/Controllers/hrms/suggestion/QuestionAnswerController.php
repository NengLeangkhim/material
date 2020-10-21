<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\suggestion\ModelQuestionAnswer;
use Illuminate\Database\QueryException;

class QuestionAnswerController extends Controller
{
    //
     //function show table//
     public function tbl_suggestion_question_answer()
     {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090801')){//module code list data tables id=103
                if(perms::check_perm_module('HRM_09080101')){ // Permission Add
                    $add_perm = '<button type="button" id="AddQuestionSugg" onclick=\'AddNewQuestionSugg()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Question</button>';
                 }else{
                     $add_perm='';
                 }
                  $question_sugg = ModelQuestionAnswer::hrm_get_tbl_suggestion_question();
                  $question_type = ModelQuestionAnswer::hrm_get_question_type();
                  $i=1;// variable increase number for table
                  $j=1;//for ID checkbox increase
                  $k=1;//for label increase
                  $table_perm= '<tbody>';
                foreach($question_sugg as $row){
                    $create = $row->create_date;
                  $table_perm.= '
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->question.'</td>
                        <td>'.$row->question_type.'</td>';
                  $table_perm.='<td class="text-center">';
                  $table_perm.='<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">';
                  if(perms::check_perm_module('HRM_09080107')){
                                if($row->status=='t'){
                                    $table_perm.='<input type="checkbox" value="'.$row->id.'" id="checkbox_sugg_q_a'.$j++.'" class="custom-control-input HrmCheckBoxSuggQA" checked> <label class="custom-control-label" for="checkbox_sugg_q_a'.$k++.'" style="color:green;"> Active</label>';
                                }else {
                                    $table_perm.='<input type="checkbox" value="'.$row->id.'" id="checkbox_sugg_q_a'.$j++.'" class="custom-control-input HrmCheckBoxSuggQA"> <label class="custom-control-label" for="checkbox_sugg_q_a'.$k++.'" style="color:red;"> Inactive</label>';
                                }
                   }else{
                    if($row->status=='t'){
                        $table_perm.='<input type="checkbox" disable class="custom-control-input " checked> <label class="custom-control-label" for="checkbox_sugg_q_a'.$k++.'" style="color:green;"> Active</label>';
                    }else {
                        $table_perm.='<input type="checkbox" disable class="custom-control-input "> <label class="custom-control-label" for="checkbox_sugg_q_a'.$k++.'" style="color:red;"> Inactive</label>';
                    }
                   }
                  $table_perm.='</div>';
                  $table_perm.='</td>';
                  if($row->hr_suggestion_question_type_id==1){ //condition check for question option
                        $table_perm.='<td class="text-center">';
                        $table_perm.= '
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                        if(perms::check_perm_module('HRM_09080106')){// Permission View
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_view_detail_question_answer">View Detail</button>';
                        }
                        if(perms::check_perm_module('HRM_09080102')){// Permission Update
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_question_answer">Update Detail</button>';
                        }
                        if(perms::check_perm_module('HRM_09080103')){// Permission Delete
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_delete_question_answer">Delete</button>';
                        }
                        if(perms::check_perm_module('HRM_09080104')){// Permission Add Answer
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item add_answer_sugg">Add Answer</button>';
                        }
                        if(perms::check_perm_module('HRM_09080108')){// Permission Get Result
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item view_result_sugg">Result</button>';
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
                        if(perms::check_perm_module('HRM_09080102')){// Permission Update
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item update_q_sugg">Update</button>';
                        }
                        if(perms::check_perm_module('HRM_09080103')){// Permission Delete
                            $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'hrm_delete('.$row->id.',"hrm_question_answer_sugg/delete","/hrm_question_answer_sugg","Question Has Been Deleted")\'  class="dropdown-item hrm_item delete_q_sugg">Delete</button>';
                        }
                        if(perms::check_perm_module('HRM_09080108')){// Permission Get Result
                            $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item view_result_sugg">Result</button>';
                        }
                        $table_perm.= ' </div>
                                        </div>
                                    </td>';

                 }
                  $table_perm.='</tr>';
                }//end foreach
                  $table_perm.='</tbody>';
                 return view('hrms/suggestion/question_answer/QuestionAnswerSugg', ['add_perm' => $add_perm,'question_type'=>$question_type,'table_perm'=>$table_perm]);
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
                $question= ModelQuestionAnswer::hrm_insert_question_sugg($name,$question_type_id,$userid); //get function insert from model
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
                $question_type= ModelQuestionAnswer::hrm_update_questions($id,$userid,$name,'t',$question_type_id); //get function insert from model
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
                'answer_name.*.required' => 'The Answer Field is Required !!',
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
            $question_update= ModelQuestionAnswer::hrm_edit_question_option_sugg($name_question,$status_question,$id_question,$userid); //get function update from model
            //update answer
            $answer_name_edit= $request->answer_name;
            $answer_status = $request->status_answer;
            $answer_id = $request->answer_id;
            $userid = $_SESSION['userid'];
            foreach( $answer_name_edit as $key => $answer ) {
            $answer= ModelQuestionAnswer::hrm_edit_answer_sugg($answer,$answer_status[$key],$answer_id[$key],$userid); //get function update from model
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
    // function view modal detail result suggestion //
    public function hrm_view_result_suggestion(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id= $_GET['id'];
            $result = ModelQuestionAnswer::hrm_result_suggestion($id); //query result suggestion
            return view('hrms/suggestion/question_answer/ModalResultSuggestion', ['result' => $result]);
    }
    // function Update Status Question //
    public function update_status_question_sugg()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09080105')){ //module code list data tables id=135
        $id = $_GET['id'];
        $status = $_GET['statusType'];
        $question_type_sugg=ModelQuestionAnswer::hrm_checkbox_answer_sugg($status,$id);
        }else{
            return view('no_perms');
        }
    }

    protected $modelQuestionAnswer;

    public function __construct()
    {
        $this->modelQuestionAnswer = new ModelQuestionAnswer();
    }


    public function getUserSuggested(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if(!perms::check_perm('HRM_090805')){
            return view('no_perms');
        }
        try {
            $suggestedList = $this->modelQuestionAnswer->getUserSuggested();
        } catch(QueryException $e){
            dd('ERROR'); exit;
        }
        return view('hrms.suggestion.staff_suggestion.staffSuggestion',['suggestedList'=>$suggestedList]);
    }

    public function getSuggestionSurveyReport(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if(!perms::check_perm('HRM_090804')){
            return view('no_perms');
        }
        try {
            $questionList = $this->modelQuestionAnswer->getAllQuestion();
            foreach($questionList as $question){
                switch($question->hr_suggestion_question_type_id){
                    case 1 : // MCQ Question Type
                        $question->is_mcq = true;
                    break;
                    default : // All Question Type
                        $question->is_mcq = false;
                }
                $question->question_answer_list = $this->modelQuestionAnswer->getAllAnswersByQuestionId($question->id, $question->is_mcq);
            }
        } catch(QueryException $e){
            dd('ERROR'); exit;
        }
        // dd($questionList); exit;
        return view('hrms.suggestion.suggestion_report.HrmSuggestionReport',['questionList'=>$questionList]);
    }
}
