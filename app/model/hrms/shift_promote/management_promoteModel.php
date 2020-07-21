<?php

namespace App\model\hrms\shift_promote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class management_promoteModel extends Model
{
    
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
}
