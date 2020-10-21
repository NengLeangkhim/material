<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\Http\Controllers\Controller;
use App\model\crm\ModelCrmLead;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use App\model\api\crm\Crmlead as Lead;
use App\Http\Resources\api\crm\lead\LeadBranch;
use App\Http\Controllers\api\stock\StockController;

class LeadController extends Controller
{

    // get lead by APi
    public function getlead(){
        if(perms::check_perm_module('CRM_0205')){//module codes
            $lead=ModelCrmLead::CrmGetLead();
            $result =json_decode($lead,true);
            return view('crm.Lead.index',['lead'=>$result["data"]]);
            
        }else{
            return view('no_perms');
        }
    } 
    // get branch by API
    public function  getbranch($id){
        if(perms::check_perm_module('CRM_0210')){//module codes
            $branch=ModelCrmLead::CrmGetBranch($id);
            $result =json_decode($branch,true);
            return view('crm.Lead.branch',['branch'=>$result["data"]]); 
        }else{
            return view('no_perms');
        }
    }
    // get branch show by API
    public function  getdetailbranch($id){
        if(perms::check_perm_module('CRM_020506')){//module codes
            $detail_branch=ModelCrmLead::CrmGetDetailBranch($id);
            $result =json_decode($detail_branch,true);
            // dd($result);
            return view('crm.Lead.detaillead',['detailbranch'=>$result["data"]]); 
        }else{
            return view('no_perms');
        }
    }
    // add lead or branch
    public function lead(){
        $lead_source=ModelCrmLead::CrmGetLeadSource();
        $lead_status=ModelCrmLead::CrmGetLeadStatus();
        $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
        $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
        $province=ModelCrmLead::CrmGetLeadProvice();
        if(perms::check_perm_module('CRM_020504')){//module codes
            return view('crm.Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
        }else{
            return view('no_perms');
        }
    }
    // edit branch or lead
    public function editlead($id) {   
        // $param = $id;
        if(perms::check_perm_module('CRM_020505')){//module codes
            $sql=ModelCrmLead::CrmGetLeadID($id);
            $result =json_decode($sql,true);
            $lead_source=ModelCrmLead::CrmGetLeadSource();
            $lead_status=ModelCrmLead::CrmGetLeadStatus();
            $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
            $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
            $province=ModelCrmLead::CrmGetLeadProvice();
            $isp = Lead::leadcurrentspeedisp();
            $honorifics = Lead::gethonorifics();
            $ser= new StockController();
            $serv=$ser->getStockPopup('service');
            $service=json_encode($serv,true);
            $service1=json_decode($service,true);
            $companybranch=Lead::leadBranch();
          
            // dd($district);
            // dd($commune);
            // dd($village);
            return view('crm.Lead.editlead',['updatelead'=>$result["data"],'honorifics'=>$honorifics,'service'=>$service1["original"]["data"],'companybranch'=>$companybranch,'lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province,'currentisp'=>$isp]);
        
        }else{
            return view('no_perms');
        }
        return $id;
    }
    public function StoreLead(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'company_en' =>  [  'required'
                                        ],
                'company_kh' =>  [  'required'
                                    ],
                'primary_email' =>  [  'required',
                                    Rule::unique('crm_lead','email')
                                    ->where(function ($query) use ($request) {
                                    return $query->where('is_deleted', 'f');})
                                        ],
                'primary_phone' =>  [  'required'
                                        ],
                'branch' =>  [  'required'
                                        ],
                'lead_source' =>  [  'required'
                                        ],
                'lead_industry' =>  [  'required'
                                        ],
                'assig_to' =>  [  'required'
                                        ],
                'service' =>  [  'required'
                                        ],
                // 'ma_honorifics_id' =>  [  'required'
                                        // ],
                'name_en' => [ 'required'
                                        ],
                'name_kh' => [ 'required'
                                    ],
                // 'email' => [ 'required','email',
                //             Rule::unique('crm_lead_contact','email')
                //             ->where(function ($query) use ($request) {
                //             return $query->where('is_deleted', 'f');})
                //                         ],
                // 'phone' => [ 'required','regex:/(0)[0-9]{7}/',
                //             Rule::unique('crm_lead_contact','phone')
                //             ->where(function ($query) use ($request) {
                //             return $query->where('is_deleted', 'f');})
                //                     ],
                'home_en' => [ 'required'
                                    ],
                'street_en' => [ 'required'
                                    ],
                'home_kh' => [ 'required'
                                    ],
                'street_kh' => [ 'required'
                                    ],
                // 'addresscode' => [ 'required'
                //                     ],   
                'district' => [ 'required'
                                    ],
                'commune' => [ 'required'
                                    ],
                'latlong' => [ 'required'
                                    ],
                'address_type' => [ 'required'
                                    ],
                'village' => [ 'required'
                                    ],
            ],
            [
                'company_en.required' => 'This Field is require !!',   //massage validator
                'company_kh.required' => 'This Field is require !!',   //massage validator
                'primary_email.required' => 'This Field is require !!',   //massage validator
                'primary_phone.required' => 'This Field is require !!',   //massage validator
                'branch.required' => 'This Field is require !!',   //massage validator
                'lead_source.required' => 'This Field is require !!',   //massage validator
                'lead_industry.required' => 'This Field is require !!',   //massage validator
                'assig_to.required' => 'This Field is require !!',   //massage validator
                'service.required' => 'This Field is require !!',   //massage validator
                // 'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'email.required' => 'This Field is require !!',   //massage validator
                'phone.required' => 'This Field is require !!',   //massage validator
                'home_en.required' => 'This Field is require !!',   //massage validator
                'street_en.required' => 'This Field is require !!',   //massage validator
                'home_kh.required' => 'This Field is require !!',   //massage validator
                'street_kh.required' => 'This Field is require !!',   //massage validator
                // 'addresscode.required' => 'This Field is require !!',   //massage validator
                'district.required' => 'This Field is require !!',   //massage validator
                'commune.required' => 'This Field is require !!',   //massage validator
                'latlong.required' => 'This Field is require !!',   //massage validator
                'address_type.required' => 'This Field is require !!',   //massage validator
                'village.required' => 'This Field is require !!',   //massage validator
                // 'primary_email.unique' => 'The Email is Already Exist !!',   //massage validator
                // 'email.unique' => 'The Email is Already Exist !!',   //massage validator
                'email.email' => 'The Email is Wrong !!',   //massage validator
                // 'phone.unique' => 'The Phone is Already Exist !!',   //massage validator
                'phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020504')){//module code list 
                $create_contact = Request::create('/api/insertlead','POST');
                $response = json_decode(Route::dispatch($create_contact)->getContent());
                // // return $create_contact;
                // var_dump($response);
                if($response->result=='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }
            }else{
                return view('no_perms');
            }
        }
    }
    public function getdistrict(){
         $id=$_GET['_id'];//set up same for ajax
        $get_district=ModelCrmLead::CrmGetLeadDistrict($id);
            return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function getcommune(){

        $id=$_GET['_id'];//set up same for ajax
        $get_district=ModelCrmLead::CrmGetLeadCommune($id);
           return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function getvillage(){

        $id=$_GET['_id'];//set up same for ajax
        $get_district=MOdelCrmLead::CrmGetLeadVillage($id);
           return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    
    public function addleadsource(){
        if(perms::check_perm_module('CRM_02')){
            $staff=$_SESSION['userid'];
            $name=$_POST['source'];
            $sql=ModelCrmLead::CrmInsertLeadSource($name,$staff);
            $q=ModelCrmLead::CrmGetLeadSource();
        }else{
            return view('no_perm');
        }
    }
    public function addleadindustry(){
        if(perms::check_perm_module('CRM_02')){
            $staff=$_SESSION['userid'];
            $name=$_POST['industry'];
            $sql=ModelCrmLead::CrmInsertLeadIndustry($name,$staff);
            $q=ModelCrmLead::CrmGetLeadIndustry();            
        }else{
            return view('no_perm');
        }
    }

    
    public function UpdateLead(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'company_en' =>  [  'required'
                                        ],
                'company_kh' =>  [  'required'
                                    ],
                'primary_email' =>  [  'required',
                                    Rule::unique('crm_lead','email')->ignore($request->lead_id)
                                    ->where(function ($query) use ($request) {
                                    return $query->where('is_deleted', 'f');})
                                        ],
                'primary_phone' =>  [  'required'
                                        ],
                'branch' =>  [  'required'
                                        ],
                'lead_source' =>  [  'required'
                                        ],
                'lead_industry' =>  [  'required'
                                        ],
                'assig_to' =>  [  'required'
                                        ],
                'service' =>  [  'required'
                                        ],
                'ma_honorifics_id' =>  [  'required'
                                        ],
                'name_en' => [ 'required'
                                        ],
                'name_kh' => [ 'required'
                                    ],
                // 'email' => [ 'required','email',
                //             Rule::unique('crm_lead_contact','email')->ignore($request->contact_id)
                //             ->where(function ($query) use ($request) {
                //             return $query->where('is_deleted', 'f');})
                //                         ],
                // 'phone' => [ 'required','regex:/(0)[0-9]{7}/',
                //             Rule::unique('crm_lead_contact','phone')->ignore($request->contact_id)
                //             ->where(function ($query) use ($request) {
                //             return $query->where('is_deleted', 'f');})
                //                     ],
                'home_en' => [ 'required'
                                    ],
                'street_en' => [ 'required'
                                    ],
                'home_kh' => [ 'required'
                                    ],
                'street_kh' => [ 'required'
                                    ],
                'addresscode' => [ 'required'
                                    ],   
                'district' => [ 'required'
                                    ],
                'commune' => [ 'required'
                                    ],
                'latlong' => [ 'required'
                                    ],
                'address_type' => [ 'required'
                                    ],
                'village' => [ 'required'
                                    ],
            ],
            [
                'company_en.required' => 'This Field is require !!',   //massage validator
                'company_kh.required' => 'This Field is require !!',   //massage validator
                'primary_email.required' => 'This Field is require !!',   //massage validator
                'primary_phone.required' => 'This Field is require !!',   //massage validator
                'branch.required' => 'This Field is require !!',   //massage validator
                'lead_source.required' => 'This Field is require !!',   //massage validator
                'lead_industry.required' => 'This Field is require !!',   //massage validator
                'assig_to.required' => 'This Field is require !!',   //massage validator
                'service.required' => 'This Field is require !!',   //massage validator
                'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'email.required' => 'This Field is require !!',   //massage validator
                'phone.required' => 'This Field is require !!',   //massage validator
                'home_en.required' => 'This Field is require !!',   //massage validator
                'street_en.required' => 'This Field is require !!',   //massage validator
                'home_kh.required' => 'This Field is require !!',   //massage validator
                'street_kh.required' => 'This Field is require !!',   //massage validator
                'addresscode.required' => 'This Field is require !!',   //massage validator
                'district.required' => 'This Field is require !!',   //massage validator
                'commune.required' => 'This Field is require !!',   //massage validator
                'latlong.required' => 'This Field is require !!',   //massage validator
                'address_type.required' => 'This Field is require !!',   //massage validator
                'village.required' => 'This Field is require !!',   //massage validator
                // 'primary_email.unique' => 'The Email is Already Exist !!',   //massage validator
                // 'email.unique' => 'The Email is Already Exist !!',   //massage validator
                'email.email' => 'The Email is Wrong !!',   //massage validator
                // 'phone.unique' => 'The Phone is Already Exist !!',   //massage validator
                'phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020505')){//module code list 
                // $create_contact = Request::create('/api/contact','POST');
                // $response = json_decode(Route::dispatch($create_contact)->getContent());
                // if($response->insert=='success'){
                //     return response()->json(['success'=>'Record is successfully added']);
                // }
            }else{
                return view('no_perms');
            }
        }
    }
    
}
