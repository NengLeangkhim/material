<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=DB::table('ma_customer')
                    ->select('ma_customer.*','crm_lead.lead_number as lead_number','crm_lead_contact.phone','crm_lead.customer_name_en as customer_name','crm_lead.email as lead_email')
                    ->leftJoin('crm_lead','ma_customer.crm_lead_id','=','crm_lead.id')
                    ->leftJoin('crm_lead_branch','crm_lead_branch.crm_lead_id','=','crm_lead.id')
                    ->leftJoin('crm_lead_branch_crm_lead_contact_rel','crm_lead_branch_crm_lead_contact_rel.crm_lead_branch_id','=','crm_lead_branch.id')
                    ->leftJoin('crm_lead_contact','crm_lead_contact.id','=','crm_lead_branch_crm_lead_contact_rel.crm_lead_contact_id')
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
