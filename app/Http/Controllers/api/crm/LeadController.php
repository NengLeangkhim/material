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



class LeadController extends Controller
{
    // get lead source 
    public function getLeadSource(){
        $contact = Lead::leadSource();
        return SourceResource::Collection($contact);
    }
    // insert lead source
    public function insertLeadSource(Request $request){
            $name_en=$request->input('name_en');
            $name_kh=$request->input('name_kh');
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
    // get lead assigeng to 
    public function getLeadAssig(){
        $contact = Lead::leadassig();
        // return $contact;
        return AssigResource::Collection($contact);
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
        $service=Lead::leadBranch();
        return LeadBranch::Collection($service);
    }
    //  insert lead 
    public  static function  insertLead(Request $request){
        //Lead 
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        // $userid = $_SESSION['userid'];
        $userid = 1;
        // return $userid;
        
        $lead_id=$request->input('lead_id');
        $con_id=$request->input('contact_id');
        $company_en=$request->input('company_en');
        $company_kh=$request->input('company_kh');
        $primary_email=$request->input('primary_email');
        // $user_create=$userid;
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

        return  Lead::insertLead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
        $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
        $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
        $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment);
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
    //  edit lead 
    public function editLead(){
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
}
