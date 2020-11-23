<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from_date_this_month = date('Y-m-d 00:00:00', strtotime(date('Y-m-1')));
        $to_date_this_month = date('Y-m-d H:i:s');

        $q_total_revenue_this_month = $this->sum_total_dr_cr_by_acc_type('10,11',$from_date_this_month,$to_date_this_month);
        $q_total_revenue_all = $this->sum_total_dr_cr_by_acc_type('10,11');
        
        $q_total_expense_this_month = $this->sum_total_dr_cr_by_acc_type('12,13',$from_date_this_month,$to_date_this_month);
        $q_total_expense_all = $this->sum_total_dr_cr_by_acc_type('12,13');

        $total_revenue_debit_this_month = 0;
        $total_revenue_credit_this_month = 0;
        $total_revenue_debit_all = 0;
        $total_revenue_credit_all = 0;
        $total_expense_debit_this_month = 0;
        $total_expense_credit_this_month = 0;
        $total_expense_debit_all = 0;
        $total_expense_credit_all = 0;
        if(count($q_total_revenue_this_month) > 0){
            foreach ($q_total_revenue_this_month as $key => $t_revenue_this_m) {
                $total_revenue_debit_this_month += $t_revenue_this_m->total_debit;
                $total_revenue_credit_this_month += $t_revenue_this_m->total_credit;
            }
        }
        if(count($q_total_revenue_all) > 0){
            foreach ($q_total_revenue_all as $key => $t_revenue_this_m) {
                $total_revenue_debit_all += $t_revenue_this_m->total_debit;
                $total_revenue_credit_all += $t_revenue_this_m->total_credit;
            }
        }
        if(count($q_total_expense_this_month) > 0){
            foreach ($q_total_expense_this_month as $key => $t_expense_this_m) {
                $total_expense_debit_this_month += $t_expense_this_m->total_debit;
                $total_expense_credit_this_month += $t_expense_this_m->total_credit;
            }
        }
        if(count($q_total_expense_all) > 0){
            foreach ($q_total_expense_all as $key => $t_expense_this_m) {
                $total_expense_debit_all += $t_expense_this_m->total_debit;
                $total_expense_credit_all += $t_expense_this_m->total_credit;
            }
        }
        
        $arr_dashboard = [
            'total_revenue_debit_this_month' => $total_revenue_debit_this_month,
            'total_revenue_credit_this_month' => $total_revenue_credit_this_month,
            'total_revenue_debit_all' => $total_revenue_debit_all,
            'total_revenue_credit_all' => $total_revenue_credit_all,
            'total_expense_debit_this_month' => $total_expense_debit_this_month,
            'total_expense_credit_this_month' => $total_expense_credit_this_month,
            'total_expense_debit_all' => $total_expense_debit_all,
            'total_expense_credit_all' => $total_expense_credit_all
        ];

        return $this->sendResponse($arr_dashboard,'Dashboard retrieve successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function sum_total_dr_cr_by_acc_type($arr_acc_type, $from_date = null, $to_date = null)
    {   
        $sql_where_date = "";
        if($from_date != null){
            $sql_where_date .=" AND bsc_journal.create_date >= '$from_date'";
        }
        if($to_date != null){
            $sql_where_date .=" AND bsc_journal.create_date <= '$to_date'";
        }
        $sql_total_amount = "SELECT
                                SUM(bsc_journal.debit_amount) AS total_debit,
                                SUM(bsc_journal.credit_amount) AS total_credit
                            FROM
                                bsc_journal
                                LEFT JOIN bsc_account_charts ON bsc_journal.bsc_account_charts_id = bsc_account_charts.ID
                            WHERE
                                bsc_account_charts.bsc_account_type_id IN($arr_acc_type)
                                AND bsc_journal.status = 't'
                                AND bsc_journal.is_deleted = 'f' {$sql_where_date}
                            GROUP BY
                                bsc_account_charts.bsc_account_type_id";
        $total_amount = DB::select($sql_total_amount);
        return $total_amount;
    }
}
