<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table="staff";
    public $timestamps = false;
    function AllEmployee(){
        $employee = DB::table('staff')->select('staff.name as name', 'staff.name_kh', 'staff.id_number', 'staff.email', 'staff.contact', 'staff.join_date', 'position.name as position')
        ->join('position', 'position.id', '=', 'staff.position_id')
        ->where([
            ['staff.status', '=', 't'],
            ['staff.is_deleted', '=', 'f']
        ])->orderBy('staff.name')->get();
        return $employee;
    }
    
    
    
}
