<?php

namespace App\Http\Controllers\hrms\policy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\ModelHrmPermission;
use App\model\hrms\policy\ModelHrmPolicy;
use App\Http\Controllers\perms;
use Illuminate\Validation\Rule;
class HrmPolicyController extends Controller
{
    //function show table//
    public function hrm_index_policy_list()
    {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090601')){//module code list data tables id=93
                $userid = $_SESSION['userid'];
                if(perms::check_perm_module('HRM_09060101')){ // Permission Add
                    $add_perm = '<button type="button" id="HrmAddPolicy" onclick=\'HrmAddPolicy()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Policy</button>';
                 }else{
                     $add_perm='';
                 }
                $policy_list = ModelHrmPolicy::hrm_get_tbl_policy();
                $i=1;// variable increase number for table
                  $table_perm= '<tbody>';
                foreach($policy_list as $row){
                    $create = $row->create_date;
                  $table_perm.= ' 
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->name.'</td>
                        <td>'.$row->username.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td class="text-center">';
                  $table_perm.= '
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                  if(perms::check_perm_module('HRM_09060104')){// Permission View
                     $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_view_policy">View</button>';
                  }
                  if(perms::check_perm_module('HRM_09060102')){// Permission Update
                     $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_update_policy_list">Update</button>';
                  }
                  if(perms::check_perm_module('HRM_09060103')){// Permission Delete
                     $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'hrm_delete('.$row->id.',"hrm_list_policy/delete","hrm_list_policy","The Policy has been deleted")\' class="dropdown-item hrm_item">Delete</button>';
                  }
                  $table_perm.= ' </div>
                                </div>
                            </td>
                        </tr>';
                }
                  $table_perm.='</tbody>';
                 return view('hrms/policy/list_policy/HrmPolicyList', ['add_perm'=>$add_perm,'table_perm' =>$table_perm]);
             }else{
                 return view('no_perms');
             }
          //var_dump($question_type_sugg);
    }
    //function insert policy //
    public function hrm_insert_policy(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'policy_name' =>  [  'required',
                                     'max:255',
                                     Rule::unique('hr_policy','name')
                                    ->where(function ($query) use ($request) {
                                    return $query->where('is_deleted', 'f');})
                                        ],
                'policy_file' => [ 'required','mimes:pdf',
                                        ],
            ],
            [
                'policy_name.required' => 'The Policy Name is Required !!',   //massage validator
                'policy_name.unique' => 'The Policy Name is Already Exist !!',   //massage validator
                'policy_file.required' => 'Please Select File !!',
                'policy_file.mimes' => 'Please Select Pdf File Only !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09060101')){//module code list data tables id=136
            $userid= $_SESSION['userid'];
            $policy_name = $request->policy_name;
            $rename_file = $policy_name.'.pdf';// rename file as policy name
            $file = $request->file('policy_file');// GET File
            $filepdf = $file->getClientOriginalName(); // GET File name
            $destinationPath = public_path('/media/hrms/file/'); //path for move
            $filemove = $file->move($destinationPath, $rename_file); // move file to directory
            $insert_policy = ModelHrmPolicy::hrm_insert_policy($policy_name,$userid,$rename_file); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
    }
    //function get data for update policy
    public function get_data_policy()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $id = $_POST['id'];
            $policy_get = array();
            $policy_get= ModelHrmPolicy::hrm_get_policy($id); 
            return response()->json($policy_get);
    }

    //function update Policy //
    public function HrmUpdatePolicy(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
        $validator = \Validator::make($request->all(), [
            'policy_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_policy','name')->ignore($request->policy_id)
                                    ->where(function ($query) use ($request) {
                                    return $query->where('is_deleted', 'f');})
                                    ],
            'policy_file' => [ 'mimes:pdf',
                                    ],
        ],
        [
            'policy_name.required' => 'The Policy Name is Required !!',   //massage validator
            'policy_name.unique' => 'The Policy Name is Already Exist !!',   //massage validator
            'policy_file.mimes' => 'Please Select Pdf File Only !!',
            'policy_file.unique' => 'The file name is aready exist so please rename file name'
            ]
        );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09060102')){//module code list data tables id=137
                if($request->file('policy_file') !=''){
                    $policy_name = $request->policy_name;
                    $file = $request->file('policy_file');// GET File
                    $rename_file = $policy_name.'.pdf';// rename file as policy name
                    $filepdf = $file->getClientOriginalName(); // GET File name
                    $destinationPath = public_path('/media/hrms/file/'); //path for move
                    $filemove = $file->move($destinationPath, $rename_file); // move file to directory
                }else{
                    $rename_file = $request->hidden_pdf;
                }
                $userid= $_SESSION['userid'];
                $policy_name = $request->policy_name;
                $id_policy = $request->policy_id;
                $status= 't';
                $update_policy = ModelHrmPolicy::hrm_update_policy($id_policy,$userid,$policy_name,$rename_file,$status); //insert data
                return response()->json(['success'=>'Record is successfully Update']);
                }else{
                    return view('no_perms');
                }
        }
            
    }
    // function deleted question//
    public function HrmDeletePolicy()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09060103')){//module code list data tables id=138
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $question_type_sugg=ModelHrmPolicy::hrm_delete_policy($id,$userid);
        //var_dump($question_type_sugg);
        }else{
            return view('no_perms');
        }
    }
    // function get data question //
    public function HrmViewPolicy(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id= $_GET['id'];
            $policy_get = ModelHrmPolicy::hrm_get_policy($id); //query question suggestion
            return view('hrms/policy/list_policy/HrmModalViewPolicy', ['policy_get' => $policy_get]);  
    }
    //function insert policy user //
    public function HrmInsertPolicyUser(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'verify_policy' =>  [  'required',
                                        ],
            ],
            [
                'verify_policy.required' => 'Please Agree the policy',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            $userid= $_SESSION['userid'];
            $start_time = $request->start_time;
            date_default_timezone_set("Asia/Phnom_Penh"); //set time zone
            $end_time = date("Y-m-d H:i:s"); // get current date time 
            $current = 0;
            $id_policy = $request->id_policy;
            $insert_policy = ModelHrmPolicy::hrm_insert_policy_user($userid,$start_time,$end_time,$id_policy,$current,$userid); //insert data
            return response()->json(['success'=>'Record is successfully added']);
        }
    }
     // function Show table User read Policy //
     public function HrmIndexUserPolicy(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $userid = $_SESSION['userid'];
            $permission = ModelHrmPermission::hrm_get_permission($userid);
            foreach($permission as $row){
                $dept = $row->ma_company_dept_id;
                $group = $row->ma_group_id;
            }
            if($group==5){ //permission check for CEO
                $policy_user = ModelHrmPolicy::hrm_get_tbl_policy_user(); //query policy user 
            }else{//permission each departement
                $policy_user = ModelHrmPolicy::hrm_get_tbl_policy_user_dept($dept);
            }
            return view('hrms/policy/policy_reader/HrmListUserPolicy', ['policy_user' => $policy_user]); 
    } 
    // function Show table User read Policy //
    public function HrmModalUserPolicy(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
            $id_policy_user = $_GET['id'];
            $policy_user = ModelHrmPolicy::hrm_get_policy_user($id_policy_user); //query policy user
            return view('hrms/policy/policy_reader/HrmModalDetailUserPolicy', ['policy_user' => $policy_user]);  
    }
}
