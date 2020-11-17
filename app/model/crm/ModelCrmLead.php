<?php

namespace App\model\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ModelCrmLead extends Model
{
// kopy create at 08/09/2020

    // Model get  lead
    public  static function  CrmGetLead(){

        $token = $_SESSION['token'];
        $request = Request::create('/api/getlead', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
         return $res->getContent();
    }
    // Model get  branch by id
    public  static function  CrmGetBranch($id){

        $token = $_SESSION['token'];
        $request = Request::create('/api/getbranchbylead/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
        // dd($res->getContent());
    }
    // Model get detail branch
    public static function CrmGetDetailBranch($id){
        $token = $_SESSION['token'];
        $request = Request::create('/api/getbranch/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();
    }
    // Model get detail lead
    public static function CrmGetDetaillead($id){
        $token = $_SESSION['token'];
        $request = Request::create('/api/getleadbyid/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();
    }
    // Model get  lead by id
    public  static function  CrmGetLeadID($id){
        $token = $_SESSION['token'];
        $request = Request::create('/api/getbranch/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
   }
   // Model get schedule type
   public static function CrmGetSchdeuleType(){
        $token = $_SESSION['token'];
        $request = Request::create('/api/getscheduletype', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
   }

   // Model get schedule  by id 
   public static function CrmGetSchdeuleById($id){
        $token = $_SESSION['token'];
        $request = Request::create('/api/getschedule/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    //Model get Lead source
    public static function CrmGetLeadSource(){
        return DB::select('SELECT * from select_crm_lead_source()');
    }
    //Model get lead Status
    public static function CrmGetLeadStatus(){
        return DB::select('SELECT * from crm_lead_status where is_deleted=false and status =true ORDER BY sequence ASC');
    }
    //Model get lead Industry
    public static function CrmGetLeadIndustry(){
        return DB::select("SELECT * from  crm_lead_industry ");
    }
    //Model get lead user assigned to
    public static function CrmGetLeadAssigTo(){
        return DB::select("SELECT * from  ma_user WHERE is_deleted=FALSE and status=TRUE ORDER BY id ASC");
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
    // Model Get survey
    public static function Getsurvey(){

        $token = $_SESSION['token'];
        $request = Request::create('/api/survey', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();       
    }
    // Model Get survey result
    public static function GetsurveyResult(){

        $token = $_SESSION['token'];
        $request = Request::create('/api/surveyresult', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();       
    }
}
