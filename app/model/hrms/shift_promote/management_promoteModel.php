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
                WHERE s.status='t' AND pa.status = 't'  order by s.name ";

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
                WHERE s.status='t' AND pa.status = 't' AND s.id = $id order by s.name";
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




    public static function update_staff_shift($id, $position,$salary,$comment){

        try{
            $sql = " SELECT public.insert_hr_shift($id, $position, $salary, '1', '$comment')";
            DB::select($sql);
            DB::table('hr_payroll')->where('staff_id', $id)->update(['base_salary' => $salary]);
            return 1;
        }
        catch(\Illuminate\Database\QueryException $e){
            return 0;
        }
     

    }










}
