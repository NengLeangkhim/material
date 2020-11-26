<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;

class ReportBalanceSheet extends Controller
{
    function index(Request $request){

        $dateparam=date("Y-m-d");
        if ($request->has('date')){
            $dateparam = $request->date;
        }


        if($this->validateDate($dateparam)){
            //All Assets
            $ReportAsset = $this->getReportData(1,$dateparam);
            //All Liablitiy
            $ReportLiability = $this->getReportData(2,$dateparam);
            //All Equity
            $ReportEquity =$this->getReportData(3,$dateparam);

            return json_encode([
                'assets'=>$ReportAsset,
                'liability'=>$ReportLiability,
                'equity'=>$ReportEquity
            ]);
        }
    }
    public function validateDate($date){
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function getReportData($bsc_acc_id,$dateparam){
        $query = DB::select(
            "SELECT id,name_en
            from bsc_account_type
            where bsc_account_id ='$bsc_acc_id'"
        );

        $acc_type = array();
        $acc_type = $query;

        $n = count($acc_type);
        $Report = array();

        for($i=0; $i<$n; $i++) {
            $id = $acc_type[$i]->id;
            $accountType = DB::select(
                "SELECT ac.id,ac.name_en,sum(j.debit_amount) as debit,sum(j.credit_amount) as credit
                from bsc_account_charts as ac
                INNER JOIN bsc_journal as j
                ON j.bsc_account_charts_id = ac.id
                where ac.bsc_account_type_id ='$id'
                and DATE(j.create_date) <= '$dateparam'
                GROUP BY ac.id"
            );
            $Report[$acc_type[$i]->name_en] = $accountType;
        }

        return $Report;
    }

    function getBalanceSheet(Request $request){
        return view('bsc.report.financial_report.balance_sheet.balance_sheet');
    }

    function balanceSheet(Request $request){

        $dateparam=date("Y-m-d");
        if ($request->has('date')){
            $dateparam = $request->date;
        }


        if($this->validateDate($dateparam)){
            try {
                //All Assets
                $assetList = $this->getSum($this->getBalanceSheetDataList(1,$dateparam,true), true);

                //All Liablitiy
                $liabilityList = $this->getSum($this->getBalanceSheetDataList(2,$dateparam,false), false);
                //All Equity
                $equityList = $this->getSum($this->getBalanceSheetDataList(3,$dateparam,true), true);
                $validateBalanceSheet = ($assetList['total'] == ($liabilityList['total'] + $equityList['total']) ? true : false);
                $result = [
                    'is_error' => false,
                    'asset_list' => $assetList,
                    'liability_list' => $liabilityList,
                    'equity_list' => $equityList
                ];
            } catch(QueryException $e){
                return $this->sendError($e);
            }
            if(!$validateBalanceSheet){
                // return $this->sendResponse(['is_error'=> true],'asset != liablity + equity, please check it.');
            }
            return $this->sendResponse($result, 'all currency in USD for KHR Riel, we exchange from its to USD, by defult USD 1 = 4000 Riel');
        }
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
            $fSQL = '
            with final_journal as (
                with me as (
                SELECT ac.id,ac.name_en,sum(j.debit_amount) as debit,sum(j.credit_amount) as credit, ac.parent_id, ac.ma_currency_id
                from bsc_account_charts as ac
                INNER JOIN bsc_journal as j
                ON j.bsc_account_charts_id = ac.id
                where ac.bsc_account_type_id = 1
                GROUP BY ac.id
                ORDER BY ac.parent_id
                ), exchange_rate as (
                SELECT rate from ma_currency_rate WHERE create_date::TIMESTAMP < \'2020-07-18\'::TIMESTAMP ORDER BY create_date DESC LIMIT 1
                )
                select
                    me.parent_id,
                    CASE
                    WHEN me.ma_currency_id = 4 THEN
                        sum(debit)
                    ELSE
                        sum(debit/(select rate from exchange_rate))
                    END total_debit,
                    CASE
                    WHEN me.ma_currency_id = 4 THEN
                        sum(credit)
                    ELSE
                        sum(credit/(select rate from exchange_rate))
                    END total_credit
                from me INNER JOIN bsc_account_charts as ac on me.parent_id = ac.id
                GROUP BY me.ma_currency_id, me.parent_id
                ORDER BY me.parent_id
                )
                SELECT fj.parent_id as id, name_en, name_kh, sum(total_debit) as total_debit, sum(total_credit) as total_credit from final_journal as fj inner join bsc_account_charts as ac on fj.parent_id = ac.id
                WHERE bsc_account_type_id = 1
                GROUP BY fj.parent_id, name_en, name_kh, bsc_account_type_id
                ;
            ';

            $useSQL = '
            WITH final_journal AS (
                WITH
                    me AS (SELECT ac.id,ac.name_en, SUM(j.debit_amount) AS debit,SUM(j.credit_amount) AS credit, ac.parent_id, ac.ma_currency_id FROM bsc_account_charts AS ac INNER JOIN bsc_journal AS j ON j.bsc_account_charts_id = ac.id WHERE j.create_date::DATE <= \''.$date.'\'::DATE GROUP BY ac.id ORDER BY ac.parent_id)
                    SELECT
                        me.parent_id,
                        CASE
                            WHEN me.ma_currency_id = 4 THEN
                                SUM(debit)
                            ELSE
                                SUM(debit/'.$rate.')
                        END total_debit,
                        CASE
                            WHEN me.ma_currency_id = 4 THEN
                                SUM(credit)
                            ELSE
                                SUM(credit/'.$rate.')
                        END total_credit
                    FROM me INNER JOIN bsc_account_charts AS ac ON me.parent_id = ac.id
                    GROUP BY me.ma_currency_id, me.parent_id
                    ORDER BY me.parent_id
                )
            SELECT fj.parent_id AS id, name_en, name_kh, SUM(total_debit) AS total_debit, SUM(total_credit) AS total_credit FROM final_journal AS fj INNER JOIN bsc_account_charts AS ac ON fj.parent_id = ac.id
            WHERE bsc_account_type_id = '.$id.'
            GROUP BY fj.parent_id, name_en, name_kh, bsc_account_type_id
            ;
            ';
            $shortUseSQL = 'WITH me AS(SELECT ac.parent_id,ac.ma_currency_id,SUM(j.debit_amount)AS debit,SUM(j.credit_amount)AS credit FROM bsc_account_charts AS ac INNER JOIN bsc_journal AS j ON j.bsc_account_charts_id=ac.id WHERE j.create_date::DATE<=\''.$date.'\'::DATE GROUP BY ac.id ORDER BY ac.parent_id)SELECT me.parent_id,ac.name_en,ac.name_kh,SUM(CASE WHEN me.ma_currency_id=4 THEN(debit)ELSE(debit/'.$rate.')END)total_debit,SUM(CASE WHEN me.ma_currency_id=4 THEN(credit)ELSE(credit/'.$rate.')END)total_credit FROM me INNER JOIN bsc_account_charts AS ac ON me.parent_id=ac.id WHERE ac.bsc_account_type_id='.$id.' GROUP BY me.parent_id,ac.name_en,ac.name_kh ORDER BY me.parent_id;';
            $result = DB::select($useSQL);

        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
