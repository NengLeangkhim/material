<?php

namespace App\Http\Controllers\api\crm;

use App\model\api\crm\Crmlead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use DB;
use  App\model\api\crm\ModelCrmOrganize as Organize;
class OrganizeController extends Controller
{
    //get organize all
    public function index(){
        $return=response()->json(auth()->user());
        $return=json_encode($return,true);
        $return=json_decode($return,true);
        $userid=$return["original"]['id'];
        // dd($userid);
        if(perms::check_perm_module('CRM_020301')){ // for top managment (Organisations List)
            $organ = Organize::getOrganize();
            return json_encode(["data"=>$organ]);
            // dd("top");
          
        }
        else if (perms::check_perm_module('CRM_020301')) { // for staff (Model  name Get Branch by user)
            $organ = Organize::getOrganizebyassigto($userid);
            return json_encode(["data"=>$organ]);
            // dd("staff");
        }
        else
        {
            return view('no_perms');
        }
        
    }


    public function show($id)
    {
        $organ = Organize::getOrganizeById($id);
        return json_encode(["data"=>$organ]);
    }

     // update organize
     public static function update(Request $request){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $userid = $_SESSION['userid'];//when testing is done open this line
            // $userid = 1;

            $lead_id=$request->input('lead_id');
            $con_id=$request->input('contact_id');
            $lead_address_id=$request->input('address_id');
            $company_en=$request->input('company_en');
            $company_kh=$request->input('company_kh');
            $primary_email=$request->input('primary_email');
            $website=$request->input('website');
            $facebook=$request->input('company_facebook');
            $lead_source=$request->input('lead_source');
            $lead_status=$request->input('lead_status');
            $lead_industry=$request->input('lead_industry');
            $assig_to_id=$request->input('assig_to_id');
            $assig_to=$request->input('assig_to');
            $branch_id=$request->input('branch_id');
            $prioroty=$request->input('prioroty');
            //lead branch contact rel
            $lead_con_bran_id=$request->input('lead_con_bran_id');

            //address detail
            $home_en=$request->input('home_en');
            $home_kh=$request->input('home_kh');
            $street_en=$request->input('street_en');
            $street_kh=$request->input('street_kh');
            $latlong=$request->input('latlong');
            $address_type=$request->input('address_type');
            $addresscode=$request->input('village');

            // dd($latlong);
            // return;

            return  OrganizeController::updateOrganize($lead_address_id,$lead_con_bran_id,$branch_id,$con_id,$lead_id,$company_en,$company_kh,$primary_email,$userid,$website,$facebook,$lead_source,$lead_status,$lead_industry,$assig_to_id,
            $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode, $prioroty,$assig_to);
    }


    public static function updateOrganize($lead_address_id,$lead_con_bran_id,$branch_id,$con_id,$lead_id,$company_en,$company_kh,$primary_email,$user_create,$website,$facebook,$lead_source,$lead_status,$lead_industry,$assig_to_id,
    $home_en,$home_kh,$street_en,$street_kh,$latlong,$address_type,$addresscode, $prioroty,$assig_to){
        try{
            // update address
            $address=Crmlead::updateleadaddress($lead_address_id,$user_create,$lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode);
            $address_id=$address[0]->update_crm_lead_address;

            // update branch
            $branch=Crmlead::updatetablebranch($branch_id,$user_create,$lead_id,$company_en,$company_kh,$primary_email,$address_id,$prioroty);
            $branch_id=$branch[0]->update_crm_lead_branch;

            //update assgin to
            Crmlead::updatetableassigto($assig_to_id,$user_create,$branch_id,$assig_to);

            //update branch and contact rel
            Crmlead::updatetablebranch_contact_rel($lead_con_bran_id,$user_create,$branch_id,$con_id);

            return  json_encode(["update"=>'success']);

        }catch(Exception $e){
            return json_encode(["update"=>"fail update branch","result"=> $e->getMessage()]);
        }
    }

}
