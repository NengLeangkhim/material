<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\perms;
use App\model\crm\ModelLeadBranch;
use Illuminate\Support\Facades\Route;
use App\model\crm\ModelCrmLead;
use App\model\api\crm\Crmlead as Lead;
use App\Http\Controllers\api\stock\StockController;

class LeadBranchController extends Controller
{
    // get lead branch by APi
    public function index(Request $request){
        if(perms::check_perm_module('CRM_0214')){//module codes
            $status = Request::create('/api/crm/leadActiveStatus', 'GET');
            $status = json_decode(Route::dispatch($status)->getContent());
            return view('/crm.LeadBranch.CrmLeadBranchIndex',['status'=>$status]);
            //  $lead=ModelLeadBranch::CrmGetLeadBranch();
            //  $result =json_decode($lead,true);
            //  dd($result);
            // if($result!=null){
               // return view('crm.Lead.index',['lead'=>$result["data"]??'']);//pass param in case if error happend
            // }
            // else{
            //     return view('no_perms');
            // }

        }else{
            return view('no_perms');
        }
    }
     // get lead branch by status
     public function GetLeadBranchByStatus(Request $request){
        if(perms::check_perm_module('CRM_0214')){//module codes
            //   $status = $request->status;
            //   $lead=ModelLeadBranch::CrmGetLeadBranch($status);
            //   $result =json_decode($lead,true);
            //   dd($result);
               return view('/crm.LeadBranch.CrmLeadBranchTbl',['leadbranch'=>$result["data"]??'']);//pass param in case if error happend
        }else{
            return view('no_perms');
        }
    }
    //get lead branch to support for datatable request
    public function getleadBranchDatatable($status,Request $request){
        // $status =$request->segment(4);
        $request=str_replace($request->Url(),'',$request->fullUrl());
        if(perms::check_perm_module('CRM_0214')){//module codes
            $lead=ModelLeadBranch::CrmGetLeadBranchDataTable($request,$status);
            return $lead;
        }else{
            return view('no_perms');
        }
    }
    // get branch show by API
    public function  getdetailbranch($id){
        if(perms::check_perm_module('CRM_021001')){//module codes
            $detail_branch=ModelCrmLead::CrmGetDetailBranch($id);
            $result =json_decode($detail_branch,true);
            $schedule_type=ModelCrmLead::CrmGetSchdeuleType('FALSE');
            $schedule_type =json_decode($schedule_type,true);
            $schedule=ModelCrmLead::CrmGetSchdeuleByLead($id);
            $schedule=json_decode($schedule,true);
            $lead_status=ModelLeadBranch::CrmGetLeadStatusByBranch($id);
            $lead_status=json_decode($lead_status,true);
            return view('crm.LeadBranch.CrmBranchDetail',['detailbranch'=>$result["data"],'schedule_type'=>$schedule_type['data'],'schedule'=>$schedule['data'],'lead_status'=>$lead_status['data']]);
        }else{
            return view('no_perms');
        }
    }
    // edit branch or lead
    public function editbranch($id) {
        // $param = $id;
        if(perms::check_perm_module('CRM_020505')){//module codes
            $sql=ModelCrmLead::CrmGetLeadID($id);
            $result =json_decode($sql,true);
            $lead_source=ModelCrmLead::CrmGetLeadSource();
            $lead_status=ModelCrmLead::CrmGetLeadStatus();
            $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
            $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
            $province=ModelCrmLead::CrmGetLeadProvice();
            $isp = Lead::leadcurrentspeedisp();
            $honorifics = Lead::gethonorifics();
            $ser= new StockController();
            $serv=$ser->getStockPopup('service');
            $service=json_encode($serv,true);
            $service1=json_decode($service,true);
            $companybranch=Lead::leadBranch();
            //$lead=Lead::getlead();
            // $con= new ContactController();
            // $contact=$con->index();
            // $contact_n=json_encode($contact,true);
            // $contact=json_decode($contact_n,true);
            // dd($contact);
            return view('crm.LeadBranch.CrmBranchEdit',['updatelead'=>$result["data"],'honorifics'=>$honorifics,'service'=>$service1["original"]["data"],'companybranch'=>$companybranch,'lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province,'currentisp'=>$isp]);

        }else{
            return view('no_perms');
        }
        return $id;
    }
    //Survey lead branch
    public function SurveyLeadBranch(Request $request){
        $id =$request->branch_id;
        if(perms::check_perm_module('CRM_0214')){//module codes
            ModelLeadBranch::CrmSurveyLeadBranch($id);
            return 'success';
        }else{
            return view('no_perms');
        }
    }
    //Manage Address
    public function ManageAddress(Request $request){
        $id =$request->branch_id;
        if(perms::check_perm_module('CRM_021001')){//module codes
            $address=ModelLeadBranch::LeadBranchAddress($id);
            $address=json_decode($address,true);
            return view('crm.LeadBranch.ManageAddress',['address'=>$address['data']]);
        }else{
            return view('no_perms');
        }
    }
    //Create Manage Address
    public function CreateManageAddress(Request $request){
        $type =$request->type;
        $lead_id = $request->lead_id;
        $branch_id = $request->branch_id;
        if($type=='billing'){
            $type=='billing';
        }elseif($type=='main'){
            $type=='mian';
        }else{
            $type=='install';
        }
        if(perms::check_perm_module('CRM_020504')){//module codes
            $province=ModelCrmLead::CrmGetLeadProvice();
            return view('crm.LeadBranch.CreateAddressBranch',['province'=>$province,'type'=>$type,'lead_id'=>$lead_id,'branch_id'=>$branch_id]);
        }else{
            return view('no_perms');
        }
    }
     //Update Manage Address
     public function UpdateManageAddress(Request $request){
        $id =$request->lead_address_id;
        $branch_id =$request->branch_id;
        if(perms::check_perm_module('CRM_020505')){//module codes
            $province=ModelCrmLead::CrmGetLeadProvice();
            $address = ModelLeadBranch::GetLeadAddressByID($id);
            $address=json_decode($address,true);
            return view('crm.LeadBranch.UpdateAddressBranch',['province'=>$province,'address'=>$address['data'],'branch_id'=>$branch_id]);
        }else{
            return view('no_perms');
        }
    }
    // function Lead Search
    public function CrmLeadBranchSearch(Request $request){
        if(perms::check_perm_module('CRM_020504')){//module codes
            $search= $request->search;
            $result=ModelLeadBranch::SearchLeadBranch($search);
            return $result;
        }else{
            return view('no_perms');
        }

    }
    // insert address
    public function StoreBranchAddress(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $validator = \Validator::make($request->all(), [
            // 'home_en' => [ 'required'
            //                     ],
            // 'street_en' => [ 'required'
            //                     ],
            // 'home_kh' => [ 'required'
            //                     ],
            // 'street_kh' => [ 'required'
                                // ],
            'addresscode' => [ 'required'
                                ],
            'district' => [ 'required'
                                ],
            'commune' => [ 'required'
                                ],
            'latlong' => [ 'required'
                                ],
            // 'address_type' => [ 'required'
            //                     ],
            'village' => [ 'required'
                                ],
        ],
        [
            'district.required' => 'This Field is require !!',   //massage validator
            'addresscode.required' => 'This Field is require !!',   //massage validator
            'commune.required' => 'This Field is require !!',   //massage validator
            'latlong.required' => 'This Field is require !!',   //massage validator
            'village.required' => 'This Field is require !!',   //massage validator
            ]
        );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_020508')){//module code list
                $token = $_SESSION['token'];
                $request = Request::create('/api/leadbranch/address/insert', 'POST',$request->all());
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer ' . $token);
                $res = app()->handle($request);
                $response =json_decode($res->getContent());
                if($response->insert=='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return response()->json(['Fail'=>'Record is Fail added']);
                }
            }else{
                return view('no_perms');
            }
        }
    }
    // Update address
    public function UpdateBranchAddress(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $validator = \Validator::make($request->all(), [
            // 'home_en' => [ 'required'
            //                     ],
            // 'street_en' => [ 'required'
            //                     ],
            // 'home_kh' => [ 'required'
            //                     ],
            // 'street_kh' => [ 'required'
                                // ],
            'addresscode' => [ 'required'
                                ],
            'district' => [ 'required'
                                ],
            'commune' => [ 'required'
                                ],
            'latlong' => [ 'required'
                                ],
            // 'address_type' => [ 'required'
            //                     ],
            'village' => [ 'required'
                                ],
        ],
        [
            'district.required' => 'This Field is require !!',   //massage validator
            'addresscode.required' => 'This Field is require !!',   //massage validator
            'commune.required' => 'This Field is require !!',   //massage validator
            'latlong.required' => 'This Field is require !!',   //massage validator
            'village.required' => 'This Field is require !!',   //massage validator
            ]
        );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_020505')){//module code list
                $token = $_SESSION['token'];
                $request = Request::create('/api/leadbranch/addressupdate', 'POST',$request->all());
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer ' . $token);
                $res = app()->handle($request);
                $response =json_decode($res->getContent());
                if($response->Update=='success'){
                    return response()->json(['success'=>'Record is successfully updated']);
                }else{
                    return response()->json(['Fail'=>'Record is Fail updated']);
                }
            }else{
                return view('no_perms');
            }
        }
    }
}
