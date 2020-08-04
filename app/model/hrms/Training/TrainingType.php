<?php

namespace App\model\hrms\Training;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class TrainingType extends Model
{
    function TrainingType($id=0){
        try{
            if ($id > 0) {
                $sql = "SELECT id,name,create_date,description from hr_training_list where status='t' and is_deleted='f' and id=$id ORDER BY name";
            } else {
                $sql = "SELECT id,name,create_date,description from hr_training_list where status='t' and is_deleted='f' ORDER BY name";
            }
            return DB::select($sql);
        }catch(Throwable $e){
            report($e);
        }
    }

    function InsertTrainingType($trainingType,$description,$by){
        try{
            $sql= "SELECT public.insert_hr_training_list('$trainingType',$by,'$description')";
            $stm=DB::select($sql);
            if($stm[0]->insert_hr_training_list>0){
                return "Training Type Insert Successfully !";
            }else{
                return "error";
            }
        }catch(Throwable $e){
            report($e);
        }
    }

    function UpdateTrainingType($trainingType, $description, $by,$id){
        try {
            $sql= "SELECT public.update_hr_training_list($id,$by,'$trainingType','$description')";
            $stm = DB::select($sql);
            if ($stm[0]->update_hr_training_list > 0) {
                return "Training Type Update Successfully !";
            } else {
                return "error";
            }
        } catch (Throwable $e) {
            report($e);
        }
    }
    function DeleteTrainingType($id,$by){
        try {
            $sql= "SELECT public.delete_hr_training_list($id,$by)";
            DB::select($sql);
        } catch (Throwable $e) {
            report($e);
        }
    }
}
