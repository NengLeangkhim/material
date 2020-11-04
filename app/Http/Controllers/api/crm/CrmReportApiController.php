<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use App\model\api\crm\CrmReport;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CrmReportApiController extends Controller
{
    /**
     * Initialized CrmReport for using its methods and properties.
     *
     * @var CrmReport
     */
    protected $crmReport;

    /**
     * The String message which is occur when SQL Error Syntax.
     *
     * @var String
     */
    protected $queryException = 'SQL Syntax Error';

    /**
     * Initialize Object
     */
    public function __construct()
    {
        $this->crmReport = new CrmReport();
    }

    /**
     * Get Lead by Assign To.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function getLeadReportByAssignTo(Request $request){
        $fromDate = null;
        $toDate = null;
        $result = [];
        $message = '';
        $status = 0;
        try {
            if ((count($request->all())>0)){
                $fromDate = $request->fromDate;
                $toDate = $request->toDate;
                if($request->has(['fromDate', 'toDate'])&&$this->validateDate($fromDate)&&$this->validateDate($toDate)){
                    $result = $this->crmReport->getLeadReportByAssignTo($fromDate, $toDate);
                    $message = 'successfully';
                    $status = 200;
                } else {
                    $result = [];
                    $message = 'invalid paramter';
                    $status = 400;
                    return response()->json(['data'=>$result,'status'=>$status,'message'=>$message]);
                }
            } else {
                $result = $this->crmReport->getLeadReportByAssignTo();
                $message = 'successfully';
                $status = 200;
            }

            foreach($result as $res){
                $res->ma_user = $this->crmReport->getUser($res->ma_user_id);
                $res->lead_branch_list = $this->crmReport->getLeadsByAssignTo($res->ma_user_id, $fromDate, $toDate);
            }
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, $message);

    }

    /**
     * get Lead by Source.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function getLeadReportBySource(Request $request){
        $fromDate = null;
        $toDate = null;
        $result = [];
        $message = '';
        $status = 0;
        try {
            if ((count($request->all())>0)){
                $fromDate = $request->fromDate;
                $toDate = $request->toDate;
                if($request->has(['fromDate', 'toDate'])&&$this->validateDate($fromDate)&&$this->validateDate($toDate)){
                    $result = $this->crmReport->getLeadReportBySource($fromDate, $toDate);
                    $message = 'successfully';
                    $status = 200;
                } else {
                    $result = [];
                    $message = 'invalid paramter';
                    $status = 400;
                    return response()->json(['data'=>$result,'status'=>$status,'message'=>$message]);
                }
            } else {
                $result = $this->crmReport->getLeadReportBySource();
                $message = 'successfully';
                $status = 200;
            }

            foreach($result as $res){
                $res->lead_list = $this->crmReport->getLeadsBySource($res->crm_lead_source_id, $fromDate, $toDate);
            }
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, $message);
    }

    /**
     * Get Lead by Status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function getLeadReportByStatus(Request $request){
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        try {
            $result = $this->crmReport->getLeadReportByStatus($fromDate, $toDate);

            foreach($result as $res){
                $branchIds = $this->crmReport->getLeadBranchesByStatus($res->crm_lead_status_id);
                $branches = [];
                foreach($branchIds as $br){
                    array_push($branches, $this->crmReport->getLeadBranchesWithId($br->crm_lead_branch_id));
                }
                $res->lead_branchList = $branches;
            }
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        $message = 'lead report by status';
        return $this->sendResponse($result, $message);
    }

    /**
     * Get Quote by Status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function getQuoteByStatus(Request $request){
        $fromDate = null;
        $toDate = null;
        $result = [];
        $message = '';
        $status = 0;
        try {
            if ((count($request->all())>0)){
                $fromDate = $request->from_date;
                $toDate = $request->to_date;
                if($this->validateDate($fromDate)&&$this->validateDate($toDate)){
                    $result = $this->crmReport->getQuoteByStatus($fromDate, $toDate);
                    $message = 'successfully';
                    $status = 200;
                } else {
                    $result = [];
                    $message = 'invalid paramter';
                    $status = 400;
                    return response()->json(['data'=>$result,'status'=>$status,'message'=>$message]);
                }
            } else {
                $result = $this->crmReport->getQuoteByStatus();
                $message = 'successfully';
                $status = 200;
            }

            foreach($result as $res){
                $res->crm_quote_branch_lead_branch_list = $this->crmReport->getQuoteBranchByStatusId($res->crm_quote_status_type_id, $fromDate, $toDate);
            }

        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, $message);
    }

    /**
     * Get All Lead Detail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    function getAllLeadDetail(Request $request){
        $leadSource = $request->input('source_id');
        $assignTo = $request->input('assign_to');
        $status = $request->input('status_id');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');;

        try {
            $result = $this->crmReport->getAllLeadDetail($leadSource, $assignTo, $status, $fromDate, $toDate);
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, '');
    }

    /**
     * Get All Quote Detail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    function getAllQuoteDetail(Request $request){
        $assignTo = $request->input('assign_to');
        $status = $request->input('status_id');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        try {
            $result = $this->crmReport->getQuoteDetail($assignTo, $status, $fromDate, $toDate);
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, '');
    }

    function getAllContactDetail(Request $request){
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        try {
            $result = $this->crmReport->getQuoteDetail($fromDate, $toDate);
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, '');
    }

    function getAllOrganizationDetail(Request $request){
        $leadSource = $request->input('source_id');
        $assignTo = $request->input('assign_to');
        $status = $request->input('status_id');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');;
        try {
            $result = $this->crmReport->getOrganizationDetail($leadSource, $assignTo, $fromDate, $toDate);
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result, '');
    }

    function getTotalReport(Request $request){
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        try {
            $totalLead = $this->crmReport->getTotalLead($fromDate, $toDate);
            $totalBranch = $this->crmReport->getTotalBranch($fromDate, $toDate);
            $totalLeadBranchSurvey = $this->crmReport->getTotalLeadBranchSurvey($fromDate, $toDate);
            $totalQuote = $this->crmReport->getTotalQuote($fromDate, $toDate);
            $totalContact = $this->crmReport->getTotalContact($fromDate, $toDate);
            $result = [
                'total_lead' => $totalLead->total_lead
                ,'total_branch' => $totalBranch->total_branch
                ,'total_lead_branch_survey' => $totalLeadBranchSurvey->total_lead_branch_survey
                ,'total_quote' => $totalQuote->total_quote
                ,'total_contact' => $totalContact->total_contact
            ];
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result,'');
    }

    public function getContactChartReport(Request $request){
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $type = $request->input('type');
        try {
            $result = $this->crmReport->getContactChartReport($fromDate, $toDate, $type != null ? $type : 'month');
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result,'');
    }

    public function getOrganizationChartReport(Request $request){
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $type = $request->input('type');
        $forStatusId = $request->input('status_id');
        try {
            $result = $this->crmReport->getOrganizationChartReport($fromDate, $toDate, $type != null ? $type : 'month', $forStatusId != null ? $forStatusId : 6);
        } catch(QueryException $e){
            return $this->sendError($this->queryException);
        }
        return $this->sendResponse($result,'');
    }

    /**
     * Validate date format.
     *
     * @param  String $date
     * @param String $format
     * @return Boolean
     */
    protected function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
