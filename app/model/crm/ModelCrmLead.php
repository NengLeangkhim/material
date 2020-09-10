<?php

namespace App\model\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelCrmLead extends Model
{
// kopy create at 08/09/2020

    // Model get  lead
    public  static function  CrmGetLead(){
         return DB::select('SELECT * from crm_lead');
    }
    // Model get  lead by id
    public  static function  CrmGetLeadID($id){
        return DB::select('SELECT * from crm_lead WHERE id='.$id);
   }
    //Model get Lead source
    public static function CrmGetLeadSource(){
        return DB::select('SELECT * from select_crm_lead_source()');
    }
    //Model get lead Status
    public static function CrmGetLeadStatus(){
        return DB::select('SELECT * from crm_lead_status');
    }
    //Model get lead Industry
    public static function CrmGetLeadIndustry(){
        return DB::select("SELECT * from  crm_lead_industry");
    }
    //Model get lead user assigned to
    public static function CrmGetLeadAssigTo(){
        return DB::select("SELECT * from  ma_user");
    }
    //Model get lead privice 
    public static function CrmGetLeadProvice(){
        return DB::select("SELECT  * from public.get_gazetteers_province()");
    }
    // Model get lead district
    public static function CrmGetLeadDistrict ($id){
        return DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_district('$id')");
    }
    //Model get lead Commune
    public static function CrmGetLeadCommune ($id){
        return DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_commune('$id')");
    }
    // Model get lead Village
    public static function CrmGetLeadVillage ($id){
        return  DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_village('$id')");
    }
    // Model insert Lead source
    public static function CrmInsertLeadSource($name,$staff){
        return DB::select("SELECT public.insert_crm_lead_source('$name',null,$staff)");
    }
    // Model imset lead industry
    public static function CrmInsertLeadIndustry($name,$staff){
        return DB::select("SELECT public.insert_crm_lead_industry('$name',null,$staff)");
    }
}
