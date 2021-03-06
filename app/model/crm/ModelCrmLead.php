<?php

namespace App\model\crm;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModelCrmLead extends Model
{
    // kopy create at 08/09/2020

    // Model get  lead
    public  static function  CrmGetLead()
    {

        $token = $_SESSION['token'];
        $request = Request::create('/api/getlead', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    //method support for datatable server side processing
    public  static function  CrmGetLeadDataTable($request)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getlead-datatable' . $request, 'GET'); //
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    // Model get  branch by id
    public  static function  CrmGetBranch($id)
    {

        $token = $_SESSION['token'];
        $request = Request::create('/api/getbranchbylead/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
        // dd($res->getContent());
    }
    // Model get detail branch
    public static function CrmGetDetailBranch($id)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getbranch/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();
    }
    // Model get detail lead
    public static function CrmGetDetaillead($id)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getleadbyid/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();
    }
    // Model get  lead by id
    public  static function  CrmGetLeadID($id)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getbranch/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    // Model get schedule type
    public static function CrmGetSchdeuleType($id)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getscheduletype/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
    }

    // Model get schedule  by id
    public static function CrmGetSchdeuleById($id)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getschedule/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    // Model get schedule type
    public static function CrmGetSchdeuleByLead($id)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/getschedule/lead/' . $id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    //Model get Lead source
    public static function CrmGetLeadSource()
    {
        return DB::select('SELECT * from select_crm_lead_source()');
    }
    //Model get lead Status
    public static function CrmGetLeadStatus()
    {
        return DB::select('SELECT * from crm_lead_status where is_deleted=false and status =true ORDER BY sequence ASC');
    }
    //Model get lead Industry
    public static function CrmGetLeadIndustry()
    {
        return DB::select("SELECT * from  crm_lead_industry ");
    }
    //Model get lead user assigned to
    public static function CrmGetLeadAssigTo()
    {
        return DB::select("SELECT * from  ma_user WHERE is_deleted=FALSE and status=TRUE  and is_employee=TRUE ORDER BY id  ");
    }
    //Model get lead privice
    public static function CrmGetLeadProvice()
    {
        return DB::select("SELECT  * from public.get_gazetteers_province()");
    }
    // Model get lead district
    public static function CrmGetLeadDistrict($id)
    {
        return DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_district('$id')");
    }
    //Model get lead Commune
    public static function CrmGetLeadCommune($id)
    {
        return DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_commune('$id')");
    }
    // Model get lead Village
    public static function CrmGetLeadVillage($id)
    {
        return  DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_village('$id')");
    }
    // Model insert Lead source
    public static function CrmInsertLeadSource($name, $staff)
    {
        return DB::select("SELECT public.insert_crm_lead_source('$name',null,$staff)");
    }
    // Model imset lead industry
    public static function CrmInsertLeadIndustry($name, $staff)
    {
        return DB::select("SELECT public.insert_crm_lead_industry('$name',null,$staff)");
    }
    // Model Get survey
    public static function Getsurvey()
    {

        $token = $_SESSION['token'];
        $request = Request::create('/api/survey', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();
    }
    // Model Get survey result
    public static function GetsurveyResult()
    {

        $token = $_SESSION['token'];
        $request = Request::create('/api/surveyresult', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        // dd($res);
        return $res->getContent();
    }
    // Seach Lead
    public static function SearchLead($search)
    {
        $token = $_SESSION['token'];
        $request = Request::create('/api/searchlead?search=' . $search, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $res = app()->handle($request);
        //dd($res);
        return $res->getContent();
    }
    //function to pass schedule type to branch by schedule id
    public static function getScheduleType($sche_id)
    {
        $r = DB::table('crm_lead_schedule as sch')
            ->select('sch.id', 'sch_type.id as scheduleTypeId', 'sch_type.name_en', 'sch_type.name_kh')
            ->join('crm_lead_schedule_type as sch_type', 'sch.crm_lead_schedule_type_id', '=', 'sch_type.id')
            ->where('sch.id', '=', $sche_id)
            ->get();
        return $r;
    }



    //function to get employee info by id
    public static function getEmInfo()
    {
        try{
            $r = DB::table('ma_user')
                ->where([
                    ['is_deleted','=','false'],
                    ['status','=','true']
                ])->get();
            return $r;

        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }

    }



}
