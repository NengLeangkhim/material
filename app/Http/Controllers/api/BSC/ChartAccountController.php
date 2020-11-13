<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ChartAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
        // if(perms::check_perm_module('STO_01')){

        // }

        $chart_accounts = DB::table('bsc_account_charts')
                        ->select('bsc_account_charts.*','bsc_account_type.name_en as account_type_name','bsc_account_type.bsc_account_id')
                        ->leftJoin('bsc_account_type','bsc_account_charts.bsc_account_type_id','=','bsc_account_type.id')
                        ->where([
                            ['bsc_account_charts.parent_id','<>',null],
                            ['bsc_account_charts.is_deleted','=','f'],
                            ['bsc_account_charts.status','=','t']
                        ])
                        ->get();
        return $this->sendResponse($chart_accounts, 'Chart account retrieved successfully.');
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
        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'bsc_account_type_id'   => 'required',
                'name_en'               => 'required',
                'ma_company_id'         => 'required',
                'code'                  => 'required',
                'create_by'             => 'required',
                'ma_currency_id'        => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if($request->parent_id != "null"){
                $sql="insert_bsc_account_charts($request->bsc_account_type_id, '$request->name_en', '$request->name_kh', $request->ma_currency_id, $request->ma_company_id, $request->parent_id, $request->code, null, $request->create_by)";
                $q=DB::select("SELECT ".$sql);
            }else{
                $sql_parent="insert_bsc_account_charts($request->bsc_account_type_id, '$request->name_en', '$request->name_kh', null, $request->ma_company_id, null, $request->code, null, $request->create_by)";
                $q_parent=DB::select("SELECT ".$sql_parent);
                $parent_id = $q_parent[0]->insert_bsc_account_charts;

                $chart_account_name_en = $request->name_en.'-'.$request->currency_name; 
                $chart_account_name_kh = $request->name_kh.'-'.$request->currency_name; 

                $sql_child="insert_bsc_account_charts($request->bsc_account_type_id, '$chart_account_name_en', '$chart_account_name_kh', $request->ma_currency_id, $request->ma_company_id, $parent_id, $request->code, null, $request->create_by)";
                $q=DB::select("SELECT ".$sql_child);
            }

            // public."insert_bsc_account_charts"("nbsc_account_type_id" int4, "nname_en" varchar, "nname_kh" varchar, "nma_currency_id" int4, "nma_company_id" int4, "nparent_id" int4, "ncode" int4, "ncode_prefix_owner_id" int4, "ncreate_by" int4)
            DB::commit();
            return $this->sendResponse($q, 'Chart account created successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chart_account = DB::table('bsc_account_charts')
                        ->select('bsc_account_charts.*','bsc_account_type.name_en as account_type_name','bsc_account_type.bsc_account_id')
                        ->leftJoin('bsc_account_type','bsc_account_charts.bsc_account_type_id','=','bsc_account_type.id')
                        ->where([
                            ['bsc_account_charts.id','=',$id],
                            ['bsc_account_charts.is_deleted','=','f'],
                            ['bsc_account_charts.status','=','t']
                        ])->first();
        return $this->sendResponse($chart_account, 'Chart account retrieved successfully.');
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
        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'bsc_account_type_id'  => 'required',
                'name_en'              => 'required',
                'ma_company_id'        => 'required',
                'update_by'            => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            
            if($request->parent_id != "null"){
                $sql="update_bsc_account_charts($id, $request->update_by, $request->bsc_account_type_id, '$request->name_en', '$request->name_kh', $request->ma_currency_id, $request->ma_company_id, $request->parent_id, '$request->status')";
                $q=DB::select("SELECT ".$sql);
            }else{
                $sql_parent="update_bsc_account_charts($id, $request->update_by, $request->bsc_account_type_id, '$request->name_en', '$request->name_kh', null, $request->ma_company_id, null, '$request->status')";
                $q_parent=DB::select("SELECT ".$sql_parent);

                $parent_id = $q_parent[0]->update_bsc_account_charts;

                $chart_account_name_en = $request->name_en.'-'.$request->currency_name; 
                $chart_account_name_kh = $request->name_kh.'-'.$request->currency_name; 

                $sql_child="update_bsc_account_charts($id, $request->update_by, $request->bsc_account_type_id, '$chart_account_name_en', '$chart_account_name_kh', $request->ma_currency_id, $request->ma_company_id, $parent_id, '$request->status')";
                $q=DB::select("SELECT ".$sql_child);
            }

            DB::commit();
            return $this->sendResponse($q, 'Chart account updated successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $sql="delete_bsc_account_charts($id, $request->update_by)";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Chart account deleted successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    public function show_account_type(Request $request)
    {
        $accounts = DB::select("SELECT
                                    bsc_account_type.bsc_account_id,
                                    bsc_account.name_en AS account_name 
                                FROM
                                    bsc_account_type
                                    LEFT JOIN bsc_account ON bsc_account_type.bsc_account_id = bsc_account.ID 
                                WHERE
                                    bsc_account_type.status = 't' 
                                    AND bsc_account_type.is_deleted = 'f' 
                                GROUP BY
                                    bsc_account_type.bsc_account_id, bsc_account.name_en
                                ORDER BY bsc_account_type.bsc_account_id ASC
                                ");

        $arr_account_types = [];
        if(count($accounts) > 0){
            foreach ($accounts as $key => $account) {
                $account_types = DB::table('bsc_account_type')
                ->where([
                    ['bsc_account_id','=',$account->bsc_account_id],
                    ['status','=','t'],
                    ['is_deleted','=','f']
                ])->get();
                $arr_account_types[$key] = [
                    'bsc_account_id' => $account->bsc_account_id,
                    'bsc_account_name' => $account->account_name,
                    'account_types' => $account_types
                ];
            }
        }
        return $this->sendResponse($arr_account_types, 'Account type retrieved successfully');
    }

    public function show_company(Request $request)
    {
        $companies = DB::table('ma_company')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($companies, 'Company retrieved successfully');
    }

    public function duplicate_chart_account_name(Request $request)
    {
        $count_chart_accounts = DB::table('bsc_account_charts')
        ->where([
            ['name_en','=',$request->name_en],
            ['status','=','t'],
            ['is_deleted','=','f']
        ])
        ->count();
        return $this->sendResponse($count_chart_accounts, 'Chart account count successfully');
    }

    public function show_currency(Request $request)
    {
        $currencies = DB::table('ma_currency')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($currencies, 'Currency retrieved successfully');
    }

    public function show_chart_account_parent(Request $request)
    {
        $chart_accounts = DB::table('bsc_account_charts')
                        ->select('bsc_account_charts.*','bsc_account_type.name_en as account_type_name','bsc_account_type.bsc_account_id')
                        ->leftJoin('bsc_account_type','bsc_account_charts.bsc_account_type_id','=','bsc_account_type.id')
                        ->where([
                            ['bsc_account_charts.parent_id','=',null],
                            ['bsc_account_charts.is_deleted','=','f'],
                            ['bsc_account_charts.status','=','t']
                        ])
                        ->get();
        return $this->sendResponse($chart_accounts, 'Chart account retrieved successfully.');
    }
}
