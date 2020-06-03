<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getcontact(){
        return view('contact.index');
        
    }
}
