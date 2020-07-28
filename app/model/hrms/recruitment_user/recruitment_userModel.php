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














}   
