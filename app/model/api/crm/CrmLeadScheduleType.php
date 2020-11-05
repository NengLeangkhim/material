<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CrmLeadScheduleType extends Model
{
    //
    function saveData($id, $userId, $nameEn, $nameKh, $status, $isResultType){
        try {
            if($id != null){
                $data = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $data->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $data->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $data->status : $status;
                $isResultType = ($isResultType == null || $isResultType == '') ? $data->is_result_type : $isResultType;
                $sql = 'select update_crm_lead_schedule_type('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', \''.$isResultType.'\', \''.$status.'\') as id';
            } else {
                $sql = 'select insert_crm_lead_schedule_type(\''.$nameEn.'\', \''.$nameKh.'\', \''.$isResultType.'\', '.$userId.') as id';
            }
            $newId = DB::selectOne($sql)->id;
            $result = $this->getOneData($newId);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function getOneData($id){
        try {
            $result = DB::selectOne('select * from crm_lead_schedule_type where is_deleted = false and id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select('select * from crm_lead_schedule_type where is_deleted = false order by name_en');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function deleteData($id, $userId){
        try {
            $result = DB::selectOne('select delete_crm_lead_schedule_type('.$id.', '.$userId.') as id')->id;
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
