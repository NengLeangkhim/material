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
        $from_date_this_month = date('d-m-Y', strtotime(date('Y-m-1')));
        $sql_total_revenue_this_month = "SELECT
                                            SUM(bsc_journal.debit_amount) AS total_debit,
                                            SUM(bsc_journal.credit_amount) AS total_credit,
                                            bsc_account_charts.bsc_account_type_id
                                        FROM
                                            bsc_journal
                                            LEFT JOIN bsc_account_charts ON bsc_journal.bsc_account_charts_id = bsc_account_charts.ID
                                        WHERE
                                            bsc_account_charts.bsc_account_type_id IN(10,11)
                                            AND bsc_journal.status = 't'
                                            AND bsc_journal.is_deleted = 'f'
                                        GROUP BY
                                            bsc_account_charts.bsc_account_type_id";
        $q_total_revenue_this_month = DB::select($sql_total_revenue_this_month);
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
}
