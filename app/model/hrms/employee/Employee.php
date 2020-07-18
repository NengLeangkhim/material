<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    // private static function tlb(){
    //     return DB::table('staff');
    // }
    public static function AllEmployees(){
        // $tbl=self::tlb();
        $x= DB::table('staff')->get();
        return $x;
    }
    
    
}
