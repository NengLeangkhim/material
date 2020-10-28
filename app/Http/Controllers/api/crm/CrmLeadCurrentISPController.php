<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmLeadCurrentISP;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmLeadCurrentISPController extends Controller
{
    //
    protected $currentISP;
    function __construct()
    {
        $this->currentISP = new CrmLeadCurrentISP();
    }

    function saveData(Request $request){
        try{
            $id = $request->input('id');
            $userId = $request->input('user_id');
            $nameEn = $request->input('name_en');
            $nameKh = $request->input('name_kh');
            $status = $request->input('status');
            $result = $this->currentISP->saveData($id, $userId, $nameEn, $nameKh, $status);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getOneData($id){
        try{
            $result = $this->currentISP->getOneData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getAllData(){
        try{
            $result = $this->currentISP->getAllData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function deleteData(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        try{
            $result = $this->currentISP->deleteData($id, $userId);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse([], $result != null ? 'deleted' : 'failed');
    }
}
