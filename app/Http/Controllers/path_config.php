<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class path_config extends Controller
{
    //
    public static function stock_img_path(){
        return '/media/file/stock/img/';
    }
    public static function profile_img_path(){
        return '/media/file/main_app/profile/img/';
    }
    public static function crm_lead_file_path(){
        return '/media/file/crm/lead/';
    }
    public static function abc(){

    }
    public static function img_en($st){
        $extension=explode('.',$st)[1];
        $st=md5(time().$st).'.'.$extension;
        return $st;
    }
    public static function Move_Upload($fileMove,$path){
        if($fileMove== null){
            return false;
        }
        $filename = $fileMove->getClientOriginalName();
        $url_path = public_path($path); //path for move
        if (!file_exists($url_path)) {
            mkdir($url_path, 0777, true);
        }
        $renamefile= path_config::img_en($filename);
        $uploadfile = $url_path.$renamefile;
        $filedirectory = $path.$renamefile;
        if (move_uploaded_file($fileMove, $uploadfile)) {
            return $filedirectory;
        } else {
            return false;
        }
    }
    //Upload file and insert to table ma_uploaded_file return id of this table
    public static function InsertUploadedFile($file,$path,$create_by){
        $FilePath=self::Move_Upload($file,$path);
        if(!$FilePath&&!is_object($file)){
            return null;
        }
        DB::beginTransaction();
        try {
            $result= DB::selectOne("SELECT public.insert_ma_uploaded_files(?, ?,?,?) as id",[$FilePath,$create_by,''.$file->getClientOriginalName(),''.$file->getClientOriginalExtension()]);
            DB::commit();
            return $result->id;
        } catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
}
