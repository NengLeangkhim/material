<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerBranchController extends Controller
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

        if (!perms::check_perm_module_api('BSC_030202', $userid)) {
            return $this->sendError("No Permission");
        }

        $customers=DB::select("SELECT ma_customer_branch.*,crm_lead.customer_name_en as customer_name,get_gazetteers_address(crm_lead_address.gazetteer_code) as lead_address FROM ma_customer_branch
            JOIN ma_customer ON ma_customer.id=ma_customer_branch.ma_customer_id
            JOIN crm_lead ON crm_lead.id=ma_customer.crm_lead_id
            JOIN crm_lead_address ON crm_lead_address.id=ma_customer_branch.crm_lead_address_id
            WHERE ma_customer_branch.status='t' AND ma_customer_branch.is_deleted='f'");
        return $this->sendResponse($customers, 'Customer Branch retrieved successfully.');
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

        if (!perms::check_perm_module_api('BSC_030202', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'ma_customer_id'         => 'required',
                'branch_name'           => 'required',
                'crm_lead_branch_id'    => 'required',
                'crm_lead_address_id'   => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $sql_customer_branch="insert_ma_customer_branch($request->ma_customer_id, '$request->branch_name', $request->create_by, null, $request->crm_lead_branch_id, $request->crm_lead_address_id)";

            // insert_ma_customer_branch("nma_customer_id" int4, "nbranch" varchar, "ncreate_by" int4, "nconnection_id" varchar, "ncrm_lead_branch_id" int4, "ncrm_lead_address_id" int4)

            $q_customer_branch=DB::select("SELECT ".$sql_customer_branch);

            DB::commit();
            return $this->sendResponse($q_customer_branch, 'Customer branch created successfully.');

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

        if (!perms::check_perm_module_api('BSC_030202', $userid)) {
            return $this->sendError("No Permission");
        }

        $customer_by_id=DB::select("SELECT mcb.*,mc.name as ma_customer_name,mc.balance,mc.deposit,mc.invoice_balance,mc.vat_type,mc.vat_number,
        get_gazetteers_address(cla.gazetteer_code) as lead_address,clb.email as lead_branch_email,clc.phone as contact_phone
        FROM ma_customer_branch mcb
        LEFT JOIN ma_customer mc ON mc.id=mcb.ma_customer_id
        LEFT JOIN crm_lead_address cla ON cla.id=mcb.crm_lead_address_id
        LEFT JOIN crm_lead_branch clb ON clb.id=mcb.crm_lead_branch_id
        LEFT JOIN crm_lead_branch_crm_lead_contact_rel clb_clc ON clb_clc.crm_lead_branch_id=clb.id
        LEFT JOIN crm_lead_contact clc ON clc.id=clb_clc.crm_lead_contact_id
        WHERE mcb.status='t' AND mcb.is_deleted='f' AND mcb.id=$id");
        return $this->sendResponse($customer_by_id, 'Customer Branch retrieved successfully.');
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

        if (!perms::check_perm_module_api('BSC_030202', $userid)) {
            return $this->sendError("No Permission");
        }

        DB::beginTransaction();
        try {
            $sql="delete_ma_customer_branch($id, $request->update_by)";
            $q=DB::select("SELECT ".$sql);

            DB::commit();
            return $this->sendResponse($q, 'Customer branch deleted successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }
    public function show_customer(Request $request)
    {
        $customers = DB::table('ma_customer')
        ->where([
            ['is_deleted','=','f'],
            ['status','=','t']
        ])
        ->get();
        return $this->sendResponse($customers, 'Customer retrieved successfully.');
    }
    public function show_lead_branch_by_lead(Request $request, $id)
    {
        $lead_branchs = DB::table('crm_lead_branch')
        ->where([
            ['crm_lead_id','=',$id],
            ['is_deleted','=','f'],
            ['status','=','t']
        ])
        ->get();
        return $this->sendResponse($lead_branchs, 'Lead branch retrieved successfully.');
    }
    public function show_lead_branch_single(Request $request, $id)
    {
        $lead_branch = DB::table('crm_lead_branch')
        ->select('crm_lead_branch.*','crm_lead_address.hom_en','crm_lead_address.home_kh','crm_lead_address.street_en','crm_lead_address.street_kh','crm_lead_address.latlg','crm_lead_address.gazetteer_code')
        ->leftJoin('crm_lead_address','crm_lead_branch.crm_lead_address_id','=','crm_lead_address.id')
        ->where([
            ['crm_lead_branch.id','=',$id],
            ['crm_lead_branch.is_deleted','=','f'],
            ['crm_lead_branch.status','=','t']
        ])
        ->get();
        return $this->sendResponse($lead_branch, 'Lead branch retrieved successfully.');
    }
}
