<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;
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
}
