<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\model\api\BSC\IncomeStatement;
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
        return $total;
    }

    // MARK: - total = firstValue - secondValue
    protected function getTotalSubstraction($firstValue = [], $secondValue = []){
        foreach($secondValue as $sKey => $sv){
            try{
                $firstValue[$sKey] = $firstValue[$sKey] - $sv;
            } catch(Exception $e){
                $firstValue[$sKey] = $sv;
            }
        }
        return $firstValue;
    }

}
