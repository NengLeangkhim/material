<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  App\model\api\crm\ModelCrmOrganize as Organize;
class OrganizeController extends Controller
{
    //get organize all
    function index(){
        $organ = Organize::getOrganize();
        return json_encode(["data"=>$organ]);
    }


    public function show($id)
    {
        $organ = Organize::getOrganizeById($id);
        return json_encode(["data"=>$organ]);
    }
}
