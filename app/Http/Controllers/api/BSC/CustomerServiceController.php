<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerServiceController extends Controller
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

        if (!perms::check_perm_module_api('BSC_030203', $userid)) {
            return $this->sendError("No Permission");
        }

        $customers=DB::table('ma_customer_service')
                    ->select('ma_customer_service.*','ma_customer.name as customer_name','ma_customer_branch.branch as customer_branch','stock_product.name as service_name')
                    ->leftJoin('ma_customer','ma_customer.id','=','ma_customer_service.ma_customer_id')
                    ->leftJoin('ma_customer_branch','ma_customer_branch.id','=','ma_customer_service.ma_customer_branch_id')
                    ->leftJoin('stock_product','stock_product.id','=','ma_customer_service.stock_product_id')
                    ->where([
                        ['ma_customer_service.status','=','t'],
                        ['ma_customer_service.is_deleted','=','f']
                    ])->get();
        return $this->sendResponse($customers, 'Customers retrieved successfully.');
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
