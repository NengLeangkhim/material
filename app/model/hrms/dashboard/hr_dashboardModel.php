<?php

namespace App\model\hrms\dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class hr_dashboardModel extends Model
{
    

    // select all employee status = true
    public static function em_all(){
        $sql="	SELECT s.id, s.first_name_en, s.last_name_en, s.email, s.first_name_kh, s.last_name_kh,c_d.id as dept_id, c_d.name, s.contact,s.ma_position_id,s.sex,s.id_number,s.join_date,p.name as position,s.office_phone as office
                    FROM ma_user s JOIN ma_position p ON s.ma_position_id = p.id
                        INNER JOIN ma_company_dept c_d ON c_d.id = s.ma_company_dept_id
                        WHERE s.status='t' AND s.is_deleted ='f' order by s.create_date ASC ";
        return DB::select($sql);
    }



    //select all candidate status = true
    public static function candidate(){
        $sql = "SELECT id, fname, lname, name_kh, register_date FROM hr_recruitment_candidate
        WHERE status='t' ";
        return DB::select($sql);
    }



    //select all staff promote
    public static function all_shift(){
        $sql = "SELECT id, ma_user_id, create_date FROM hr_shift WHERE status='t'  order by create_date ASC";
        return DB::select($sql);
    }




    // select satff by each department
    public static function staff_byDept(){
        $sql = "SELECT s.id, s.first_name_en,s.last_name_en, s.create_date, c_d.id as dept_id, c_d.name as dept_name
            FROM ma_user s INNER JOIN ma_company_dept c_d
                ON c_d.id = s.ma_company_dept_id
                WHERE s.status='t'  order by s.create_date ASC";
        return DB::select($sql);     
    }










    // select number of staff attendance today by between 2 dates
    public static function staff_attendance($first,$last,$id){
        $f="'".$first."'";
        $l="'".$last."'";
        $check_in = "'Check-in'";
        $sql= 'SELECT name, "deviceID", "typeName", "deviceStamp" FROM hr_attendance 
            WHERE "deviceStamp" BETWEEN '.$f.' AND  '.$l.' AND 
                    "typeName" =  '.$check_in.' AND  "deviceID" = '.$id.' order by "deviceStamp" asc ';
        return DB::select($sql);    

    }




    // function to select staff submit sugguestion from table hr_suggestion_submite
    public static function All_staffSuggestion(){
            $sql = "SELECT * From hr_suggestion_submited WHERE status='t' AND is_deleted = 'f' ";
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




    // function to get plan of training list by today
    public static function plan_training($curret_date){
            $sql = " SELECT count(id) FROM hr_training_schedule WHERE '$curret_date' >= training_date_from
                    AND '$curret_date' <= training_date_to AND status = 't' AND is_deleted = 'f' ";
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




    // function to get all position available in staff
    public static function available_position(){
        $sql = " SELECT count(id) AS count_id FROM ma_user WHERE status='t' AND is_deleted ='f'
                    GROUP BY ma_position_id ";
        try {
            $r = DB::select($sql);
            return $r;
        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }
    }




    // function to get number of staff go outside or mission today
    public static function staff_mission($curret_date){
        $sql= " SELECT count(mis.id) FROM hr_mission mis 
                JOIN hr_mission_detail mis_de ON mis.id = mis_de.hr_mission_id 
                WHERE '$curret_date' >= mis.date_from  AND '$curret_date' <= mis.date_to  
                AND mis.status='t' AND mis.is_deleted = 'f'";
        try {
            $r = DB::select($sql);
            return $r;
        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }
    }


    // function to get number of staff submit suggestion or comment
    public static function staff_suggestion($date1,$date2){
        $sql= " SELECT count(id) FROM hr_suggestion_submited WHERE create_date Between  
		        '$date1' AND  '$date2' AND status='t' GROUP BY create_by ";
        try {
            $r = DB::select($sql);
            return $r;
        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }
    }






    // //function to get permission staff from table e_requestion_leaveapplication
    // public static function get_Permission(){

    // }


    









    

    



   

}
