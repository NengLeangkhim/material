<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmLeadIndustry;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmLeadIndustryController extends Controller
{
    //
    protected $industry;
    function __construct()
    {
        $this->industry = new CrmLeadIndustry();
    }

    function saveData(Request $request){
        try{
            $id = $request->input('id');
            $userId = $request->input('user_id');
            $nameEn = $request->input('name_en');
            $nameKh = $request->input('name_kh');
            $status = $request->input('status');
            $type = $request->input('industry_type');
            $result = $this->industry->saveData($id, $userId, $nameEn, $nameKh, $status,$type);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getOneData($id){
        try{
            $result = $this->industry->getOneData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getAllData(){
        try{
            $result = $this->industry->getAllData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function deleteData(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        try{
            $result = $this->industry->deleteData($id, $userId);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse([], $result != null ? 'deleted' : 'failed');
    }
}
