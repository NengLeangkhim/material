<?php

namespace App\model\mainapp\employeeProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class profileModel extends Model
{
    
    // get employee info for profile
    public static function getUserInfo($id)
    {
        try {
            $r = DB::table('ma_user as us')
                    ->select('us.*','po.name as positionName','dp.name as deptName','cpdt.company','cpdt.branch','us_add.hom_en','us_add.street_en','us_add.gazetteer_code','sal.rate_month','us_de.martital_status','us_de.has_child')
                    ->leftjoin('ma_position as po','us.ma_position_id','=','po.id')
                    ->leftjoin('ma_company_dept as dp','us.ma_company_dept_id','=','dp.id')
                    ->leftjoin('ma_company_detail as cpdt','us.ma_company_detail_id','=','cpdt.id')
                    ->leftjoin('ma_user_address as us_add','us_add.ma_user_id','=','us.id')
                    ->leftjoin('hr_payroll_base_salary as sal','sal.ma_user_id','=','us.id')->where('sal.status','=','t')
                    ->leftjoin('ma_user_detail as us_de','us_de.ma_user_id','=','us.id')
                    ->where('us.is_deleted','=','f')
                    ->where('us.status','=','t')
                    ->where('us.id','=',$id)
                    ->orderBy('us.id','ASC')
                    ->get(); 
            return $r;
                
        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }
    }


    //get employee address by code addres
    public static function address_detail($code)
    {
        $r = DB::select("SELECT public.get_gazetteers_address('$code')");
        return $r;
    }





}
