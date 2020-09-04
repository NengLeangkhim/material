<?php

namespace App\model\setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModuleModel extends Model
{
    public static function get_module(){
        $sql="SELECT id,name,code,icon,sequence,link,status,is_show from ma_module order by name";
        $stmt=DB::select($sql);
        return $stmt;
    }
    public static function get_parent(){
        $sql="SELECT id,name FROM ma_module";
        $stmt=DB::select($sql);
        return $stmt;
    }


}
