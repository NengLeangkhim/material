<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\crm\ModelCrmContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
class ContactController extends Controller
{
    public function getcontact(){
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
    public function StoreContact(){
        return view('crm.contact.AddCrmContact');
    }
    public function EditContact($id) {   
        // $param = $id;
        $sql=ModelCrmContact::CrmGetContactID($id);
        return view('crm.contact.EditCrmContact')->with('contact',$sql);
    }
    public function DetailContact(){
        $id= $_GET['id'];
        $request_detail = Request::create('/api/contact/'.$id, 'GET');
        $detail_contact = json_decode(Route::dispatch($request_detail)->getContent());
        return view('crm.contact.DetailCrmContact',['detail'=>$detail_contact]);
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
