<?php

namespace App\Http\Controllers\api\BSC\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Exception;
use App\Http\Controllers\perms;
use App\model\api\BSC\ReportHelper;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BalanceSheetController extends Controller
{
    function __construct(){
        $this->report_helper = new ReportHelper();
    }
    
    public function index(Request $request){

        $dateparam=date("Y-m-d");
        if ($request->date != ""){
            $dateparam = $request->date;
        }
        $comparison = $request->comparison;

        try {
            $result = [];
            $dateList = [];
            for($i=0; $i<$comparison + 1; $i++){
                $lastDay = date("Y-m-d", strtotime("-".$i." months", strtotime($dateparam)));
                array_push($dateList, ['toDate' => $lastDay]);
            }

            $myResult = $this->getMultipleBalanceSheet($dateList);

            $data = [
                'header' => $dateList,
                'body' => $myResult
            ];
        } catch(QueryException $e){
            return $this->sendError($e);
        }
        
        return $this->sendResponse($data, 'all currency in USD successfully');
    }

    function getMultipleBalanceSheet($arrDate = []){
        $assetList = $this->report_helper->getData('1,2,3,4,5,14,16',$arrDate,true);
        $liabilityList = $this->report_helper->getData('7,8,15',$arrDate,false);
        $equityList = $this->report_helper->getData('9',$arrDate,true);
        $result = [
            'is_error' => false,
            'asset_list' => $assetList,
            'liability_list' => $liabilityList,
            'equity_list' => $equityList
        ];
        return $result;
    }
}
