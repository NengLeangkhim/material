<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;
use App\model\hrms\employee\warning_and_punishment;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarningAndPunishmentController extends Controller
{
    function warning_and_punishment_list(){
        $warning=warning_and_punishment::warning_and_punishment_list();
        $warning_type=warning_and_punishment::warning_and_punishment_type_list();
        return view('hrms\Employee\warning_and_punishment\warning_and_punishment')->with(compact('warning','warning_type'));
    }

    function modal_warning_and_punishment(Request $request){
        try {
            if(perms::check_perm_module('HRM_09011001')){
                $warning_type=warning_and_punishment::warning_and_punishment_type_list();
                $employee=Employee::AllEmployee();
                if($request->id>0){
                    $warning=warning_and_punishment::warning_and_punishment_list_one($request->id);
                    return view('hrms.Employee.warning_and_punishment.modal_warning_and_punishment',compact('warning_type','employee','warning'));
                }else{
                    return view('hrms.Employee.warning_and_punishment.modal_warning_and_punishment',compact('warning_type','employee'));
                }
            }else {
                $data= 'modal_warning_and_punishment';
                return view('modal_no_perms')->with('modal',$data);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function modal_warning_and_punishment_type(Request $request){
        if(perms::check_perm_module('HRM_09011003')){
            if($request->id>0){
                $warning_type=warning_and_punishment::warning_and_punishment_type_list_one($request->id);
                return view('hrms.Employee.warning_and_punishment.modal_warning_and_punishment_type',compact('warning_type'));
            }else{
                return view('hrms.Employee.warning_and_punishment.modal_warning_and_punishment_type');
            }
        }else{
            $data= 'modal_warning_and_punishment_type';
            return view('modal_no_perms')->with('modal',$data);
        }
        
        
    }

    function insert_update_warnning_and_punishment(Request $request){
        DB::beginTransaction();
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            $validation=\Validator::make($request->all(),[
                'em_type_of_warning'=>'required|string|max:255',
                'em_reason_of_warning'=>'required|string|max:255',
                'em_date_warning'=>'required|date',
                'em_warning_by'=>'required|integer',
                'em_edit_by'=>'required|integer',
                'em_approved_by'=>'required|integer',
                'em_staff_warning'=>'required|integer'
            ]);
            if($validation->fails()){
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            $values=array(
                'ma_warning_type_id'=>$request->em_type_of_warning,
                'warning_reason'=>$request->em_reason_of_warning,
                'verbal_warning_date'=>$request->em_date_warning,
                'warning_by'=>$request->em_warning_by,
                'edited_by'=>$request->em_edit_by,
                'approve_by'=>$request->em_approved_by,
                'create_date'=>date('Y-m-d'),
                'create_by'=>$userid,
                'status'=>'t',
                'is_deleted'=>'f',
                'ma_user_id'=>$request->em_staff_warning

            );
            if($request->id>0){
                DB::table('ma_user_warning')->where('id','=',$request->id)->update($values);
                DB::commit();
                return response()->json(['success'=>'Warning and Punishment is Update !']);
            }else{
                DB::table('ma_user_warning')->insert($values);
                DB::commit();
                return response()->json(['success'=>'Warning and Punishment is inserted !']);
            }
            
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    function insert_update_warnning_and_punishment_type(Request $request){
        DB::beginTransaction();
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            $validation=\Validator::make($request->all(),[
                'warning_type_name_en'=>'required|string'
            ]);
            if($validation->fails()){
                return response()->json(['error'=>$validation->getMessageBag()->toArray()]);
            }else{
                
                $values=[
                    'name_en'=>$request->warning_type_name_en,
                    'name_kh'=>$request->warning_type_name_kh,
                    'create_date'=>date('Y-m-d'),
                    'create_by'=>$userid,
                    'status'=>'t',
                    'is_deleted'=>'f'
                ];
                if($request->id>0){
                    DB::table('ma_user_warning_type')->where('id','=',$request->id)->update($values);
                    DB::commit();
                    return response()->json(['success'=>'Update Successfully !!']);
                }else{
                    DB::table('ma_user_warning_type')->insert($values);
                    DB::commit();
                    return response()->json(['success'=>'Insert Successfully !!']);
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    function delete_worning_and_punishment(Request $request){
        DB::beginTransaction();
        try {
            if(perms::check_perm_module('HRM_09011002')){
                $values=[
                    'status'=>'f',
                    'is_deleted'=>'t'
                ];
                DB::table('ma_user_warning')->where('id','=',$request->id)->update($values);
                DB::commit();
                return response()->json(['success'=>'Delete successfully !!']);
            }else{
               echo 'You has no permission';
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function delete_worning_and_punishment_type(Request $request){
        DB::beginTransaction();
        try {
            $values=[
                'status'=>'f',
                'is_deleted'=>'t'
            ];
            DB::table('ma_user_warning_type')->where('id','=',$request->id)->update($values);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
