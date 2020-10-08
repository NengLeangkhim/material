<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmReport;
use DateTime;
use Illuminate\Http\Request;

class CrmReportApiController extends Controller
{
    public function getLeadReportByAssignTo(Request $request){
        $fromDate = null;
        $toDate = null;
        $result = [];
        $message = '';
        $status = 0;

        if ((count($request->all())>0)){
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;
            if($request->has(['fromDate', 'toDate'])&&$this->validateDate($fromDate)&&$this->validateDate($toDate)){
                $result = CrmReport::getLeadReportByAssignTo($fromDate, $toDate);
                $message = 'successfully';
                $status = 200;
            } else {
                $result = [];
                $message = 'invalid paramter';
                $status = 400;
                return response()->json(['data'=>$result,'status'=>$status,'message'=>$message]);
            }
        } else {
            $result = CrmReport::getLeadReportByAssignTo();
            $message = 'successfully';
            $status = 200;
        }

        foreach($result as $res){
            $res->ma_user = CrmReport::getUser($res->ma_user_id);
            $res->lead_branch_list = CrmReport::getLeadsByAssignTo($res->ma_user_id, $fromDate, $toDate);
        }

        return $this->response($result, $status, $message);

    }

    public function getLeadReportBySource(Request $request){
        $fromDate = null;
        $toDate = null;
        $result = [];
        $message = '';
        $status = 0;

        if ((count($request->all())>0)){
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;
            if($request->has(['fromDate', 'toDate'])&&$this->validateDate($fromDate)&&$this->validateDate($toDate)){
                $result = CrmReport::getLeadReportBySource($fromDate, $toDate);
                $message = 'successfully';
                $status = 200;
            } else {
                $result = [];
                $message = 'invalid paramter';
                $status = 400;
                return response()->json(['data'=>$result,'status'=>$status,'message'=>$message]);
            }
        } else {
            $result = CrmReport::getLeadReportBySource();
            $message = 'successfully';
            $status = 200;
        }

        foreach($result as $res){
            $res->lead_list = CrmReport::getLeadsBySource($res->crm_lead_source_id, $fromDate, $toDate);
        }

        return $this->response($result, $status, $message);
    }

    public function getLeadReportByStatus(Request $request){
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $result = CrmReport::getLeadReportByStatus($fromDate, $toDate);

        foreach($result as $res){
            $branchIds = CrmReport::getLeadBranchesByStatus($res->crm_lead_status_id);
            $branches = [];
            foreach($branchIds as $br){
                array_push($branches, CrmReport::getLeadBranchesWithId($br->crm_lead_branch_id));
            }
            $res->lead_branchList = $branches;
        }

        $status = 200;
        $message = 'lead report by status';
        return $this->response($result, $status, $message);
    }

    public function getQuoteByStatus(Request $request){
        $fromDate = null;
        $toDate = null;
        $result = [];
        $message = '';
        $status = 0;

        if ((count($request->all())>0)){
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;
            if($request->has(['fromDate', 'toDate'])&&$this->validateDate($fromDate)&&$this->validateDate($toDate)){
                $result = CrmReport::getQuoteByStatus($fromDate, $toDate);
                $message = 'successfully';
                $status = 200;
            } else {
                $result = [];
                $message = 'invalid paramter';
                $status = 400;
                return response()->json(['data'=>$result,'status'=>$status,'message'=>$message]);
            }
        } else {
            $result = CrmReport::getQuoteByStatus();
            $message = 'successfully';
            $status = 200;
        }

        foreach($result as $res){
            $res->crm_quote_branch_lead_branch_list = CrmReport::getQuoteBranchByStatusId($res->crm_quote_status_type_id, $fromDate, $toDate);
        }

        return $this->response($result, $status, $message);
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    function response($data, $statusCode = '200', $message = 'successfully') {
        return response()->json(['data' => $data, 'message' => $message, 'status' => $statusCode], $statusCode);
    }
}
