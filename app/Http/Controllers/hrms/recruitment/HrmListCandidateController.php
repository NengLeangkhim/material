<?php

namespace App\Http\Controllers\hrms\recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\recruitment\ModelHrmListCandidate;
use App\Http\Controllers\perms;
use App\model\hrms\ModelHrmPermission;
use Illuminate\Validation\Rule;

class HrmListCandidateController extends Controller
{
    //
    //function show table//
    public function hrm_index_list_candidate()
    {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090901')){//module code list data tables id=106
                if(perms::check_perm_module('HRM_09090102')){ // Permission Add
                    $add_perm = '<button type="button" onclick=\'go_to("hrm_list_condidate/add")\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Candidate</button>';
                 }else{
                     $add_perm='';
                }
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
                            if(perms::check_perm_module('HRM_09090103')){// Permission Update
                                $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'go_to("hrm_list_condidate/add?edit='.$row->id.'")\' class="btn btn-primary hrm_update_candidate">Update</button> ';
                            }
                    $table_perm.= ' </td>
                                </tr>';
                    }
                    $table_perm.= '</tbody>';
                 return view('hrms/recruitment/list_candidate/HrmListCandidate', ['table_perm'=>$table_perm,'add_perm'=>$add_perm]);
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
      //function Action candidate//
      public function hrm_goto_add()
      {      if (session_status() == PHP_SESSION_NONE) {
               session_start();
               }
               if(isset($_GET['edit'])){
                    if(perms::check_perm_module('HRM_09090103')){//module code
                        $id= $_GET['edit'];
                        $action = 'update';
                        $position= ModelHrmPermission::hrm_get_position();
                        $candidate = ModelHrmListCandidate::get_detail_candidate($id);
                        return view('hrms/recruitment/list_candidate/HrmActionCandidate',['action'=>$action,'position'=>$position,'candidate'=>$candidate]);
                    }else{
                        return view('no_perms');
                    }
               }else{
                if(perms::check_perm_module('HRM_09090102')){//module code
                    $action = 'create';
                    $position= ModelHrmPermission::hrm_get_position();
                    return view('hrms/recruitment/list_candidate/HrmActionCandidate',['action'=>$action,'position'=>$position]);
                }else{
                    return view('no_perms');
                }
               }
      }
      // Function Store
      public function HrmStoreCandidate(Request $request){
          if(session_status()== PHP_SESSION_NONE){
              session_start();
          }
          $validator = \Validator::make($request->all(), [
                    'fname' => ['required'],
                    'lname' => ['required'],
                    'name_kh' => ['required'],
                    'pw' => ['required'],
                    'position' => ['required'],
                    'email' =>  [  'required',
                                        'max:255',
                                        Rule::unique('hr_recruitment_candidate','email')
                                        ->where(function ($query) use ($request) {
                                        return $query->where('is_deleted', 'f');})
                                            ],
                    'cv' => ['required','mimes:pdf','max:10240'
                                            ],
                    'cover_letter' => [ 'required','mimes:pdf','max:10240'
                                            ],
                ],
                [
                    'fname.required' => 'The Field is Required !!',   //massage validator
                    'lname.required' => 'The Field is Required !!',   //massage validator
                    'name_kh.required' => 'The Field is Required !!',   //massage validator
                    'email.required' => 'The Field is Required !!',   //massage validator
                    'pw.required' => 'The Field is Required !!',   //massage validator
                    'position.required' => 'The Field is Required !!',   //massage validator
                    'email.unique' => 'The Email is Already Exist !!',   //massage validator
                    'cv.required' => 'The Field is Required !!',   //massage validator
                    'cover_letter.required' => 'The Field is Required !!',   //massage validator
                    'cv.mimes' => 'Please Select Pdf File Only !!',
                    'cover_letter.mimes' => 'Please Select Pdf File Only !!',
                    'cv.max' => 'File too Big, please select a file less than 10mb !!',
                    'cover_letter.max' => 'File too Big, please select a file less than 10mb !!',
                    ]
                );
            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray()
                ));
            }else{
                if(perms::check_perm_module('HRM_09090102')){//module code
                $userid= $_SESSION['userid'];
                 $fname = $request->fname;
                 $lname = $request->lname;
                 $name_kh = $request->name_kh;
                 $email = $request->email;
                 $password = $request->pw;
                 $p = $this->en($password);
                 $position_id = $request->position;
                 $interest = '';
                 $file_cv = $request->file('cv');// GET File
                 $zip_file = $file_cv->getClientOriginalName(); // GET File name
                 $destinationPath = public_path('/media/file_candidate_recruitment/'.$email.'/'); //path for move
                 $file_cv->move($destinationPath,$zip_file); // move file to directory
                 $file_cover_letter = $request->file('cover_letter');// GET File
                 $cover_letter = $file_cover_letter->getClientOriginalName(); // GET File name
                 $file_cover_letter->move($destinationPath,$cover_letter); // move file to directory
                 $insert_candidate = ModelHrmListCandidate::insert_candidate($fname,$lname,$name_kh,$zip_file,$email,$p,$position_id,$cover_letter,$interest); //insert data
                return response()->json(['success'=>'Record is successfully added']);
                }else{
                    return view('no_perms');
                }
            }
      }
      // Function Update
      public function HrmUpdateCandidate(Request $request){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        $validator = \Validator::make($request->all(), [
                  'fname' => ['required'],
                  'lname' => ['required'],
                  'name_kh' => ['required'],
                  'position' => ['required'],
                  'email' =>  [  'required',
                                      'max:255',
                                      Rule::unique('hr_recruitment_candidate','email')->ignore($request->candidate_id)
                                      ->where(function ($query) use ($request) {
                                      return $query->where('is_deleted', 'f');})
                                          ],
                  'cv' => ['required','mimes:pdf','max:10240'
                                          ],
                  'cover_letter' => ['required','mimes:pdf','max:10240',
                                          ],
              ],
              [
                  'fname.required' => 'The Field is Required !!',   //massage validator
                  'lname.required' => 'The Field is Required !!',   //massage validator
                  'name_kh.required' => 'The Field is Required !!',   //massage validator
                  'email.required' => 'The Field is Required !!',   //massage validator
                  'position.required' => 'The Field is Required !!',   //massage validator
                  'email.unique' => 'The Email is Already Exist !!',   //massage validator
                  'cv.required' => 'The Field is Required !!',   //massage validator
                  'cover_letter.required' => 'The Field is Required !!',   //massage validator
                  'cv.mimes' => 'Please Select Pdf File Only !!',
                  'cover_letter.mimes' => 'Please Select Pdf File Only !!',
                  'cv.max' => 'The file is too large !!',
                  'cover_letter.max' => 'The file is too large !!',
                  ]
              );
          if ($validator->fails()) //check validator for fail
          {
              return response()->json(array(
                  'errors' => $validator->getMessageBag()->toArray()
              ));
          }else{
              if(perms::check_perm_module('HRM_09090103')){//module code
                $email = $request->email;
                $destinationPath = public_path('/media/file_candidate_recruitment/'.$email.'/'); //path for move
                if($request->file('cv') !=''){
                    $file_cv = $request->file('cv');// GET File
                    $zip_file = $file_cv->getClientOriginalName(); // GET File name
                    $file_cv->move($destinationPath,$zip_file); // move file to directory
                }else{
                    $zip_file = $request->cv_hidden;
                }
                if($request->file('cover_letter') !=''){
                    $file_cover_letter = $request->file('cover_letter');// GET File
                    $cover_letter = $file_cover_letter->getClientOriginalName(); // GET File name
                    $file_cover_letter->move($destinationPath,$cover_letter); // move file to directory
                }else{
                    $cover_letter = $request->cover_hidden;
                }
               $userid= $_SESSION['userid'];
               $id = $request->candidate_id;
               $fname = $request->fname;
               $lname = $request->lname;
               $name_kh = $request->name_kh;
               if(isset($request->pw)){
                $password = $request->pw;
                $p =$this->en($password);
                }else{
                    $p = $request->pw_update;
                }
               $position_id = $request->position;
               $interest = '';
               $status= 't';
               date_default_timezone_set("Asia/Phnom_Penh");
               $date = date("Y/m/d h:i:sa");
               $candidate = $request->candidate;
               $update_candidate = ModelHrmListCandidate::update_candidate($id,$userid,$fname,$lname,$name_kh,$zip_file,$email,$p,$candidate,$position_id,$status,$cover_letter,$interest,$date); //insert data
              return response()->json(['success'=>'Record is successfully update']);
              }else{
                  return view('no_perms');
              }
          }
    }

    // function for encrypt user password
    public function en($st){
        $r="";
        for($i=0;$i<strlen($st);$i++){
            $r.=ord(substr($st,$i,1));
        }
        $rr=md5($r);
        return $rr;
    }
    public static function aes_de($inputText,$inputKey){
        $blockSize = 256;
        $aes = new AES($inputText, $inputKey, $blockSize);
        return $aes->decrypt();
    }

}
