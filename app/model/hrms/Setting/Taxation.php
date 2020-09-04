<?php

namespace App\model\hrms\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Taxation extends Model
{
    function Taxation(){
        $sql="";
        return DB::select($sql);
    }
}