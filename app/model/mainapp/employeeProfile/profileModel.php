<?php

namespace App\model\mainapp\employeeProfile;

use App\addressModel;
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


    // get data detail of employee one row
    public static function get_data_info_of_one_employee($id){
        try {
            $sql="SELECT 
                mu.id,
                mu.id_number,
                concat(mu.first_name_en,' ',mu.last_name_en) as full_name,
                mp.name as position,
                mcd.name as department,
                mu.office_phone,
                mu.email,
                mcde.company,
                mcde.branch,
                mu.sex,
                mu.image,
                mu.birth_date,
                mu.join_date,
                concat(mu.first_name_kh,' ',mu.last_name_kh) as full_name_kh,
                mud.martital_status,
                mud.child_count,
                mua.hom_en,
                mua.street_en,
                mua.gazetteer_code,
                hpbs.rate_month as salary,
                mu.bank_account
                FROM ma_user mu
                INNER JOIN ma_position mp on mp.id=mu.ma_position_id
                INNER JOIN ma_user_address mua on mu.id=mua.ma_user_id
                INNER JOIN ma_user_detail mud on mu.id=mud.ma_user_id
                INNER JOIN ma_company_dept mcd on mu.ma_company_dept_id=mcd.id
                INNER JOIN ma_company_detail mcde on mcde.id=mu.ma_company_detail_id
                INNER JOIN hr_payroll_base_salary hpbs on mu.id=hpbs.ma_user_id
                where mu.id=$id and hpbs.status='t' and hpbs.is_deleted='f' and mu.status='t' and mu.is_deleted='f'";
                return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // get province
    public static function get_address_employee($gazetteer){
        try {
            $sql="SELECT concat(name_latin,'/',name_kh) as name FROM ma_gazetteers where code='$gazetteer'";
            $stm=DB::Select($sql);
            return $stm[0]->name;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // get current address of employee
    public static function get_address_of_employee($gazetteer){
        try {
            if(strlen($gazetteer)>7){
                $province=substr($gazetteer,0,2);
                $district= substr($gazetteer, 0, 4);
                $commune= substr($gazetteer, 0, 6);
                $village= substr($gazetteer, 0, 8);
            }else{
                $province= substr($gazetteer, 0, 1);
                $district= substr($gazetteer, 0, 3);
                $commune= substr($gazetteer, 0, 5);
                $village= substr($gazetteer, 0, 7);
            }
            $data=[
                'village'=>self::get_address_employee($village),
                'commune'=>self::get_address_employee($commune),
                'distric'=>self::get_address_employee($district),
                'province'=>self::get_address_employee($province)
            ];
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    // Exit information
    public static function exit_information($id){
        try {
            $exit_infoamtion=DB::table('ma_user_exit as mue')
            ->join('ma_user_exit_type as mut','mut.id','=','mue.ma_exit_type_id')
            ->where('mue.ma_user_id','=',$id)
            ->get();
            return $exit_infoamtion;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // employee experirence
    public static function experience_detil($id){
        try {
            $experience=DB::table('ma_user_experience')
            ->where('ma_user_id','=',$id)
            ->get();
            $arr=array();
            if(count($experience)>0){
                foreach($experience as $exper){
                    $data=[
                        'experience_period'=>$exper->experience_period,
                        'sector'=>$exper->sector,
                        'company_name'=>$exper->company_name,
                        'last_position'=>$exper->last_position
                    ];
                    array_push($arr,$data);
                }
            }else{
                $data=[
                    'experience_period'=>null,
                    'sector'=>null,
                    'company_name'=>null,
                    'last_position'=>null
                ];
                array_push($arr,$data);
            }
            return $arr;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // education detail
    public static function education_deatail($id){
        try {
            $education=DB::table('ma_user_education_detail as mued')
            ->join('ma_user_education_level as muel','muel.id','=','mued.ma_education_level_id')
            ->where('mued.ma_user_id','=',$id)
            ->get();
            $array=array();
            if(count($education)>0){
                foreach($education as $edu){
                    $data=[
                        'name_en'=>$edu->name_en,
                        'major'=>$edu->major,
                        'education_status'=>$edu->education_status,
                        'school'=>$edu->school
                    ];
                    array_push($array,$data);
                }
            }else{
                $data=[
                    'name_en'=>null,
                    'major'=>null,
                    'education_status'=>null,
                    'school'=>null
                ];
                array_push($array,$data);
            }
            return $array;
        } catch (\Throwable $th) {
            throw $th;
        }
    }




}
