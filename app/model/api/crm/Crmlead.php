<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Crmlead extends Model
{


    //get lead source
    public  static function leadSource(){
       return DB::select('SELECT * from select_crm_lead_source()'); 
    }
    // insert lead source
    public static function addleadsource($name_en,$name_kh,$create_by){
        if(isset($name_en) && isset($name_kh) && isset($create_by) ){
            try{
                $result= DB::select('SELECT "public".insert_crm_lead_source(?,?,?)',
                array(
                    $name_en,
                    $name_kh,
                    $create_by
                    )
                );
                return json_encode(["insert"=>'success',"result"=>$result]);
            }catch(Exception $e){
                return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
            }
        }
        else{
            return json_encode(["insert"=>'Not found data']);
        }
    }
    // get lead industry
    public static function leadIndustry(){
        return DB::select('SELECT * from crm_lead_industry ORDER BY name_en ASC');
    }
    // insert lead industry
    public static function addleadIndustry($name_en,$name_kh,$create_by){
        if(isset($name_en) && isset($name_kh) && isset($create_by) ){
            try{
                $result= DB::select('SELECT "public".insert_crm_lead_industry(?,?,?)',
                array(
                    $name_en,
                    $name_kh,
                    $create_by
                    )
                );
                return json_encode(["insert"=>'success',"result"=>$result]);
            }catch(Exception $e){
                return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
            }
        }
        else{
            return json_encode(["insert"=>'Not found data']);
        }
    }
     //get lead source
    public  static function leadStatus(){
        return DB::select('SELECT * from select_crm_lead_status()'); 
    }

    //get lead assig
    public static function leadassig(){
        return DB::table('ma_user')
        ->select('ma_user.id','ma_user.first_name_en','ma_user.last_name_en' ,
        'ma_company_dept.name as dept','ma_position.name as position_name','ma_company_dept_id')
        ->leftjoin('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
        ->leftjoin('ma_company_dept', 'ma_company_dept.id', '=', 'ma_user.ma_company_dept_id')
        ->Where([
            ['ma_user.status', '=', 't'],
            ['ma_user.is_deleted', '=', 'f'],
            ['ma_company_dept.id', '=', 5]
        ])->orderBy('ma_user.first_name_en','ASC')->get();    
    }
    //get lead  Branch 
    public static function leadBranch(){
        return DB::select('SELECT  id,branch as name  FROM "public"."ma_company_branch" Where status=true and is_deleted=false');
    }

}
