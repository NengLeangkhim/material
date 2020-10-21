<?php

namespace App\model\hrms\Training;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class TrainingList extends Model
{
    function TrainingList($id=0){
        try{
            
        }catch(Throwable $e){
            report($e);
        }
        if ($id > 0) {
            $st = " and hts.id=" . $id;
        } else {
            $st = "";
        }
        $sql = "SELECT ht.id as hrid,hts.id,htl.id as typeid,htt.id as trainerid,htl.name as type,htt.name as trainer,hts.training_date_from as schet_f_date,hts.training_date_to as schet_t_date,ht.actual_date_from as actual_f_date,ht.actual_date_to as actual_t_date,hts.status,hts.description as schet_description, ht.description as actual_description,hts.file
            from hr_training_schedule hts LEFT JOIN hr_training ht on hts.id=ht.hr_training_schedule_id
            JOIN hr_training_list htl on hts.hr_training_list_id=htl.id
            JOIN hr_training_trainer htt on htt.id=hts.hr_training_trainer_id WHERE hts.is_deleted='f'" . $st;
        return DB::select($sql);
    }

    function TrainingStaff($hrid){
        $sql= "SELECT hts.ma_user_id, s.first_name_en, s.last_name_en  FROM hr_training_staff hts INNER JOIN ma_user s on hts.ma_user_id=s.id where hr_training_id=$hrid and hts.is_deleted='f'";
        return DB::select($sql);

    }

    function InsertTrainingList($file,$filename,$trainType,$date_from,$date_to,$description,$schetule_status,$by,$trainer,$staff){
        try{
            
            
        }catch(Throwable $e){
            report($e);
        }
        $uploaddir = public_path('/media/hrms/Training/');
        $uploadfile = $uploaddir . basename($file);
        $filedirectory = '/media/hrms/Training/' . $file;
        if (move_uploaded_file($filename, $uploadfile)) {
            $sql = "SELECT public.insert_hr_training_schedule($trainType,'$date_from','$date_to','$description',$by,$trainer,'$filedirectory')";
            $stm = DB::select($sql);
            if ($stm[0]->insert_hr_training_schedule > 0) {
                if ($schetule_status == 't') {
                    $training_hr = self::InsertTrainingHr($stm[0]->insert_hr_training_schedule, $date_from, $date_to, $description, $by, $staff);
                    if ($training_hr == 'error') {
                        return 'error';
                    } else {
                        return "Training List Insert Successfully";
                    }
                } else {
                    return "Training List Insert Successfully";
                }
            } else {
                return "error";
            }
        } else {
            echo "error";
        }
    }

    function UpdateTrainingList($file, $filename, $trainType, $date_from, $date_to, $description, $schetule_status, $by, $trainer,$id,$namefile,$staff){
        if(strlen($file)>0){
            $uploaddir = public_path('/media/hrms/Training/');
            $uploadfile = $uploaddir . basename($file);
            $filedirectory = '/media/hrms/Training/' . $file;
            if (move_uploaded_file($filename, $uploadfile)) {
                $sql = "SELECT public.update_hr_training_schedule($id,$by,$trainType,'$date_from','$date_to','$description','$schetule_status',$trainer,'$filedirectory')";
                $stm = DB::select($sql);
                if ($stm[0]->update_hr_training_schedule > 0) {
                    if ($schetule_status == 't') {
                        $training_hr = self::InsertTrainingHr($stm[0]->update_hr_training_schedule, $date_from, $date_to, $description, $by, $staff);
                        if ($training_hr == 'error') {
                            return 'error';
                        } else {
                            return "Training List Update Successfully";
                        }
                    } else {
                        return "Training List Update Successfully";
                    }
                } else {
                    return "error";
                }
            } else {
                return "error";
            }
        }else{
            $filedirectory = '/media/hrms/Training/' . $namefile;
            $sql = "SELECT public.update_hr_training_schedule($id,$by,$trainType,'$date_from','$date_to','$description','$schetule_status',$trainer,'$filedirectory')";
            $stm = DB::select($sql);
            if ($stm[0]->update_hr_training_schedule > 0) {
                if ($schetule_status == 't') {
                    $training_hr = self::InsertTrainingHr($stm[0]->update_hr_training_schedule, $date_from, $date_to, $description, $by, $staff);
                    if ($training_hr == 'error') {
                        return 'error';
                    } else {
                        return "Training List Update Successfully";
                    }
                } else {
                    return "Training List Update Successfully";
                }
            } else {
                return "error";
            }
        }
        
    }


    function InsertStaffTraining($id,$staffid,$by){
        try{
            
        }catch(Throwable $e){
            report($e);
        }
        foreach ($staffid as $sid) {
            $sql = "SELECT public.insert_hr_training_staff($id,$sid,$by)";
            $stm = DB::select($sql);
        }
        if ($stm[0]->insert_hr_training_staff > 0) {
            return "Successfully";
        } else {
            return "error";
        }
    }

    function InsertTrainingHr($id,$date_from,$date_to,$description,$by,$staff){
        
        try{
            
        }catch(Throwable $e){
            report($e);
        }
        $script= "SELECT id from hr_training WHERE status='t' and is_deleted='f' and hr_training_schedule_id=$id";
        $std=DB::select($script);
        if(count($std)>0){
            $trainingstaff = self::InsertStaffTraining($std[0]->id, $staff, $by);
            if ($trainingstaff == 'errer') {
                return "error";
            } else {
                return "Successfull";
            }
        }else{
            $sql = "SELECT public.insert_hr_training($id,'$date_from','$date_to','$description',$by)";
            $stm = DB::select($sql);
            if ($stm[0]->insert_hr_training > 0) {
                $trainingstaff = self::InsertStaffTraining($stm[0]->insert_hr_training, $staff, $by);
                if ($trainingstaff == 'errer') {
                    return "error";
                } else {
                    return "Successfull";
                }
            } else {
                return "error";
            }
        }
    }

    function DeleteTrainingStaff($staffid,$hrid){
        $sql= "DELETE from hr_training_staff WHERE hr_training_id=$hrid and staff_id=$staffid";
        $stm=DB::select($sql);
        return "Delete Completed";
    }


    function DeleteTrainingList($id,$by){
        $sql= "SELECT public.delete_hr_training_schedule($id,$by)";
        $stm=DB::select($sql);
    }

    public static function my_training($id){

    }

    public static function training_report_search($date_from,$date_to){
        try {
            $sql="SELECT ht.id as hrid,hts.id,htl.id as typeid,htt.id as trainerid,htl.name as type,htt.name as trainer,hts.training_date_from as schet_f_date,hts.training_date_to as schet_t_date,ht.actual_date_from as actual_f_date,ht.actual_date_to as actual_t_date,hts.status,hts.description as schet_description, ht.description as actual_description,hts.file
            from hr_training_schedule hts LEFT JOIN hr_training ht on hts.id=ht.hr_training_schedule_id
            JOIN hr_training_list htl on hts.hr_training_list_id=htl.id
            JOIN hr_training_trainer htt on htt.id=hts.hr_training_trainer_id WHERE hts.is_deleted='f' and hts.training_date_from BETWEEN '$date_from' and '$date_to' or hts.training_date_to BETWEEN '$date_from' and '$date_to' or ht.actual_date_from BETWEEN '$date_from' and '$date_to' or ht.actual_date_to BETWEEN '$date_from' and '$date_to'";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
        
}
