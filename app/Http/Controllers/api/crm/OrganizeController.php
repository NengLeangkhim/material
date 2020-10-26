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

    public function edit(Request $request){
        try {
            $results = DB::select(
                'SELECT public."insert_crm_lead_contact"(?, ?, ?, ?, ?, ?, ?, ?, ?)',
                array(
                    $request->input('name_en'),
                    $request->input('name_kh'),
                    $request->input('email'),
                    $request->input('phone'),
                    $request->input('facebook'),
                    $request->input('position'),
                    $create_by,
                    $request->input('national_id'),
                    $request->input('ma_honorifics_id')
                ));
            return json_encode(["insert"=>"success","result"=>$results]);
        } catch(Exception $e){
            return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
        }
    }
}
