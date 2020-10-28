<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CrmLeadCurrentISP extends Model
{
    //
    function saveData($id, $userId, $nameEn, $nameKh, $status){
        try {
            if($id != null){
                $data = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $data->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $data->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $data->status : $status;
                $sql = 'select update_crm_lead_current_isp('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', true) as id';
            } else {
                $sql = 'select insert_crm_lead_current_isp(\''.$nameEn.'\', \''.$nameKh.'\', '.$userId.') as id';
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
            $result = DB::selectOne('select * from crm_lead_current_isp where status = true and is_deleted = false and id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select('select * from crm_lead_current_isp where status = true and is_deleted = false');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function deleteData($id, $userId){
        try {
            $result = DB::selectOne('select delete_crm_lead_current_isp('.$id.', '.$userId.') as id')->id;
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
