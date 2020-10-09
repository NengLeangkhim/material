<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\crm\ModelCrmContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function getcontact(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_0205')){//module codes
            //$contact_table=ModelCrmContact::CrmContactGetData(); // get data from model contact for table
            $request_contact = Request::create('/api/contacts', 'GET');
            $contact_table = json_decode(Route::dispatch($request_contact)->getContent());
           // $contact_pagination=ModelCrmContact::CrmContactGetDataPagination();  // get data from model contact for pagination
            $request_pagination = Request::create('/api/contacts', 'GET');
            $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.contact.index',['contact_table'=>$contact_table,'contact_pagination'=>$contact_pagination]); 
        }else{
            return view('no_perms');
        }
        
    }
    public function FetchDataContact(Request $request) // function Get for paginaion contact
    {
        if ($request->ajax()){
           // $contact_pagination=ModelCrmContact::CrmContactGetDataPagination(); // get data from model contact for pagination
            $request_pagination = Request::create('/api/contacts', 'GET');
            $contact_pagination = json_decode(Route::dispatch($request_pagination)->getContent());
            return view('crm.contact.CrmPaginationContact',compact('contact_pagination'))->render();
        }
    }
    public function AddContact(){
        return view('crm.contact.AddCrmContact');
    }
    public function StoreContact(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'ma_honorifics_id' =>  [  'required'
                                        ],
                'name_en' => [ 'required'
                                        ],
                'name_kh' => [ 'required'
                                    ],
                'email' => [ 'required','email',
                            Rule::unique('crm_lead_contact','email')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                        ],
                'phone' => [ 'required','regex:/(0)[0-9]{7}/',
                            Rule::unique('crm_lead_contact','phone')
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted', 'f');})
                                    ],    
            ],
            [
                'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'email.required' => 'This Field is require !!',   //massage validator
                'phone.required' => 'This Field is require !!',   //massage validator
                'email.unique' => 'The Email is Already Exist !!',   //massage validator
                'email.email' => 'The Email is Wrong !!',   //massage validator
                'phone.unique' => 'The Phone is Already Exist !!',   //massage validator
                'phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020202')){//module code list 
                $create_contact = Request::create('/api/contact','POST');
                $response = json_decode(Route::dispatch($create_contact)->getContent());
                if($response->insert=='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }
            }else{
                return view('no_perms');
            }
        }
    }
    public function EditContact($id) {   
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020203')){//module code
            $get_contact = Request::create('/api/contact/'.$id, 'GET'); //Request to Route API
            $contact = json_decode(Route::dispatch($get_contact)->getContent()); //Convert Json data
            return view('crm.contact.EditCrmContact',['contact'=>$contact]);
        }else{
            return view('no_perms');
        }
    }
    public function UpdateContact(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'ma_honorifics_id' =>  [  'required'
                                        ],
                'name_en' => [ 'required'
                                        ],
                'name_kh' => [ 'required'
                                    ],
                'email' => [ 'required','email',
                            Rule::unique('crm_lead_contact','email')->ignore($request->contact_id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted','f');})
                                        ],
                'phone' => [ 'required','regex:/(0)[0-9]{7}/',
                            Rule::unique('crm_lead_contact','phone')->ignore($request->contact_id)
                            ->where(function ($query) use ($request) {
                            return $query->where('is_deleted','f');})
                                    ],    
            ],
            [
                'ma_honorifics_id.required' => 'Please Select Honorifics !!',   //massage validator
                'name_en.required' => 'This Field is require !!',   //massage validator
                'name_kh.required' => 'This Field is require !!',   //massage validator
                'email.required' => 'This Field is require !!',   //massage validator
                'phone.required' => 'This Field is require !!',   //massage validator
                'email.unique' => 'The Email is Already Exist !!',   //massage validator
                'email.email' => 'The Email is Wrong !!',   //massage validator
                'phone.unique' => 'The Phone is Already Exist !!',   //massage validator
                'phone.regex' => 'The Phone Number is Wrong !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020202')){//module code list 
                $update_contact = Request::create('/api/contact','put');
                $response = json_decode(Route::dispatch($update_contact)->getContent());
                dd($response);
                // if($response->update=='success'){
                //     return response()->json(['success'=>'Record is successfully Update']);
                // }
            }else{
                return view('no_perms');
            }
        }
    }
    public function DetailContact(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020204')){//module code
            $id= $_GET['id'];
            $request_detail = Request::create('/api/contact/'.$id, 'GET');
            $detail_contact = json_decode(Route::dispatch($request_detail)->getContent());
            return view('crm.contact.DetailCrmContact',['detail'=>$detail_contact]);
        }else{
            return view('no_perms');
        }
    }
    // public function getchecklist(){
    //     if(perms::check_perm_module('CRM_0205')){//module codes
    //         $contact=DB::select("SELECT * from crm_lead_contact ORDER BY id ASC");
    //         return view('crm.contact.index1',['contact'=>$contact]);
    //     }else{
    //         return view('no_perms');
    //     }
    // }
}
