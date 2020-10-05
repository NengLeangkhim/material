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

    //get lead 
    public static function getlead(){
        return DB::select("SELECT  crm_lead.lead_number,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,3)) as province,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,5)) as district,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,7)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village
        from  crm_lead_branch_crm_lead_contact_rel lbc
        left JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lbc.crm_lead_branch_id
        JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        join crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        join stock_product sp on sp.id= clitem.stock_product_id 
        where ld.status=true and ld.is_deleted=false");
    }

}
