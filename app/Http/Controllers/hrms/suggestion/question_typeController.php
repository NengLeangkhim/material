<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\suggestion\model_question_type;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\DB;

class question_typeController extends Controller
{  
    //function show table//
    public function tbl_suggestion_question_type()
    {      if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            if(perms::check_perm_module('HRM_090802')){//module code list data tables id=104
                $question_type_sugg = model_question_type::get_tbl_suggestion_question_type();
                return view('hrms/suggestion/question_type/question_type_sugg', ['question_type_sugg' => $question_type_sugg]);
            }else{
                return view('no_perms');
            }
         //var_dump($question_type_sugg);
    }
    ///function show modal //
    public function modal_question_type_sugg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09080201')){//module code add question type id=129
                return view('hrms/suggestion/question_type/modal_add_question_type');
        }else{
            return view('no_perms');
        }
    }
    //function insert ////
    public function add_suggestion_question_type(){
       
            $userid = $_SESSION['userid'];
            return model_question_type::insert_document_details_Call($name,$userid);

    }
}
