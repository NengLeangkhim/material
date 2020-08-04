<?php

namespace App\model\hrms\dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class hr_dashboardModel extends Model
{
    

    // select all employee status = true
    public static function em_all(){
        $sql="	SELECT s.id, s.name, s.email, s.name_kh,c_d.id as dept_id, c_d.name, s.contact,s.position_id, s.address,s.sex,s.id_number,s.join_date,p.name as position,s.office_phone as office
                    FROM staff s JOIN position p ON s.position_id = p.id
                        INNER JOIN company_dept c_d ON c_d.id = s.company_dept_id
                        WHERE s.status='t'  order by s.create_date ASC ";
        return DB::select($sql);
   
    }



    //select all candidate status = true
    public static function candidate(){
        $sql = "SELECT id, fname, lname, name_kh, register_date FROM hr_user WHERE status='t' ";
        return DB::select($sql);
    }



    //select all staff promote
    public static function all_shift(){
        $sql = "SELECT id, staff_id, create_date FROM hr_shift WHERE status='t'  order by create_date ASC";
        return DB::select($sql);
    }




    // select satff by each department
    public static function staff_byDept(){
        $sql = "SELECT s.id, s.name, s.create_date, c_d.id as dept_id, c_d.name as dept_name
            FROM staff s INNER JOIN company_dept c_d
                ON c_d.id = s.company_dept_id
                WHERE s.status='t'  order by s.create_date ASC";
        return DB::select($sql);     
    }




    // select number of staff attendance by today
    public static function staff_attendance(){

        $first = date('Y-m-d 02:00:00');
        $last = date('Y-m-d 12:00:00');
        // $first = '2020-07-04 07:00:00';
        // $last = '2020-07-04 07:30:00';
        $f="'".$first."'";
        $l="'".$last."'";
        $check_in = 'Check-in';
        $sql= 'SELECT name, "typeName", "deviceStamp" FROM hr_attendance 
                    WHERE "deviceStamp" BETWEEN '.$f.' AND  '.$l.' AND "typeName" = "'.$check_in.'" ';
        return DB::select($sql);            
    }



   

}
