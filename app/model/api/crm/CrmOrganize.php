<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;

class CrmOrganize extends Model{
    //get all lead
    public static function getOrganize(){
        $lead = DB::select('select * from crm_lead where status');
        return $lead;
    }
}