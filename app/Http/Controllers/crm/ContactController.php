<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    public function getcontact(){
        if(perms::check_perm_module('CRM_0205')){//module codes
            $contact=DB::select("SELECT * from crm_lead_contact ORDER BY id ASC");
            return view('crm.contact.index',['contact'=>$contact]);
        }else{
            return view('no_perms');
        }
        
    }
    public function getchecklist(){
        if(perms::check_perm_module('CRM_0205')){//module codes
            $contact=DB::select("SELECT * from crm_lead_contact ORDER BY id ASC");
            return view('crm.contact.index1',['contact'=>$contact]);
        }else{
            return view('no_perms');
        }
    }
}
