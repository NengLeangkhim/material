<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    public function getcontact(){
        return view('crm.contact.index');
        
    }
}
