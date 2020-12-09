<?php

namespace App\model\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModelLeadBranch extends Model
{
     // Model get  lead Branch
     public  static function  CrmGetLeadBranch($status){
        $token = $_SESSION['token'];
        $request = Request::create('/api/leadbranch/'.$status, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
    }
     //method support for datatable server side processing
     public  static function  CrmGetLeadBranchDataTable($request,$status){
        $token = $_SESSION['token'];
        $request = Request::create('/api/leadbranch/'.$status.$request, 'GET');//
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
         return $res->getContent();
    }
}
