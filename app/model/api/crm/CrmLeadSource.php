<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CrmLeadSource extends Model
{
    function saveData($id, $userId, $nameEn, $nameKh, $status){
        try {
            if($id != null){
                $data = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $data->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $data->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $data->status : $status;
                $sql = 'select update_crm_lead_source('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', true) as id';
            } else {
                $sql = 'select insert_crm_lead_source(\''.$nameEn.'\', \''.$nameKh.'\', '.$userId.') as id';
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
            $result = DB::selectOne('select * from crm_lead_source where is_deleted = false and id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select("select crm_lead_source.*,ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
                                    case when crm_lead_source.status=false then 'Inactive' else 'Active' end as status_text
                                    from crm_lead_source
                                    join ma_user on ma_user.id=crm_lead_source.create_by
                                    where crm_lead_source.is_deleted = false order by crm_lead_source.name_en");
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function deleteData($id, $userId){
        try {
            $result = DB::selectOne('select delete_crm_lead_source('.$id.', '.$userId.') as id')->id;
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
