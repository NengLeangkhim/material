<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CrmLeadIndustry extends Model
{
    //
    function saveData($id, $userId, $nameEn, $nameKh, $status,$type){
        try {
            $home = 'false';
            $business = 'false';
            $enterprise = 'false';
            switch($type){
                case 'home':
                    $home='true';
                break;
                case 'business':
                    $business='true';
                break;
                case 'enterprise':
                    $enterprise='true';
                break;
            }
            if($id != null){
                $data = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $data->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $data->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $data->status : $status;
                $sql = "select update_crm_lead_industry($id, $userId, '$nameEn', '$nameKh', $status::boolean,$home, $business,$enterprise) as id";
            } else {
                $sql = "select insert_crm_lead_industry('$nameEn', '$nameKh', $userId,$home, $business,$enterprise) as id";
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
            $result = DB::selectOne("select *,case when crm_lead_industry.is_home=true then 'home' when crm_lead_industry.is_business=true then 'business' when crm_lead_industry.is_enterprise=true then 'enterprise' else 'Null' end as type from crm_lead_industry where is_deleted = false and id = $id");
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select("select crm_lead_industry.*,
            ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
            case when crm_lead_industry.status=false then 'Inactive' else 'Active' end as status_text,
            case when crm_lead_industry.is_home=true then 'Home' when crm_lead_industry.is_business=true then 'Business' when crm_lead_industry.is_enterprise=true then 'Enterprise' else 'Null' end as type
            from crm_lead_industry
            join ma_user on ma_user.id=crm_lead_industry.create_by
            where crm_lead_industry.is_deleted = false order by crm_lead_industry.name_en");
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function deleteData($id, $userId){
        try {
            $result = DB::selectOne('select delete_crm_lead_industry('.$id.', '.$userId.') as id')->id;
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
