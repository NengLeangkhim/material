<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $customer_by_id=DB::select("SELECT ma_customer_branch.*,crm_lead.customer_name_en as customer_name,get_gazetteers_address(crm_lead_address.gazetteer_code) as lead_address,clc.phone,clc.email,mc.deposit,mc.balance,mc.invoice_balance,mc.vat_type,mc.vat_number
		FROM ma_customer_branch
		LEFT JOIN ma_customer mc ON mc.id=ma_customer_branch.ma_customer_id
		LEFT JOIN crm_lead ON crm_lead.id=mc.crm_lead_id
		LEFT JOIN crm_lead_address ON crm_lead_address.id=ma_customer_branch.crm_lead_address_id
		LEFT JOIN crm_lead_branch clb ON clb.crm_lead_id=crm_lead.id
		LEFT JOIN crm_lead_branch_crm_lead_contact_rel clb_clc ON clb_clc.crm_lead_branch_id=clb.id
		LEFT JOIN crm_lead_contact clc ON clc.id=clb_clc.crm_lead_contact_id
		WHERE ma_customer_branch.status='t' AND ma_customer_branch.is_deleted='f' AND ma_customer_branch.id=$id");
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
    public function destroy($id)
    {
        //
    }
    public function show_customer(Request $request)
    {
        $customers = DB::table('ma_customer')->get();
        return $this->sendResponse($customers, 'Customer retrieved successfully.');
    }
    public function show_lead_branch_by_lead(Request $request, $id)
    {
        $lead_branchs = DB::table('crm_lead_branch')->where('crm_lead_id',$id)->get();
        return $this->sendResponse($lead_branchs, 'Lead branch retrieved successfully.');
    }
    public function show_lead_branch_single(Request $request, $id)
    {
        $lead_branch = DB::table('crm_lead_branch')
        ->select('crm_lead_branch.*','crm_lead_address.hom_en','crm_lead_address.home_kh','crm_lead_address.street_en','crm_lead_address.street_kh','crm_lead_address.latlg','crm_lead_address.gazetteer_code')
        ->leftJoin('crm_lead_address','crm_lead_branch.crm_lead_address_id','=','crm_lead_address.id')
        ->where('crm_lead_branch.id',$id)->get();
        return $this->sendResponse($lead_branch, 'Lead branch retrieved successfully.');
    }
}
