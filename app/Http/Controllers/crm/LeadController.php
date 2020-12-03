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
use App\Http\Controllers\api\crm\ContactController;

class LeadController extends Controller
{

    // get lead by APi
    public function getlead(Request $request){
        if(perms::check_perm_module('CRM_0205')){//module codes
            // $lead=ModelCrmLead::CrmGetLead();
            // $result =json_decode($lead,true);
            // if($result!=null){
                return view('crm.Lead.index',['lead'=>$result["data"]??'']);//pass param in case if error happend
            // }
            // else{
            //     return view('no_perms');
            // }

        }else{
            return view('no_perms');
        }
    }
    //get lead to support for datatable request
    public function getleadDatatable(Request $request){
        $request=str_replace($request->Url(),'',$request->fullUrl());
        if(perms::check_perm_module('CRM_0205')){//module codes
            $lead=ModelCrmLead::CrmGetLeadDataTable($request);
            return $lead;
        }else{
            return view('no_perms');
        }
    }
    // get branch by API
    public function  getbranch($id){
        if(perms::check_perm_module('CRM_0210')){//module codes
            $branch=ModelCrmLead::CrmGetBranch($id);
            $result =json_decode($branch,true);
            $schedule_type=ModelCrmLead::CrmGetSchdeuleType('FALSE');
            $schedule_type =json_decode($schedule_type,true);
            if($result!=null){
                // $schedule_type =json_decode($schedule_type,true);
                            // DD($result,$schedule_type['data']);
                return view('crm.Lead.branch',['branch'=>$result["data"] ,'schedule_type'=>$schedule_type['data']]);
            }
            else
            {
                return view('no_perms');
            }

        }else{
            return view('no_perms');
        }
    }
    // get branch show by API
    public function  getdetailbranch($id){
        if(perms::check_perm_module('CRM_021001')){//module codes
            $detail_branch=ModelCrmLead::CrmGetDetailBranch($id);
            $result =json_decode($detail_branch,true);
            // dd($result);
            return view('crm.Lead.detailbranch',['detailbranch'=>$result["data"]]);
        }else{
            return view('no_perms');
        }
    }
    // get lead show by API
    public function  getdetailtlead($id){
        if(perms::check_perm_module('CRM_020507')){//module codes
            $detail_lead=ModelCrmLead::CrmGetDetaillead($id);
            $result =json_decode($detail_lead,true);
            // dd($result);
            return view('crm.Lead.detaillead',['detaillead'=>$result["data"]]);
        }else{
            return view('no_perms');
        }
    }
    //edit lead
    public function editlead($id){
        if(perms::check_perm_module('CRM_020508')){//module codes
            $edit_lead=ModelCrmLead::CrmGetDetaillead($id);
            $result =json_decode($edit_lead,true);
            $lead_source=ModelCrmLead::CrmGetLeadSource();
            $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
            $isp = Lead::leadcurrentspeedisp();
            $companybranch=Lead::leadBranch();
            // dd($lead_source);
            return view('crm.Lead.editlead',['editlead'=>$result["data"],'companybranch'=>$companybranch,'lead_source'=>$lead_source,'lead_industry'=>$lead_industry,'currentisp'=>$isp]);
        }else{
            return view('no_perms');
        }
    }
    // update lead
    public function updatelead( Request $request){
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
                'status'       =>   [
                                      'required'
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
                'status.required' => 'This Field is require !!',   //massage validator

                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_020508')){//module code list
                $token = $_SESSION['token'];
                $create_contact = Request::create('/api/editlead','POST',$request->all());
                $create_contact->headers->set('Accept', 'application/json');
                $create_contact->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($create_contact);
                $response = json_decode($res->getContent());
                // return $res;
                // dd($response);
                if($response->update=='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }
            }else{
                return view('no_perms');
            }
        }
    }

