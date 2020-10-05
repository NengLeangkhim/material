<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmReport;
use Illuminate\Http\Request;

class CrmReportApiController extends Controller
{
    function get(){
        $result = CrmReport::index();
        $status = 200;
        $message = 'view all leads report';
        return compact('result','status','message');
    }

    public function getLeadReportByAssignTo(Request $request){
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $result =  ($fromDate == null || $toDate == null) ? CrmReport::getLeadReportByAssignTo() : $result = CrmReport::getLeadReportByAssignToFromDateToDate($fromDate, $toDate);
        $status = 200;
        $message = 'lead report by assign to';
        $ip = $request->ip();
        foreach($result as $res){
            $res->ma_user = CrmReport::getUser($res->ma_user_id)[0];
            $res->lead_branch_list = ($fromDate == null || $toDate == null) ? CrmReport::getLeadsByAssignTo($res->ma_user_id) : CrmReport::getLeadsByAssignToFromDateToDate($res->ma_user_id, $fromDate, $toDate);
        }
        // $ma_user_id_result = $result[0]->ma_user_id;
        // var_dump($ma_user_id_result); exit;
        // return response()->json(['data'=>$result,'status'=>200,'message'=>'Hello']);
        $ips = $request->ips();
        return compact('result','status','message', 'ip');
    }

    public function getLeadReportBySource(Request $request){
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $result = ($fromDate == null || $toDate == null) ? CrmReport::getLeadReportBySource() : CrmReport::getLeadReportBySourceFromDateToDate($fromDate, $toDate);
        $status = 200;
        $message = 'lead report by source';
        return compact('result','status','message');
    }

    public function getLeadReportByStatus(Request $request){
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $result = ($fromDate == null || $toDate == null) ? CrmReport::getLeadReportByStatus() : CrmReport::getLeadReportByStatusFromDateToDate($fromDate, $toDate);
        foreach($result as $res){
            $branchIds = CrmReport::getLeadBranchesByStatus($res->crm_lead_status_id);
            $branches = [];
            foreach($branchIds as $br){
                array_push($branches, CrmReport::getLeadBranchesWithId($br->crm_lead_branch_id)[0]);
            }
            $res->lead_branchList = $branches;
            // $res->lead_branchList =
        }
        $status = 200;
        $message = 'lead report by status';
        return compact('result','status','message');
    }
}
