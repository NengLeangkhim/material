<?php

namespace App\Http\Controllers\hrms\performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\performance\ModelHrmPerformScore;
use Illuminate\Validation\Rule;
class HrmPerformScoreController extends Controller
{
    //
    // function Index Performance Score // hrm_performance_score
    public function HrmIndexPerformScore(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } 
        if(perms::check_perm_module('HRM_090705')){//module code list data tables id=100
            if(perms::check_perm_module('HRM_09070501')){ // Permission Add
                $add_perm = '<button type="button" id="HrmAddPerformScore" onclick=\'HrmAddPerformScore()\' class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Score</button>';
            }else{
                    $add_perm='';
            }
            $perform_score = ModelHrmPerformScore::hrm_get_tbl_perform_score();
            $i=1;// variable increase number for table
            $table_perm= '<tbody>';
            foreach($perform_score as $row){
                $create = $row->create_date;
                $table_perm.= ' 
                    <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row->name.'</td>
                        <td>'.intval($row->value).'%'.'</td>
                        <td>'.date('Y-m-d H:i:s',strtotime($create)).'</td>
                        <td>'.$row->username.'</td>
                        <td class="text-center">';
                $table_perm.= '
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                if(perms::check_perm_module('HRM_09070502')){// Permission Update
                    $table_perm.= '<button type="button" id="'.$row->id.'" class="dropdown-item hrm_item hrm_update_perform_score">Update</button>';
                }
                if(perms::check_perm_module('HRM_09070503')){// Permission Delete
                    $table_perm.= '<button type="button" id="'.$row->id.'" onclick=\'delete_performance_score('.$row->id.')\' class="dropdown-item hrm_item hrm_delete_perform_score">Delete</button>';
                }
                $table_perm.= ' </div>
                               </div>
                            </td>
                        </tr>';
            }
            $table_perm.='</tbody>';
            return view('hrms/performance/performance_score/HrmPerformScore',['add_perm'=>$add_perm,'table_perm'=>$table_perm]); 
        }else{
            return view('no_perms');
        }
    } 
    //function insert Performance Score //
    public function hrm_insert_perform_score(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'score_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_score','name')
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'score_value' =>  [ 'required',
                                    'integer',
                                    'between:1,100',
                                    Rule::unique('hr_performance_score','value')
                                                ->where(function ($query) use ($request) {
                                                return $query->where('is_deleted', 'f');})
                                            ],
            ],
            [
                'score_name.required' => 'The Score Name is Required !!',   //massage validator
                'score_value.required' => 'Please Insert Number !!',
                'score_name.unique' => 'The Score Name is Already exist !!',  
                'score_value.unique' => 'The Score Value is Already exist !!',   
                'score_value.integer' => 'Please Insert only Number !!',
                'score_value.between' => 'Please Insert From 1 to 100 !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070501')){//module code list data tables id=154
            $userid= $_SESSION['userid'];
            $score_name = $request->score_name;
            $value = $request->score_value;
            $insert_score = ModelHrmPerformScore::hrm_insert_perform_score($score_name,$value,$userid); //insert data
            return response()->json(['success'=>'Record is successfully added']);
            }else{
                return view('no_perms');
            }
        }
    }
    //function get data for update score
    public function hrm_get_data_perform_score()
    {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
             }
             $id = $_GET['id'];
             $score_get = array();
             $score_get= ModelHrmPerformScore::hrm_get_score($id); 
             return response()->json($score_get);
    }
    //function Update Performance Score //
    public function hrm_update_perform_score(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), [
                'score_name' =>  [  'required',
                                    'max:255',
                                    Rule::unique('hr_performance_score','name')->ignore($request->performance_score_id)// ingore by id 
                                            ->where(function ($query) use ($request) {
                                            return $query->where('is_deleted', 'f');})
                                        ],
                'score_value' =>  [ 'required',
                                    'integer',
                                    'between:1,100',
                                    Rule::unique('hr_performance_score','value')->ignore($request->performance_score_id)// ingore by id 
                                                ->where(function ($query) use ($request) {
                                                return $query->where('is_deleted', 'f');})
                                            ],
            ],
            [
                'score_name.required' => 'The Score Name is Required !!',   //massage validator
                'score_value.required' => 'Please Insert Number !!',
                'score_name.unique' => 'The Score Name is Already exist !!',  
                'score_value.unique' => 'The Score Value is Already exist !!',   
                'score_value.integer' => 'Please Insert only Number !!',
                'score_value.between' => 'Please Insert From 1 to 100 !!',
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('HRM_09070502')){//module code list data tables id=155
            $userid= $_SESSION['userid'];
            $id_score = $request->performance_score_id;
            $score_name = $request->score_name;
            $value = $request->score_value;
            $update_score = ModelHrmPerformScore::hrm_update_perform_score($id_score,$userid,$score_name,$value,'t'); //Update data
            return response()->json(['success'=>'Record is successfully Update']);
            }else{
                return view('no_perms');
            }
        }
    }
    // function deleted Score Performance //
    public function hrm_delete_perform_score(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
        if(perms::check_perm_module('HRM_09070503')){//module code list data tables id=156
        $id = $_GET['id'];
        $userid = $_SESSION['userid'];   
        $check_delete=ModelHrmPerformScore::hrm_check_delete_perform_score($id);
        foreach($check_delete as $check){
            $ch = $check->id;
        }
        if(!isset($ch)){
            $delete_score=ModelHrmPerformScore::hrm_delete_perform_score($id,$userid);
            return response()->json(['success'=>'Record is successfully Delete']);
        }else{
            return response()->json(['errors'=>'Record can not Delete']);
        }
        }else{
            return view('no_perms');
        }
    }
}
