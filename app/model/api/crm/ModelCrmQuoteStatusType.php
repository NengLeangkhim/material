<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ModelCrmQuoteStatusType extends Model
{
    protected $table = 'crm_quote_status_type';
    public $timestamps = false;

    function saveData($id, $userId, $nameEn, $nameKh, $status){
        try {
            if($id != null){
                $leadStatus = $this->getOneData($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $leadStatus->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $leadStatus->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $leadStatus->status : $status;
                $sql = 'select update_crm_quote_status_type('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', \''.$status.'\') as id';
            } else {
                $sql = 'select insert_crm_quote_status_type(\''.$nameEn.'\', \''.$nameKh.'\', '.$userId.') as id';
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
            $result = DB::selectOne('select * from crm_quote_status_type where is_deleted = false and id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    function getAllData(){
        try {
            $result = DB::select('select * from crm_quote_status_type where is_deleted = false order by name_en');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;

    }

    function deleteData($id, $userId){
        try {
            $result = DB::selectOne('select delete_crm_quote_status_type('.$id.', '.$userId.') as id')->id;
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
}
