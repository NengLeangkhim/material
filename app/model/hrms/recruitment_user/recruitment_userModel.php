<?php

namespace App\model\hrms\recruitment_user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;



class recruitment_userModel extends Model
{

    
    // function to check if user input email that have already in table hr_recruitment_candidate it will return ture(1) 
    public static function tbl_hrUser($em){
        $sql = "SELECT id, email FROM hr_recruitment_candidate WHERE email = '".$em."'";
        $r  =  DB::select($sql);
        if(count($r) > 0){
            return 1;
        }else{
            return 0;
            
        }
    }




    // function to input user create account to table hr_recruitment_candidate
    public static function insert_user_info($f_n, $l_n, $kh_n, $cv, $em, $pass, $pos, $cov){
        $sql = "SELECT public.insert_hr_recruitment_candidate('$f_n', '$l_n', '$kh_n', '$cv', '$em', '$pass' ,'$pos', '$cov','')";
        DB::insert($sql);
    }





    // function to get user question test by position of user 

    public static  function select_user_question($id)
    {

        $r = DB::select("SELECT id, ma_position_id FROM hr_recruitment_candidate WHERE id = $id");
        if(count($r) > 0){
            $pos_id = $r['0']->ma_position_id;

            $get_array[] = '';
            // select table user question where question type = 1  (option)
            $q1 = DB::select("SELECT id, question, hr_recruitment_question_type_id FROM hr_recruitment_question 
                WHERE ma_position_id = '".$pos_id."' AND hr_recruitment_question_type_id=1 AND is_deleted = 'false' ORDER BY RANDOM() LIMIT 20 ");
            if(count($q1) > 0){
                $get_array['question_option'] = $q1;
                
                    // foreach to get answer choice by question id
                    $x = 0;
                    foreach($q1 as $key=>$val){
                        $get_answer_choice[$x] = DB::select("SELECT id, choice, hr_recruitment_question_id, is_right_choice FROM hr_recruitment_question_choice 
                                WHERE hr_recruitment_question_id = '".$val->id."' AND status = 'true' ORDER BY choice ASC");
                        
                        $x++;
                    }
                    $get_array['question_option_choice'] =  $get_answer_choice;
                
            }
            // select table user question where question type = 2   (writing)
            $q2 = DB::select("SELECT id, question, hr_recruitment_question_type_id FROM hr_recruitment_question 
                WHERE ma_position_id = '".$pos_id."' AND hr_recruitment_question_type_id = 2 AND status = 'true' ORDER BY RANDOM() LIMIT 10");
            if(count($q1) > 0){
                $get_array['question_writing'] = $q2;
            }
            
            return $get_array;
        }
        

    }





    // function insert user answer
    public static  function submit_answer($c_id,$q_id,$an_text,$is_true,$start,$end,$userid){
        $sql = "INSERT INTO hr_recruitment_candidate_answer(hr_recruitment_question_choice_id, hr_recruitment_question_id, answer_text, is_right, start_time, end_time, status, hr_recruitment_candidate_id ) 
                VALUES($c_id, ".$q_id.", '$an_text', '$is_true', '$start', '$end', 't', '$userid')";
        
        try {
            $r = DB::insert($sql);
            if($r == true){
                return $r;
            }else{
                return 0;
            }
        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        // Note any method of class PDOException can be called on $ex.
        }
    
        
    }
    // end function




    // function check login user email & password

    public static function login_check($em,$pass)
    {
            $sql = "SELECT id, fname, lname, name_kh, email, password FROM hr_recruitment_candidate WHERE email = '".$em."' AND password = '".$pass."' AND status= 't' ";
            try {
                $r = DB::select($sql);
                return $r;
            }catch(\Illuminate\Database\QueryException $ex){
                dump($ex->getMessage());
                echo '<br><a href="/">go back</a><br>';
                echo 'exited';
                exit;
            // Note any method of class PDOException can be called on $ex.
            }


    }



    // function select table hr_recruitment_candidate 

    public static function user_info($id){
        
        $sql = "SELECT hu.*, p.name as ma_position FROM hr_recruitment_candidate hu
             JOIN ma_position p ON hu.ma_position_id = p.id  WHERE  hu.id = ".$id." ";
        $r = DB::select($sql);
        return $r;
    }







    // fucntion get result quiz for user 

    public static function user_quiz_result($id){

        $sql = "SELECT  q.question, q_t.id as q_type_id, q_t.name as question_type, CONCAT(q_c.choice, u_a.answer_text) as user_answer, u_a.is_right, u_a.start_time, u_a.end_time  
                FROM ((hr_recruitment_candidate_answer u_a 
                LEFT JOIN hr_recruitment_question_choice q_c ON  u_a.hr_recruitment_question_choice_id= q_c.id) 
                JOIN hr_recruitment_question q ON u_a.hr_recruitment_question_id = q.id) 
                LEFT JOIN hr_recruitment_question_type q_t ON q.hr_recruitment_question_type_id = q_t.id  where u_a.hr_recruitment_candidate_id = ".$id." ";
            
            try{
                $r = DB::select($sql);
                return $r;
                
            }catch(\Illuminate\Database\QueryException $ex){
                dump($ex->getMessage());
                echo '<br><a href="/">go back</a><br>';
                echo 'exited';
                exit;
            // Note any method of class PDOException can be called on $ex.
            }



    }


    // functon for check true faile question option
    public static function check_true_faile($ch_id, $q_id){
        $sql = "SELECT id, hr_recruitment_question_id, is_right_choice FROM hr_recruitment_question_choice WHERE id = $ch_id AND  hr_recruitment_question_id = $q_id";
        $r = DB::select($sql);
        return $r;
    }




    // function to check get result from hr to candidate do quiz
    public static function  check_hr_resultModel($id){

        $sql = " SELECT hu.id, hu.name_kh, ap.hr_approval_status, ap.create_date, ap.comment 
                FROM hr_recruitment_candidate_detail ap FULL JOIN hr_recruitment_candidate hu ON  ap.hr_recruitment_candidate_id = hu.id
                WHERE ap.create_date=(SELECT MAX(ap.create_date) 
                FROM hr_recruitment_candidate_detail ap WHERE ap.hr_recruitment_candidate_id = $id) ";
                
        try{
            $r = DB::select($sql);
            return $r;
            
        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        // Note any method of class PDOException can be called on $ex.
        }

    }










}   
