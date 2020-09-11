<?php

namespace App\model\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelCrmContact extends Model
{
    //Model Get Data Contact for Table
    public static function CrmContactGetData(){
        $contact= DB::table('crm_lead_contact as lc')
                           ->select('lc.*','ud.username')
                           ->leftjoin('ma_user_login as ud','lc.create_by','=','ud.ma_user_id')
                           ->where('lc.is_deleted','=','f')
                           ->orderBy('lc.id','ASC')
                           ->get(); 
        return $contact;
    }
    //Model Get Data Contact for Pagination
    public static function CrmContactGetDataPagination(){
        return DB::table('crm_lead_contact')->paginate(8);;
     }

}
