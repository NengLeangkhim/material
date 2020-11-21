<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030204', $userid)) {
            return $this->sendError("No Permission");
        }

        $service_detail=DB::table('ma_customer_service_detail')
                    ->select('ma_customer_service_detail.*','ma_customer.name as customer_name','ma_customer_branch.branch as customer_branch','stock_product.name as product_name')
                    ->leftJoin('ma_customer_service','ma_customer_service.id','=','ma_customer_service_detail.ma_customer_service_id')
                    ->leftJoin('ma_customer','ma_customer.id','=','ma_customer_service.ma_customer_id')
                    ->leftJoin('ma_customer_branch','ma_customer_branch.id','=','ma_customer_service.ma_customer_branch_id')
                    ->leftJoin('stock_product','stock_product.id','=','ma_customer_service.stock_product_id')
                    ->where([
                        ['ma_customer_service_detail.status','=','t'],
                        ['ma_customer_service_detail.is_deleted','=','f']
                    ])->get();
        return $this->sendResponse($service_detail, 'Customer service detail retrieved successfully.');
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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030204', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'end_period_date'       => 'required',
                'effective_date'        => 'required',
                'customer_service'      => 'required',
                'create_by'             => 'required',
                'service_status_detail' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $sql="insert_ma_customer_service_detail($request->customer_service, '$request->effective_date', '$request->end_period_date','$request->service_status_detail', $request->create_by)";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Customer service detail created successfully.');

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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030204', $userid)) {
            return $this->sendError("No Permission");
        }

        $customer_service_detail=DB::table('ma_customer_service_detail')
                                ->select('ma_customer_service_detail.*','ma_customer.name as customer_name','ma_customer_branch.branch as customer_branch','stock_product.name as product_name')
                                ->leftJoin('ma_customer_service','ma_customer_service.id','=','ma_customer_service_detail.ma_customer_service_id')
                                ->leftJoin('ma_customer','ma_customer.id','=','ma_customer_service.ma_customer_id')
                                ->leftJoin('ma_customer_branch','ma_customer_branch.id','=','ma_customer_service.ma_customer_branch_id')
                                ->leftJoin('stock_product','stock_product.id','=','ma_customer_service.stock_product_id')
                                ->where('ma_customer_service_detail.id',$id)->first();
        return $this->sendResponse($customer_service_detail, 'Customer service detail retrieved successfully.');
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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030204', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'create_by'             => 'required',
                'customer_service'      => 'required',
                'effective_date'        => 'required',
                'end_period_date'       => 'required',
                'service_status_detail' => 'required',
                'status'                => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $sql="update_ma_customer_service_detail($id,$request->create_by, $request->customer_service, '$request->effective_date', '$request->end_period_date', '$request->service_status_detail', '$request->status')";
            $q=DB::select("SELECT ".$sql);
            DB::commit();
            return $this->sendResponse($q, 'Customer service detail updated successfully.');

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
    public function destroy(Request $request,$id)
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030204', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {

            $sql="delete_ma_customer_service_detail($id, $request->update_by)";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Customer service detail deleted successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }
}
