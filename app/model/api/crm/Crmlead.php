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
    // get Honorifics
    public static function gethonorifics(){
        return DB::select('SELECT * from select_ma_honorifics()');
    }
    // get lead current speed isp
    public static function leadcurrentspeedisp(){
        return DB::select('SELECT id,name_en,name_kh from crm_lead_current_isp where is_deleted=false and status=true');
    }
    //get lead  Branch 
    public static function leadBranch(){
        return DB::select('SELECT  id,branch as name,company,ma_company_branch_id  FROM "public"."ma_company_detail" Where status=true and is_deleted=false');
    }

    public static function insertLead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey)
    {
        
        if($lead_id!=='null')
        {           
             
            return CrmLead::addbranchinlead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
             $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
             $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
             $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey);
       
            
        }
        else
        {
         
            return Crmlead::addlead($con_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
            $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
            $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
            $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey);
            
        }
    }
    // add lead
    public static function addlead($con_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey){

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
                        $branch=CrmLead::insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$address_id,$user_create,$prioroty);
                        $branch_id=$branch[0]->insert_crm_lead_branch;
            
                        //insert into crm_lead_assign
                        CrmLead::insertassign ($branch_id,$assig_to,$user_create);
            
                        //insert into crm_lead_comtact
                        if($con_id!=='null')
                        {
                                $contact_id=$con_id;
                        }
                        else
                        {
                            $contact=CrmLead::insertcontact($name_en,$name_kh,$email,$phone,$facebook,$position,$user_create,$national_id,$gender);
                            $contact_id=$contact[0]->insert_crm_lead_contact;
                        }
                       
            
                        //insert into crm_lead_brach_contact_rel
                        CrmLead::insert_branch_contact_rel($branch_id,$contact_id);
            
                        //insert into crm_lead_item
                        CrmLead::insertleaditems($branch_id,$service,$address_id,$user_create);
            
                        //insert into crm_lead_detail
                        CrmLead::insertleaddetail($branch_id,$lead_status,$comment,$user_create);
                        
                         //insert into table crm_survey
                        // CrmLead::insertsurey($branch_id,$user_create);
                        if($checksurvey!=='null'){
                                // var_dump("No");
                                CrmLead::insertsurey($branch_id,$user_create);
                                return json_encode(["insert"=>"success"]);
                        }
                        else
                        {
                            return json_encode(["insert"=>"success"]);
                        }

                        // return json_encode(["result"=>$address_id,$lead_id,$branch_id,$contact_id]);
                      
                           
                }
                catch(Exception $e)
                {
                    return json_encode(["insert"=>"fail insert_lead","result"=> $e->getMessage()]);
                }
            
            }
            else
            {
               return json_encode(['insert'=>'not found data']);
            }

    }
    // add branch by lead id
    public static function addbranchinlead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey){

        // return "df";
        if(isset($company_en)){
                try{
                     //insert Into crm_lead_address
                     $address=Crmlead::insertaddress ($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create);
                     $address_id=$address[0]->insert_crm_lead_address;
         
                     //insert into crm_lead_branch
                     $branch=CrmLead::insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$address_id,$user_create,$prioroty);
                     $branch_id=$branch[0]->insert_crm_lead_branch;
         
                     //insert into crm_lead_assign
                     CrmLead::insertassign ($branch_id,$assig_to,$user_create);
         
                     //insert into crm_lead_comtact
                     if($con_id!=='null')
                     {
                             $contact_id=$con_id;
                     }
                     else
                     {
                         $contact=CrmLead::insertcontact($name_en,$name_kh,$email,$phone,$facebook,$position,$user_create,$national_id,$gender);
                         $contact_id=$contact[0]->insert_crm_lead_contact;
                     }
         
                     //insert into crm_lead_brach_contact_rel
                     CrmLead::insert_branch_contact_rel($branch_id,$contact_id);
         
                     //insert into crm_lead_item
                     CrmLead::insertleaditems($branch_id,$service,$address_id,$user_create);
         
                     //insert into crm_lead_detail
                     CrmLead::insertleaddetail($branch_id,$lead_status,$comment,$user_create);
                         
                     //insert into table crm_survey
                     if($checksurvey!=='null'){
                        // var_dump("No");
                        CrmLead::insertsurey($branch_id,$user_create);
                        return json_encode(["insert"=>"success"]);
                    }
                    else
                    {
                        return json_encode(["insert"=>"success"]);
                    }

                     // return json_encode(["result"=>$address_id,$lead_id,$branch_id,$contact_id]);
                    //  return json_encode(["insert"=>"success"]);
                }
                catch(Exception $e)
                {
                    return json_encode(["insert"=>"fail insert lead","result"=> $e->getMessage()]);
                }
            }
            else
            {
                return json_encode(['insert'=>'not found data']);
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
    public  static function insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$address_id,$user_create,$prioroty){
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
                    $prioroty,
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
    //insert into table crm_survey
    public  static function insertsurey($branch_id,$user_create){
        if(isset($branch_id)){
            try{
                $result=DB::select('SELECT insert_crm_survey(?,?)',
                array(
                    $branch_id,
                    $user_create
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_survey","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
        }

    }

    //get  all lead 
    // public static function getbranch(){
    //     return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
    //     lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
    //     crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
    //     lb.create_date as date_create_branch,
    //     lb.create_by as user_create_branch_id,ld.comment,lb.crm_lead_address_id,
    //      lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,
    //      lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,
    //     lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
    //     ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
    //     (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
    //     (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
    //     (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,2)) as province,
    //     (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,4)) as district,
    //     (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,6)) as commune,
    //     (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
	// 	(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id) as  survey_id,
	// 			(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id) as  survey_status,
	// 			(SELECT comment as survey_comment from crm_survey_result WHERE  id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id)),
	// 			(SELECT possible  from crm_survey_result WHERE  id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id))
    //     from  crm_lead_branch_crm_lead_contact_rel lbc
    //     left JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
    //     JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
    //     JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
    //     JOIN ma_user u on la.ma_user_id=u.id
    //     JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lbc.crm_lead_branch_id
    //     JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
    //     JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
    //     join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
    //     join crm_lead on crm_lead.id= lb.crm_lead_id
    //     join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
    //     join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
    //     JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
    //     join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
    //     join crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
    //     join stock_product sp on sp.id= clitem.stock_product_id 
    //     where ld.status=true and ld.is_deleted=false");
    // }
    //get  all lead 
    public static function getlead(){
        $lead= DB::select('SELECT * FROM  crm_lead  ORDER BY id ASC');
        return $lead;
    }
    // get branch by Lead id
    public static function getbranch_lead($id){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,lb.crm_lead_address_id,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,2)) as province,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,4)) as district,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,6)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id) as  survey_id,
				(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id) as  survey_status,
				(SELECT comment as survey_comment from crm_survey_result WHERE  id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id)),
				(SELECT possible  from crm_survey_result WHERE  id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id))
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
        where ld.status=true and ld.is_deleted=false  and  lb.crm_lead_id=$id");
    }
    //get   branch  by id
    public static function getbranchById($id){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,
        lb.create_by as user_create_branch_id,ld.comment,lb.crm_lead_address_id,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,2)) as province,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,4)) as district,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,6)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id) as  survey_id,
				(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id) as  survey_status,
				(SELECT comment as survey_comment from crm_survey_result WHERE  id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id)),
				(SELECT possible  from crm_survey_result WHERE  id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id))
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
        where ld.status=true and ld.is_deleted=false and lb.id=$id");
    }
    // update Branch
    public static function updatebranch($lead_address_id,$lead_detail_id,$lead_item_id,$lead_con_bran_id,$branch_id,$con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$assig_to_id,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey){

        try{
            // update address
            $address=Crmlead::updateleadaddress($lead_address_id,$user_create,$lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode);
            $address_id=$address[0]->update_crm_lead_address;
            // update branch
            $branch=Crmlead::updatetablebranch($branch_id,$user_create,$lead_id,$company_en,$company_kh,$primary_email,$address_id,$prioroty);
            $branch_id=$branch[0]->update_crm_lead_branch;
            //update assgin to
            Crmlead::updatetableassigto($assig_to_id,$user_create,$branch_id,$assig_to);            

            // update contact
            $contact=Crmlead::updatetablecontact($con_id,$user_create,$name_en,$name_kh,$email,$phone,$facebook_con,$position,$national_id,$gender);
            $contact_id=$contact[0]->update_crm_lead_contact;
            
            //update branch and contact rel
            Crmlead::updatetablebranch_contact_rel($lead_con_bran_id,$user_create,$branch_id,$contact_id);

            // update branch item 
             Crmlead::updatetableleaditem($lead_item_id,$user_create,$branch_id,$service,$address_id);

            // update lead detail
            Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,$lead_status,$comment);

            //insert into table crm_survey
            if($checksurvey!=='null'){
                // var_dump("No");
                CrmLead::insertsurey($branch_id,$user_create);
                return  json_encode(["update"=>'success']);
            }
            else
            {
                return  json_encode(["update"=>'success']);
            }

            
   
        }catch(Exception $e){
            return json_encode(["update"=>"fail update branch","result"=> $e->getMessage()]);
        }
    }
    //update in table branch
    public static function updateleadaddress($lead_address_id,$user_create,$lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode){
        // var_dump($lead_id);
        if(isset($lead_address_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_address(?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $lead_address_id,
                    $user_create,
                    $lead_id,
                    't',
                    $address_type,
                    $home_en,
                    $home_kh,
                    $street_en,
                    $street_kh,
                    $latlong,
                    $addresscode
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_address","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
        }
    }
    // update branch
    public static function updatetablebranch($branch_id,$user_create,$lead_id,$company_en,$company_kh,$primary_email,$address_id,$prioroty){
        if(isset($branch_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_branch(?,?,?,?,?,?,?,?,?)',
                array(
                    $branch_id,
                    $user_create,
                    $lead_id,
                    $company_en,
                    $company_kh,
                    $primary_email,
                    $address_id,
                    $prioroty,
                    't',
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_branch","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
        }
    }
    // update assig to 
    public static function updatetableassigto($assig_to_id,$user_create,$branch_id,$assig_to){
        if(isset($assig_to_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_assign(?,?,?,?,?)',
                array(
                    $assig_to_id,
                    $user_create,
                    $branch_id,
                    $assig_to,
                    't',
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_assign","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
            
        }
    }
    // update contact
    public static function updatetablecontact($con_id,$user_create,$name_en,$name_kh,$email,$phone,$facebook_con,$position,$national_id,$gender){
        if(isset($con_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_contact(?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $con_id,
                    $user_create,
                    $name_en,
                    $name_kh,
                    $email,
                    $phone,
                    $facebook_con,
                    $position,
                    't',
                    $national_id,
                    $gender
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_contact","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
            
        }
    }
    // update branch and contact rel
    public static function updatetablebranch_contact_rel($lead_con_bran_id,$user_create,$branch_id,$contact_id){
        if(isset($lead_con_bran_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_branch_crm_lead_contact_rel(?,?,?,?,?)',
                array(
                    $lead_con_bran_id,
                    $user_create,
                    $branch_id,
                    $contact_id,
                    't',
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_branch_crm_lead_contact_rel","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
            
        }
    }
    // update branch item
    public static function updatetableleaditem($lead_item_id,$user_create,$branch_id,$service,$address_id){
        if(isset($lead_item_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_items(?,?,?,?,?,?)',
                array(
                    $lead_item_id,
                    $user_create,
                    $branch_id,
                    $service,
                    $address_id,
                    't',
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_items","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
            
        }
    }
    // update lead detail 
    public static function updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,$lead_status,$comment){
        if(isset($lead_detail_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_detail(?,?,?,?,?,?)',
                array(
                    $lead_detail_id,
                    $user_create,
                    $branch_id,
                    $lead_status,
                    $comment,
                    't',
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_detail","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
            
        }
    }

    // Model convert branch
    public static function convertbranch($id,$userid,$detail_id,$comment){
        // var_dump($id,$userid,$detail_id);
        if(isset($detail_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_detail(?,?,?,?,?,?)',
                array(
                    $detail_id,
                    $userid,
                    $id,
                    2,
                    $comment,
                    'f',
                )
            );
                return  $result;
                // var_dump($result);
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_detail","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['update'=>'not found data']);
            
        }

    }
    //Model get survey
    public static function getsurvey(){
        return DB::select('SELECT lb.id as branch_id , cs.id as survey_id, lb.name_en,lb.name_kh,cs.create_date,cs.create_by,
        cla.address_type,cla.home_kh,cla.hom_en,cla.street_en,cla.street_kh,cla.latlg,cla.gazetteer_code,
        (SELECT  get_gazetteers_address(cla.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(cla.gazetteer_code) ) as address_en
         from crm_survey cs
        join crm_lead_branch lb on lb.id =cs.crm_lead_branch_id
        join crm_lead_address cla on cla.id=lb.crm_lead_address_id
        WHERE cs.is_deleted=FALSE and cs.status=TRUE ORDER BY cs.create_date DESC');
    }
    //MOdel get survey by branch id
    public static function getsurveybyid($id){
        return DB::select("SELECT lb.id as branch_id , cs.id as survey_id, lb.name_en,lb.name_kh,cs.create_date,cs.create_by,
        cla.address_type,cla.home_kh,cla.hom_en,cla.street_en,cla.street_kh,cla.latlg,cla.gazetteer_code,
        (SELECT  get_gazetteers_address(cla.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(cla.gazetteer_code) ) as address_en
         from crm_survey cs
        join crm_lead_branch lb on lb.id =cs.crm_lead_branch_id
        join crm_lead_address cla on cla.id=lb.crm_lead_address_id
        WHERE cs.is_deleted=FALSE and cs.status=TRUE and lb.id=$id");
    }
    //Model insert​ Survey result
    public static function insertsurveyresult($survey_id,$userid,$possible,$comment,$branch_id){
        if(isset($survey_id)){
            try{
                    DB::select('SELECT insert_crm_survey_result(?,?,?,?)',
                    array(
                        $survey_id,
                        $possible,
                        $userid,
                        $comment,
                    )
                );
                try{

                     DB::select('SELECT update_crm_survey(?,?,?,?)',
                    array(
                        $survey_id,
                        $userid,
                        $branch_id,
                        'f',
                    )
                );
                    return json_encode(['insert'=>'success']);
                }catch(Exception $e){
                    return json_encode(["insert"=>"fail update_crm_survey","result"=> $e->getMessage()]);
                }
               
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_survey_result","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['insert'=>'not found data']);
            
        }
    }
    // Model get schdule type
    public static function getschduletype(){
         return DB::select('SELECT id,name_en,name_kh from crm_lead_schedule_type where is_deleted=FALSE and status=TRUE');
    }
    //Model insert​ schdule type
    public static function insertschduletype($userid,$name_en,$name_kh){
        if(isset($userid)){
            try{
                $result=DB::select('SELECT insert_crm_lead_schedule_type(?,?,?,?)',
                array(
                    $name_en,
                    $name_kh,
                    't',
                    $userid,
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_schedule_type","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['insert'=>'not found data']);
            
        }
    }
    //update schedule type
    public static function updateschduletype($schedule_id,$userid,$name_en,$name_kh,$status){
        if(isset($schedule_id)){
            try{
                $result=DB::select('SELECT update_crm_lead_schedule_type(?,?,?,?,?,?)',
                array(
                    $schedule_id,
                    $userid,
                    $name_en,
                    $name_kh,
                    't',
                    $status
                  
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail update_crm_lead_schedule_type","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['insert'=>'not found data']);
            
        }
    }
}
