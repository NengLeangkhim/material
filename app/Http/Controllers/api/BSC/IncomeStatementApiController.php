<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\model\api\BSC\IncomeStatement;
use Exception;
use App\Http\Controllers\perms;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class IncomeStatementApiController extends Controller {

    protected $is;

    function __construct(){
        $this->is = new IncomeStatement();
    }

    public function getIS(Request $request){
        // $data = $this->getIncomeStatement($request);

        if(!perms::check_perm_module('BSC_030101')){
            return view('no_perms');
        }
        
        try{
            return view('bsc.report.financial_report.profit_and_loss.profit_and_loss');
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
        
    }

    public function getCompareIncomeStatement(Request $request){

        $type = $request->type;
        $comparison = $request->comparison;
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $result = [];
        $dateList = [];
        for($i=0; $i<$comparison + 1; $i++){
            switch($type) {
                case 1 :
                    // monthly
                    $firstDay = date("Y-m-01", strtotime("-".$i." months", strtotime($fromDate)));
                    $lastDay = date("Y-m-t", strtotime("-".$i." months", strtotime($toDate)));
                    $typeName = 'monthly';
                break;
                case 2 :
                    // quarterly
                    $month = date("n", strtotime($fromDate));
                    $yearQuarter = ceil($month / 3);
                    switch($yearQuarter){
                        case 1:
                            // Jan Mar
                            $startDate = date("Y-01-01", strtotime($fromDate));
                            $endDate = date("Y-03-01", strtotime($fromDate));
                        break;
                        case 2:
                            // Apr Jun
                            $startDate = date("Y-04-01", strtotime($fromDate));
                            $endDate = date("Y-06-01", strtotime($fromDate));
                        break;
                        case 3:
                            // Jul Sep
                            $startDate = date("Y-07-01", strtotime($fromDate));
                            $endDate = date("Y-09-01", strtotime($fromDate));
                        break;
                        case 4:
                            // Oct Dec
                            $startDate = date("Y-10-01", strtotime($fromDate));
                            $endDate = date("Y-12-01", strtotime($fromDate));
                        break;
                    }
                    $firstDay = date("Y-m-01", strtotime("-".($i * 3)." months", strtotime($startDate)));
                    $lastDay = date("Y-m-t", strtotime("-".($i * 3)." months", strtotime($endDate)));
                    $typeName = 'quarterly';
                break;
                case 3 :
                    // yearly
                    $firstDay = date("Y-01-01", strtotime("-".$i." years", strtotime($fromDate)));
                    $lastDay = date("Y-12-t", strtotime("-".$i." years", strtotime($toDate)));
                    $typeName = 'yearly';
                break;
            }
            array_push($dateList, ['fromDate'=>$firstDay, 'toDate' => $lastDay]);
        }

        $myResult = $this->getMultipleIncomeStatement($dateList);

        $data = [
            'header' => $dateList,
            'body' => $myResult
        ];

        return $this->sendResponse($data,$typeName);
    }

    protected function mergeFirstList($secondList, $totalList, $index = 0, $isAppend = true){
        $newList = ['data'=>[], 'total_list'=>[]];
        foreach($secondList as $value){
            $newValue = [
                "id"=> $value->id,
                "name_en"=> $value->name_en,
                "name_kh"=> $value->name_kh,
                "ma_currency_id"=> $value->ma_currency_id,
                "currency_name_en"=> $value->currency_name_en,
                "currency_name_kh"=> $value->currency_name_kh,
                "value_list" => [[
                    "total_debit"=> $value->total_debit,
                    "total_credit"=> $value->total_credit
                ]]
            ];
            array_push($newList['data'], $newValue);
        }

        $newList['total_list'] = $totalList;
        for($i=0; $i<$index; $i++){
            $newList = $this->generateEmptyDataList($newList, $isAppend);
        }
        return $newList;
    }

    protected function generateEmptyDataList($firstList, $isAppend = true){
        foreach($firstList['data'] as $key => $value){
            $isAppend ? array_push($firstList['data'][$key]['value_list'], [
                "total_debit"=> 0,
                "total_credit"=> 0
            ])
            :
            array_unshift($firstList['data'][$key]['value_list'], [
                "total_debit"=> 0,
                "total_credit"=> 0
            ])
            ;
        }

        foreach($firstList['total_list'] as $key => $value){
           $isAppend ? array_push($firstList['total_list'][$key]['value_list'], [
                "total_debit"=> 0,
                "total_credit"=> 0
            ])
            :
            array_unshift($firstList['total_list'][$key]['value_list'], [
                "total_debit"=> 0,
                "total_credit"=> 0
            ])
            ;
        }
        return $firstList;
    }

    protected function setDataForTotalList($index, $firstList, $totalList){
        for($i=0; $i<count($totalList); $i++){
            $isInsertNew = true;
            foreach($firstList['total_list'] as $key => $value){
                if($value['ma_currency_id'] == $totalList[$i]['ma_currency_id']){
                    $firstList['total_list'][$key]['value_list'][$index] = [
                        'total_debit' => $totalList[$i]['value_list'][0]['total_debit'],
                        'total_credit' => $totalList[$i]['value_list'][0]['total_credit']
                    ];
                    $isInsertNew = false;
                }
            }
            if($isInsertNew) {
                $value_list = [];
                for($j=0; $j<$index; $j++){
                    array_push($value_list, [
                        "total_debit"=> 0,
                        "total_credit"=> 0
                    ]);
                }
                array_push($value_list, [
                    "total_debit"=> $totalList[$i]['value_list'][0]['total_debit'],
                    "total_credit"=> $totalList[$i]['value_list'][0]['total_debit']
                ]);
                $newValue = [
                    "ma_currency_id"=> $totalList[$i]['ma_currency_id'],
                    "currency_name_en"=> $totalList[$i]['currency_name_en'],
                    "currency_name_kh"=> $totalList[$i]['currency_name_kh'],
                    "value_list" => $value_list
                ];
                array_push($firstList['total_list'], $newValue);
            }
        }
        return $firstList['total_list'];
    }

    protected function setDataForAccountList($index, $firstList, $secondList){
        for($i=0; $i<count($secondList); $i++){
            $isInsertNew = true;
            foreach($firstList['data'] as $key => $value) {
                if($value['id'] == $secondList[$i]->id){
                    // both lists have the same account chart
                    $firstList['data'][$key]['value_list'][$index]['total_debit'] = $secondList[$i]->total_debit;
                    $firstList['data'][$key]['value_list'][$index]['total_credit'] = $secondList[$i]->total_credit;
                    $isInsertNew = false;
                }
            }
            if($isInsertNew){
                // second list has other account chart
                $value_list = [];
                // generate empty data
                for($j=0; $j<$index; $j++){
                    array_push($value_list, [
                        "total_debit"=> 0,
                        "total_credit"=> 0
                    ]);
                }
                array_push($value_list, [
                    "total_debit"=> $secondList[$i]->total_debit,
                    "total_credit"=> $secondList[$i]->total_credit
                ]);
                $newValue = [
                    "id"=> $secondList[$i]->id,
                    "name_en"=> $secondList[$i]->name_en,
                    "name_kh"=> $secondList[$i]->name_kh,
                    "ma_currency_id"=> $secondList[$i]->ma_currency_id,
                    "currency_name_en"=> $secondList[$i]->currency_name_en,
                    "currency_name_kh"=> $secondList[$i]->currency_name_kh,
                    "value_list" => $value_list
                ];
                array_push($firstList['data'], $newValue);
            }
        }
        return $firstList['data'];
    }

    protected function mergeList($index, $firstList, $secondList, $totalList){
        if(empty($firstList)) {
            if(!empty($secondList)){
                return $this->mergeFirstList($secondList, $totalList, $index, false);
            } else {
                return [];
            }
        } else {
            $firstList = $this->generateEmptyDataList($firstList);
            $firstList['data'] = $this->setDataForAccountList($index, $firstList, $secondList);
            $firstList['total_list'] = $this->setDataForTotalList($index, $firstList, $totalList);
            return $firstList;
        }
    }

    protected function generateEmptySubtractedData($firstList, $isAppend = true){
        foreach($firstList as $key => $value){
            $isAppend ? array_push($firstList[$key]['value_list'], [
                "total_debit"=> 0,
                "total_credit"=> 0
            ])
            :
            array_unshift($firstList[$key]['value_list'], [
                "total_debit"=> 0,
                "total_credit"=> 0
            ])
            ;
        }
        return $firstList;
    }

    protected function setDataForSubtractedList($index, $firstList, $secondList){
        for($i=0; $i<count($secondList); $i++){
            $isInsertNew = true;
            foreach($firstList as $key => $value){
                if($value['ma_currency_id'] == $secondList[$i]['ma_currency_id']){
                    $firstList[$key]['value_list'][$index]['total_debit'] = $secondList[$i]['value_list'][0]['total_debit'];
                    $firstList[$key]['value_list'][$index]['total_debit'] = $secondList[$i]['value_list'][0]['total_debit'];
                    $isInsertNew = false;
                }
            }
            if($isInsertNew) {
                $value_list = [];
                for($j=0; $j<$index; $j++){
                    array_push($value_list, [
                        "total_debit"=> 0,
                        "total_credit"=> 0
                    ]);
                }
                array_push($value_list, [
                    "total_debit"=> $secondList[$i]['value_list'][0]['total_debit'],
                    "total_credit"=> $secondList[$i]['value_list'][0]['total_debit']
                ]);
                $newValue = [
                    "ma_currency_id"=> $secondList[$i]['ma_currency_id'],
                    "currency_name_en"=> $secondList[$i]['currency_name_en'],
                    "currency_name_kh"=> $secondList[$i]['currency_name_kh'],
                    "value_list" => $value_list
                ];
                array_push($firstList, $newValue);
            }
        }
        return $firstList;
    }

    // merge secondList into the firstList
    protected function mergeSubtractedList($index, $firstList, $secondList){
        if(empty($firstList)){
            if(!empty($secondList)){
                for($i=0; $i<$index; $i++){
                    $secondList = $this->generateEmptySubtractedData($secondList, false);
                }
                return $secondList;
            } else {
                return [];
            }
        } else {
            $firstList = $this->generateEmptySubtractedData($firstList);
            return $this->setDataForSubtractedList($index, $firstList, $secondList);
        }
    }

    // MARK: - IS 1st
    protected function getMultipleIncomeStatement($arrDate = []){
        $mainIncomeList = [];
        $mainCogsList = [];
        $mainGrossProfitList = [];
        $mainExpeseList = [];
        $mainNetIncomeList = [];
        $test = [];
        $test_t = [];
        foreach($arrDate as $key => $date) {
            $fromDate = $date['fromDate'];
            $toDate = $date['toDate'];
            try {
                $income = $this->is->getData('(10,11)', $fromDate, $toDate);
                $expense = $this->is->getData('(12,13)', $fromDate, $toDate);
                $cogs = $this->is->getData('(5)', $fromDate, $toDate);

                $total_income = $this->getTotalSameCurrency($income);
                $total_expense = $this->getTotalSameCurrency($expense);
                $total_cogs = $this->getTotalSameCurrency($cogs);
                $gross_profit = $this->getTotalSubstraction($total_income, $total_cogs);
                $net_income = $this->getTotalSubstraction($gross_profit, $total_expense);
                array_push($test, $cogs);
                array_push($test_t, $total_cogs);
                // Merge Array Here
                $mainIncomeList = $this->mergeList($key, $mainIncomeList, $income, $total_income);
                $mainExpeseList = $this->mergeList($key, $mainExpeseList, $expense, $total_expense);
                $mainCogsList = $this->mergeList($key, $mainCogsList, $cogs, $total_cogs);
                $mainGrossProfitList = $this->mergeSubtractedList($key, $mainGrossProfitList, $gross_profit);
                $mainNetIncomeList = $this->mergeSubtractedList($key, $mainNetIncomeList, $net_income);
            } catch(QueryException $e){
                return $this->sendError($e->getMessage());
            }
        }
        // Finally merge list
        $finalReport = [
            'income_list' => $mainIncomeList,
            'cogs_list' => $mainCogsList,
            'gross_profit' => $mainGrossProfitList,
            'expense_list' => $mainExpeseList,
            'net_income' => $mainNetIncomeList
        ];
        return $finalReport;
    }

    protected function getTotalSameCurrency($value = []){
        $results = [];
        foreach($value as $key => $val){
            if(count($results) == 0) {
                $newValue = [
                    "ma_currency_id"=> $val->ma_currency_id,
                    "currency_name_en"=> $val->currency_name_en,
                    "currency_name_kh"=> $val->currency_name_kh,
                    "value_list" => [
                            [
                                "total_debit"=> $val->total_debit,
                                "total_credit"=> $val->total_credit
                            ]
                        ]
                ];
                array_push($results, $newValue);
            } else {
                $input = false;
                for($i = 0; $i < count($results); $i++){
                    if($val->ma_currency_id == $results[$i]['ma_currency_id']){
                        $results[$i]['value_list'][0] = [
                            "total_debit"=> $results[$i]['value_list'][0]['total_debit'] + $val->total_debit,
                            "total_credit"=> $results[$i]['value_list'][0]['total_credit'] + $val->total_credit
                        ];
                        $input = true;
                    }
                }
                if(!$input) {
                    $newValue = [
                        "ma_currency_id"=> $val->ma_currency_id,
                        "currency_name_en"=> $val->currency_name_en,
                        "currency_name_kh"=> $val->currency_name_kh,
                        "value_list" => [
                                [
                                    "total_debit"=> $val->total_debit,
                                    "total_credit"=> $val->total_credit
                                ]
                            ]
                    ];
                    array_push($results, $newValue);
                }
            }
        }
        return $results;
    }

    // MARK: - total = firstValue - secondValue
    protected function getTotalSubstraction($firstValue = [], $secondValue = []){
        foreach($secondValue as $skey => $svalue){
            $match = false;
            foreach($firstValue as $fkey => $fvalue){
                if($fvalue['ma_currency_id'] == $svalue['ma_currency_id']){
                    $firstValue[$fkey]['value_list'][0]['total_debit'] -= $svalue['value_list'][0]['total_debit'];
                    $firstValue[$fkey]['value_list'][0]['total_credit'] -= $svalue['value_list'][0]['total_credit'];
                    $match = true;
                }
            }
            if(!$match) {
                array_push($firstValue,[
                    'ma_currency_id' => $svalue['ma_currency_id'],
                    'currency_name_en' => $svalue['currency_name_en'],
                    'currency_name_kh' => $svalue['currency_name_kh'],
                    'value_list' =>  [
                        [
                            'total_debit' => ($svalue['value_list'][0]['total_debit'])*(-1),
                            'total_credit' => ($svalue['value_list'][0]['total_debit'])*(-1),
                        ]
                    ]
                ]);
            }
        }
        return $firstValue;
    }
}
