<?php

namespace App\model\hrms\recruitment_user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class recruitment_userModel extends Model
{

    
    // function to check if user input email that have already in table hr_user it will return ture(1) 
    public static function tbl_hrUser($em){
        $sql = "SELECT id, email FROM hr_user WHERE email = '".$em."'";
        $r  =  DB::select($sql);
        if(count($r) > 0){
            return 1;
        }else{
            return 0;
            
        }
    }




    // function to input user create account to table hr_user
    public static function insert_user_info($f_n, $l_n, $kh_n, $cv, $em, $pass, $pos, $cov){
        $sql = "SELECT public.insert_hr_user('$f_n', '$l_n', '$kh_n', '$cv', '$em', '$pass' ,'$pos', '$cov','')";
        DB::insert($sql);
    }





    // function to get user question test by position of user 

    public static  function select_user_question($id)
    {

        $r = DB::select("SELECT id, position_id FROM hr_user WHERE id = $id");
        if(count($r) > 0){
            $pos_id = $r['0']->position_id;

            $get_array[] = '';
            // select table user question where question type = 1  (option)
            $q1 = DB::select("SELECT id, question, question_type_id FROM hr_question 
                WHERE position_id = '".$pos_id."' AND question_type_id=1 AND status = 'true' ORDER BY RANDOM() LIMIT 20 ");
            if(count($q1) > 0){
                $get_array['question_option'] = $q1;
                
                    // foreach to get answer choice by question id
                    $x = 0;
                    foreach($q1 as $key=>$val){
                        $get_answer_choice[$x] = DB::select("SELECT id, choice, question_id, is_right_choice FROM hr_question_choice 
                                WHERE question_id = '".$val->id."' AND status = 'true' ORDER BY choice ASC");
                        
                        $x++;
                    }
                    $get_array['question_option_choice'] =  $get_answer_choice;
                
            }
            // select table user question where question type = 2   (writing)
            $q2 = DB::select("SELECT id, question, question_type_id FROM hr_question 
                WHERE position_id = '".$pos_id."' AND question_type_id = 2 AND status = 'true' ORDER BY RANDOM() LIMIT 10");
            if(count($q1) > 0){
                $get_array['question_writing'] = $q2;
            }


            
            return $get_array;
        }
        

    }














}   
