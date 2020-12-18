<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CrmLeadScheduleType extends Model
{
    //
    function saveData($id, $userId, $nameEn, $nameKh, $status, $type,$comment,$color){
        try {
            $is_result = 'false';
            $is_stage_2 = 'false';
            $is_quote_type = 'false';
            switch($type){
                case 'sechdule_result':
                    $is_result='true';
                break;
                case 'schedule_after_contacted':
                    $is_stage_2='true';
                break;
                case 'schedule_for_contact_quote':
                    $is_quote_type='true';
                break;
            }
            if($id != null){
                $data = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $data->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $data->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $data->status : $status;
                $sql = "select update_crm_lead_schedule_type($id, $userId, '$nameEn', '$nameKh', $is_result, $status::boolean,$is_stage_2,$is_quote_type,'$comment','$color') as id";
            } else {
                $sql = "select insert_crm_lead_schedule_type('$nameEn', '$nameKh', $is_result,$userId,$is_stage_2,$is_quote_type,'$comment','$color') as id";
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
            $result = DB::selectOne("select *,case when crm_lead_schedule_type.is_result_type=true then 'schedule_result' when crm_lead_schedule_type.is_stage_2=true then 'schedule_after_contacted' when crm_lead_schedule_type.is_quote_type=true then 'schedule_for_contact_quote' else 'schedule' end as type from crm_lead_schedule_type where is_deleted = false and id = $id");
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select("select crm_lead_schedule_type.*,
            ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
            case when crm_lead_schedule_type.status=false then 'Inactive' else 'Active' end as status_text,
            case when crm_lead_schedule_type.is_result_type=true then 'Schedule Result' when crm_lead_schedule_type.is_stage_2=true then 'Schedule After Contacted' when crm_lead_schedule_type.is_quote_type=true then 'Schedule For Contact Quote' else 'Schedule' end as type
            from crm_lead_schedule_type
            join ma_user on ma_user.id=crm_lead_schedule_type.create_by
            where crm_lead_schedule_type.is_deleted = false order by is_result_type=false desc , is_stage_2=true, crm_lead_schedule_type.name_en");
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
