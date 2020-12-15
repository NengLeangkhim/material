<?php

namespace App\model\api\BSC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ReportHelper extends Model
{
    public static function getData($id = '()', $arrDate = [], $isDebitMinusCredit = true){
        try{
            // Get account type
            $account_types = DB::select("SELECT
                                            bsc_account_charts.bsc_account_type_id,
                                            bsc_account_type.name_en AS account_type_name 
                                        FROM
                                            bsc_journal
                                            INNER JOIN bsc_account_charts ON bsc_account_charts.id = bsc_journal.bsc_account_charts_id
                                            LEFT JOIN bsc_account_type ON bsc_account_charts.bsc_account_type_id = bsc_account_type.id 
                                        WHERE
                                            bsc_account_charts.bsc_account_type_id IN ($id)
                                            AND bsc_account_charts.ma_currency_id = 4
                                            AND bsc_account_charts.parent_id IS NOT NULL
                                            AND bsc_account_charts.status = 't' 
                                            AND bsc_account_charts.is_deleted = 'f' 
                                            AND bsc_journal.is_deleted = 'f' 
                                            AND bsc_journal.status = 't' 
                                        GROUP BY
                                            bsc_account_charts.bsc_account_type_id,
                                            bsc_account_type.name_en 
                                        ORDER BY
                                            bsc_account_charts.bsc_account_type_id ASC
                                        ");

            $data_content = [];
            $get_total_account = [];
            if(count($account_types) > 0){
                foreach ($account_types as $key => $account_type) {
                    // get account charts by account type
                    $sql_get_chart_account = "SELECT
                                                acc_chart.ID AS chart_account_id,
                                                acc_chart.name_en,
                                                acc_chart.name_kh,
                                                acc_chart.ma_currency_id
                                            FROM
                                                bsc_journal AS jour
                                                INNER JOIN bsc_account_charts AS acc_chart ON acc_chart.ID = jour.bsc_account_charts_id
                                            WHERE 
                                                1 = 1
                                                AND acc_chart.bsc_account_type_id = $account_type->bsc_account_type_id
                                                AND acc_chart.ma_currency_id = 4
                                                AND acc_chart.parent_id IS NOT NULL
                                                AND jour.is_deleted = 'f' 
                                                AND jour.status = 't' 
                                                AND acc_chart.is_deleted = 'f' 
                                                AND acc_chart.status = 't'
                                            GROUP BY
                                                acc_chart.id";
                    $q_get_chart_accounts = DB::select($sql_get_chart_account);

                    $get_chart_accounts = [];
                    if(count($q_get_chart_accounts) > 0){
                        foreach ($q_get_chart_accounts as $kk => $get_chart_account) {
                            $get_amount_chart = [];
                            if(!empty($arrDate)){
                                // loop date header
                                foreach ($arrDate as $kkk => $date) {
                                    // get amount from journal by date header
                                    $toDate = $date['toDate'];
                                    $sql_get_amount_chart = "SELECT
                                                                SUM(jour.debit_amount) AS total_debit,
                                                                SUM(jour.credit_amount) AS total_credit,
                                                                (SUM(".($isDebitMinusCredit ? "jour.debit_amount" : "jour.credit_amount").") - SUM(".($isDebitMinusCredit ? "jour.credit_amount" : "jour.debit_amount").")) AS total_amount 
                                                            FROM
                                                                bsc_journal AS jour
                                                            WHERE 
                                                                1 = 1
                                                                AND jour.bsc_account_charts_id = $get_chart_account->chart_account_id
                                                                AND jour.is_deleted = 'f' 
                                                                AND jour.status = 't' 
                                                                AND jour.create_date::DATE <= '$toDate'::DATE";
                                    $q_get_amount_chart = DB::select($sql_get_amount_chart);
                                    $total_debit = 0;
                                    $total_credit = 0;
                                    $total_amount = 0;
                                    if(count($q_get_amount_chart) > 0){
                                        foreach ($q_get_amount_chart as $keyy => $ch) {
                                            $total_debit += $ch->total_debit;
                                            $total_credit += $ch->total_credit;
                                            $total_amount += $ch->total_amount;
                                        }
                                    }
                                    $arr_get_amount_chart = [
                                        "total_debit" => $total_debit,
                                        "total_credit" => $total_credit,
                                        "total_amount" => $total_amount
                                    ];
                                    $get_amount_chart[$kkk] = $arr_get_amount_chart;
                                }
                            }
                            $get_chart_accounts[$kk] = [
                                "chart_account_id" => $get_chart_account->chart_account_id,
                                "name_en" => $get_chart_account->name_en,
                                "name_kh" => $get_chart_account->name_kh,
                                "ma_currency_id" => $get_chart_account->ma_currency_id,
                                "get_amount_chart" => $get_amount_chart
                            ];
                        }
                    }
                    
                    // Get total account type by date
                    $get_total_account_type = [];
                    for($i = 0; $i < count($arrDate); $i++){
                        $total_account_type = 0;
                        if(!empty($get_chart_accounts)){
                            foreach ($get_chart_accounts as $key => $ch_account) {
                                $total_account_type += $ch_account['get_amount_chart'][$i]['total_amount'];
                            }
                        }
                        $get_total_account_type[$i] = ['total_account_type' => $total_account_type];
                    }
                    
                    $data_content[$key] = [
                        'bsc_account_type_id' => $account_type->bsc_account_type_id,
                        'bsc_account_type_name' => $account_type->account_type_name,
                        'get_chart_accounts' => $get_chart_accounts,
                        'get_total_account_type' => $get_total_account_type
                    ];
                }

                // get total account by date
                for($i = 0; $i < count($arrDate); $i++){
                    $total_account = 0;
                    if(!empty($data_content)){
                        foreach ($data_content as $key => $content_acc_type) {
                            $total_account += $content_acc_type['get_total_account_type'][$i]['total_account_type'];
                        }
                    }
                    $get_total_account[$i] = ['total_account' => $total_account];
                }
            }

            $result = [
                'data_content' => $data_content,
                'get_total_account' => $get_total_account
            ];
            return $result;

        } catch(QueryException $e){
            throw $e;
        }
    }
}
