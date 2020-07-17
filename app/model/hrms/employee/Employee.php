<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    private function tlb(){
        return DB::table('users');
    }
    public static function all(){
        $tbl=self::tlb();
        return 1;
    }
    
    
}
