<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\model\api\BSC\IncomeStatement;
use Carbon\Traits\Comparison;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class IncomeStatementApiController extends Controller
{
    protected $is;

    function __construct()
    {
        $this->is = new IncomeStatement();
    }

    public function getIS(Request $request){
        $data = $this->getIncomeStatement($request);
        return view('bsc.report.financial_report.profit_and_loss.profit_and_loss');
    }

    public function getCompareIncomeStatement(Request $request){

        $type = $request->type;
        $comparison = $request->comparison;
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $result = [];

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
            $pre_result = [
                'header' => [
                    'from_date' => $firstDay,
                    'to_date' => $lastDay
                ],
                'body' => $this->incomeStatement($firstDay, $lastDay)];
            array_push($result, $pre_result);
        }

        $data = [
            'header' => [
                'type' => $typeName,
                'comparison' => $comparison
            ],
            'body' => $result
        ];

        return $this->sendResponse($data,$typeName);
    }

    public function incomeStatement($fromDate, $toDate){
        try {
            $income = $this->is->getData('(10,11)', $fromDate, $toDate);
            $expense = $this->is->getData('(12,13)', $fromDate, $toDate);
            $cogs = $this->is->getData('(5)', $fromDate, $toDate);

            $total_income = $this->getTotalSameCurrency($income);
            $total_expense = $this->getTotalSameCurrency($expense);
            $total_cogs = $this->getTotalSameCurrency($cogs);
            $gross_profit = $this->getTotalSubstraction($total_income, $total_cogs);
            $net_income = $this->getTotalSubstraction($gross_profit, $total_expense);

            $income_statement = [
                'income_list' => $income, 'total_income' => $total_income,
                'cogs_list' => $cogs, 'total_cogs' => $total_cogs,
                'gross_profit' => $gross_profit,
                'expense_list' => $expense, 'total_expense' => $total_expense,
                'net_income' => $net_income
            ];
        } catch(QueryException $e){
            return $this->sendError($e->getMessage());
        }
        return $income_statement;
        // return $this->sendResponse($income_statement, '');
    }


    public function getIncomeStatement(Request $request){
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        try {
            $income = $this->is->getData('(10,11)', $fromDate, $toDate);
            $expense = $this->is->getData('(12,13)', $fromDate, $toDate);
            $cogs = $this->is->getData('(5)', $fromDate, $toDate);

            $total_income = $this->getTotalSameCurrency($income);
            $total_expense = $this->getTotalSameCurrency($expense);
            $total_cogs = $this->getTotalSameCurrency($cogs);
            $gross_profit = $this->getTotalSubstraction($total_income, $total_cogs);
            $net_income = $this->getTotalSubstraction($gross_profit, $total_expense);

            $income_statement = [
                'income_list' => $income, 'total_income' => $total_income,
                'cogs_list' => $cogs, 'total_cogs' => $total_cogs,
                'gross_profit' => $gross_profit,
                'expense_list' => $expense, 'total_expense' => $total_expense,
                'net_income' => $net_income
            ];
        } catch(QueryException $e){
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($income_statement, '');
    }

    protected function getTotalSameCurrency($value = []){
        $result = [];
        $total = [];
        foreach($value as $val){
            $str = $val->currency_name_en;
            try {
                $total[$str] += $val->total_debit;
            } catch(Exception $e){
                $total[$str] = 0;
                $total[$str] += $val->total_debit;
            }
        }
        foreach($total as $k => $val) {
            array_push($result, ['currency' => $k, 'value' => $val]);
        }
        return $result;
    }

    // MARK: - total = firstValue - secondValue
    protected function getTotalSubstraction($firstValue = [], $secondValue = []){
        $result = [];
        foreach($firstValue as $f){
            foreach($secondValue as $s){
                if($f['currency'] == $s['currency']) {
                    $s['value'] = $f['value'] - $s['value'];
                    array_push($result, ['currency' => $f['currency'], 'value' => $s['value']]);
                }
            }
        }
        return $result;
    }

    private function mergeTwoArray($firstValue, $secondValue){

    }

    private function mergeArray($firstValue = []){
        foreach($firstValue as $key => $value){
            try {
                foreach($value as $k => $val){
                    $value[$k] = [
                        'id'=>$val->id,
                        'name_en' => $val->name_en,
                        'name_kh' => $val->name_kh,
                        'value' => [
                            'ma_currency_id' => $val->ma_currency_id,
                            'currency_name_en' => $val->currency_name_en,
                            'currency_name_kh' => $val->currency_name_kh,
                            'total_debit' => $val->total_debit,
                            'total_credit' => $val->total_credit
                        ]
                    ];
                }
                $firstValue[$key] = $value;
            } catch(Exception $e){
                $pre_val = [];
                foreach($value as $k => $val){
                    array_push($pre_val, $val);
                }
                $firstValue[$key] = [$pre_val];
            }
        }
        return $firstValue;
    }

}
