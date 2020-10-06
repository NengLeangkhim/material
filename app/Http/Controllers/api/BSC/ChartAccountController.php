<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

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
        $chart_accounts = DB::table('bsc_account_charts')->get();
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
                'code'                 => 'required',
                'create_by'            => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            
            $sql="insert_bsc_account_charts($request->bsc_account_type_id, $request->name_en, $request->name_kh, $request->ma_currency_id, $request->ma_company_id, $request->parent_id, $request->code, $request->code_prefix_owner_id, $request->create_by)";
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
        $chart_account = DB::table('bsc_account_charts')->where('id',$id)->first();
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
            
            $sql="update_bsc_account_charts($id, $request->update_by, $request->bsc_account_type_id, '$request->name_en', '$request->name_kh', $request->ma_currency_id, $request->ma_company_id, $request->parent_id, '$request->status')";
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
            $sql="update_bsc_account_charts($id, $request->update_by, $request->bsc_account_type_id, '$request->name_en', '$request->name_kh', $request->ma_currency_id, $request->ma_company_id, $request->parent_id, '$request->status')";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Chart account updated successfully.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }
}
