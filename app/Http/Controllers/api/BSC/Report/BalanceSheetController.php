<?php

namespace App\Http\Controllers\api\BSC\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Exception;
use App\Http\Controllers\perms;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BalanceSheetController extends Controller
{
    public function index(Request $request){

        $dateparam=date("Y-m-d");
        if ($request->has('date')){
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

            $myResult = $this->getMultipleBalanceSheet($dateparam);
            // dd($myResult);

            $data = [
                'header' => $dateList,
                'body' => $myResult
            ];
        } catch(QueryException $e){
            return $this->sendError($e);
        }
        
        return $this->sendResponse($data, 'all currency in USD for KHR Riel, we exchange from its to USD, by defult USD 1 = 4000 Riel');
    }

    function getMultipleBalanceSheet($dateList){
        //All Assets
        $assetList = $this->getSum($this->getBalanceSheetDataList(1,$dateList,4000,true), true);
        //All Liablitiy
        $liabilityList = $this->getSum($this->getBalanceSheetDataList(2,$dateList,4000,false), false);
        //All Equity
        $equityList = $this->getSum($this->getBalanceSheetDataList(3,$dateList,4000,true), true);
        $validateBalanceSheet = ($assetList['total'] == ($liabilityList['total'] + $equityList['total']) ? true : false);
        $result = [
            'is_error' => false,
            'asset_list' => $assetList,
            'liability_list' => $liabilityList,
            'equity_list' => $equityList
        ];
        // if(!$validateBalanceSheet){
        //     return $this->sendResponse(['is_error'=> true],'asset != liablity + equity, please check it.');
        // }
        return $result;
    }

    function getSum($data = [], $isDebitMinusCredit){
        $total = 0;
        foreach($data as $key => $value){
            $cal = number_format((float)($isDebitMinusCredit == true ? ($value->total_debit - $value->total_credit) : ($value->total_credit - $value->total_debit)), 2, '.', '');
            $data[$key]->value = $cal;
            $total += $cal;
        }

        return ['data' => $data, 'total' => $total];
    }

    function sum($data = [], $isDebitMinusCredit){
        foreach($data as $key => $value){
            foreach($value as $k => $val){
                $cal = number_format((float)($isDebitMinusCredit == true ? ($val->debit - $val->credit) : ($val->credit - $val->debit)), 2, '.', '');
                $data[$key][$k]->value = $cal;
            }
        }
        return $data;
    }

    function getBalanceSheetDataList(int $id, string $date, $rate = 4000, $isDebitMinusCredit = true){
        if ($date == null || $date == ''){
            $date = now();
        }
        try{
            $shortUseSQL = 'WITH me AS(SELECT ac.parent_id,ac.ma_currency_id,SUM(j.debit_amount)AS debit,SUM(j.credit_amount)AS credit FROM bsc_account_charts AS ac INNER JOIN bsc_journal AS j ON j.bsc_account_charts_id=ac.id WHERE j.create_date::DATE<=\''.$date.'\'::DATE GROUP BY ac.id ORDER BY ac.parent_id)SELECT me.parent_id,ac.name_en,ac.name_kh,SUM(CASE WHEN me.ma_currency_id=4 THEN(debit)ELSE(debit/'.$rate.')END)total_debit,SUM(CASE WHEN me.ma_currency_id=4 THEN(credit)ELSE(credit/'.$rate.')END)total_credit FROM me INNER JOIN bsc_account_charts AS ac ON me.parent_id=ac.id WHERE ac.bsc_account_type_id='.$id.' GROUP BY me.parent_id,ac.name_en,ac.name_kh ORDER BY me.parent_id;';
            $result = DB::select($shortUseSQL);

        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
