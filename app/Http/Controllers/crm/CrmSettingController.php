<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Http\Controllers\perms;

class CrmSettingController extends Controller
{
    //
    public function IndexSetting(){ //index setting crm
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_0209')){//module codes
          
            // $request_contact = Request::create('/api/contacts', 'GET');
            // $contact_table = json_decode(Route::dispatch($request_contact)->getContent());
            // $request_pagination = Request::create('/api/contacts', 'GET');
            // $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.setting.CrmSetting'); 
        }else{
            return view('no_perms');
        }
        
    }
    //--------------------- Lead Status --------------------------//
    public function CrmLeadStatus(){ //Get View Lead Status
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020901')){//module codes
          
               $LeadStatus = Request::create('/api/leadstatus', 'GET');
               $LeadStatus = json_decode(Route::dispatch($LeadStatus)->getContent());
            // $request_pagination = Request::create('/api/contacts', 'GET');
            // $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.setting.CrmLeadStatus',['tbl'=>$LeadStatus]); 
        }else{
            return view('no_perms');
        }
        
    }
    public function StoreLeadStatus(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_status','name_en')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_status','name_kh')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],
                'sequence' => ['numeric','sometimes',
                            Rule::unique('crm_lead_status','sequence')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],    
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                'sequence.unique' => 'The Sequence is Already Exist !!',   //massage validator
                'sequence.numeric' => 'Please Insert Number Only !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            // if(perms::check_perm_module('CRM_020202')){//module code list 
            //     $create_contact = Request::create('/api/contact','POST');
            //     $response = json_decode(Route::dispatch($create_contact)->getContent());
            //     if($response->insert=='success'){
            //         return response()->json(['success'=>'Record is successfully added']);
            //     }
            // }else{
            //     return view('no_perms');
            // }
        }
    }
    //--------------------- END Lead Status --------------------------//
    public function CrmLeadIndustry(){ //index setting crm
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020902')){//module codes
          
            $industry = Request::create('/api/leadindustry', 'GET');
            $tbl = json_decode(Route::dispatch($industry)->getContent());
            // $request_pagination = Request::create('/api/contacts', 'GET');
            // $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.setting.CrmLeadIndustry',['tbl'=>$tbl]); 
        }else{
            return view('no_perms');
        }
        
    }
    public function CrmLeadSource(){ //index setting crm
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020903')){//module codes
          
            // $request_contact = Request::create('/api/contacts', 'GET');
            // $contact_table = json_decode(Route::dispatch($request_contact)->getContent());
            // $request_pagination = Request::create('/api/contacts', 'GET');
            // $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.setting.CrmLeadStatus'); 
        }else{
            return view('no_perms');
        }
        
    }
}
