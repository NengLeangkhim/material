<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmLeadScheduleType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmLeadScheduleTypeController extends Controller
{
    //
    protected $scheduleType;
    function __construct()
    {
        $this->scheduleType = new CrmLeadScheduleType();
    }

    function saveData(Request $request){
        try{
            $id = $request->input('id');
            $userId = $request->input('user_id');
            $nameEn = $request->input('name_en');
            $nameKh = $request->input('name_kh');
            $status = $request->input('status');
            $isResultType = $request->input('is_result_type');
            $result = $this->scheduleType->saveData($id, $userId, $nameEn, $nameKh, $status, $isResultType);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getOneData($id){
        try{
            $result = $this->scheduleType->getOneData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getAllData(){
        try{
            $result = $this->scheduleType->getAllData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function deleteData(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        try{
            $result = $this->scheduleType->deleteData($id, $userId);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse([], $result != null ? 'deleted' : 'failed');
    }
}
