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
                'bsc_account_type_id'  => 'required',
                'name_en'              => 'required',
                'ma_company_id'        => 'required',
                'code'                 => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];

            $sql="insert_bsc_account_charts($request->bsc_account_type_id, '$request->name_en', '$request->name_kh', null, $request->ma_company_id, $request->parent_id, $request->code, null, $create_by)";
            $q=DB::select("SELECT ".$sql);

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
                        ->where('bsc_account_charts.id',$id)->first();
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
                'ma_company_id'        => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $update_by = $_SESSION['userid'];

            $sql="update_bsc_account_charts($id, $update_by, $request->bsc_account_type_id, '$request->name_en', '$request->name_kh', null, $request->ma_company_id, $request->parent_id, '$request->status')";
            $q=DB::select("SELECT ".$sql);

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
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $update_by = $_SESSION['userid'];

            $sql="delete_bsc_account_charts($request->bsc_account_charts_id, $update_by)";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Chart account updated successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    public function show_account_type(Request $request)
    {
        $account_types = DB::table('bsc_account_type')->get();
        return $this->sendResponse($account_types, 'Account type retrieved successfully');
    }

    public function show_company(Request $request)
    {
        $companies = DB::table('ma_company')->get();
        return $this->sendResponse($companies, 'Company retrieved successfully');
    }
}
