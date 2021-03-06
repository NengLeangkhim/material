<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
use App\model\crm\ModelCrmLead;
use App\model\crm\ModelCrmOrganization;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{


    // get lead by APi
    // public function getlead(){
    //     if(perms::check_perm_module('CRM_0205')){//module codes
    //         $lead=ModelCrmLead::CrmGetLead();
    //         $result =json_decode($lead,true);
    //         return view('crm.Lead.index',['lead'=>$result["data"]]);

    //     }else{
    //         return view('no_perms');
    //     }
    // }

    public function getorganization(){
        if(perms::check_perm_module('CRM_0203')){ // Module  Organizations
            // $organ=ModelCrmOrganization::CrmGetOrganize();
            return view('crm.Organization.index',['organize'=>$result["data"]??'']);
        }else{
            return view('no_perms');
        }

    }
    public function getorganizationDatatable(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_0203')){ // Module  Organizations
            $token = $_SESSION['token'];
            $request_query=str_replace($request->Url(),'',$request->fullUrl());
            $request_contact = Request::create('api/organizies/datatable'.$request_query, 'GET');
            //$contact_table = json_decode(Route::dispatch($request_contact)->getContent());
            $request_contact->headers->set('Accept', 'application/json');
            $request_contact->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request_contact);
            return $res->getContent();
        }else{
            return view('no_perms');
        }

    }
    public function getorganizationBranches($id,Request $request) {// /organizies/branches/{id}
        if(perms::check_perm_module('CRM_02030103')){ //Module detail
            return view('crm.Organization.branch',["organize_id"=>$id]);
        }else{
            return view('no_perms');
        }
    }
    public function getorganizationBranchesDatatable($id,Request $request) {// /organizies/branches/{id}
        if(perms::check_perm_module('CRM_02030103')){ //Module detail
            $token = $_SESSION['token'];
            $request_query=str_replace($request->Url(),'',$request->fullUrl());
            $request_contact = Request::create('api/organizies/branches/'.$id.$request_query, 'GET');
            //$contact_table = json_decode(Route::dispatch($request_contact)->getContent());
            $request_contact->headers->set('Accept', 'application/json');
            $request_contact->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request_contact);
            return $res->getContent();
        }else{
            return view('no_perms');
        }
    }
    public function DetailOrganization($id) {
        if(perms::check_perm_module('CRM_02030102')){ //Module detail
            $organ=ModelCrmOrganization::CrmGetOrganizeById($id);
            $result =json_decode($organ,true);
            // dd($result);
            return view('crm.Organization.DetailOrganization',['organize'=>$result["data"][0]]);
        }else{
            return view('no_perms');
        }
    }
    public function AddOrganization(){
        $contact = ModelCrmOrganization::CrmGetContact();
        $lead_source=ModelCrmLead::CrmGetLeadSource();
        $lead_status=ModelCrmLead::CrmGetLeadStatus();
        $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
        $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
        $province=ModelCrmLead::CrmGetLeadProvice();
        return view('crm.Organization.AddOrganization',['contact'=>$contact,'lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
    }

    public function StoreOrganization(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'contact' =>  [  'required',
                                    ],
                'company_en' =>  [  'required'
                                        ],
                'company_kh' =>  [  'required'
                                    ],
                'primary_email' =>  [  'required',
                                    Rule::unique('crm_lead','email')
                                    ->where(function ($query) use ($request) {
                                    return $query->where('is_deleted', 'f');})
                                        ],
                'primary_phone' =>  [  'required',
                                    Rule::unique('crm_lead','phone')
                                    ->where(function ($query) use ($request) {
                                    return $query->where('is_deleted', 'f');})
                                        ],
                'lead_source' =>  [  'required'
                                        ],
                'lead_industry' =>  [  'required'
                                        ],
                'assigendTo' =>  [  'required'
                                        ],
                'service' =>  [  'required'
                                        ],
                'home_en' => [ 'required'
                                    ],
                'street_en' => [ 'required'
                                    ],
                'home_kh' => [ 'required'
                                    ],
                'street_kh' => [ 'required'
                                    ],
                'city' => [ 'required'
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
                'contact.required' => 'This Field is require !!',   //massage validator
                'company_en.required' => 'This Field is require !!',   //massage validator
                'company_kh.required' => 'This Field is require !!',   //massage validator
                'primary_email.required' => 'This Field is require !!',   //massage validator
                'primary_phone.required' => 'This Field is require !!',   //massage validator
                'branch.required' => 'This Field is require !!',   //massage validator
                'lead_source.required' => 'This Field is require !!',   //massage validator
                'lead_industry.required' => 'This Field is require !!',   //massage validator
                'assig_to.required' => 'This Field is require !!',   //massage validator
                'service.required' => 'This Field is require !!',   //massage validator
                // address detail
                'home_en.required' => 'This Field is require !!',   //massage validator
                'street_en.required' => 'This Field is require !!',   //massage validator
                'home_kh.required' => 'This Field is require !!',   //massage validator
                'street_kh.required' => 'This Field is require !!',   //massage validator
                'city.required' => 'This Field is require !!',   //massage validator
                'district.required' => 'This Field is require !!',   //massage validator
                'commune.required' => 'This Field is require !!',   //massage validator
                'latlong.required' => 'This Field is require !!',   //massage validator
                'address_type.required' => 'This Field is require !!',   //massage validator
                'village.required' => 'This Field is require !!',   //massage validator
                'primary_email.unique' => 'The Email is Already Exist !!',   //massage validator
                'primary_email.unique' => 'The Email is Already Exist !!',   //massage validator
                'primary_email.email' => 'The Email is Wrong !!',   //massage validator
                'primary_phone.unique' => 'The Phone is Already Exist !!',   //massage validator
                'primary_phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_020504')){//module code list
                $create_contact = Request::create('/api/organize','PUT');
                $response = json_decode(Route::dispatch($create_contact)->getContent());
                if($response->insert=='success'){
                    return response()->json(['success'=>'Record is successfully updated']);
                }
            }else{
                return view('no_perms');
            }
        }
    }
    public function EditOrganization($id){
        if(perms::check_perm_module('CRM_02030102')){ //Module detail
            $contact = ModelCrmOrganization::CrmGetContact();
        $lead_source=ModelCrmLead::CrmGetLeadSource();
        $lead_status=ModelCrmLead::CrmGetLeadStatus();
        $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
        $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
        $province=ModelCrmLead::CrmGetLeadProvice();

        $organ=ModelCrmOrganization::CrmGetOrganizeById($id);
        $result =json_decode($organ,true);
        // dd($result);
        return view('crm.Organization.EditOrganization',[
            'contact'=>$contact,
            'lead_source'=>$lead_source,
            'lead_status'=>$lead_status,
            'lead_industry'=>$lead_industry,
            'assig_to'=>$assig_to,
            'organize'=>$result["data"][0],
            'province'=>$province
            ]);
        }
        else{
            return view('no_perms');
        }

    }
    public function UpdateOrganization(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'contact_id' =>  [  'required',
                                    ],
                'company_en' =>  [  'required'
                                        ],
                'company_kh' =>  [  'required'
                                    ],
                // 'primary_email' =>  [  'required',
                //                     Rule::unique('crm_lead','email')
                //                     ->where(function ($query) use ($request) {
                //                     return $query->where('is_deleted', 'f');})
                //                         ],
                // 'primary_phone' =>  [  'required',
                //                     Rule::unique('crm_lead','phone')
                //                     ->where(function ($query) use ($request) {
                //                     return $query->where('is_deleted', 'f');})
                //                         ],
                // 'customer_type' =>  [  'required'
                //                         ],
                'lead_source' =>  [  'required'
                                        ],
                'lead_industry' =>  [  'required'
                                        ],
                'assig_to_id' =>  [  'required'
                                        ],
                // 'service' =>  [  'required'
                //                         ],
                'home_en' => [ 'required'
                                    ],
                'street_en' => [ 'required'
                                    ],
                'home_kh' => [ 'required'
                                    ],
                'street_kh' => [ 'required'
                                    ],
                'city' => [ 'required'
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
                'contact_id.required' => 'This Field is require !!',   //massage validator
                'company_en.required' => 'This Field is require !!',   //massage validator
                'company_kh.required' => 'This Field is require !!',   //massage validator
                // 'primary_email.required' => 'This Field is require !!',   //massage validator
                // 'primary_phone.required' => 'This Field is require !!',   //massage validator
                'branch.required' => 'This Field is require !!',   //massage validator
                'lead_source.required' => 'This Field is require !!',   //massage validator
                'lead_industry.required' => 'This Field is require !!',   //massage validator
                'assig_to_id.required' => 'This Field is require !!',   //massage validator
                // 'service.required' => 'This Field is require !!',   //massage validator
                // address detail
                'home_en.required' => 'This Field is require !!',   //massage validator
                'street_en.required' => 'This Field is require !!',   //massage validator
                'home_kh.required' => 'This Field is require !!',   //massage validator
                'street_kh.required' => 'This Field is require !!',   //massage validator
                'city.required' => 'This Field is require !!',   //massage validator
                'district.required' => 'This Field is require !!',   //massage validator
                'commune.required' => 'This Field is require !!',   //massage validator
                'latlong.required' => 'This Field is require !!',   //massage validator
                'address_type.required' => 'This Field is require !!',   //massage validator
                'village.required' => 'This Field is require !!',   //massage validator
                // 'primary_email.unique' => 'The Email is Already Exist !!',   //massage validator
                // 'primary_email.unique' => 'The Email is Already Exist !!',   //massage validator
                // 'primary_email.email' => 'The Email is Wrong !!',   //massage validator
                // 'primary_phone.unique' => 'The Phone is Already Exist !!',   //massage validator
                // 'primary_phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_020504')){//module code list
                $token = $_SESSION['token'];
                $create_contact = Request::create('/api/organize','PUT',$request->all());
                $create_contact->headers->set('Accept', 'application/json');
                $create_contact->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($create_contact);
                $response = json_decode($res->getContent());
                // dd($response);
                if($response->update==='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }
            }else{
                return view('no_perms');
            }
        }
    }
}
