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
    // id hr_training
    function TrainingStaff($hrid){
        $sql= "SELECT hts.ma_user_id, s.first_name_en, s.last_name_en  FROM hr_training_staff hts INNER JOIN ma_user s on hts.ma_user_id=s.id where hr_training_id=$hrid and hts.is_deleted='f'";
        return DB::select($sql);
    }
    // id schedule
    public static function TrainingStaff_schedule_id($hrid){
        $sql= "SELECT hts.ma_user_id, s.first_name_en, s.last_name_en  FROM hr_training_staff hts INNER JOIN ma_user s on hts.ma_user_id=s.id where hr_training_schedule_id=$hrid and hts.is_deleted='f'";
        return DB::select($sql);
    }

    // staff training chage status
    public static function staff_training_change_status_schedule_id($id){
        $sql="UPDATE hr_training_staff set status='f',is_deleted='t' WHERE hr_training_schedule_id=$id RETURNING id";
        return DB::select($sql);
    }
    public static function staff_training_change_status_training_id($id){
        $sql="UPDATE hr_training_staff set status='f',is_deleted='t' WHERE hr_training_id=$id RETURNING id";
        return DB::select($sql);
    }

    function InsertTrainingList($file,$filename,$trainType,$date_from,$date_to,$description,$schetule_status,$by,$trainer,$staff){
        try{
            $uploaddir = public_path('/media/hrms/Training/');
            $uploadfile = $uploaddir . basename($file);
            $filedirectory = '/media/hrms/Training/' . $file;
            if(move_uploaded_file($filename, $uploadfile)) {
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

                        return self::Insert_hr_traininng_schedule_staff($stm[0]->insert_hr_training_schedule,$staff,$by);
                    }
                } else {
                    return "error";
                }
            } else {
                echo "error";
            }
            
        }catch(Throwable $e){
            throw($e);
        }
    }

    public static function Insert_hr_traininng_schedule_staff($hr_training_schedule_id,$staff,$create_by){
        foreach($staff as $em){
            $sql="select public.insert_hr_training_schedule_staff($hr_training_schedule_id,$em,$create_by)";
            $staff_train=DB::select($sql);
        }
        if($staff_train[0]->insert_hr_training_schedule_staff>0){
            return 'Training List Insert Successfully';
        }else{
            return 'error';
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
                        self::staff_training_change_status_schedule_id($stm[0]->update_hr_training_schedule);
                        return self::Insert_hr_traininng_schedule_staff($stm[0]->update_hr_training_schedule,$staff,$by);
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
                    self::staff_training_change_status_training_id($stm[0]->update_hr_training_schedule);
                    $training_hr = self::InsertTrainingHr($stm[0]->update_hr_training_schedule, $date_from, $date_to, $description, $by, $staff);
                    if ($training_hr == 'error') {
                        return 'error';
                    } else {
                        return "Training List Update Successfully";
                    }
                } else {
                    self::staff_training_change_status_schedule_id($stm[0]->update_hr_training_schedule);
                    return self::Insert_hr_traininng_schedule_staff($stm[0]->update_hr_training_schedule,$staff,$by);
                }
            } else {
                return "error";
            }
        }
        
    }


    function InsertStaffTraining($id,$staffid,$by){
        try{
             foreach ($staffid as $sid) {
                $sql = "SELECT public.insert_hr_training_staff($id,$sid,$by)";
                $stm = DB::select($sql);
            }
            if ($stm[0]->insert_hr_training_staff > 0) {
                return "Successfully";
            } else {
                return "error";
            }
        }catch(Throwable $e){
            report($e);
        }
    }

    function InsertTrainingHr($id,$date_from,$date_to,$description,$by,$staff){
        
        try{
            $script= "SELECT id from hr_training WHERE status='t' and is_deleted='f' and hr_training_schedule_id=$id";
            $std=DB::select($script);
            if(count($std)>0){
                self::staff_training_change_status_training_id($std[0]->id);
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
                    self::staff_training_change_status_training_id($stm[0]->insert_hr_training);
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
        }catch(Throwable $e){
            throw($e);
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
        $sql="SELECT DISTINCT ht.id as hrid,hts.id,htl.id as typeid,htt.id as trainerid,htl.name as type,htt.name as trainer,hts.training_date_from as schet_f_date,hts.training_date_to as schet_t_date,ht.actual_date_from as actual_f_date,ht.actual_date_to as actual_t_date,hts.status,hts.description as schet_description, ht.description as actual_description,hts.file
            from (select * from hr_training_schedule where is_deleted='f' and status='t') as hts 
						LEFT JOIN (select * from hr_training where status='t' and is_deleted='f' ) as ht on hts.id=ht.hr_training_schedule_id
            JOIN (select * from hr_training_list where status='t' and is_deleted='f' ) as htl on hts.hr_training_list_id=htl.id
            JOIN (select * from hr_training_trainer where status='t' and is_deleted='f' ) as htt on htt.id=hts.hr_training_trainer_id
                        JOIN (SELECT * FROM hr_training_staff WHERE status='t' and is_deleted='f') as htss on htss.hr_training_id=ht.id or htss.hr_training_schedule_id=hts.id WHERE htss.ma_user_id=$id";
        return DB::select($sql);
    }

    public static function training_report_search($date_from,$date_to){
        try {
            $sql="SELECT ht.id as hrid,hts.id,htl.id as typeid,htt.id as trainerid,htl.name as type,htt.name as trainer,hts.training_date_from as schet_f_date,hts.training_date_to as schet_t_date,ht.actual_date_from as actual_f_date,ht.actual_date_to as actual_t_date,hts.status,hts.description as schet_description, ht.description as actual_description,hts.file
            from (select * from hr_training_schedule where is_deleted='f' and status='t') as hts 
						LEFT JOIN (select * from hr_training where status='t' and is_deleted='f' ) as ht on hts.id=ht.hr_training_schedule_id
            JOIN (select * from hr_training_list where status='t' and is_deleted='f' ) as htl on hts.hr_training_list_id=htl.id
            JOIN (select * from hr_training_trainer where status='t' and is_deleted='f' ) as htt on htt.id=hts.hr_training_trainer_id 
						WHERE
						hts.training_date_from::date BETWEEN '$date_from'::date and '$date_to'::date
						or hts.training_date_to::date BETWEEN '$date_from'::date and '$date_to'::date 
						or ht.actual_date_from::date BETWEEN '$date_from'::date and '$date_to'::date 
						or ht.actual_date_to::date BETWEEN '$date_from'::date and '$date_to'::date;";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // List staff training
    public static function list_staff_training($hr_training_staff_id){
        try {
            $sql="select * ,
(select first_name_en||' '||last_name_en from ma_user where id=hts.ma_user_id) as trainee,
case when hts.hr_training_schedule_id is null then (select name from hr_training_list where id=(select hr_training_list_id from hr_training_schedule where id=(select hr_training_schedule_id from hr_training where id=hts.hr_training_id))) 
else
(select name from hr_training_list where id=(select hr_training_list_id from hr_training_schedule where id=hts.hr_training_schedule_id))
end
as course
from hr_training_staff hts
where 
't' and 
((hr_training_schedule_id in (select id from hr_training_schedule where status='t' and is_deleted='f' ))
or
(hr_training_id in (select id from hr_training where status='t' and is_deleted='f' and hr_training_schedule_id in (select id from hr_training_schedule where status='t' and is_deleted='f' )))
)
and status='t' and is_deleted='f' 
and ma_user_id=$hr_training_staff_id
ORDER BY id" ;
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
        
}
