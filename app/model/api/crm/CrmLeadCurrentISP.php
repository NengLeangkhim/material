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
                $sql = 'select update_crm_lead_current_isp('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', '.$status.'::boolean) as id';
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
            $result = DB::selectOne('select * from crm_lead_current_isp where is_deleted = false and id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select("select crm_lead_current_isp.*,
                                    ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
                                    case when crm_lead_current_isp.status=false then 'Inactive' else 'Active' end as status_text
                                    from crm_lead_current_isp
                                    join ma_user on ma_user.id=crm_lead_current_isp.create_by
                                    where crm_lead_current_isp.is_deleted = false order by crm_lead_current_isp.name_en");
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
