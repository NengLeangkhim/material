<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\SSP;
use Exception;

class Crmlead extends Model
{

    //get user from login
    public static function getUser(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        if(isset($userid)){
            try{
                $result= DB::select("SELECT CONCAT(last_name_en,' ',first_name_en) as fullname,email,contact,ma_company_dept_id,
                ma_position_id,ma_position.name as ma_position_name,ma_position.ma_group_id,ma_group.name as ma_group_name
                FROM ma_user
                JOIN ma_position on ma_position.id= ma_user.ma_position_id
                JOIN ma_group on ma_group.id=ma_position.ma_group_id
                WHERE ma_user.id=$userid and ma_user.is_deleted=FALSE and ma_user.status=TRUE");

                return json_encode(["data"=>$result]);
            }catch(Exception $e){
                return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
            }
        }
        else{
            return json_encode(["insert"=>'Not found data']);
        }

    }
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
                return json_encode(["insert"=>'success']);
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
                return json_encode(["insert"=>'success']);
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

    public static function saveLeadStatus($id = null, $userId, $nameEn, $nameKh, $status = true, $sequence = null){

        try {
            if($id != null){
                $leadStatus = Crmlead::getOneLeadStatus($id);
                $nameEn = ($nameEn == null || $nameEn == '') ? $leadStatus->name_en : $nameEn;
                $nameKh = ($nameKh == null || $nameKh == '') ? $leadStatus->name_kh : $nameKh;
                $status = ($status == null || $status == '') ? $leadStatus->status : $status;
                $sequence = ($sequence == null || $sequence == '') ? $leadStatus->sequence : $sequence;
                $sql = 'select update_crm_lead_status as id from update_crm_lead_status('.$id.', '.$userId.', \''.$nameEn.'\', \''.$nameKh.'\', true, '.$sequence.')';
            } else {
                $sql = 'select insert_crm_lead_status(\''.$nameEn.'\', \''.$nameKh.'\', '.$userId.', '.$sequence.') as id';
            }
            $newId = DB::selectOne($sql)->id;
            $result = Crmlead::getOneLeadStatus($newId);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public static function getOneLeadStatus($id){
        try {
            $result = DB::selectOne('SELECT * from crm_lead_status WHERE id = '.$id);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public static function getAllLeadStatus(){
        try {
            $result = DB::select('SELECT * from crm_lead_status WHERE status = true and is_deleted = false');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
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
            // ['ma_company_dept.id', '=', 5]
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
        if (! $user = \JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }
        return DB::select('SELECT  id,branch as name,company,ma_company_branch_id
        FROM "public"."ma_company_detail" Where status=true and is_deleted=false
        and ma_company_id=(select ma_company_id from ma_company_detail where id=(select ma_company_detail_id from ma_user where id=?))',[$userid]);
    }

    public static function insertLead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,$primary_phone,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey)
    {


            if($lead_id!=0)
            {
                // dd('branch');
                return CrmLead::addbranchinlead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,$primary_phone,
                 $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
                 $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
                 $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey);


            }
            else
            {
                // dd('lead');
                return Crmlead::addlead($con_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,$primary_phone,
                $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
                $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
                $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey);

            }

    }
    // add lead
    public static function addlead($con_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,$primary_phone,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey){

        if(isset($company_en)){
            DB::beginTransaction();
                try {

                    // insert into table crm_lead
                    $result= DB::select('SELECT "public".insert_crm_lead(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                        array(
                            $company_en,
                            $company_kh,
                            $primary_email,
                            $primary_phone,
                            $website,
                            $facebook,
                            $lead_source,
                            $user_create,
                            8,
                            $company_branch,
                            $lead_industry,
                            $current_speed_isp,
                            $employee_count,
                            $current_speed."",
                            $current_price,
                            $vat_number,
                            )

                        );
                        // dd($result);
                        $lead_id=$result[0]->insert_crm_lead;

                        //insert Into crm_lead_address
                        $address=Crmlead::insertaddress ($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create);
                        $address_id=$address[0]->insert_crm_lead_address;


                        //insert into crm_lead_branch
                        $branch=CrmLead::insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$primary_phone,$address_id,$user_create,$prioroty);
                        $branch_id=$branch[0]->insert_crm_lead_branch;


                        //insert into crm_lead_assign
                        CrmLead::insertassign ($branch_id,$assig_to,$user_create);

                        //insert into crm_lead_comtact
                        $contact_id=null;
                        if($con_id=='null' && $name_kh==null)
                        {
                            // dd("no contact");
                                //insert into crm_lead_brach_contact_rel
                            // CrmLead::insert_branch_contact_rel($branch_id,$contact_id);

                            //insert into crm_lead_item
                            CrmLead::insertleaditems($branch_id,$service,$address_id,$user_create);

                            //insert into crm_lead_detail
                            CrmLead::insertleaddetail($branch_id,$lead_status,$comment,$user_create);

                            //insert into table crm_survey
                            if($checksurvey!='null' && $checksurvey==1 ){
                                    // var_dump("No");
                                    CrmLead::insertsurey($branch_id,$user_create);
                                    DB::commit();
                                    return json_encode(["insert"=>"success"]);
                            }
                            else
                            {
                                DB::commit();
                                return json_encode(["insert"=>"success"]);
                            }
                        }
                        else
                        {
                            // dd("contact");
                            $contact=CrmLead::insertcontact($name_en,$name_kh,$email,$phone,$facebook_con,$position,$user_create,$national_id,$gender);
                            $contact_id=$contact[0]->insert_crm_lead_contact;
                            //insert into crm_lead_brach_contact_rel
                            CrmLead::insert_branch_contact_rel($branch_id,$contact_id);

                            //insert into crm_lead_item
                            CrmLead::insertleaditems($branch_id,$service,$address_id,$user_create);

                            //insert into crm_lead_detail
                            CrmLead::insertleaddetail($branch_id,$lead_status,$comment,$user_create);

                            //insert into table crm_survey
                            if($checksurvey!=='null' || $checksurvey=='yes' ){
                                    // var_dump("No");
                                    CrmLead::insertsurey($branch_id,$user_create);
                                    DB::commit();
                                    return json_encode(["insert"=>"success"]);
                            }
                            else
                            {
                                DB::commit();
                                return json_encode(["insert"=>"success"]);
                            }
                        }


                        

                        // return json_encode(["result"=>$address_id,$lead_id,$branch_id,$contact_id]);


                } catch(Exception $e){
                    DB::rollback();
                    return json_encode(["insert"=>"fail insert_lead","result"=> $e->getMessage()]);
                }

            }
            else
            {
               return json_encode(['insert'=>'not found data']);
            }

    }
    // add branch by lead id
    public static function addbranchinlead($con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,$primary_phone,
    $vat_number,$company_branch,$lead_source,$lead_status,$lead_industry,$assig_to,$service,$current_speed_isp,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey){

        
        // return "df";
        if(isset($company_en)){
            DB::beginTransaction();
                try {
                     //insert Into crm_lead_address
                     $address=Crmlead::insertaddress ($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create);
                     $address_id=$address[0]->insert_crm_lead_address;
                    //  dd($address);

                     //insert into crm_lead_branch
                     $branch=CrmLead::insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$primary_phone,$address_id,$user_create,$prioroty);
                     $branch_id=$branch[0]->insert_crm_lead_branch;

                     //insert into crm_lead_assign
                     CrmLead::insertassign ($branch_id,$assig_to,$user_create);

                     //insert into crm_lead_comtact
                     if($con_id!=='null')
                     {
                             $contact_id=$con_id;
                            //  dd($con_id);
                     }
                     else
                     {
                         $contact=CrmLead::insertcontact($name_en,$name_kh,$email,$phone,$facebook_con,$position,$user_create,$national_id,$gender);
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
                        DB::commit();
                        return json_encode(["insert"=>"success"]);
                    }
                    else
                    {
                        DB::commit();
                        return json_encode(["insert"=>"success"]);
                    }

                     // return json_encode(["result"=>$address_id,$lead_id,$branch_id,$contact_id]);
                    //  return json_encode(["insert"=>"success"]);
                }
                catch(Exception $e)
                {
                    DB::rollback();
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
    public  static function insertbranch ($lead_id,$company_en,$company_kh,$primary_email,$primary_phone,$address_id,$user_create,$prioroty){
        if(isset($lead_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT insert_crm_lead_branch(?,?,?,?,?,?,?,?)',
                array(
                    $lead_id,
                    $company_en,
                    $company_kh,
                    $primary_email,
                    $primary_phone,
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
        // dd($name_en,$name_kh,$email,$phone,$facebook_con,$position,$user_create,$national_id,$gender);
        // if(isset($name_en)){
            try{
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
                return $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_contact","result"=> $e->getMessage()]);
            }
        // }
        // else
        // {
        //     return json_encode(['inser'=>'not found data']);
        // }

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
    //Get Lead sql
    private static function getLeadSql(){
        return "SELECT cl.id as lead_id,cl.lead_number,cl.customer_name_en,cl.customer_name_kh,cl.email,cl.phone,cl.website,cl.facebook,cl.create_date,
        cl.employee_count,cl.current_isp_speed,cl.current_isp_price,cl.vat_number,cl.create_by,cl.ma_company_detail_id,cl.crm_lead_source_id,
        cl.crm_lead_industry_id,cl.crm_lead_current_isp_id,cl.status
        from crm_lead cl
        WHERE  cl.is_deleted=FALSE and cl.status=TRUE";
    }
    //get  all lead
    public static function getlead(){
        $lead= DB::select(self::getLeadSql());
        return $lead;
    }
    public static function getleadDataTable($request){
        $table = '('.self::getLeadSql().') as foo';

        // Table's primary key
        $primaryKey = 'lead_id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'lead_number', 'dt' => 0 ),
            array( 'db' => 'customer_name_en', 'dt' => 1 ),
            array( 'db' => 'email',  'dt' => 2 ),
            array( 'db' => 'phone',   'dt' => 3 ),
            array( 'db' => 'lead_id',     'dt' => 4 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
     //get  all lead for add lead
     public static function getAddLead(){
        $lead= DB::select('SELECT  cl.id as lead_id,cl.lead_number,cl.customer_name_en,cl.customer_name_kh,cl.email,cl.phone,cl.website,cl.facebook,cl.create_date,
        cl.employee_count,cl.current_isp_speed,cl.current_isp_price,cl.vat_number,cl.create_by,cl.ma_company_detail_id,mcd.company,cl.crm_lead_source_id,cls.name_en as lead_source,
        cl.crm_lead_industry_id,cli.name_en as lead_industry,cl.crm_lead_current_isp_id,clci.name_en as current_isp_name,cl.status
        from crm_lead cl
        LEFT JOIN ma_company_detail mcd on mcd.id = cl.ma_company_detail_id
        LEFT JOIN crm_lead_source cls on cls.id = cl.crm_lead_source_id
        LEFT JOIN crm_lead_industry  cli on  cli.id = cl.crm_lead_industry_id
        LEFT JOIN crm_lead_current_isp clci on clci.id = cl.crm_lead_current_isp_id
        WHERE  cl.is_deleted=FALSE and cl.status=TRUE  ORDER BY cl.lead_number DESC ');
        return $lead;
    }
     //get lead by assisgto
     private static function getLeadbyassgintoSql($userid){
         return "SELECT  cl.id as lead_id,cl.lead_number,cl.customer_name_en,cl.customer_name_kh,cl.email,cl.phone,cl.website,cl.facebook,cl.create_date,
         cl.employee_count,cl.current_isp_speed,cl.current_isp_price,cl.vat_number,cl.create_by,cl.ma_company_detail_id,cl.crm_lead_source_id,
         cl.crm_lead_industry_id,cl.crm_lead_current_isp_id
         from crm_lead cl
         LEFT JOIN crm_lead_industry  cli on  cli.id = cl.crm_lead_industry_id
         LEFT JOIN crm_lead_current_isp clci on clci.id = cl.crm_lead_current_isp_id
                 JOIN crm_lead_branch clb on clb.crm_lead_id = cl.id
                 JOIN crm_lead_detail cld on cld.crm_lead_branch_id = clb.id
                 JOIN crm_lead_assign cla  on  cla.crm_lead_branch_id= clb.id
         WHERE  cl.is_deleted=FALSE and cl.status=TRUE and cld.status=TRUE  and cla.ma_user_id=$userid GROUP BY cl.id ORDER BY cl.lead_number DESC ";
     }
    public static function getLeadbyassginto($userid){
        $lead= DB::select(self::getLeadbyassgintoSql($userid));
        return $lead;
    }

    public static function getLeadbyassgintoDataTable($request,$userid){
        $table = '('.self::getLeadbyassgintoSql($userid).') as foo';

        // Table's primary key
        $primaryKey = 'lead_id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'lead_number', 'dt' => 0 ),
            array( 'db' => 'customer_name_en', 'dt' => 1 ),
            array( 'db' => 'email',  'dt' => 2 ),
            array( 'db' => 'phone',   'dt' => 3 ),
            array( 'db' => 'lead_id',     'dt' => 4 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
    //get   lead  by id
    public static function getleadbyid($id){
        $lead= DB::select("SELECT  cl.id as lead_id,cl.lead_number,cl.customer_name_en,cl.customer_name_kh,cl.email,cl.phone,cl.website,cl.facebook,cl.create_date,
        cl.employee_count,cl.current_isp_speed,cl.current_isp_price,cl.vat_number,cl.create_by,cl.ma_company_detail_id,mcd.company,cl.crm_lead_source_id,cls.name_en as lead_source,
        cl.crm_lead_industry_id,cli.name_en as lead_industry,cl.crm_lead_current_isp_id,clci.name_en as current_isp_name,cl.status
        from crm_lead cl
        LEFT JOIN ma_company_detail mcd on mcd.id = cl.ma_company_detail_id
        LEFT JOIN crm_lead_source cls on cls.id = cl.crm_lead_source_id
        LEFT JOIN crm_lead_industry  cli on  cli.id = cl.crm_lead_industry_id
        LEFT JOIN crm_lead_current_isp clci on clci.id = cl.crm_lead_current_isp_id
        WHERE cl.id=$id and  cl.is_deleted=FALSE and cl.status=TRUE ORDER BY cl.lead_number DESC");
        return $lead;
    }
    // get branch by Lead id
    public static function getbranch_lead($id){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,ls.id as status_id,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,lb.crm_lead_address_id,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,lb.phone as branch_phone,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC  LIMIT 1) as  survey_id,
		(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_status,
		(SELECT comment as survey_comment from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
		(SELECT possible  from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date  DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
        (SELECT id from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_id,
		(SELECT status from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_status
        from  crm_lead_branch_crm_lead_contact_rel lbc
        right JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        left JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        left JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lb.id
        left JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        left JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        left join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        left join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        left JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        left join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        LEFT JOIN crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        LEFT JOIN stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=true and ld.is_deleted=false and lb.crm_lead_id=$id");
    }
    //get branch by lead id convert
    public static function getbranch_lead_convert($id){
        return DB::select("SELECT *,(SELECT  get_gazetteers_address_en((select gazetteer_code from crm_lead_address where id = clb.crm_lead_address_id)) ) as address_en from crm_lead_branch clb where crm_lead_id=$id and is_deleted=false and status=true;");
    }
    // get branch by  assig to
    public static function getbranch_leadbyassigto($id,$userid){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,ls.id as status_id,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,lb.crm_lead_address_id,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,lb.phone as branch_phone,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC  LIMIT 1) as  survey_id,
		(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_status,
		(SELECT comment as survey_comment from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
		(SELECT possible  from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date  DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
        (SELECT id from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_id,
		(SELECT status from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_status
        from  crm_lead_branch_crm_lead_contact_rel lbc
        left JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lb.id
        JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        LEFT JOIN crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        LEFT JOIN crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        LEFT JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        LEFT JOIN crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        LEFT JOIN crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        LEFT JOIN stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=true and ld.is_deleted=false  and  lb.crm_lead_id=$id and  la.ma_user_id=$userid");
    }
    //get   branch  by id
    public static function getbranchById($id){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,ls.id as status_id,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,lb.crm_lead_address_id,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,lb.phone as branch_phone,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC  LIMIT 1) as  survey_id,
		(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_status,
		(SELECT comment as survey_comment from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
		(SELECT possible  from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date  DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
        (SELECT id from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_id,
		(SELECT status from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_status
        from  crm_lead_branch_crm_lead_contact_rel lbc
        right JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        left JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        left JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lb.id
        left JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        left JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        left join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        left join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        left JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        left join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        LEFT JOIN crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        LEFT JOIN stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=true and ld.is_deleted=false and  lb.id=$id");
    }
    //
    public static function getbranchByIdconvert($id){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,ls.id as status_id,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,lb.crm_lead_address_id,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,lb.phone as branch_phone,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC  LIMIT 1) as  survey_id,
		(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_status,
		(SELECT comment as survey_comment from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
		(SELECT possible  from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date  DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
        (SELECT id from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_id,
		(SELECT status from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_status
        from  crm_lead_branch_crm_lead_contact_rel lbc
        right JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        left JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        left JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lb.id
        left JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        left JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        left join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        left join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        left JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        left join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        LEFT JOIN crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        LEFT JOIN stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=false and ld.is_deleted=false and  lb.id=$id");
    }
    //get   branch  by id
    public static function getbranchByIdConverted($id){
        return DB::select("SELECT  crm_lead.lead_number,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,ls.id as status_id,
        lb.create_by as user_create_branch_id,ld.comment,lb.crm_lead_address_id,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,lb.phone as branch_phone,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_id,
		(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_status,
		(SELECT comment as survey_comment from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
		(SELECT possible  from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date  DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
        (SELECT id from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_id,
		(SELECT status from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_status
        from  crm_lead_branch_crm_lead_contact_rel lbc
        left JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lb.id
        JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        left JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        left join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        left join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        left JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        left join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        LEFT JOIN crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        LEFT JOIN stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=false and ld.is_deleted=false and lb.id=$id");
    }
    // update Branch
    public static function updatebranch($lead_address_id,$lead_detail_id,$lead_item_id,$lead_con_bran_id,$branch_id,$con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$lead_industry,$assig_to,$assig_to_id,$service,$current_speed_isp,$primary_phone,
    $current_speed,$current_price,$employee_count,$name_kh,$name_en,$gender,$email,$facebook_con,$phone,$position,$national_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode,$comment,$prioroty,$checksurvey,$survey_id){

        try{
            DB::beginTransaction();
            // update address
            $address=Crmlead::updateleadaddress($lead_address_id,$user_create,$lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode);
            $address_id=$address[0]->update_crm_lead_address;
            // update branch
            $branch=Crmlead::updatetablebranch($branch_id,$user_create,$lead_id,$company_en,$company_kh,$primary_email,$primary_phone,$address_id,$prioroty);
            $branch_id=$branch[0]->update_crm_lead_branch;
            // dd($branch_id);
            //update assgin to
            Crmlead::updatetableassigto($assig_to_id,$user_create,$branch_id,$assig_to);

            // update contact
            $contact_branch=DB::select("SELECT id FROM crm_lead_branch_crm_lead_contact_rel where crm_lead_branch_id=$branch_id and status=TRUE and is_deleted=FALSE");
           
            if($contact_branch==null && $con_id!=null ){

                    //insert into crm_lead_brach_contact_rel
                    CrmLead::insert_branch_contact_rel($branch_id,$con_id);
            }
            else {
                    $contact=Crmlead::updatetablecontact($con_id,$user_create,$name_en,$name_kh,$email,$phone,$facebook_con,$position,$national_id,$gender);
                    $contact_id=$contact[0]->update_crm_lead_contact;
                     //update branch and contact rel
                    Crmlead::updatetablebranch_contact_rel($lead_con_bran_id,$user_create,$branch_id,$contact_id);
            }

            

            // update branch item
             Crmlead::updatetableleaditem($lead_item_id,$user_create,$branch_id,$service,$address_id);

            // update lead detail
            // Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,$lead_status,$comment);
            
                // get check branch have id in table survey ot not
                $survey=DB::select("SELECT id from crm_survey where is_deleted=FALSE and status=TRUE and crm_lead_branch_id=$branch_id ");
                // get status of branch the last
                $branch_status_id=DB::select("SELECT crm_lead_status_id FROM crm_lead_detail where status=TRUE and is_deleted=FALSE and crm_lead_branch_id=$branch_id");
                $branch_status_id=$branch_status_id[0]->crm_lead_status_id;
                
                if($survey==null && $checksurvey=="null"){ //update lead detail 
                    // update lead detail
                    Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,$branch_status_id,$comment);
                    DB::commit();
                    return  json_encode(["update"=>'success']);
                    // dd("update lead detail 1 ");
                }
                elseif($survey==null && $checksurvey=='yes'){ // insert survey and update lead
                    Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,3,$comment);
                    CrmLead::insertsurey($branch_id,$user_create);                    
                    DB::commit();
                    return  json_encode(["update"=>'success']);
                    // dd("insert survey and update lead ");
                }
                elseif($survey==null && $checksurvey=='no'){ //update lead detail
                    // update lead detail
                    Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,$branch_status_id,$comment);
                    DB::commit();
                    return  json_encode(["update"=>'success']);
                    // dd("update lead detail 2");
                }
                elseif($survey!=null && $checksurvey=='yes' ){ //update lead detail
                    // update lead detail
                    Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,$branch_status_id,$comment);
                    DB::commit();
                    return  json_encode(["update"=>'success']);
                    // dd("update lead detail  3");
                }
                else{ //update lead detail and update survey 
                    crmLead::updatesurey($survey_id,$branch_id,$user_create);
                    Crmlead::updatetavleleaddetail($lead_detail_id,$user_create,$branch_id,1,$comment);
                    DB::commit();
                    return  json_encode(["update"=>'success']);
                    // dd("update lead detail and update survey");
                }
        }catch(Exception $e){
            DB::rollback();
            return json_encode(["update"=>"fail update branch","result"=> $e->getMessage()]);
        }
    }
     //update into table crm_survey
     public  static function updatesurey($survey_id,$branch_id,$user_create){
        if(isset($survey_id)){
            try{
                $result=DB::select('SELECT update_crm_survey(?,?,?,?)',
                array(
                    $survey_id,
                    $user_create,
                    $branch_id,
                    'f',
                )
            );
                return  $result;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail update_crm_survey","result"=> $e->getMessage()]);
            }
        }
        else
        {
            return json_encode(['inser'=>'not found data']);
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
    public static function updatetablebranch($branch_id,$user_create,$lead_id,$company_en,$company_kh,$primary_email,$primary_phone,$address_id,$prioroty){
        if(isset($branch_id)){
            try{
                // $priority='urgent';
                $result=DB::select('SELECT update_crm_lead_branch(?,?,?,?,?,?,?,?,?,?)',
                array(
                    $branch_id,
                    $user_create,
                    $lead_id,
                    $company_en,
                    $company_kh,
                    $primary_email,
                    $primary_phone,
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
                    $assig_to,
                    $user_create,
                    $branch_id,
                    $assig_to_id,
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
        $survey =DB::select("SELECT * from crm_survey where crm_lead_branch_id=$id and status=TRUE and is_deleted=FALSE");       
            if($survey==[]){
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
            else
            {
                return  "error";
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
    // Model get  all survey result
    public static function getsurveyresult(){
        return DB::select("SELECT csr.id as crm_survey_result_id,cs.id as crm_survey_id,lb.id as branch_id ,cs.crm_lead_branch_id,cs.create_by as survey_create_by,
        csr.possible,csr.create_by,csr.create_date,comment,lb.name_en,lb.name_kh,cla.address_type,
        cla.home_kh,cla.hom_en,cla.street_en,cla.street_kh,cla.latlg,cla.gazetteer_code,
        (SELECT  get_gazetteers_address(cla.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(cla.gazetteer_code) ) as address_en
        from crm_survey_result csr
        JOIN crm_survey cs on cs.id=csr.crm_survey_id
        join crm_lead_branch lb on lb.id =cs.crm_lead_branch_id
         join crm_lead_address cla on cla.id=lb.crm_lead_address_id
        WHERE  csr.is_deleted=FALSE and csr.status=TRUE ");
    }
     // Model get survey result by user  create
    public static function getsurveyresultbycreate($id){
        return DB::select("SELECT csr.id as crm_survey_result_id,cs.id as crm_survey_id,lb.id as branch_id ,cs.crm_lead_branch_id,cs.create_by as survey_create_by,
        csr.possible,csr.create_by,csr.create_date,comment,lb.name_en,lb.name_kh,cla.address_type,
        cla.home_kh,cla.hom_en,cla.street_en,cla.street_kh,cla.latlg,cla.gazetteer_code,
        (SELECT  get_gazetteers_address(cla.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(cla.gazetteer_code) ) as address_en
        from crm_survey_result csr
        JOIN crm_survey cs on cs.id=csr.crm_survey_id
        join crm_lead_branch lb on lb.id =cs.crm_lead_branch_id
         join crm_lead_address cla on cla.id=lb.crm_lead_address_id
        WHERE  csr.is_deleted=FALSE and csr.status=TRUE and csr.create_by=$id");
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
    public static function insertsurveyresult($survey_id,$userid,$possible,$comment,$branch_id,$lead_detail_id,$comment_branch){
      
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
                try {
                      $comment=$comment_branch;
                    Crmlead::updatetavleleaddetail($lead_detail_id,$userid,$branch_id,4,$comment);
                    return json_encode(['insert'=>'success']);
                } catch (Exception $e) {
                    return json_encode(["update"=>"fail update_crm_lead_detail","result"=> $e->getMessage()]);
                }
                    
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
    public static function getschduletype($id){
         return DB::select("SELECT id,name_en,name_kh from crm_lead_schedule_type where is_deleted=FALSE and status=TRUE and is_result_type=$id");
    }
    //Model get all schdule
    public static function getschedule(){
           return DB::select("SELECT cls.id as schedule_id,cls.crm_lead_branch_id,cls.name_en,cls.name_kh,to_char(cls.to_do_date,'YYYY-MM-DD') as to_do_date,cls.comment,cls.priority,cls.create_by,
           clb.name_en as name_branch_en,clb.name_kh as name_branch_kh,cla.ma_user_id,cls.crm_lead_schedule_type_id,clst.name_en as schedule_type,cls.status,
           clsr.id as schedule_result_id,clsr.comment as  comment_result, clsr.crm_lead_schedule_type_id as crm_lead_schedule_type_result_id,clsr.create_date,clsr.create_by as user_create_schedule_result
           FROM crm_lead_schedule  cls
           LEFT JOIN  crm_lead_branch clb on clb.id = cls.crm_lead_branch_id
           JOIN crm_lead_assign cla  on  cla.crm_lead_branch_id= clb.id
           LEFT JOIN crm_lead_schedule_type clst  on clst.id=cls.crm_lead_schedule_type_id
           LEFT JOIN crm_lead_schedule_result clsr on clsr.crm_lead_schedule_id= cls.id
           WHERE cls.is_deleted=FALSE and cls.status=TRUE  ");
    }
    //Model get all schdule by user create
    public static function getschedulebyuser($id){
        return DB::select("SELECT cls.id as schedule_id,cls.crm_lead_branch_id,cls.name_en,cls.name_kh,to_char(cls.to_do_date,'YYYY-MM-DD') as to_do_date,cls.comment,cls.priority,cls.create_by,
            clb.name_en as name_branch_en,clb.name_kh as name_branch_kh,cla.ma_user_id,cls.crm_lead_schedule_type_id,clst.name_en as schedule_type,cls.status,
		    clsr.id as schedule_result_id,clsr.comment as  comment_result, clsr.crm_lead_schedule_type_id as crm_lead_schedule_type_result_id,clsr.create_date,clsr.create_by as user_create_schedule_result
            FROM crm_lead_schedule  cls
            LEFT JOIN  crm_lead_branch clb on clb.id = cls.crm_lead_branch_id
            JOIN crm_lead_assign cla  on  cla.crm_lead_branch_id= clb.id
            LEFT JOIN crm_lead_schedule_type clst  on clst.id=cls.crm_lead_schedule_type_id
			LEFT JOIN crm_lead_schedule_result clsr on clsr.crm_lead_schedule_id= cls.id
            WHERE cls.is_deleted=FALSE and cls.status=TRUE  and clsr.create_by=$id");
 }
    // Model get schedule by id
    public static function getschedulebyid($id){
        return DB::select("SELECT cls.id as schedule_id,cls.crm_lead_branch_id,cls.name_en,cls.name_kh,to_char(cls.to_do_date,'YYYY-MM-DD') as to_do_date,cls.comment,cls.priority,cls.create_by,
        clb.name_en as name_branch_en,clb.name_kh as name_branch_kh,cla.ma_user_id,cls.crm_lead_schedule_type_id,clst.name_en as schedule_type,cls.status,
        clsr.id as schedule_result_id,clsr.comment as  comment_result, clsr.crm_lead_schedule_type_id as crm_lead_schedule_type_result_id,clsr.create_date,clsr.create_by as user_create_schedule_result
        FROM crm_lead_schedule  cls
        LEFT JOIN  crm_lead_branch clb on clb.id = cls.crm_lead_branch_id
        JOIN crm_lead_assign cla  on  cla.crm_lead_branch_id= clb.id
        LEFT JOIN crm_lead_schedule_type clst  on clst.id=cls.crm_lead_schedule_type_id
        LEFT JOIN crm_lead_schedule_result clsr on clsr.crm_lead_schedule_id= cls.id
        WHERE cls.is_deleted=FALSE and cls.status=TRUE  and cls.id=$id");
    }
    //Model get all schdule by assgto
    // public static function getschedulebyassigto($id){
    //     return DB::select("SELECT cls.id as schedule_id,cls.crm_lead_branch_id,cls.name_en,cls.name_kh,cls.to_do_date,cls.comment,cls.priority,cls.create_by,
    //        clb.name_en as name_branch_en,clb.name_kh as name_branch_kh,cla.ma_user_id
    //        FROM crm_lead_schedule  cls
    //        LEFT JOIN  crm_lead_branch clb on clb.id = cls.crm_lead_branch_id
    //        JOIN crm_lead_assign cla  on  cla.crm_lead_branch_id= clb.id
    //        where cls.is_deleted=FALSE and cls.status=TRUE and  cla.ma_user_id=$id");
    // }
    //Model insert​ schdule type
    public static function insertscheduletype($userid,$name_en,$name_kh,$result_type){
        if(isset($userid)){
            try{
                $result=DB::select('SELECT insert_crm_lead_schedule_type(?,?,?,?)',
                array(
                    $name_en,
                    $name_kh,
                    $result_type,
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
    public static function updatescheduletype($schedule_id,$userid,$name_en,$name_kh,$status,$result_type){
        if(isset($schedule_id)){
            try{
                $result=DB::select('SELECT update_crm_lead_schedule_type(?,?,?,?,?,?)',
                array(
                    $schedule_id,
                    $userid,
                    $name_en,
                    $name_kh,
                    $result_type,
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
    //insert schedule
    public static function insertschedule($branch_id,$name_en,$name_kh,$to_do_date,$comment,$priority,$schedule_type_id,$userid){
        if(isset($branch_id)){
            try{
                $result=DB::select('SELECT insert_crm_lead_schedule(?,?,?,?,?,?,?,?)',
                array(
                    $branch_id,
                    $name_en,
                    $name_kh,
                    $to_do_date,
                    $comment,
                    $priority,
                    $schedule_type_id,
                    $userid,

                )
            );
                return json_encode(['insert'=>'success']);;
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_schedule","result"=> $e->getMessage()]);
            }
        }
        else
        {
                return json_encode(['insert'=>'not found date']);
        }
    }
    // update schedule
    public static function updateschedule($schedule_id,$branch_id,$name_en,$name_kh,$to_do_date,$comment,$priority,$schedule_type_id,$userid,$status){
        if(isset($schedule_id)){
            try{
                $result=DB::select('SELECT update_crm_lead_schedule(?,?,?,?,?,?,?,?,?,?)',
                array(
                    $schedule_id,
                    $userid,
                    $branch_id,
                    $name_en,
                    $name_kh,
                    $to_do_date,
                    $comment,
                    $priority,
                    $schedule_type_id,
                    $status,

                )
            );
                return json_encode(['update'=>'success']);;
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_schedule","result"=> $e->getMessage()]);
            }
        }
        else
        {
                return json_encode(['update'=>'not found date']);
        }
    }
    //insert schedule result
    public static function insertscheduleresult($schedule_id,$branch_id,$schedule_type_id_result,$comment_result,$userid,$name_en,$name_kh,$to_do_date,$comment,$priority,$schedule_type_id){
        if(isset($schedule_id)){
            try{
                $result=DB::select('SELECT insert_crm_lead_schedule_result(?,?,?,?)',
                array(
                    $schedule_id,
                    $schedule_type_id_result,
                    $comment_result,
                    $userid,

                )
            );
                try{
                    CrmLead::updateschedule($schedule_id,$branch_id,$name_en,$name_kh,$to_do_date,$comment,$priority,$schedule_type_id,$userid,'t');

                    return json_encode(['insert'=>'success']);
                }catch(Exception $e){
                    return json_encode(["insert"=>"fail insert_crm_lead_schedule_result","result"=> $e->getMessage()]);
                }
            }catch(Exception $e){
                return json_encode(["insert"=>"fail insert_crm_lead_schedule_result","result"=> $e->getMessage()]);
            }
        }
        else
        {
                return json_encode(['insert'=>'not found date']);
        }
    }
    //update schedule resutl
    public static function updatescheduleredult($schedule_result_id,$userid,$schedule_id,$schedule_type_id,$comment,$status){
        if(isset($schedule_result_id)){
            try{
                $result=DB::select('SELECT update_crm_lead_schedule_result(?,?,?,?,?,?)',
                array(
                    $schedule_result_id,
                    $userid,
                    $schedule_id,
                    $schedule_type_id,
                    $comment,
                    $status

                )
            );
                return json_encode(['update'=>'success']);;
            }catch(Exception $e){
                return json_encode(["update"=>"fail update_crm_lead_schedule_result","result"=> $e->getMessage()]);
            }
        }
        else
        {
                return json_encode(['update'=>'not found date']);
        }
    }
    //  edit lead
    public static function editLead($lead_id,$lead_number,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,
    $vat_number,$company_branch,$lead_source,$status,$lead_industry,$current_speed_isp,$primary_phone,
    $current_speed,$current_price,$employee_count){
        if(isset($lead_id)){
            DB::beginTransaction();
            try{
                $result=DB::select('SELECT update_crm_lead(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                array(
                    $lead_id,
                    $user_create,
                    $company_en,
                    $company_kh,
                    $primary_email,
                    $primary_phone,
                    $website,
                    $facebook,
                    $lead_source,
                    $status,
                    $lead_number,
                    $company_branch,
                    $lead_industry,
                    $current_speed_isp,
                    $employee_count,
                    $current_speed,
                    $current_price,
                    $vat_number,

                )
            );
            DB::commit();
                return json_encode(['update'=>'success']);;
            }catch(Exception $e){
                DB::rollback();
                return json_encode(["update"=>"fail update_crm_lead","result"=> $e->getMessage()]);
            }
        }
        else
        {
                return json_encode(['update'=>'not found date']);
        }
    }
    // Module
    private static function getLeadConvertSql(){
        return "SELECT cl.id, cl.customer_name_en,cl.customer_name_kh,cl.email,cl.lead_number,cl.vat_number,
        case when cl.vat_number ='' or cl.vat_number is null then 'Include' else 'Exclude' end as vat_type
        from crm_lead cl
        where cl.id in (select (select crm_lead_id from crm_lead_branch where id = cld.crm_lead_branch_id)
        from crm_lead_detail cld
        where cld.crm_lead_status_id=2)";
    }
    public static function getleadconvert(){
        return DB::select(self::getLeadConvertSql());
    }
    public static function getleadconvertDataTable($request){
        $table = '('.self::getLeadConvertSql().') as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'customer_name_kh', 'dt' => 0 ),
            array( 'db' => 'customer_name_en', 'dt' => 1 ),
            array( 'db' => 'lead_number',  'dt' => 2 ),
            array( 'db' => 'vat_type',   'dt' => 3 ),
            array( 'db' => 'email',     'dt' => 4 ),
            array( 'db' => 'id',     'dt' => 5 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
    // get count survey
    public static function getcountsurveyresult(){

         $date= date('Y-m-d');
        $count_t=DB::select("SELECT count(possible) as true from crm_survey_result  where possible=TRUE and is_deleted=False AND status=TRUE and create_date::date='".$date."'::date");
        $count_t=$count_t[0]->true;
        $count_f=DB::select("SELECT count(possible) as false from crm_survey_result  where possible=FALSE and is_deleted=False AND status=TRUE and create_date::date='".$date."'::date");
        $count_f=$count_f[0]->false;
        $array=[
            'true'=>$count_t,
            'false'=>$count_f
        ];
        return $array;
    }
    // Search Lead 
    public static function SearchLead($search){
        if(is_null($search)){ 
            $fetchData = "SELECT id,customer_name_en as text from crm_lead limit 5";
        }else{ 
            $fetchData ="SELECT id,customer_name_en as text from crm_lead where customer_name_en like '%".$search."%' 
                                                   or customer_name_kh like '%".$search."%' 
                                                   or email like '%".$search."%'
                                                   or facebook like '%".$search."%'
                                                   or lead_number like '%".$search."%'
                                                   limit 20";
        }
        return DB::select($fetchData); 
    }
}
