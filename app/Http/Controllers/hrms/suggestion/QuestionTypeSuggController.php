<?php

namespace App\Http\Controllers\hrms\suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\suggestion\model_question_type;
use App\Http\Controllers\perms;
class QuestionTypeSuggController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (session_status() == PHP_SESSION_NONE) {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hrms/suggestion/question_type/modal_add_question_type');
    }
    //function show modal //
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'question_type_sugg' => 'bail|required|unique:posts|max:255'
        ]);
        $name= $request->get('question_type_sugg');
        $userid = $_SESSION['userid'];
        $question_type= model_question_type::insert_question_type($name,$userid);
        $question_type->save();
        return redirect('hrms/suggestion/question_type/question_type_sugg')->with('success', 'Question Type saved!');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
