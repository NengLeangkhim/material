<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DepartmentAndPosition extends Model
{
    function AllDepartment(){
        $department=DB::table('company_dept')
        ->select('id','name','name_kh','company_id')
        ->where([
            ['company_id','=',8],
            ['status','=','t'],
            ['is_deleted','=','f']
            ])
        ->orderBy('name')->get();
        return $department;
    }
    function AllPosition(){
        $position=DB::table('position')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->orderBy('name')->get();
        return $position;
    }
}
