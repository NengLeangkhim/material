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
            if($id>0){
                $st=" and hts.id=".$id;
            }else{
                $st = "";
            }
            $sql = "SELECT hts.id,htl.id as typeid,htt.id as trainerid,htl.name as type,htt.name as trainer,hts.training_date_from as schet_f_date,hts.training_date_to as schet_t_date,ht.actual_date_from as actual_f_date,ht.actual_date_to as actual_t_date,hts.schedule_status,hts.description as schet_description, ht.description as actual_description,hts.file
            from hr_training_schedule hts LEFT JOIN hr_training ht on hts.id=ht.training_schedule_id 
            JOIN hr_training_list htl on hts.training_list_id=htl.id
            JOIN hr_training_trainer htt on htt.id=staff_id WHERE hts.is_deleted='f'".$st;
            return DB::select($sql);
        }catch(Throwable $e){
            report($e);
        }
        
    }

    function InsertTrainingList($file,$filename,$trainType,$date_from,$date_to,$description,$schetule_status,$by,$trainer){
        try{
            $uploaddir = public_path('/media/hrms/Training/');
            $uploadfile = $uploaddir . basename($file);
            $filedirectory = '/media/hrms/Training/' . $file;
            if (move_uploaded_file($filename, $uploadfile)) {
                $sql = "SELECT public.insert_hr_training_schedule($trainType,'$date_from','$date_to','$description','$schetule_status',$by,$trainer,'$filedirectory')";
                $stm = DB::select($sql);
                if ($stm[0]->insert_hr_training_schedule > 0) {
                    return "Insert Training List Successfully";
                } else {
                    return "error";
                }
            } else {
                echo "error";
            }
            
        }catch(Throwable $e){
            report($e);
        }
    }

    function UpdateTrainingList($file, $filename, $trainType, $date_from, $date_to, $description, $schetule_status, $by, $trainer,$id,$namefile){
        if(strlen($file)>0){
            $uploaddir = public_path('/media/hrms/Training/');
            $uploadfile = $uploaddir . basename($file);
            $filedirectory = '/media/hrms/Training/' . $file;
            if (move_uploaded_file($filename, $uploadfile)) {
                $sql = "SELECT public.update_hr_training_schedule($id,$by,$trainType,'$date_from','$date_to','$description','$schetule_status',$trainer,'$filedirectory')";
                $stm = DB::select($sql);
                if ($stm[0]->update_hr_training_schedule > 0) {
                    return "Update Training List Successfully";
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
                return "Update Training List Successfully";
            } else {
                return "error";
            }
        }
        
    }
}
