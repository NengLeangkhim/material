<?php

namespace App\model\hrms\shift_promote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class management_promoteModel extends Model
{
    
    // Select all employee from table: staff, payroll, position 
    public static function AllEmployee(){   
        $sql=" SELECT s.id, s.name, s.email, s.name_kh, s.contact,s.position_id, pa.base_salary, pa.create_date , s.address,s.sex,s.id_number,s.join_date,p.name as position,s.office_phone as office
                FROM ((staff s 
                INNER JOIN hr_payroll pa
                    ON s.id = pa.staff_id)
                INNER JOIN position p 
                    ON s.position_id = p.id) 
                WHERE s.status='t' order by s.name ";

        $em = DB::select($sql);
        return $em;

    }
    // end function



    // Select all employee from table: staff, payroll, position by staff id
    public static function AllEmployeeByID($id){
        $sql=" SELECT s.id, s.name, s.email, s.name_kh, s.contact,s.position_id, pa.base_salary, pa.create_date , s.address,s.sex,s.id_number,s.join_date,p.name as position,s.office_phone as office
                FROM ((staff s 
                INNER JOIN hr_payroll pa
                    ON s.id = pa.staff_id)
                INNER JOIN position p 
                    ON s.position_id = p.id) 
                WHERE s.status='t' AND s.id = $id order by s.name";
        $em = DB::select($sql);
        return $em;
    }
    // end function 





    //Select cell from table: position only
    public static function position(){
        $pos = DB::table('position')->get();
        return $pos;
    }
    // End select




    public static function update_staff_shift(){
        // $userid = 262;

        DB::table('hr_payroll')->where('staff_id', 262)->update(['base_salary' => '8888']);
        DB::table('staff')->where('id', 262)->update(['position_id' => '777']);
        

    }










}
