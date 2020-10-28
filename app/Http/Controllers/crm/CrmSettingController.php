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
    //--------------------- Lead Industry ----------------------------//
    public function CrmLeadIndustry(){ //index setting crm
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020902')){//module codes
          
            $industry = Request::create('/api/crm/industry', 'GET');
            $tbl = json_decode(Route::dispatch($industry)->getContent());
            // $request_pagination = Request::create('/api/contacts', 'GET');
            // $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.setting.CrmLeadIndustry',['tbl'=>$tbl]); 
        }else{
            return view('no_perms');
        }
        
    }
    // Insert AND Update Lead Industry
    public function StoreLeadIndustry(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(!isset($request->id)){ // check insert
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_industry','name_en')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_industry','name_kh')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],  
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                if(perms::check_perm_module('CRM_02090201')){//module code list 
                    $request->user_id = $_SESSION['userid'];
                    $create_industry = Request::create('/api/crm/industry/save','POST',$request->all());
                    $response = json_decode(Route::dispatch($create_industry)->getContent());
                    if($response->success=="true"){
                        return response()->json(['success'=>'Record is successfully added']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }else{
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_industry','name_en')->ignore($request->id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_industry','name_kh')->ignore($request->id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],  
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                if(perms::check_perm_module('CRM_02090202')){//module code list 
                    $request->user_id = $_SESSION['userid'];
                    $create_industry = Request::create('/api/crm/industry/save','POST',$request->all());
                    $response = json_decode(Route::dispatch($create_industry)->getContent());
                    if($response->success=="true"){
                        return response()->json(['success'=>'Record is successfully update']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }
    }
    // Get lead industry by ID for update
    public function CrmGetLeadIndustryByID(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_02090202')){//module codes
            $id = $_GET['id'];
            $get = Request::create('/api/crm/industry/'.$id, 'GET');
            $response = json_decode(Route::dispatch($get)->getContent());
            return response()->json($response);
        }else{
            return view('no_perms');
        }
    }
    //--------------------- END Lead Industry --------------------------//
    //--------------------- Lead Source --------------------------------//
    public function CrmLeadSource(){ //index setting crm
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020903')){//module codes
          
            $request_lead_source = Request::create('/api/crm/source', 'GET');
            $tbl = json_decode(Route::dispatch($request_lead_source)->getContent());
            return view('crm.setting.CrmLeadSource',['tbl'=>$tbl]); 
        }else{
            return view('no_perms');
        }
        
    }
    // Insert AND Update Lead Source
    public function StoreLeadSource(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(!isset($request->id)){ // check insert
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_source','name_en')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_source','name_kh')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],  
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                if(perms::check_perm_module('CRM_02090301')){//module code list 
                    $request->user_id = $_SESSION['userid'];
                    $create_industry = Request::create('/api/crm/source/save','POST',$request->all());
                    $response = json_decode(Route::dispatch($create_industry)->getContent());
                    if($response->success=="true"){
                        return response()->json(['success'=>'Record is successfully added']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }else{
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_source','name_en')->ignore($request->id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_source','name_kh')->ignore($request->id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],  
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                if(perms::check_perm_module('CRM_02090302')){//module code list 
                    $request->user_id = $_SESSION['userid'];
                    $create_industry = Request::create('/api/crm/source/save','POST',$request->all());
                    $response = json_decode(Route::dispatch($create_industry)->getContent());
                    if($response->success=="true"){
                        return response()->json(['success'=>'Record is successfully update']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }
    }
    // Get lead source by ID for update
    public function CrmGetLeadSourceByID(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_02090302')){//module codes
            $id = $_GET['id'];
            $get = Request::create('/api/crm/source/'.$id, 'GET');
            $response = json_decode(Route::dispatch($get)->getContent());
            return response()->json($response);
        }else{
            return view('no_perms');
        }
    }
    //--------------------- END Lead Source --------------------------------//
    //--------------------- Current Lead ISP --------------------------------//
    public function CrmLeadISP(){ //index setting crm
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020903')){//module codes
          
            $request_lead_source = Request::create('/api/crm/currentISP', 'GET');
            $tbl = json_decode(Route::dispatch($request_lead_source)->getContent());
            return view('crm.setting.CrmLeadISP',['tbl'=>$tbl]); 
        }else{
            return view('no_perms');
        }
        
    }
    // Insert AND Update Lead Source
    public function StoreLeadISP(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(!isset($request->id)){ // check insert
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_current_isp','name_en')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_current_isp','name_kh')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],  
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                if(perms::check_perm_module('CRM_02090301')){//module code list 
                    $request->user_id = $_SESSION['userid'];
                    $create_industry = Request::create('/api/crm/currentISP/save','POST',$request->all());
                    $response = json_decode(Route::dispatch($create_industry)->getContent());
                    if($response->success=="true"){
                        return response()->json(['success'=>'Record is successfully added']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }else{
            $validator = \Validator::make($request->all(), [
                'name_en' => [ 'required',
                            Rule::unique('crm_lead_current_isp','name_en')->ignore($request->id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],
                'name_kh' => [ 'required',
                            Rule::unique('crm_lead_current_isp','name_kh')->ignore($request->id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],  
            ],
            [
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'name_en.unique' => 'The Name English is Already Exist !!',   //massage validator
                'name_kh.unique' => 'The Name Khmer is Already Exist !!',   //massage validator
                ]
            );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                if(perms::check_perm_module('CRM_02090302')){//module code list 
                    $request->user_id = $_SESSION['userid'];
                    $create_industry = Request::create('/api/crm/currentISP/save','POST',$request->all());
                    $response = json_decode(Route::dispatch($create_industry)->getContent());
                    if($response->success=="true"){
                        return response()->json(['success'=>'Record is successfully update']);
                    }
                }else{
                    return view('no_perms');
                }
            }
        }
    }
    // Get lead ISP by ID for update
    public function CrmGetLeadISPByID(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_02090302')){//module codes
            $id = $_GET['id'];
            $get = Request::create('/api/crm/currentISP/'.$id, 'GET');
            $response = json_decode(Route::dispatch($get)->getContent());
            return response()->json($response);
        }else{
            return view('no_perms');
        }
    }
    //--------------------- END Lead Cureent ISP --------------------------------//
}
