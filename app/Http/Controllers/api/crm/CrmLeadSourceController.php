<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmLeadSource;
use Hamcrest\Type\IsNumeric;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmLeadSourceController extends Controller
{
    //
    protected $source;

    function __construct()
    {
        $this->source = new CrmLeadSource();
    }

    function saveData(Request $request){
        try{
            $id = $request->input('id');
            $userId = $request->input('user_id');
            $nameEn = $request->input('name_en');
            $nameKh = $request->input('name_kh');
            $status = $request->input('status');
            $result = $this->source->saveData($id, $userId, $nameEn, $nameKh, $status);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getOneData($id){
        try{
            $result = $this->source->getOneData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getAllData(){
        try{
            $result = $this->source->getAllData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function deleteData(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        try{
            $result = $this->source->deleteData($id, $userId);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse([], $result != null ? 'deleted' : 'failed');
    }
}
