<?php

namespace App\model\api\BSC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class IncomeStatement extends Model
{
    public function getData($ids = '()', $fromDate = null, $toDate = null,$isDebitMinusCredit = true){
        try {
            $dateCondition = ($fromDate == null && $toDate == null) ? ' ' : ' AND jour.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $conditon = ' bac.ma_currency_id IS NOT NULL AND jour.is_deleted = \'f\' AND jour.status = \'t\' AND bac.is_deleted = \'f\' AND bac.status = \'t\'
            AND bac.bsc_account_type_id IN '.'('.$ids.')'.$dateCondition;
            $result = DB::select('
                SELECT
                    bac.ID,
                    bac.name_en,
                    bac.name_kh,
                    bac.ma_currency_id,
                    mc.NAME AS currency_name_en,
                    mc.name_kh AS currency_name_kh,
                    SUM ( debit_amount ) AS total_debit,
                    SUM ( credit_amount ) AS total_credit,
                    ( SUM ( '. ($isDebitMinusCredit ? ' debit_amount ' : ' credit_amount ').' ) - SUM ( '.($isDebitMinusCredit?' credit_amount ':' debit_amount ').' ) ) AS total_amount 
                FROM
                    bsc_journal AS jour
                    INNER JOIN bsc_account_charts AS bac ON bac.ID = jour.bsc_account_charts_id
                    LEFT JOIN ma_currency AS mc ON bac.ma_currency_id = mc.ID 
                WHERE ' .$conditon.' 
                GROUP BY
                    bac.ID,
                    mc.NAME,
                    mc.name_kh;
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
