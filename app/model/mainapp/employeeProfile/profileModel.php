<?php

namespace App\model\mainapp\employeeProfile;

use App\addressModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

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
                hpbs.rate_month as salary,
                mu.bank_account
                FROM ma_user mu
                INNER JOIN ma_position mp on mp.id=mu.ma_position_id
                INNER JOIN ma_user_detail mud on mu.id=mud.ma_user_id
                INNER JOIN ma_company_dept mcd on mu.ma_company_dept_id=mcd.id
                INNER JOIN ma_company_detail mcde on mcde.id=mu.ma_company_detail_id
                INNER JOIN hr_payroll_base_salary hpbs on mu.id=hpbs.ma_user_id
                where mu.id=$id and hpbs.status='t' and hpbs.is_deleted='f'";
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
            if(count($stm)>0){
                return $stm[0]->name;
            }else{
                return '';
            }
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


    // employee experirence muli
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


    // employee experirence one
    public static function experience_detil_one($id){
        try {
            $experience=DB::table('ma_user_experience')
            ->where('ma_user_id','=',$id)->limit(1)
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


    // education detail multi
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

    // education detail one
    public static function education_deatail_one($id){
        try {
            $education=DB::table('ma_user_education_detail as mued')
            ->join('ma_user_education_level as muel','muel.id','=','mued.ma_education_level_id')
            ->where('mued.ma_user_id','=',$id)->limit(1)
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



    // permanent address
    public static function permanent_address($id){
        try {
            $permanent=DB::table('ma_user_address')
            ->where([
                ['ma_user_id','=',$id],
                ['is_permanent_address','=','t']
            ])
            ->get();
            if(count($permanent)>0){
                if(strlen($permanent[0]->gazetteer_code)>7){
                    $province=substr($permanent[0]->gazetteer_code,0,2);
                    $district= substr($permanent[0]->gazetteer_code, 0, 4);
                    $commune= substr($permanent[0]->gazetteer_code, 0, 6);
                    $village= substr($permanent[0]->gazetteer_code, 0, 8);
                }else{
                    $province= substr($permanent[0]->gazetteer_code, 0, 1);
                    $district= substr($permanent[0]->gazetteer_code, 0, 3);
                    $commune= substr($permanent[0]->gazetteer_code, 0, 5);
                    $village= substr($permanent[0]->gazetteer_code, 0, 7);
                }
                $all_district=addressModel::GetLeadDistrict($province);
                $all_commune=addressModel::GetLeadCommune($district);
                $all_village=addressModel::GetLeadVillage($commune);
                $data=[
                    'home'=>$permanent[0]->hom_en,
                    'street'=>$permanent[0]->street_en,
                    'village'=>self::get_address_employee($village),
                    'commune'=>self::get_address_employee($commune),
                    'district'=>self::get_address_employee($district),
                    'province'=>self::get_address_employee($province),
                    'village_code'=>$village,
                    'district_code'=>$district,
                    'commune_code'=>$commune,
                    'province_code'=>$province,
                    'all_village'=>$all_village,
                    'all_district'=>$all_district,
                    'all_commune'=>$all_commune
                ];
            }else{
                $data=[
                    'home'=>null,
                    'street'=>null,
                    'village'=>null,
                    'commune'=>null,
                    'district'=>null,
                    'province'=>null,
                    'village_code'=>null,
                    'district_code'=>null,
                    'commune_code'=>null,
                    'province_code'=>null,
                    'all_village'=>array(),
                    'all_district'=>array(),
                    'all_commune'=>array()
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    // permanent address
    public static function current_address($id){
        try {
            $current=DB::table('ma_user_address')
            ->where([
                ['ma_user_id','=',$id],
                ['is_current_address','=','t']
            ])
            ->get();
            if(count($current)>0){
                if(strlen($current[0]->gazetteer_code)>7){
                    $province=substr($current[0]->gazetteer_code,0,2);
                    $district= substr($current[0]->gazetteer_code, 0, 4);
                    $commune= substr($current[0]->gazetteer_code, 0, 6);
                    $village= substr($current[0]->gazetteer_code, 0, 8);
                }else{
                    $province= substr($current[0]->gazetteer_code, 0, 1);
                    $district= substr($current[0]->gazetteer_code, 0, 3);
                    $commune= substr($current[0]->gazetteer_code, 0, 5);
                    $village= substr($current[0]->gazetteer_code, 0, 7);
                }
                $all_district=addressModel::GetLeadDistrict($province);
                $all_commune=addressModel::GetLeadCommune($district);
                $all_village=addressModel::GetLeadVillage($commune);
                $data=[
                    'home'=>$current[0]->hom_en,
                    'street'=>$current[0]->street_en,
                    'village'=>self::get_address_employee($village),
                    'commune'=>self::get_address_employee($commune),
                    'district'=>self::get_address_employee($district),
                    'province'=>self::get_address_employee($province),
                    'village_code'=>$village,
                    'district_code'=>$district,
                    'commune_code'=>$commune,
                    'province_code'=>$province,
                    'all_village'=>$all_village,
                    'all_district'=>$all_district,
                    'all_commune'=>$all_commune
                ];
            }else{
                $data=[
                    'home'=>null,
                    'street'=>null,
                    'village'=>null,
                    'commune'=>null,
                    'district'=>null,
                    'province'=>null,
                    'village_code'=>null,
                    'district_code'=>null,
                    'commune_code'=>null,
                    'province_code'=>null,
                    'all_village'=>array(),
                    'all_district'=>array(),
                    'all_commune'=>array()
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // ma_user_contact
    public static function user_contact($id){
        try {
            $user_contact=DB::select("SELECT muit.name_en as iden_type,muc.ma_identification_number,muc.issued_date,muc.issued_place,muc.issued_by,mubg.name_en as blood_name,mur.name_en as religion,muc.is_marriage FROM ma_user_contact muc
                INNER JOIN ma_user_identification_type muit ON muc.ma_identification_type_id=muit.id 
                INNER JOIN ma_user_religion mur on mur.id=muc.ma_religion_id 
                LEFT JOIN ma_user_blood_group mubg on mubg.id=muc.ma_blood_group_id WHERE muc.ma_user_id=$id and muc.status='t' and muc.is_deleted='f'");
            if(count($user_contact)>0){
                $data=[
                    'iden_type'=>$user_contact[0]->iden_type,
                    'ma_identification_number'=>$user_contact[0]->ma_identification_number,
                    'issued_date'=>$user_contact[0]->issued_date,
                    'issued_place'=>$user_contact[0]->issued_place,
                    'issued_by'=>$user_contact[0]->issued_by,
                    'blood_name'=>$user_contact[0]->blood_name,
                    'religion'=>$user_contact[0]->religion,
                    'is_marriage'=>$user_contact[0]->is_marriage,
                ];
            }else{
                $data=[
                    'iden_type'=>null,
                    'ma_identification_number'=>null,
                    'issued_date'=>null,
                    'issued_place'=>null,
                    'issued_by'=>null,
                    'blood_name'=>null,
                    'religion'=>null,
                    'is_marriage'=>null,
                ];
            }
            return $data;        
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // get relatetive
    public static function get_relative($id,$relative_type){
        try {
            $sql="SELECT mur.name_en as relative_type_name,murt.name_kh as relative_type_name_kh,occupation,birth_date,muel.name_en as education_level,mur.phone_number,mur.home_phone,mur.gazetteer_code,mur.home,mur.street,mur.group FROM ma_user_relative mur 
                INNER JOIN ma_user_relative_type murt on murt.id=mur.ma_relative_type_id 
                LEFT JOIN ma_user_education_level muel on muel.id=mur.ma_education_level_id WHERE mur.ma_user_id=$id and mur.ma_relative_type_id=$relative_type and mur.status='t' and mur.is_deleted='f' LIMIT 1";
            $re=DB::select($sql);
            if(count($re)>0){
                $data=[
                    'relative_type_name'=>$re[0]->relative_type_name,
                    'relative_type_name_kh'=>$re[0]->relative_type_name_kh,
                    'occupation'=>$re[0]->occupation,
                    'birth_date'=>$re[0]->birth_date,
                    'education_level'=>$re[0]->education_level,
                    'phone_number'=>$re[0]->phone_number,
                    'home_phone'=>$re[0]->home_phone,
                    'gazetteer_code'=>$re[0]->gazetteer_code,
                    'home'=>$re[0]->home,
                    'street'=>$re[0]->street,
                    'group'=>$re[0]->group
                ];
            }else{
                $data=[
                    'relative_type_name'=>null,
                    'relative_type_name_kh'=>null,
                    'occupation'=>null,
                    'birth_date'=>null,
                    'education_level'=>null,
                    'phone_number'=>null,
                    'home_phone'=>null,
                    'gazetteer_code'=>null,
                    'home'=>null,
                    'street'=>null,
                    'group'=>null
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    // get Relative/Emergency Contact
    public static function get_relative_emergency_contact($id){
        try {
            $father=self::get_relative($id,1);
            $mother=self::get_relative($id,2);
            $wife=self::get_relative($id,3);
            if(strlen($father['gazetteer_code'])>7){
                $province=substr($father['gazetteer_code'],0,2);
                $district= substr($father['gazetteer_code'], 0, 4);
                $commune= substr($father['gazetteer_code'], 0, 6);
                $village= substr($father['gazetteer_code'], 0, 8);
            }else{
                $province= substr($father['gazetteer_code'], 0, 1);
                $district= substr($father['gazetteer_code'], 0, 3);
                $commune= substr($father['gazetteer_code'], 0, 5);
                $village= substr($father['gazetteer_code'], 0, 7);
            }
            $all_district=addressModel::GetLeadDistrict($province);
            $all_commune=addressModel::GetLeadCommune($district);
            $all_village=addressModel::GetLeadVillage($commune);
            $data=[
                'father_name'=>$father['relative_type_name'],
                'mother_name'=>$mother['relative_type_name'],
                'father_occupation'=>$father['occupation'],
                'mother_occupation'=>$mother['occupation'],
                'parent_home'=>$father['home'],
                'parent_street'=>$father['street'],
                'parent_group'=>$father['group'],
                'village'=>self::get_address_employee($village),
                'commune'=>self::get_address_employee($commune),
                'district'=>self::get_address_employee($district),
                'province'=>self::get_address_employee($province),
                'village_code'=>$village,
                'district_code'=>$district,
                'commune_code'=>$commune,
                'province_code'=>$province,
                'all_village'=>$all_village,
                'all_district'=>$all_district,
                'all_commune'=>$all_commune,
                'phone_number'=>$father['phone_number'],
                'home_phone'=>$father['home_phone'],
                'wife_name'=>$wife['relative_type_name'],
                'wife_date_of_birth'=>$wife['birth_date'],
                'wife_occupation'=>$wife['occupation'],
                'wife_education_level'=>$wife['education_level'],
                'wife_mobile_phone'=>$wife['phone_number']
            ];
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }




}