    // add lead or branch
    public function lead(){
            if(perms::check_perm_module('CRM_020504')){//module codes
                $lead_source=ModelCrmLead::CrmGetLeadSource();
                $lead_status=ModelCrmLead::CrmGetLeadStatus();
                $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
                $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
                $province=ModelCrmLead::CrmGetLeadProvice();
                // dd($lead_source);
                return view('crm.Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
            }else{
                return view('no_perms');
            }
    }





    // edit branch or lead
    public function editbranch($id) {
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
            $lead=Lead::getlead();
            $con= new ContactController();
            $contact=$con->index();
            $contact_n=json_encode($contact,true);
            $contact=json_decode($contact_n,true);
            // dd($contact);
            return view('crm.Lead.editbranch',['updatelead'=>$result["data"],'lead'=>$lead,'contact'=>$contact,'honorifics'=>$honorifics,'service'=>$service1["original"]["data"],'companybranch'=>$companybranch,'lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province,'currentisp'=>$isp]);

        }else{
            return view('no_perms');
        }
        return $id;
    }
    public function StoreLead(Request $request){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $formRequest = $request->all();
            if(isset($formRequest['createLeadBranch'])){
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

                    'assig_to' =>  [  'required'
                                            ],
                    'primary_phone' =>  [  'required'
                                            ],
                    'phone' =>  [  'required'
                                            ],
                    // 'service' =>  [  'required'
                    //                         ],
                    // 'lead_status' =>  [  'required'
                    //                         ],
                    'email' =>  [  'required'
                                            ],
                    'position' =>  [  'required'
                                        ],
                    'national_id' =>  [  'required'
                                        ],
                    'name_en' => [ 'required'
                                            ],
                    'name_kh' => [ 'required'
                                        ],
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
                    'assig_to.required' => 'This Field is require !!',   //massage validator
                    // 'service.required' => 'This Field is require !!',   //massage validator
                    // 'vat_number.required' => 'This Field is require !!',   //massage validator
                    // 'lead_status.required' => 'This Field is require !!',   //massage validator
                    // 'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                    'name_en.required' => 'This Field is require !!',   //massage validator
                    'name_kh.required' => 'This Field is require !!',   //massage validator
                    'email.required' => 'This Field is require !!',   //massage validator
                    'phone.required' => 'This Field is require !!',   //massage validator
                    'home_en.required' => 'This Field is require !!',   //massage validator
                    'street_en.required' => 'This Field is require !!',   //massage validator
                    'home_kh.required' => 'This Field is require !!',   //massage validator
                    'street_kh.required' => 'This Field is require !!',   //massage validator
                    'position.required' => 'This Field is require !!',   //massage validator
                    'national_id.required' => 'This Field is require !!',   //massage validator
                    'district.required' => 'This Field is require !!',   //massage validator
                    'commune.required' => 'This Field is require !!',   //massage validator
                    'latlong.required' => 'This Field is require !!',   //massage validator
                    'address_type.required' => 'This Field is require !!',   //massage validator
                    'village.required' => 'This Field is require !!',   //massage validator
                    'email.email' => 'The Email is Wrong !!',   //massage validator
                    'phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                    ]
                );
            }else{
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
                    'branch' =>  [  'required'
                                            ],
                    'lead_source' =>  [  'required'
                                            ],
                    'lead_industry' =>  [  'required'
                                            ],
                    'assig_to' =>  [  'required'
                                            ],
                    // 'service' =>  [  'required'
                    //                         ],
                    // 'website' =>  [  'required'
                    //                         ],
                    'primary_phone' =>  [  'required'
                                        ],
                    // 'company_facebook' =>  [  'required'
                    //                         ],
                    'current_speed_isp' =>  [  'required'
                                            ],
                    // 'vat_number' =>  [  'required'
                    //                         ],
                    // 'lead_status' =>  [  'required'
                    //                         ],
                    'email' =>  [  'required'
                                            ],
                    // 'ma_honorifics_id' =>  [  'required'
                    //                         ],
                    'position' =>  [  'required'
                                        ],
                    'national_id' =>  [  'required'
                                        ],
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
                    // 'service.required' => 'This Field is require !!',   //massage validator
                    // 'website.required' => 'This Field is require !!',   //massage validator
                    'current_speed_isp.required' => 'This Field is require !!',   //massage validator
                    // 'company_facebook.required' => 'This Field is require !!',   //massage validator
                    // 'vat_number.required' => 'This Field is require !!',   //massage validator
                    // 'lead_status.required' => 'This Field is require !!',   //massage validator
                    // 'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                    'name_en.required' => 'This Field is require !!',   //massage validator
                    'name_kh.required' => 'This Field is require !!',   //massage validator
                    'email.required' => 'This Field is require !!',   //massage validator
                    'phone.required' => 'This Field is require !!',   //massage validator
                    'home_en.required' => 'This Field is require !!',   //massage validator
                    'street_en.required' => 'This Field is require !!',   //massage validator
                    'home_kh.required' => 'This Field is require !!',   //massage validator
                    'street_kh.required' => 'This Field is require !!',   //massage validator
                    'position.required' => 'This Field is require !!',   //massage validator
                    'national_id.required' => 'This Field is require !!',   //massage validator
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
            }
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_020504')){//module code list
                $token = $_SESSION['token'];
                $create_contact = Request::create('/api/insertlead','POST',$request->all());
                $create_contact->headers->set('Accept', 'application/json');
                $create_contact->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($create_contact);
                $response = json_decode($res->getContent());
                // dd($response);
                if($response->insert==='success'){
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


    public function updatebranch(Request $request){
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
                // 'branch' =>  [  'required'
                //                         ],
                // 'lead_source' =>  [  'required'
                //                         ],
                // 'lead_industry' =>  [  'required'
                //                         ],
                'assig_to' =>  [  'required'
                                        ],
                // 'service' =>  [  'required'
                //                         ],
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
                // 'branch.required' => 'This Field is require !!',   //massage validator
                // 'lead_source.required' => 'This Field is require !!',   //massage validator
                // 'lead_industry.required' => 'This Field is require !!',   //massage validator
                'assig_to.required' => 'This Field is require !!',   //massage validator
                // 'service.required' => 'This Field is require !!',   //massage validator
                'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                // 'email.required' => 'This Field is require !!',   //massage validator
                // 'phone.required' => 'This Field is require !!',   //massage validator
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
                $token = $_SESSION['token'];
                $create_contact = Request::create('/api/updatebranch','POST',$request->all());
                $create_contact->headers->set('Accept', 'application/json');
                $create_contact->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($create_contact);
                $response = json_decode($res->getContent());
                // return $res;
                if($response->update=='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }
                else
                {
                    return view('no_perms');
                }
            }else{
                return view('no_perms');
            }
        }
    }




    //function get lead to add lead type as new lead or branch lead
    public function addleadtype(){
        if(isset($_GET['id_'])){
            $lead_value = $_GET['id_'];
            if(perms::check_perm_module('CRM_020504')){//module codes
                $lead_source=ModelCrmLead::CrmGetLeadSource();
                $lead_status=ModelCrmLead::CrmGetLeadStatus();
                $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
                $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
                $province=ModelCrmLead::CrmGetLeadProvice();
                // dd($lead_source);
                return view('crm.Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province,'leadSeleted'=>$lead_value]);
            }else{
                return view('no_perms');
            }
        }
        // return redirect()->action('crm\LeadController@lead');
    }




}
