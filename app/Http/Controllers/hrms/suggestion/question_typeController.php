<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\suggestion\model_question_type;

class question_typeController extends Controller
{
    public function tbl_suggestion_question_type()
    {   
        // $sql="SELECT qt.*,s.username from hr_question_type qt
        // left join staff_detail s on qt.create_by = s.staff_id where qt.is_deleted='f' order by qt.id";
         $question_type_sugg = model_question_type::get_tbl_suggestion_question_type();
        return view('hrms/suggestion/question_type/question_type_sugg', ['question_type_sugg' => $question_type_sugg]);
    }
}
