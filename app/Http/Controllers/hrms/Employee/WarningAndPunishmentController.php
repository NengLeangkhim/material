<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use App\model\hrms\employee\warning_and_punishment;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarningAndPunishmentController extends Controller
{
    function warning_and_punishment_list(){
        $warning=warning_and_punishment::warning_and_punishment_list();
        return view('hrms\Employee\warning_and_punishment\warning_and_punishment');
    }

    function modal_warning_and_punishment(){
        return view('hrms.Employee.warning_and_punishment.modal_warning_and_punishment');
    }

    function insert_update_warnning_and_punishment(Request $request){
        DB::beginTransaction();
        try {
            $validation=\Validator::make($request->all(),[
                'em_type_of_warning'=>'required|string|max:255',
                'em_reason_of_warning'=>'required|string|max:255',
                'em_date_warning'=>'required|date',
                'em_warning_by'=>'required|integer',
                'em_edit_by'=>'required|integer',
                'em_approved_by'=>'required|integer'
            ]);
            if($validation->fails()){
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            $values=array(
                'em_type_of_warning'=>$request->em_type_of_warning,
                'em_reason_of_warning'=>$request->em_reason_of_warning,
                'em_date_warning'=>$request->em_date_warning,
                'em_warning_by'=>$request->em_warning_by,
                'em_edit_by'=>$request->em_edit_by,
                'em_approved_by'=>$request->em_approved_by,
                'description'=>$request->em_warning_description
            );
            DB::table('testing_laravel')->insert($values);
            DB::commit();
            return response()->json(['success'=>'Data is inserted !']);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    function delete_worning_and_punishment(Request $request){
        DB::beginTransaction();
        try {
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
