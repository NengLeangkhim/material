<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
class QuestionAnswerController extends Controller
{
    //
     //function show table//
     public function tbl_suggestion_question_answer()
     {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090802')){//module code list data tables id=104
                //  $question_type_sugg = model_question_type::get_tbl_suggestion_question_type();
                 return view('hrms/suggestion/question_answer/QuestionAnswerSugg');
             }else{
                 return view('no_perms');
             }
          //var_dump($question_type_sugg);
     }
}
