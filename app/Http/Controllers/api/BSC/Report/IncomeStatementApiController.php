<?php

namespace App\Http\Controllers\api\BSC\Report;

use App\Http\Controllers\Controller;
use App\model\api\BSC\IncomeStatement;
use Exception;
use App\Http\Controllers\perms;
use App\model\api\BSC\ReportHelper;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class IncomeStatementApiController extends Controller {

    function __construct(){
        $this->report_helper = new ReportHelper();
    }
    
    public function index(Request $request)
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030501', $userid)) {
            return $this->sendError("No Permission");
        }
        
        $type = $request->type;
        $comparison = $request->comparison;
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $toDateSub1Day = date("Y-m-d", strtotime("-1 days", strtotime($toDate)));
        // dd(date("Y-m-t", strtotime("-1 months", strtotime($toDateSub1Day))));

        $result = [];
        $dateList = [];
        for($i=0; $i<$comparison + 1; $i++){
            switch($type) {
                case 0 :
                    // custom
                    $firstDay = date("Y-m-d", strtotime("-".$i." months", strtotime($fromDate)));
                    $lastDay = date("Y-m-d", strtotime("-".$i." months", strtotime($toDate)));
                    $typeName = 'custom';
                break;
                case 1 :
                    // monthly
                    $firstDay = date("Y-m-01", strtotime("-".$i." months", strtotime($fromDate)));
                    $lastDay = date("Y-m-t", strtotime("-".$i." months", strtotime($toDateSub1Day)));
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
        // dd($myResult);

        $data = [
            'header' => $dateList,
            'body' => $myResult
        ];

        return $this->sendResponse($data,$typeName);
    }

    protected function getMultipleIncomeStatement($arrDate = []){
        $income_list = $this->report_helper->getData('10,11',$arrDate,false);
        $cogs_list = $this->report_helper->getData('6',$arrDate,true);
        $expense_list = $this->report_helper->getData('12,13',$arrDate,true);
        $get_total_income = $income_list["get_total_account"];
        $get_total_cogs = $cogs_list["get_total_account"];
        $get_total_expense = $expense_list["get_total_account"];

        // gross profit = income - cogs
        $gross_profit = $this->getDataCalculate($get_total_income,$get_total_cogs,$arrDate);
        $get_total_gross_profit = $gross_profit["get_total_account"];
        // net income = gross profit - expense
        $net_income = $this->getDataCalculate($get_total_gross_profit,$get_total_expense,$arrDate);
        $result = [
            'is_error' => false,
            'income_list' => $income_list,
            'cogs_list' => $cogs_list,
            'gross_profit' => $gross_profit,
            'expense_list' => $expense_list,
            'net_income' => $net_income
        ];
        return $result;
    }

    protected function getDataCalculate($get_total_first, $get_total_second, $arrDate = []){
        // get total gross profit by date = first - second
        $get_total_account = [];
        for($i = 0; $i < count($arrDate); $i++){
            if(!empty($get_total_first)){
                $total_account_first = $get_total_first[$i]["total_account"];
            }else{
                $total_account_first = 0;
            }
            if(!empty($get_total_second)){
                $total_account_second = $get_total_second[$i]["total_account"];
            }else{
                $total_account_second = 0;
            }
            $total_account = $total_account_first - $total_account_second;
            $get_total_account[$i] = ['total_account' => $total_account];
        }
        $result = [
            'data_content' => [],
            'get_total_account' => $get_total_account
        ];
        return $result;
    }
}
