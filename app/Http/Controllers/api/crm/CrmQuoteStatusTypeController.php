<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\ModelCrmQuoteStatusType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmQuoteStatusTypeController extends Controller
{
    //
    protected $quoteStatusType;
    function __construct()
    {
        $this->quoteStatusType = new ModelCrmQuoteStatusType();
    }

    function saveData(Request $request){
        try{
            $id = $request->input('id');
            $userId = $request->input('user_id');
            $nameEn = $request->input('name_en');
            $nameKh = $request->input('name_kh');
            $status = $request->input('status');
            $result = $this->quoteStatusType->saveData($id, $userId, $nameEn, $nameKh, $status);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getOneData($id){
        try{
            $result = $this->quoteStatusType->getOneData($id);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function getAllData(){
        try{
            $result = $this->quoteStatusType->getAllData();
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse($result, '');
    }

    function deleteData(Request $request){
        $id = $request->input('id');
        $userId = $request->input('user_id');
        try{
            $result = $this->quoteStatusType->deleteData($id, $userId);
        } catch(QueryException $e){
            $this->sendError($e);
        }
        return $this->sendResponse([], $result != null ? 'deleted' : 'failed');
    }
}
