<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Throwable;
class DepartmentAndPosition extends Model
{

    // List all Department or one department
    public static function AllDepartment($id=0){
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


    // List all position or one position
    public static function AllPosition($id=0){
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
                ->select('*')
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
    public static function AllCompany(){
        try {
            $sql = "SELECT id,name FROM ma_company where is_deleted='f' order by name";
            return DB::select($sql);
        } catch (Throwable $e) {
            report($e);

            return false;
        }
        
    }

    // Insert Department
    public static function InsertDepartment($company_id,$department,$by,$kherName){
        try {
            $sql= "SELECT public.insert_ma_company_dept($company_id,'$department',$by,'$kherName')";
            $stm=DB::select($sql);
            if($stm[0]->insert_ma_company_dept>0){
                return "Department insert Successfully";
            }else{
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }


    // Update Department
    public static function UpdateDapartment($company_id, $department, $by, $kherName,$department_id){
        try {
            // $sql = "SELECT public.update_ma_company_dept($department_id,$by,$company_id,'$department','$kherName')";
            $sql= "SELECT public.update_ma_company_dept($department_id,$by,$company_id,'$department','t','$kherName')";
            $stm = DB::select($sql);
            if ($stm[0]->update_ma_company_dept > 0) {
                return "Department Update Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }

    // Delete Department
    public static function DeleteDepartment($id,$by){
        try {
            $sql = "SELECT public.delete_ma_company_dept($id,$by)";
            $stm = DB::select($sql);
            if ($stm[0]->delete_ma_company_dept > 0) {
                return "Department Update Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }


    // List All groue or on row
    public static function Groupe($id=0){
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

    // Insert Position
    public static function InsertPosition($position,$groupid,$kherName,$by){
        try {
            $sql = "SELECT public.insert_ma_position('$position',$groupid,'$kherName',$by)";
            $stm = DB::select($sql);
            if ($stm[0]->insert_ma_position > 0) {
                return "Position Insert Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        } 
    }

    // Update Position
    public static function UpdatePosition($position, $groupid, $kherName, $by,$id){
        try {
            $sql= "SELECT public.update_ma_position($id,$by,'$position',$groupid,'t','$kherName')";
            $stm = DB::select($sql);
            if ($stm[0]->update_ma_position > 0) {
                return "Position Update Successfully";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
            return false;
        } 
    }


    // Delete Position
    public static function DeletePosition($id,$by){
        try{
            $sql= "SELECT public.delete_ma_position($id,$by)";
            $stm = DB::select($sql);
        }catch(Throwable $e){
            report($e);
        }
    }
}
