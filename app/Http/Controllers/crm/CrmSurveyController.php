<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\crm\ModelCrmLead;
use App\model\api\crm\CRMLeadPOP;
use App\Http\Controllers\api\crm\LeadController;

class CrmSurveyController extends Controller
{
    //get survey
    public function index(){
        if(perms::check_perm_module('CRM_021101')){
            // $survey=ModelCrmLead::Getsurvey();
            // $result=json_decode($survey,true);
            // $survey_result=ModelCrmLead::GetsurveyResult();
            // $survey_result=json_decode($survey_result,true);
            $pop=CRMLeadPOP::getPOP();
                // dd($pop,$survey_result);

            // if($survey_result!=null){
                // dd($result,$survey_resul);
                // return view('crm.survey.index',['survey'=>$result['data'],'survey_result'=>$survey_result['data'],'pop'=>$pop]);
                return view('crm.survey.index',['pop'=>$pop]);
            // }else{
            //     return view('no_perms');
            // }

        }else{
            return view('no_perms');
        }
    }
    // show detail survey
    public function detailsurvey($id){
        if(perms::check_perm_module('CRM_021102')){
            $detail_branch=ModelCrmLead::CrmGetDetailBranch($id);
            $result_detail_branch =json_decode($detail_branch,true);
            $sur =new LeadController();
            $survey_id=$sur->getsurveybyid($id);
            $survey =json_encode($survey_id,true);
            $survey =json_decode($survey,true);
            $pop=json_encode(CRMLeadPOP::getPOP());
            // dd($survey);
            return view('crm.survey.detail',['detailbranch'=>$result_detail_branch["data"],'survey'=>$survey,'pop'=>$pop]);

        }else{
            return view('no_perms');
        }
    }
    // insert detail survey
    public function insertsurvey(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                // 'commentsurvey' =>  [  'required'
                //                         ],
                'possible'=>['required']

                ],
            [
                // 'commentsurvey.required' => 'This Field is require !!',   //massage validator
                'possible.required'=>'Please Check Yes or No !!',

                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            if(perms::check_perm_module('CRM_021103')){//module code list
                $token = $_SESSION['token'];
                $create_contact = Request::create('/api/insertsurvey','POST',$request->all());
                $create_contact->headers->set('Accept', 'application/json');
                $create_contact->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($create_contact);
                $response = json_decode($res->getContent());
                // dd($response);
                if($response->insert==='success'){
                    return response()->json(['success'=>'Record is successfully added']);
                }

            }else{
                return view('no_perms');
            }
        }
    }

    public function CrmSurveyList() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_021101')){
            $survey=ModelCrmLead::Getsurvey();
            $result=json_decode($survey,true);
            return view('crm.survey.CrmSurveyList',['survey'=>$result['data']]);
        }
        else{
            return view('no_perms');
        }
    }
    public function CrmSurveyResult() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_021101')){
            $survey_result=ModelCrmLead::GetsurveyResult();
            // dd($survey_result);
            $survey_result=json_decode($survey_result,true);
            return view('crm.survey.CrmSurveyResult',['survey_result'=>$survey_result['data']]);
        }
        else{
            return view('no_perms');
        }
    }
}
