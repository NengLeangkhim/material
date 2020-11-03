<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\Crmlead as Lead;
use App\addressModel;
use App\Http\Resources\api\crm\lead\LeadSource as SourceResource;
use App\Http\Resources\api\crm\lead\LeadIndustry as IndustryResource;
use App\Http\Resources\api\crm\lead\LeadStatus as StatusResource;
use App\Http\Resources\api\crm\lead\LeadAssig as AssigResource;
use App\Http\Resources\api\crm\lead\Address;
use App\Http\Resources\api\crm\lead\LeadBranch;
use App\Http\Resources\api\crm\lead\GetLead;
use App\Http\Resources\api\crm\lead\GetLeadBranch;
use App\Http\Resources\api\crm\lead\GetHonorifics;
use App\Http\Resources\api\crm\lead\LeadCurrentSpeedIsp;
use App\Http\Resources\api\crm\lead\GetSurvey;
use Illuminate\Database\QueryException;

class LeadController extends Controller
{
    // get lead source
    public function getLeadSource(){
        $contact = Lead::leadSource();
        return SourceResource::Collection($contact);
    }
    // insert lead source
    public function insertLeadSource(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
            // $userid = $_SESSION['userid'];
            $name_en=$request->input('name_en');
            $name_kh=$request->input('name_kh');
            // $create_by=$userid;
            $create_by=$request->input('create_by');
            return Lead::addleadsource($name_en,$name_kh,$create_by);
    }
    // get lead industry
    public function getLeadIndustry(){
        $contact = Lead::leadIndustry();
        return IndustryResource::Collection($contact);
    }
    // insert lead industry
    public function insertLeadIndustry (Request $request){
        $name_en=$request->input('name_en');
        $name_kh=$request->input('name_kh');
        $create_by=$request->input('create_by');
        return Lead::addleadIndustry ($name_en,$name_kh,$create_by);
    }
    // get lead status
    public function getLeadStatus(){
        $contact = Lead::leadStatus();
        return StatusResource::Collection($contact);
    }
    public function saveLeadStatus(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        $nameEn = $request->input('name_en');
        $nameKh = $request->input('name_kh');
        $status = $request->input('status');
        $sequence = $request->input('sequence');
        try {
            $result = Lead::saveLeadStatus($id, $userId, $nameEn, $nameKh, $status, $sequence);
        } catch(QueryException $e){
            return $this->sendError($e);
        }
        return $this->sendResponse([$result], '');
    }
    public function getAllLeadStatus(){
        try{
            $result = Lead::getAllLeadStatus();
        } catch(QueryException $e){
            return $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }
    // get lead assigeng to
    public function getLeadAssig(){
        $contact = Lead::leadassig();
        // return $contact;
        return AssigResource::Collection($contact);
    }
    // get honorifics
    public function getHonorifics(){
        $honorifics = Lead::gethonorifics();
        return GetHonorifics::Collection($honorifics);
    }
    // get lead currentsppedisp
    public function getcurrentspeedisp(){
        $isp = Lead::leadcurrentspeedisp();
        // return $contact;
        return LeadCurrentSpeedIsp::Collection($isp);
    }
    // get lead Address
        // get province
        public function getProvince(){$province=addressModel::GetProviceAPI();return Address::Collection($province);}
        // get District
        public function getDistrict($id){$district=addressModel::GetLeadDistrict($id);return Address::Collection($district);}
        // get Commune
        public function getCommune($id){$commune=addressModel::GetLeadCommune($id);return Address::Collection($commune);}
        // get village
        public function getVillage($id){$village=addressModel::GetLeadVillage($id);return Address::Collection($village);}
    // get service
    public function getLeadBranch(){
        $companybranch=Lead::leadBranch();
        return LeadBranch::Collection($companybranch);
    }
    //  insert lead
    public  static function  insertLead(Request $request){
        //Lead
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];

        $lead_id=$request->input('lead_id')!=""? $request->input('lead_id'):"null";
        $con_id=$request->input('contact_id')!=""? $request->input('contact_id'):"null";
        $prioroty=$request->input('prioroty')!=""? $request->input('prioroty'):"urgent";
        $checksurvey=$request->input('checksurvey')!=""? $request->input('checksurvey'):"null";;
        $company_en=$request->input('company_en');
        $company_kh=$request->input('company_kh');
        $primary_email=$request->input('primary_email');
        $user_create=$userid;
        // $user_create=$request->input('user_create');
        $website=$request->input('website');
        $facebook=$request->input('company_facebook');
        $vat_number=$request->input('vat_number');
        $company_branch=$request->input('branch');
        $lead_source=$request->input('lead_source');
        $lead_status=$request->input('lead_status');
        $lead_industry=$request->input('lead_industry');
        $assig_to=$request->input('assig_to');
        $service=$request->input('service');
        $current_speed_isp=$request->input('current_speed_isp');
        $current_speed=$request->input('current_speed');
        $current_price=$request->input('current_price');
        $employee_count=$request->input('employee_count');
        $comment=$request->input('comment');
        //contact detail
        $name_kh=$request->input('name_kh');
        $name_en=$request->input('name_en');
        $gender=$request->input('ma_honorifics_id');
        $facebook_con= $request->input('facebook')!=''? $request->input('facebook'):"null";
        $email=$request->input('email');
        $phone=$request->input('phone');
        $position=$request->input('position');
        $national_id=$request->input('national_id');

        //address detail
        $home_en=$request->input('home_en');
        $home_kh=$request->input('home_kh');
        $street_en=$request->input('street_en');
        $street_kh=$request->input('street_kh');
        $latlong=$request->input('latlong');
        $address_type=$request->input('address_type');
        $addresscode=$request->input('village');

        // return $lead_id;
        // var_dump($checksurvey);
        return  Lead::insertLead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
        $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
        $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
        $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey);
    }
    // update lead
    public static function updatebranch(Request $request){

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];

            $lead_id=$request->input('lead_id');
            $con_id=$request->input('contact_id');
            $prioroty=$request->input('prioroty');
            $checksurvey=$request->input('checksurvey')!=""? $request->input('checksurvey'):"null";
            $survey_id=$request->input('survey_id');
            $lead_address_id=$request->input('address_id');
            $lead_con_bran_id=$request->input('lead_con_bran_id');
            $lead_detail_id=$request->input('lead_detail_id');
            $lead_item_id=$request->input('lead_item_id');
            $branch_id=$request->input('branch_id');
            $company_en=$request->input('company_en');
            $company_kh=$request->input('company_kh');
            $primary_email=$request->input('primary_email');
            // $user_create=$request->input('user_create');
            $user_create=$userid;
            $website=$request->input('website');
            $facebook=$request->input('company_facebook');
            $vat_number=$request->input('vat_number');
            $company_branch=$request->input('branch');
            $lead_source=$request->input('lead_source');
            $lead_status=$request->input('lead_status');
            $lead_industry=$request->input('lead_industry');
            $assig_to_id=$request->input('assig_to_id');
            $assig_to=$request->input('assig_to');
            $service=$request->input('service');
            $current_speed_isp=$request->input('current_speed_isp');
            $current_speed=$request->input('current_speed');
            $current_price=$request->input('current_price');
            $employee_count=$request->input('employee_count');
            $comment=$request->input('comment');
            //contact detail
            $name_kh=$request->input('name_kh');
            $name_en=$request->input('name_en');
            $gender=$request->input('ma_honorifics_id');
            $facebook_con= $request->input('facebook')!=''? $request->input('facebook'):"null";
            $email=$request->input('email');
            $phone=$request->input('phone');
            $position=$request->input('position');
            $national_id=$request->input('national_id');

            //address detail
            $home_en=$request->input('home_en');
            $home_kh=$request->input('home_kh');
            $street_en=$request->input('street_en');
            $street_kh=$request->input('street_kh');
            $latlong=$request->input('latlong');
            $address_type=$request->input('address_type');
            $addresscode=$request->input('village');


            // var_dump($survey_id);
            return  Lead::updatebranch($lead_address_id,$lead_detail_id,$lead_item_id,$lead_con_bran_id,$branch_id,$con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
            $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$assig_to_id,$service,$current_speed_isp,
            $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
            $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey,$survey_id);
    }

    // get all branch
    public function getbranch(){
        $branch = Lead::getbranch();
        return GetLeadBranch::Collection($branch);
    }
    // get all lead
    public function getLead(){
        $lead = Lead::getLead();
        // return Lead::getLead();
        return GetLead::Collection($lead);
    }
    // get  lead by id
    public function getleadbyid($id){
        $lead = Lead::getleadbyid($id);
        return GetLead::Collection($lead);
    }
    // edit lead
    public function editlead($id){
        var_dump($id);
    }
    // get branch by id
    public function getbranchById($id){
        $branch_id = Lead::getbranchById($id);
        return GetLeadBranch::Collection($branch_id);
    }
    // get  show branch by lead id
    public function getbranch_lead($id){
        $branch_id = Lead::getbranch_lead($id);
        return GetLeadBranch::Collection($branch_id);
    }
    // //  edit lead
    public function editbranch(){
        $lead_id=$request->input('lead_id');
        $con_id=$request->input('contact_id');
        $company_en=$request->input('company_en');
        $company_kh=$request->input('company_kh');
        $primary_email=$request->input('primary_email');
        $user_create=$request->input('user_create');
        $website=$request->input('website');
        $facebook=$request->input('facebook');
        $vat_number=$request->input('vat_number');
        $company_branch=$request->input('branch');
        $lead_source=$request->input('lead_source');
        $lead_status=$request->input('lead_status');
        $lead_industry=$request->input('lead_industry');
        $assig_to=$request->input('assig_to');
        $service=$request->input('service');
        $current_speed_isp=$request->input('current_speed_isp');
        $current_speed=$request->input('current_speed');
        $current_price=$request->input('current_price');
        $employee_count=$request->input('employee_count');
        $comment=$request->input('comment');
        //contact detail
        $name_kh=$request->input('name_kh');
        $name_en=$request->input('name_en');
        $gender=$request->input('gender');
        $facebook_con=$request->input('facebook');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $position=$request->input('position');
        $national_id=$request->input('national_id');

        //address detail
        $home_en=$request->input('home_en');
        $home_kh=$request->input('home_kh');
        $street_en=$request->input('street_en');
        $street_kh=$request->input('street_kh');
        $latlong=$request->input('latlong');
        $address_type=$request->input('address_type');
        $addresscode=$request->input('addresscode');
        return  Lead::editLead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
        $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
        $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
        $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment);
    }

    // convert branch
    // public function convertbranch($id){
    //     if (session_status() == PHP_SESSION_NONE) {
    //         session_start();
    //     }
    //     $userid = $_SESSION['userid'];
    //     $convert=Lead::convertbranch($id,$userid);
    //     // var_dump($id,$userid);

    // }
    public function convertbranch(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        // $id=$request->input('id');
        // $detail_id=$request->input('detailid');
        // $comment=$request->input('com');
        $id=$request->input('branch_id');
        $detail_id=$request->input('lead_detail_id');
        $comment=$request->input('comment');
        $convert=Lead::convertbranch($id,$userid,$detail_id,$comment); //return to model


    }
    // get survey
    public function getsurvey(){
        $survey= Lead::getsurvey();
        return GetSurvey::Collection($survey);
    }
    //get svrvey by branch id
    public function getsurveybyid($id){
        $survey_id=Lead::getsurveybyid($id);
        return GetSurvey::Collection($survey_id);
    }
    // insert survey result
    public function insertsurveyresult(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $survey_id =$request->input('survey_id');
        // $userid =$request->input('user_create');
        $possible =$request->input('possible')!='1'? 'f':'t';
        $comment =$request->input('commentsurvey');
        $branch_id =$request->input('branch_id');
        // var_dump($userid,$survey_id,$possible,$comment,$branch_id);
        return Lead::insertsurveyresult($survey_id,$userid,$possible,$comment,$branch_id);
    }
    // get schdule type
    public function getschduletype(){
        $schedule_type= Lead::getschduletype();
        return LeadCurrentSpeedIsp::Collection($schedule_type);
    }
    // insert schedule type
    public function insertscheduletype(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        // $userid =$request->input('user_create');
        $name_kh=$request->input('name_kh');
        $name_en=$request->input('name_en');
        return Lead::insertscheduletype($userid,$name_en,$name_kh); //return to model
    }
    // update schedule type
    public function updatescheduletype(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        // $userid =$request->input('user_create');
        $schedule_id =$request->input('schedule_id');
        $name_kh=$request->input('name_kh');
        $name_en=$request->input('name_en');
        $status=$request->input('status');
        return Lead::updatescheduletype($schedule_id,$userid,$name_en,$name_kh,$status); //return to model
    }
    //insert schedule
    public function insertschedule(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $userid = $_SESSION['userid'];
        $branch_id=$request->input('branch_id');
        $name_kh=$request->input('name_kh');
        $name_en=$request->input('name_en');
        $to_do_date=$request->input('to_do_date');
        $comment=$request->input('comment');
        $priority=$request->input('priority');
        $schedule_type_id=$request->input('schedule_type_id');
        // $userid =$userid;
        $userid =$request->input('user_create');
        return Lead::insertschedule($branch_id,$name_en,$name_kh,$to_do_date,$comment,$priority,$schedule_type_id,$userid); //return to model
    }
    //update schedule
    public function updateschedule(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $userid = $_SESSION['userid'];
        $schedule_id=$request->input('schedule_id');
        $branch_id=$request->input('branch_id');
        $name_kh=$request->input('name_kh');
        $name_en=$request->input('name_en');
        $to_do_date=$request->input('to_do_date');
        $comment=$request->input('comment');
        $priority=$request->input('priority');
        $schedule_type_id=$request->input('schedule_type_id');
        $userid =$request->input('user_create');
        $status =$request->input('status');
        return Lead::updateschedule($schedule_id,$branch_id,$name_en,$name_kh,$to_do_date,$comment,$priority,$schedule_type_id,$userid,$status); // return to model
    }
    //insert schedule result
    public function insertscheduleresult(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $userid = $_SESSION['userid'];
        $schedule_id=$request->input('schedule_id');
        $schedule_type_id=$request->input('schedule_type_id');
        $comment=$request->input('comment');
        // $userid =$userid;
        $userid =$request->input('user_create');
        return Lead::insertscheduleresult($schedule_id,$schedule_type_id,$comment,$userid); // return to Model
    }
    //update schedule result
    public function updatescheduleredult(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $userid = $_SESSION['userid'];
        $schedule_result_id=$request->input('schedule_result_id');
        // $userid =$userid;
        $userid =$request->input('user_create');
        $schedule_id=$request->input('schedule_id');
        $schedule_type_id=$request->input('schedule_type_id');
        $comment=$request->input('comment');
        $status =$request->input('status');
        return Lead::updatescheduleredult($schedule_result_id,$userid,$schedule_id,$schedule_type_id,$comment,$status);

    }
}
