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
        date_default_timezone_set('Asia/Phnom_Penh');
        $from_date_this_month = date('Y-m-d 00:00:00', strtotime(date('Y-m-1')));
        $to_date_this_month = date('Y-m-d H:i:s');

        // Show amount dashboard
        $show_amount_dashboard = $this->show_amount_dashboard($from_date_this_month, $to_date_this_month);
        
        // Get data high chart for 5 month
        $show_high_chart_dashboard = $this->show_high_chart_dashboard();
        
        
        $arr_dashboard = [
            'show_amount_dashboard' => [
                'total_revenue_this_month' => $show_amount_dashboard['total_revenue_this_month'],
                'total_revenue_all' => $show_amount_dashboard['total_revenue_all'],
                'total_expense_this_month' => $show_amount_dashboard['total_expense_this_month'],
                'total_expense_all' => $show_amount_dashboard['total_expense_all'],
                'total_receivable_this_month' => $show_amount_dashboard['total_receivable_this_month'],
                'total_receivable_all' => $show_amount_dashboard['total_receivable_all'],
                'total_payable_this_month' => $show_amount_dashboard['total_payable_this_month'],
                'total_payable_all' => $show_amount_dashboard['total_payable_all']
            ],
            'show_high_chart_dashboard' => [
                'arr_month' => $show_high_chart_dashboard['arr_month'],
                'arr_total_amount_revenue' => $show_high_chart_dashboard['arr_total_amount_revenue'],
                'arr_total_amount_expense' => $show_high_chart_dashboard['arr_total_amount_expense'],
                'arr_total_amount_receivable' => $show_high_chart_dashboard['arr_total_amount_receivable'],
                'arr_total_amount_payable' => $show_high_chart_dashboard['arr_total_amount_payable']
            ]
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

    public static function show_amount_dashboard($from_date_this_month, $to_date_this_month)
    {
        // total revenue
        $total_revenue_this_month_debit = self::sum_total_dr_cr_by_acc_type('10,11',$from_date_this_month,$to_date_this_month)['total_amount_debit'];
        $total_revenue_this_month_credit = self::sum_total_dr_cr_by_acc_type('10,11',$from_date_this_month,$to_date_this_month)['total_amount_credit'];
        $total_revenue_all_debit = self::sum_total_dr_cr_by_acc_type('10,11')['total_amount_debit'];
        $total_revenue_all_credit = self::sum_total_dr_cr_by_acc_type('10,11')['total_amount_credit'];
        
        // total expense
        $total_expense_this_month_debit = self::sum_total_dr_cr_by_acc_type('12,13',$from_date_this_month,$to_date_this_month)['total_amount_debit'];
        $total_expense_this_month_credit = self::sum_total_dr_cr_by_acc_type('12,13',$from_date_this_month,$to_date_this_month)['total_amount_credit'];
        $total_expense_all_debit = self::sum_total_dr_cr_by_acc_type('12,13')['total_amount_debit'];
        $total_expense_all_credit = self::sum_total_dr_cr_by_acc_type('12,13')['total_amount_credit'];

        // total account receivable debit credit
        $total_receivable_this_month_debit = self::sum_total_dr_cr_by_acc_type('14',$from_date_this_month,$to_date_this_month)['total_amount_debit'];
        $total_receivable_this_month_credit = self::sum_total_dr_cr_by_acc_type('14',$from_date_this_month,$to_date_this_month)['total_amount_credit'];
        $total_receivable_all_debit = self::sum_total_dr_cr_by_acc_type('14')['total_amount_debit'];
        $total_receivable_all_credit = self::sum_total_dr_cr_by_acc_type('14')['total_amount_credit'];
        
        // total account payable debit credit
        $total_payable_this_month_debit = self::sum_total_dr_cr_by_acc_type('15',$from_date_this_month,$to_date_this_month)['total_amount_debit'];
        $total_payable_this_month_credit = self::sum_total_dr_cr_by_acc_type('15',$from_date_this_month,$to_date_this_month)['total_amount_credit'];
        $total_payable_all_debit = self::sum_total_dr_cr_by_acc_type('15')['total_amount_debit'];
        $total_payable_all_credit = self::sum_total_dr_cr_by_acc_type('15')['total_amount_credit'];

        // total balance revenue cr - dr
        $total_revenue_this_month = $total_revenue_this_month_credit - $total_revenue_this_month_debit;
        $total_revenue_all = $total_revenue_all_credit - $total_revenue_all_debit;
        // total balance expense dr -cr
        $total_expense_this_month = $total_expense_this_month_debit - $total_expense_this_month_credit;
        $total_expense_all = $total_expense_all_debit - $total_expense_all_credit;
        // total account receivable dr - cr
        $total_receivable_this_month = $total_receivable_this_month_debit - $total_receivable_this_month_credit;
        $total_receivable_all = $total_receivable_all_debit - $total_receivable_all_credit;
        // total account payable cr - dr
        $total_payable_this_month = $total_payable_this_month_credit - $total_payable_this_month_debit;
        $total_payable_all = $total_payable_all_credit - $total_payable_all_debit;

        return [
            'total_revenue_this_month' => $total_revenue_this_month,
            'total_revenue_all' => $total_revenue_all,
            'total_expense_this_month' => $total_expense_this_month,
            'total_expense_all' => $total_expense_all,
            'total_receivable_this_month' => $total_receivable_this_month,
            'total_receivable_all' => $total_receivable_all,
            'total_payable_this_month' => $total_payable_this_month,
            'total_payable_all' => $total_payable_all
        ];
    }

    public function show_high_chart_dashboard()
    {
        // array 5 month
        $arr_month = self::get_data_each_five_month()['arr_month'];

        // // total revenue
        // $arr_total_amount_revenue_debit = self::get_data_each_five_month('10,11')['arr_total_amount_debit'];
        // $arr_total_amount_revenue_credit = self::get_data_each_five_month('10,11')['arr_total_amount_credit'];

        // // total expense
        // $arr_total_amount_expense_debit = self::get_data_each_five_month('12,13')['arr_total_amount_debit'];
        // $arr_total_amount_expense_credit = self::get_data_each_five_month('12,13')['arr_total_amount_credit'];
        
        // total revenue credit - debit
        $arr_total_amount_revenue = self::get_data_each_five_month('10,11')['arr_total_amount_revenue'];
    
        // total account expense debit - credit
        $arr_total_amount_expense = self::get_data_each_five_month('12,13')['arr_total_amount_expense'];

        // total account receivable debit - credit
        $arr_total_amount_receivable = self::get_data_each_five_month('14')['arr_total_amount_receivable'];

        // total account payable credit - debit
        $arr_total_amount_payable = self::get_data_each_five_month('15')['arr_total_amount_payable'];

        return [
            'arr_month' => $arr_month,
            'arr_total_amount_revenue' => $arr_total_amount_revenue,
            'arr_total_amount_expense' => $arr_total_amount_expense,
            'arr_total_amount_receivable' => $arr_total_amount_receivable,
            'arr_total_amount_payable' => $arr_total_amount_payable
        ];
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
                                1 = 1 
                                AND bsc_account_charts.bsc_account_type_id IN($arr_acc_type)
                                AND bsc_account_charts.ma_currency_id = 4
                                AND bsc_account_charts.parent_id IS NOT null
                                AND bsc_journal.status = 't'
                                AND bsc_journal.is_deleted = 'f' {$sql_where_date}
                            GROUP BY
                                bsc_account_charts.bsc_account_type_id";
        $q_total_amount = DB::select($sql_total_amount);
            $total_debit = 0;
            $total_credit = 0;
            if(count($q_total_amount) > 0){
                foreach ($q_total_amount as $key => $q_total) {
                    $total_debit += $q_total->total_debit;
                    $total_credit += $q_total->total_credit;
                }
            }
        return [
            'total_amount_debit' => $total_debit,
            'total_amount_credit' => $total_credit
        ];
    }
    public static function get_data_each_five_month($arr_acc_type = null)
    {
        $arr_month=array();
        $arr_total_amount_debit = array();
        $arr_total_amount_credit = array();
        $arr_total_amount_revenue = array();
        $arr_total_amount_expense = array();
        $arr_total_amount_receivable = array();
        $arr_total_amount_payable = array();
        
        $end_month=date('Y-m-d');
        for($i=4;$i>=0;$i--){
            $start_month=date('F',strtotime("-$i months",strtotime($end_month)));
            $start_date=date('Y-m-01 00:00:00',strtotime($start_month));
            $end_date=date("Y-m-t 23:59:00",strtotime($start_month));

            $sql_where_acc_type = "";
            if($arr_acc_type != null){
                $sql_where_acc_type .= " AND bsc_account_charts.bsc_account_type_id IN($arr_acc_type)";
            }

            $sql_total_amount = "SELECT
                                    SUM(bsc_journal.debit_amount) AS total_debit,
                                    SUM(bsc_journal.credit_amount) AS total_credit
                                FROM
                                    bsc_journal
                                    LEFT JOIN bsc_account_charts ON bsc_journal.bsc_account_charts_id = bsc_account_charts.ID
                                WHERE
                                    1 = 1
                                    AND bsc_account_charts.ma_currency_id = 4
                                    AND bsc_account_charts.parent_id IS NOT null
                                    AND bsc_journal.create_date >= '$start_date'
                                    AND bsc_journal.create_date <= '$end_date'
                                    AND bsc_journal.status = 't'
                                    AND bsc_journal.is_deleted = 'f' {$sql_where_acc_type}
                                GROUP BY
                                    bsc_account_charts.bsc_account_type_id";
            $q_total_amount = DB::select($sql_total_amount);
            $total_debit = 0;
            $total_credit = 0;
            if(count($q_total_amount) > 0){
                foreach ($q_total_amount as $key => $q_total) {
                    $total_debit += $q_total->total_debit;
                    $total_credit += $q_total->total_credit;
                }
            }
            // find total revenue = cr - dr
            $total_revenue = 0;
            if($arr_acc_type == 10 || $arr_acc_type == 11){
                $total_revenue = $total_credit - $total_debit;
            }

            // find total expense = dr - cr
            $total_expense = 0;
            if($arr_acc_type == 12 || $arr_acc_type == 13){
                $total_expense = $total_debit - $total_credit;
            }

            // find total account receivable = dr - cr
            $total_account_receivable = 0;
            if($arr_acc_type == 14){
                $total_account_receivable = $total_debit - $total_credit;
            }

            // find total account payable = cr - dr
            $total_account_payable = 0;
            if($arr_acc_type == 15){
                $total_account_payable = $total_credit - $total_debit;
            }
            
            array_push($arr_month,$start_month);
            array_push($arr_total_amount_debit, $total_debit);
            array_push($arr_total_amount_credit, $total_credit);
            array_push($arr_total_amount_revenue, $total_revenue);
            array_push($arr_total_amount_expense, $total_expense);
            array_push($arr_total_amount_receivable, $total_account_receivable);
            array_push($arr_total_amount_payable, $total_account_payable);
        }
        return [
                'arr_month'=>$arr_month,
                'arr_total_amount_debit'=>$arr_total_amount_debit,
                'arr_total_amount_credit'=>$arr_total_amount_credit,
                'arr_total_amount_revenue'=>$arr_total_amount_revenue,
                'arr_total_amount_expense'=>$arr_total_amount_expense,
                'arr_total_amount_receivable'=>$arr_total_amount_receivable,
                'arr_total_amount_payable'=>$arr_total_amount_payable,
            ];
    }
}
