<?php

namespace App\model\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelCrmOrganization extends Model
{
    //
    //Model get Lead source
    public static function CrmGetContact(){
        return DB::select('SELECT * from crm_lead_contact');
    }
}
