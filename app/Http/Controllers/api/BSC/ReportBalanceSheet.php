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
            $query = DB::select(
                'SELECT id,name_en 
                from bsc_account_type 
                where bsc_account_id =1'
            );

            $assets = array();
            $assets = $query;
            
            $n = count($assets);
            $ReportAsset = array();

            for($i=0; $i<$n; $i++) {
                $id = $assets[$i]->id;
                $accountType = DB::select(
                    "SELECT ac.id,ac.name_en,sum(j.debit_amount) as debit,sum(j.credit_amount) as credit 
                    from bsc_account_charts as ac 
                    INNER JOIN bsc_journal as j
                    ON j.bsc_account_charts_id = ac.id
                    where ac.bsc_account_type_id ='$id'
                    and DATE(j.create_date) = '$dateparam'
                    GROUP BY ac.id"
                );
                $ReportAsset[$assets[$i]->name_en] = $accountType;
            }


            //All Liablitiy
            $query2 = DB::select(
                'SELECT id,name_en 
                from bsc_account_type 
                where bsc_account_id =2'
            );

            $liability = array();
            $liability = $query2;
            
            $n2 = count($liability);
            $ReportLiability = array();

            for($i=0; $i<$n2; $i++) {
                $id = $liability[$i]->id;
                $accountType = DB::select(
                    "SELECT ac.id,ac.name_en,sum(j.debit_amount) as debit,sum(j.credit_amount) as credit 
                    from bsc_account_charts as ac 
                    INNER JOIN bsc_journal as j
                    ON j.bsc_account_charts_id = ac.id
                    where ac.bsc_account_type_id ='$id'
                    and DATE(j.create_date) = '$dateparam'
                    GROUP BY ac.id"
                );
                $ReportLiability[$liability[$i]->name_en] = $accountType;
            }

            //All Equity
            $query3 = DB::select(
                'SELECT id,name_en 
                from bsc_account_type 
                where bsc_account_id =3'
            );

            $equity = array();
            $equity = $query3;
            
            $n2 = count($equity);
            $Reportequity = array();

            for($i=0; $i<$n2; $i++) {
                $id = $equity[$i]->id;
                $accountType = DB::select(
                    "SELECT ac.id,ac.name_en,sum(j.debit_amount) as debit,sum(j.credit_amount) as credit 
                    from bsc_account_charts as ac 
                    INNER JOIN bsc_journal as j
                    ON j.bsc_account_charts_id = ac.id
                    where ac.bsc_account_type_id ='$id'
                    and DATE(j.create_date) = '$dateparam'
                    GROUP BY ac.id"
                );
                $ReportEquity[$equity[$i]->name_en] = $accountType;
            }

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
}
