<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmLeadStatus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmLeadStatusController extends Controller
{
    //
    protected $leadStatus;
    function __construct()
    {
        $this->leadStatus = new CrmLeadStatus();
    }

    function saveData(Request $request){
        try{
            $id = $request->input('id');
            $userId = $request->input('user_id');
            $nameEn = $request->input('name_en');
            $nameKh = $request->input('name_kh');
            $status = $request->input('status');
            $sequence = $request->input('sequence');
            $color = $request->input('color');
            $result = $this->leadStatus->saveData($id, $userId, $nameEn, $nameKh, $status, $sequence, $color);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getOneData($id){
        try{
            $result = $this->leadStatus->getOneData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getAllData(){
        try{
            $result = $this->leadStatus->getAllData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getActiveData(){
        try{
            $result = $this->leadStatus->getActiveData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }
    function getChildData($id){
        try{
            $result = $this->leadStatus->getChildData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }
    function getConvertCustomerStatus(){
        try{
            $result = $this->leadStatus->getConertCustomerStatus();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }
    function getConvertCustomerStatusChild($id){
        try{
            $result = $this->leadStatus->getConertCustomerStatusChild($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }
    function deleteData(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        try{
            $result = $this->leadStatus->deleteData($id, $userId);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse([], $result != null ? 'deleted' : 'failed');
    }
}
