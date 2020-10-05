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

    public static function insertLead($company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment){

       if(isset($company_en)){        
            try{
                // insert into table crm_lead
                $result= DB::select('SELECT "public".insert_crm_lead(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $company_en,
                    $company_kh,
                    $primary_email,
                    $website,
                    $facebook,
                    $lead_source,
                    $user_create,
                    8,
                    $company_branch,
                    $lead_industry,
                    $current_speed_isp,
                    $employee_count,
                    $current_speed,
                    $current_price,
                    $vat_number,
                    )
                );
                $lead_id=$result[0]->insert_crm_lead;
                
                //insert Into crm_lead_address
                $address=Crmlead::insertaddress ($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create);
                $address_id=$address[0]->insert_crm_lead_address;

                //insert into crm_lead_branch
                $branch=CrmLead::insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$address_id,$user_create);
                $branch_id=$branch[0]->insert_crm_lead_branch;

                //insert into crm_lead_assign
                CrmLead::insertassign ($branch_id,$assig_to,$user_create);

                //insert into crm_lead_comtact
                $contact=CrmLead::insertcontact($name_en,$name_kh,$email,$phone,$facebook,$position,$user_create,$national_id,$gender);
                $contact_id=$contact[0]->insert_crm_lead_contact;

                //insert into crm_lead_brach_contact_rel
                CrmLead::insert_branch_contact_rel($branch_id,$contact_id);

                //insert into crm_lead_item
                CrmLead::insertleaditems($branch_id,$service,$address_id,$user_create);

                //insert into crm_lead_detail
                CrmLead::insertleaddetail($branch_id,$lead_status,$comment,$user_create);
                
                // return json_encode(["result"=>$address_id,$lead_id,$branch_id,$contact_id]);
                return json_encode(["result"=>"Success"]);
               
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead","result"=> $e->getMessage()]);
            }

       }
       else
       {
           return json_encode(['inser'=>'not found data']);
       }

    }

    //insert into table crm_lead_address
    public  static function insertaddress ($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create){
        if(isset($lead_id)){
            try{

                $result=DB::select('SELECT insert_crm_lead_address(?,?,?,?,?,?,?,?,?)',
                array(
                    $lead_id,
                    $address_type,
                    $home_en,
                    $home_kh,
                    $street_en,
                    $street_kh,
                    $latlong,
                    $addresscode,
                    $user_create
                )
            );
                return  $result;
            
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_address","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }
    //insert into table crm_lead_branch
    public  static function insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$address_id,$user_create){
        if(isset($lead_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT insert_crm_lead_branch(?,?,?,?,?,?,?)',
                array(
                    $lead_id,
                    $company_en,
                    $company_kh,
                    $primary_email,
                    $address_id,
                    'urgent',
                    $user_create
                )
            );
                return  $result;
            
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_branch","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }
    //insert into table crm_lead_assign
    public  static function insertassign ($branch_id,$assig_to,$user_create){
        if(isset($branch_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT insert_crm_lead_assign(?,?,?)',
                array(
                    $branch_id,
                    $assig_to,
                    $user_create
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_assign","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }
    //insert into table crm_lead_contact
    public  static function insertcontact($name_en,$name_kh,$email,$phone,$facebook_con,$position,$user_create,$national_id,$gender){
        if(isset($name_en)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT insert_crm_lead_contact(?,?,?,?,?,?,?,?,?)',
                array(
                    $name_en,
                    $name_kh,
                    $email,
                    $phone,
                    $facebook_con,
                    $position,
                    $user_create,
                    $national_id,
                    $gender
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_contact","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }
    //insert into table crm_lead_branch_contact_rel
     public  static function insert_branch_contact_rel($branch_id,$contact_id){
        if(isset($branch_id)){
            try{
                $result=DB::select('INSERT INTO crm_lead_branch_crm_lead_contact_rel(crm_lead_branch_id,crm_lead_contact_id) VALUES(?,?) ',
                array(
                    $branch_id,
                    $contact_id
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_branch_crm_lead_contact_rel","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }
    //insert into table crm_lead_items
    public  static function insertleaditems($branch_id,$service,$address_id,$user_create){
        if(isset($branch_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT insert_crm_lead_items(?,?,?,?)',
                array(
                    $branch_id,
                    $service,
                    $address_id,
                    $user_create
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_items","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }
    //insert into table crm_lead_items
    public  static function insertleaddetail($branch_id,$lead_status,$comment,$user_create){
        if(isset($branch_id)){
            try{
                $result=DB::select('SELECT insert_crm_lead_detail(?,?,?,?)',
                array(
                    $branch_id,
                    $lead_status,
                    $comment,
                    $user_create
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_detail","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }


}
