<?php

namespace App\model\hrms\shift_promote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class management_promoteModel extends Model
{
    
    // Select all employee from table: ma_user, payroll, ma_position
    public static function AllEmployee(){   
        $sql=" SELECT s.id, s.first_name_en, s.last_name_en, concat(s.first_name_en,' ',s.last_name_en) as full_en_name, s.email, s.first_name_kh, s.last_name_kh, s.contact,s.ma_position_id, pa.base_salary, pa.create_date ,s.sex,s.id_number,s.join_date,p.name as ma_position,s.office_phone as office
                FROM ((ma_user s 
                INNER JOIN hr_payroll pa
                    ON s.id = pa.ma_user_id)
                INNER JOIN ma_position p 
                    ON s.ma_position_id = p.id) 
                WHERE s.status='t' AND pa.status = 't'  order by full_en_name ";

        $em = DB::select($sql);
        return $em;

    }
    // end function



    // Select all employee from table: ma_user, payroll, position by staff id
    public static function AllEmployeeByID($id){
        $sql=" SELECT s.id, s.first_name_en, s.last_name_en,concat(s.first_name_en,' ',s.last_name_en) as full_en_name, s.email, s.first_name_kh, s.last_name_kh, s.contact,s.ma_position_id, pa.base_salary, pa.create_date ,s.sex,s.id_number,s.join_date,p.name as ma_position,s.office_phone as office
                FROM ((ma_user s 
                INNER JOIN hr_payroll pa
                    ON s.id = pa.ma_user_id)
                INNER JOIN ma_position p 
                    ON s.ma_position_id = p.id) 
                WHERE s.status='t' AND pa.status = 't' AND s.id = $id order by full_en_name";
        $em = DB::select($sql);
        return $em;
    }
    // end function 




    

    //Select cell from table: position only
    public static function position(){
        $pos = DB::table('ma_position')->get();
        return $pos;
    }
    // End select




    /* function to update shift when management comment promote*/
    public static function update_staff_shift($id, $position,$salary,$comment){

        try{
            $sql = " SELECT public.insert_hr_shift($id, $position, $salary, '1', '$comment')";
            DB::select($sql);
            DB::table('hr_payroll')->where('ma_user_id', $id)->update(['base_salary' => $salary]);
            return 1;
        }
        catch(\Illuminate\Database\QueryException $e){
            return 0;
        }
     

    }




    /* function to info staff promote by their id*/

    public static function get_shift_promoteByID($id){

        $sql = "SELECT hs.id, s.id as ma_user_id, s.first_name_en, s.last_name_en, p.name as position, hs.salary, hs.create_date, hs.comment 
                FROM ((hr_shift  hs
                INNER JOIN ma_user s ON hs.ma_user_id = s.id) 
                INNER JOIN ma_position p ON hs.position_id = p.id) 
                WHERE hs.status='t' AND hs.is_deleted='f' AND hs.create_date = (SELECT MAX(create_date) FROM hr_shift  WHERE ma_user_id= $id)";
        $r = DB::select($sql);
        return $r;

    }
    // end





    /* function get detail to staff view thier promote */
    public static function get_promote_staff_detail($id){
        $sql = "SELECT s.first_name_en, s.last_name_en, p.name as position_name, hs.salary, hs.create_date, hs.comment
                FROM ((hr_shift hs 
                INNER JOIN ma_user s ON hs.ma_user_id = s.id ) 
                INNER JOIN ma_position p ON hs.position_id = p.id) 
                WHERE ma_user_id = $id order by create_date ASC";

        $r = DB::select($sql);
        return $r; 
    }

    // end 






    /* function to get all staff was promote from table: hr_shift  */

    public static function all_shift_promote(){
        $sql = "SELECT hs.id, s.id as ma_user_id, s.first_name_en, s.last_name_en,concat(s.first_name_en,' ',s.last_name_en) as full_en_name , p.name as position, hs.salary, hs.create_date, hs.comment FROM 
                ((hr_shift  hs 
                INNER JOIN ma_user s ON hs.ma_user_id = s.id) 
                INNER JOIN ma_position p ON hs.position_id = p.id) WHERE hs.status = 't' AND hs.is_deleted = 'f' order by full_en_name ASC ";
        $r = DB::select($sql);
        return $r; 
    }

    // end





    
    /* function to get all staff was promote by staff id from table: shift  */
    public static function all_shift_promoteByID($id){
        $sql = "SELECT hs.id, s.id as ma_user_id, s.first_name_en, s.last_name_en, p.name as position, hs.salary, hs.create_date, hs.comment FROM 
                ((hr_shift  hs 
                INNER JOIN ma_user s ON hs.ma_user_id = s.id) 
                INNER JOIN ma_position p ON hs.position_id = p.id) 
                WHERE s.id = $id order by hs.create_date DESC ";
        $r = DB::select($sql);
        return $r; 
    }

    // end





    /*  function to get all staff promote between two date for report search*/
    public static function get_promoteByDate($from,$to){
        $sql = "SELECT hs.id, s.id as ma_user_id, s.first_name_en, s.last_name_en, p.name as position, hs.salary, hs.create_date, hs.create_by, hs.comment FROM 
                ((hr_shift  hs 
                INNER JOIN ma_user s ON hs.ma_user_id = s.id) 
                INNER JOIN ma_position p ON hs.position_id = p.id) 
                WHERE hs.create_date Between  '$from 00:00:00'  AND  '$to 11:59:59'
                ORDER BY hs.create_date DESC";
        $r = DB::select($sql);
        return $r; 
    }
    //end





    /*  function to select view shift promte report detail by staff id*/
    public static function promote_report_detailByID_Date($id,$date){
        $sql = "SELECT hs.id, s.id as ma_user_id, s.first_name_en, s.last_name_en, p.name as position, hs.salary, hs.create_date, hs.create_by, hs.comment FROM 
                ((hr_shift  hs 
                INNER JOIN ma_user s ON hs.ma_user_id = s.id) 
                INNER JOIN ma_position p ON hs.position_id = p.id)
                WHERE hs.create_date = '$date' AND s.id = $id ";
        $r = DB::select($sql);
        return $r; 
    }
    //end













}
