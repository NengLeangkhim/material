<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\CRMLeadPOP;
use App\Http\Resources\api\crm\lead\POPResource;

class POPController extends Controller
{
     public function getpop(){
        $pop= CRMLeadPOP::getPOP();        
        return POPResource::Collection($pop);
     }
}
