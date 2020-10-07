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
                  $i=1;// variable increase number for table
                $table_perm= '<tbody>';
                foreach($candidate as $row){
                    $table_perm.= ' 
                        <tr>
                            <th>'.$i++.'</th>
                            <td>'.$row->fname.' '.$row->lname.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->name.'</td>
                            <td>'.date('Y-m-d H:i:s',strtotime($row->create_date)).'</td>';
              $table_perm.='<td>';
                            if($row->hr_approval_status=='approve'){
                                $table_perm.='<i class="fas fa-circle" style="color:green;"></i> <span style="margin-left:10px;">Pass</span>';
                            }elseif($row->hr_approval_status=='pending'){
                                $table_perm.='<i class="fas fa-circle" style="color:darkorange;"></i> <span style="margin-left:10px;">Wait</span>';
                            }elseif($row->hr_approval_status=='reject'){
                                $table_perm.='<i class="fas fa-circle" style="color:red;"></i> <span style="margin-left:10px;">Fail</span>';
                            }elseif(is_null($row->check_quiz) && is_null($row->hr_approval_status)){
                                $table_perm.='<i class="fas fa-circle" style="color:rgb(224, 224, 32);"></i> <span style="margin-left:10px;">New</span>';
                            }elseif(is_null($row->hr_approval_status) && $row->check_quiz==0){
                                $table_perm.='<i class="fas fa-circle" style="color:orange;"></i> <span style="margin-left:10px;">Taken</span>';
                            }
              $table_perm.='</td>
                            <td class="text-center">';
                            if(perms::check_perm_module('HRM_09090101')){// Permission Detail
                                $table_perm.= '<button type="button" id="'.$row->id.'" class="btn btn-info hrm_view_list_candidate">Detail</button> ';
                            }
                    $table_perm.= ' </td>
                                </tr>';
                    }
                    $table_perm.= '</tbody>';
                 return view('hrms/recruitment/list_candidate/HrmListCandidate', ['table_perm'=>$table_perm]);
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
