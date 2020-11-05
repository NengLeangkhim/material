<?php

namespace App\model\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ModelCrmOrganization extends Model
{
    //
    //Model get Lead source
    public static function CrmGetContact(){
        return DB::select('SELECT * from crm_lead_contact');
    }

    // Model get Organize
    public  static function  CrmGetOrganize(){
        $request = Request::create('/api/organizies', 'GET');
        $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
    }

    // Model get Organize by id
    public  static function  CrmGetOrganizeById($id){
        $request = Request::create('/api/organize/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
    }

}
