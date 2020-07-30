<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment\ModelHrmQuestionAnswer;
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
            $question = ModelHrmQuestionAnswer::hrm_get_tbl_recruitment_question(); //get database  from model
            return view('hrms/recruitment/question_answer/HrmQuestionAnswer', ['question' => $question]);
        }else{
            return view('no_perms');
        }
    }
}
