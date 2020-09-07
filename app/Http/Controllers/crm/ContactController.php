<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\crm\ModelCrmContact;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    public function getcontact(){
        if(perms::check_perm_module('CRM_0205')){//module codes
            $contact_table=ModelCrmContact::CrmContactGetData(); // get data from model contact for table
            $contact_pagination=ModelCrmContact::CrmContactGetDataPagination();  // get data from model contact for pagination
            return view('crm.contact.index',['contact_table'=>$contact_table,'contact_pagination'=>$contact_pagination]); 
        }else{
            return view('no_perms');
        }
        
    }
    public function FetchDataContact(Request $request) // function Get for paginaion contact
    {
        if ($request->ajax()){
            $contact_pagination=ModelCrmContact::CrmContactGetDataPagination(); // get data from model contact for pagination
            return view('crm.contact.CrmPaginationContact',compact('contact_pagination'))->render();
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
