<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerController extends Controller
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

        if (!perms::check_perm_module_api('BSC_030201', $userid)) {
            return $this->sendError("No Permission");
        }

        $customers=DB::table('ma_customer')
                    ->select('ma_customer.*','crm_lead.lead_number as lead_number','crm_lead.customer_name_en as customer_name','crm_lead.email as lead_email')
                    ->leftJoin('crm_lead','ma_customer.crm_lead_id','=','crm_lead.id')
                    ->where([
                        ['ma_customer.status','=','t'],
                        ['ma_customer.is_deleted','=','f']
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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030201', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'customer_name'         => 'required',
                'crm_lead_id'           => 'required',
                'branch_name'           => 'required',
                'crm_lead_branch_id'    => 'required',
                'crm_lead_address_id'   => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }


            $sql_customer="insert_ma_customer('$request->customer_name', $request->create_by, $request->crm_lead_id, $request->deposit, $request->balance, $request->invoice_balance, '$request->vat_type', '$request->vat_number')";

            // insert_ma_customer("nname" varchar, "ncreate_by" int4, "ncrm_lead_id" int4, "ndeposit" numeric, "nbalance" numeric, "ninvoice_balance" numeric, "nvat_type" "public"."ma_customer_vat_type", "nvat_number" varchar)

            $q_customer=DB::select("SELECT ".$sql_customer);
            $customer_id = $q_customer[0]->insert_ma_customer;


            $sql_customer_branch="insert_ma_customer_branch($customer_id, '$request->branch_name', $request->create_by, null, $request->crm_lead_branch_id, $request->crm_lead_address_id)";

            // insert_ma_customer_branch("nma_customer_id" int4, "nbranch" varchar, "ncreate_by" int4, "nconnection_id" varchar, "ncrm_lead_branch_id" int4, "ncrm_lead_address_id" int4)

            $q_customer_branch=DB::select("SELECT ".$sql_customer_branch);

            DB::commit();
            return $this->sendResponse($q_customer, 'Customer created successfully.');

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
    public function destroy(Request $request, $id)
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030201', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {
            $sql="delete_ma_customer($id, $request->update_by)";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Customer deleted successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    // get lead from crm
    public function get_all_leads()
    {
        $leads=DB::table('crm_lead')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();

        return $this->sendResponse($leads, 'Leads retrieved successfully.');
    }

    // get lead by id
    public function show_lead_single(Request $request, $id)
    {
        $leads = DB::table('crm_lead')
        ->where([
            ['crm_lead.id','=',$id],
            ['crm_lead.status','=','t'],
            ['crm_lead.is_deleted','=','f']
        ])->first();
        return $this->sendResponse($leads, 'Lead retrieved successfully.');
    }
}
