<?php

namespace App\model\api\BSC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class IncomeStatement extends Model
{
    public function getData($ids = '()', $fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null && $toDate == null) ? ' ' : ' AND jour.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $conditon = ' WHERE jour.is_deleted = \'f\' AND jour.status = \'t\' AND bac.is_deleted = \'f\' AND bac.status = \'t\'
            AND bac.bsc_account_type_id IN '.$ids.$dateCondition;
            $result = DB::select('
                SELECT bac.id, bac.name_en, bac.name_kh, bac.ma_currency_id, mc.name AS currency_name_en, mc.name_kh AS currency_name_kh, sum(debit_amount) AS total_debit, sum(credit_amount) AS total_credit
                FROM bsc_journal AS jour INNER JOIN bsc_account_charts AS bac ON bac.id = jour.bsc_account_charts_id LEFT JOIN ma_currency AS mc ON bac.ma_currency_id = mc.id'
                .$conditon.' GROUP BY bac.id, mc.name, mc.name_kh;
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
