<?php

namespace App\Http\Controllers\hrms\policy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\ModelHrmPermission;
use App\model\hrms\policy\ModelHrmPolicy;
use App\Http\Controllers\perms;
class HrmPolicyController extends Controller
{
    //function show table//
    public function hrm_index_policy_list()
    {      if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             if(perms::check_perm_module('HRM_090601')){//module code list data tables id=93
                  $userid = $_SESSION['userid'];
                  $permission = ModelHrmPermission::hrm_get_permission($userid);
                  $policy_list = ModelHrmPolicy::hrm_get_tbl_policy();
                 return view('hrms/policy/list_policy/HrmPolicyList', ['permission' => $permission,'policy'=>$policy_list]);
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
                                        ],
                'policy_file' => [ 'required','mimes:pdf'
                                        ],
            ],
            [
                'policy_name.required' => 'The Policy Name is Required !!',   //massage validator
                'policy_file.required' => 'Please Select File !!',
                'policy_file.mimes' => 'Please Select Pdf File Only !!'
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
            $file = $request->file('policy_file');// GET File
            $filepdf = $file->getClientOriginalName(); // GET File name
            $destinationPath = public_path('/media/hrms/file/'); //path for move
            $filemove = $file->move($destinationPath, $filepdf); // move file to directory
            $insert_policy = ModelHrmPolicy::hrm_insert_policy($policy_name,$userid,$filepdf); //insert data
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

    //function update question type //
    public function HrmUpdatePolicy(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
        $validator = \Validator::make($request->all(), [
            'policy_name' =>  [  'required',
                                        'max:255',
                                    ],
            'policy_file' => [ 'mimes:pdf'
                                    ],
        ],
        [
            'policy_name.required' => 'The Policy Name is Required !!',   //massage validator
            'policy_file.mimes' => 'Please Select Pdf File Only !!'
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
                    $file = $request->file('policy_file');// GET File
                    $filepdf = $file->getClientOriginalName(); // GET File name
                    $destinationPath = public_path('/media/hrms/file/'); //path for move
                    $filemove = $file->move($destinationPath, $filepdf); // move file to directory
                }else{
                   $filepdf = $request->hidden_pdf;
                }
                $userid= $_SESSION['userid'];
                $policy_name = $request->policy_name;
                $id_policy = $request->policy_id;
                $insert_policy = ModelHrmPolicy::hrm_update_policy($id_policy,$userid,$policy_name,$filepdf); //insert data
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
    //function insert policy //
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
            $policy_user = ModelHrmPolicy::hrm_get_tbl_policy_user(); //query policy user
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
