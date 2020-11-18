<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;

class warning_and_punishment extends Model
{
    //
    public static function warning_and_punishment_list(){
        try {
            return 1;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
