<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment\ModelHrmListCandidate;
use App\Http\Controllers\perms;

class HrmListCandidateController extends Controller
{
    //
    //function show table//
    public function hrm_index_list_candidate()
    {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090901')){//module code list data tables id=106
                  $candidate = ModelHrmListCandidate::get_tbl_recruitment_candidate();
                 return view('hrms/recruitment/list_candidate/HrmListCandidate', ['candidate'=>$candidate]);
             }else{
                 return view('no_perms');
             }
    }
     //function show detail candidate//
     public function hrm_detail_candidate()
     {      if (session_status() == PHP_SESSION_NONE) {
              session_start();
              }
              if(perms::check_perm_module('HRM_090901')){//module code list data tables id=106
                   $id = $_GET['id'];
                   $candidate = ModelHrmListCandidate::get_detail_candidate($id);
                  return view('hrms/recruitment/list_candidate/HrmModalCandidate', ['candidate'=>$candidate]);
              }else{
                  return view('no_perms');
              }
     }
}
