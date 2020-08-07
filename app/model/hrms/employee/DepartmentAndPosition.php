<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Throwable;
class DepartmentAndPosition extends Model
{
    function AllDepartment($id=0){
        try {
            if($id>0){
                $department = DB::table('ma_company_dept')
                ->select('id', 'name', 'name_kh', 'ma_company_id')
                ->where([
                    ['ma_company_id', '=', 8],
                    ['status', '=', 't'],
                    ['is_deleted', '=', 'f'],
                    ['id','=',$id]
                ])
                ->orderBy('name')->get();
            }else{
                $department = DB::table('ma_company_dept')
                ->select('id', 'name', 'name_kh', 'ma_company_id')
                ->where([
                    ['ma_company_id', '=', 8],
                    ['status', '=', 't'],
                    ['is_deleted', '=', 'f']
                ])
                ->orderBy('name')->get();
            }
            
            return $department;
        } catch (Throwable $e) {
            report($e);

            return false;
        }
        
    }
    function AllPosition($id=0){
        try {
            if($id>0){
                $position = DB::table('ma_position')
                ->where([
                    ['status', '=', 't'],
                    ['is_deleted', '=', 'f'],
                    ['id','=',$id]
                ])->orderBy('name')->get();
            }else{
                $position = DB::table('ma_position')
                ->where([
                    ['status', '=', 't'],
                    ['is_deleted', '=', 'f']
                ])->orderBy('name')->get();
            }
            
            return $position;
        } catch (Throwable $e) {
            report($e);

            return false;
        }
        
    }

    // list all company
    function AllCompany(){
        try {
            $sql = "SELECT id,name FROM ma_company where is_deleted='f' order by name";
            return DB::select($sql);
        } catch (Throwable $e) {
            report($e);

            return false;
        }
        
    }

    function InsertDepartment($company_id,$department,$by,$kherName){
        try {
            $sql= "SELECT public.insert_company_dept($company_id,'$department',$by,'$kherName')";
            $stm=DB::select($sql);
            if($stm[0]->insert_company_dept>0){
                return "Department insert Successfully";
            }else{
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    function UpdateDapartment($company_id, $department, $by, $kherName,$department_id){
        try {
            $sql = "SELECT public.update_company_dept($department_id,$by,$company_id,'$department','$kherName')";
            $stm = DB::select($sql);
            if ($stm[0]->update_company_dept > 0) {
                return "Department Update Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }


    function DeleteDepartment($id,$by){
        try {
            $sql = "SELECT public.delete_company_dept($id,$by)";
            $stm = DB::select($sql);
            if ($stm[0]->delete_company_dept > 0) {
                return "Department Update Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }


    function Groupe($id=0){
        try {
            if ($id > 0) {
                $sql = "SELECT id,name FROM \"ma_group\" where status='t' and is_deleted='f' and id=$id order by name";
            } else {
                $sql = "SELECT id,name FROM \"ma_group\" where status='t' and is_deleted='f' order by name";
            }
            return DB::select($sql);
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }


    function InsertPosition($position,$groupid,$kherName,$by){
        try {
            $sql = "SELECT public.insert_position('$position',$groupid,'$kherName',$by)";
            $stm = DB::select($sql);
            if ($stm[0]->insert_position > 0) {
                return "Position Insert Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        } 
    }

    function UpdatePosition($position, $groupid, $kherName, $by,$id){
        try {
            $sql= "SELECT public.update_position($id,$by,'$position',$groupid,'$kherName')";
            $stm = DB::select($sql);
            if ($stm[0]->update_position > 0) {
                return "Position Update Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        } 
    }


    function DeletePosition($id,$by){
        try{
            $sql= "SELECT public.delete_position($id,$by)";
            $stm = DB::select($sql);
        }catch(Throwable $e){
            report($e);
        }
    }
}
