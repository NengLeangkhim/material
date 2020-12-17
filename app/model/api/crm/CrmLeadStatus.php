<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CrmLeadStatus extends Model
{
    //
    function saveData($id, $userId, $nameEn, $nameKh, $status, $sequence, $color){
        try {
            if($id != null){
                $data = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $data->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $data->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $data->status : $status;
                $sequence = ($sequence == null || $sequence == '') ? $data->sequence : $sequence;
                $color = ($color == null || $color == '') ? $data->color : $color;
                $sql = 'select update_crm_lead_status('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', \''.$status.'\', \''.$sequence.'\', \''.$color.'\') as id';
            } else {
                $sql = 'select insert_crm_lead_status(\''.$nameEn.'\', \''.$nameKh.'\', '.$userId.', '.($sequence == null ? 'null' : $sequence).', \''.($color == null ? 'null' : $color).'\') as id';
            }
            $newId = DB::selectOne($sql)->id;
            $result = json_encode(['data'=>$this->getOneData($newId),'success'=>'true']);
            // dump($result);
        } catch(QueryException $e){
            throw $e;
            // return $e;
        }
        return $result;

    }

    function getOneData($id){
        try {
            $result = DB::selectOne('select * from crm_lead_status where is_deleted = false and id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select("select crm_lead_status.*,ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
                                    case when crm_lead_status.status=false then 'Inactive' else 'Active' end as status_text
                                    from crm_lead_status join ma_user on ma_user.id=crm_lead_status.create_by
                                    where crm_lead_status.is_deleted = false order by crm_lead_status.sequence");
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function deleteData($id, $userId){
        try {
            $result = DB::selectOne('select delete_crm_lead_status('.$id.', '.$userId.') as id')->id;
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
