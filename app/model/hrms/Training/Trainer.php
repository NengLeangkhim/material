<?php

namespace App\model\hrms\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class Trainer extends Model
{
    function Trainer($id=0){
        if($id>0){
            $sql= "SELECT id,name,telephone,type,description FROM hr_training_trainer where status='t' and is_deleted='f' and id=$id ORDER BY name";
        }else{
            $sql= "SELECT id,name,telephone,type,description FROM hr_training_trainer where status='t' and is_deleted='f' ORDER BY name";
        }
        return DB::select($sql);
    }

    function InsertTrainer($trainer,$telephone,$type,$description,$by){
        try{
            $sql= "SELECT public.insert_hr_training_trainer('$trainer','$telephone','$type','$description',$by)";
            $stm=DB::select($sql);
            if($stm[0]->insert_hr_training_trainer>0){
                return "Trainer Insert Successfully !";
            }else{
                return "error";
            }
        }catch(Throwable $e){
            report($e);
        }
    }

    function UpdateTrainer($trainer, $telephone, $type, $description, $by,$id){
        try{
           $sql= "SELECT public.update_hr_training_trainer($id,$by,'$trainer','$telephone','$type','$description')";
            $stm = DB::select($sql);
            if ($stm[0]->update_hr_training_trainer > 0) {
                return "Trainer Update Successfully !";
            } else {
                return "error";
            }
        }catch(Throwable $e){
            report($e);
        }
    }

    function DeleteTrainer($id,$by){
        try{
            $sql= "SELECT public.delete_hr_training_trainer($id,$by)";
            DB::select($sql);
        }catch(Throwable $e){
            report($e);
        }
    }
}
