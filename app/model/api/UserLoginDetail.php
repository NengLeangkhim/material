<?php

namespace App\model\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserLoginDetail extends Model
{
    public static function insertLoginDetail($userId){
        $id = DB::selectOne('SELECT * FROM insert_login_detail('.$userId.')');
        return UserLoginDetail::verify($id->insert_login_detail);
    }

    public static function insertLogoutDetail($userId){
        $id = DB::selectOne('SELECT * FROM insert_logout_detail('.$userId.')');
        return UserLoginDetail::verify($id->insert_logout_detail);
    }

    public static function verify($id){
        return is_numeric($id);
    }

}
