<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ModelCrmQuoteStatusType extends Model
{
    protected $table = 'crm_quote_status_type';
    public $timestamps = false;

    function saveData($id, $userId, $nameEn, $nameKh, $status, $sequence, $color)
    {
        try {
            if ($id != null) {
                $leadStatus = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $leadStatus->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $leadStatus->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $leadStatus->status : $status;
                $sequence = ($sequence == null || $sequence == '') ? $leadStatus->sequence : $sequence;
                $color = ($color == null || $color == '') ? $leadStatus->color : $color;
                $sql = 'select update_crm_quote_status_type(' . $id . ', ' . $userId . ', \'' . $nameEn . '\', \'' . $nameKh . '\', \'' . $status . '\',\'' . $sequence . '\',\'' . $color . '\') as id';
            } else {
                $sql = 'select insert_crm_quote_status_type(\'' . $nameEn . '\', \'' . $nameKh . '\', ' . $userId . ', ' . $sequence . ', \'' . $color . '\') as id';
            }
            $newId = DB::selectOne($sql)->id;
            $result = $this->getOneData($newId);
        } catch (QueryException $e) {
            throw $e;
        }
        return $result;
    }

    function getOneData($id)
    {
        try {
            $result = DB::selectOne('select * from crm_quote_status_type where is_deleted = false and id = ' . $id);
        } catch (QueryException $e) {
            throw $e;
        }
        return $result;
    }

    function getAllData()
    {
        try {
            $result = DB::select("select crm_quote_status_type.*,
            ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
            case when crm_quote_status_type.status=false then 'Inactive' else 'Active' end as status_text
            from crm_quote_status_type
            join ma_user on ma_user.id=crm_quote_status_type.create_by
            where crm_quote_status_type.is_deleted = false order by crm_quote_status_type.sequence");
        } catch (QueryException $e) {
            throw $e;
        }
        return $result;
    }
    function getActiveData()
    {
        try {
            $result = DB::select("select crm_quote_status_type.*,
                        ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
                        case when crm_quote_status_type.status=false then 'Inactive' else 'Active' end as status_text
                        from crm_quote_status_type
                        join ma_user on ma_user.id=crm_quote_status_type.create_by
                        where crm_quote_status_type.is_deleted = false and crm_quote_status_type.status=true and parent_id is null order by crm_quote_status_type.sequence");
        } catch (QueryException $e) {
            throw $e;
        }
        return $result;
    }
    function getChildData($id)
    {
        try {
            $result = DB::select("select crm_quote_status_type.*,
                            ma_user.first_name_en||' '||ma_user.last_name_en as create_by_name,
                            case when crm_quote_status_type.status=false then 'Inactive' else 'Active' end as status_text
                            from crm_quote_status_type
                            join ma_user on ma_user.id=crm_quote_status_type.create_by
                            where crm_quote_status_type.is_deleted = false and crm_quote_status_type.status=true and parent_id =(select id from crm_quote_status_type where name_en='$id') order by crm_quote_status_type.sequence");
        } catch (QueryException $e) {
            throw $e;
        }
        return $result;
    }
    function deleteData($id, $userId)
    {
        try {
            $result = DB::selectOne('select delete_crm_quote_status_type(' . $id . ', ' . $userId . ') as id')->id;
        } catch (QueryException $e) {
            throw $e;
        }
        return $result;
    }
}
