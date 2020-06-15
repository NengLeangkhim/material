<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\util;

class insert_formworkingapplication extends Controller{
    function in_formworkingapplication(){
        session_start();
        if(isset($_SESSION['userid'])){
            $user_id=$_SESSION['userid'];
        }else{
            return;
        }
        $form_id=$_SESSION['form_id'];
        // if($_POST['image']){
        // $image=$_POST['image'];

        // }
        $image="";
        $sql="SELECT public.insert_e_request_working_application(
            '".$_POST['app_id']."',
            ".$_POST['position'].",
            ".$_POST['salary'].",
            ".$_POST['expected_salary'].",
            '".$_POST['phone']."',
            '".$_POST['email']."',
            '".$_POST['name_kh']."',
            '".$_POST['name']."',
            '".$_POST['nick_name']."',
            '$image',
            '".$_POST['sex']."',
            '".$_POST['marital']."',
            '".util::to_pgdate($_POST['birth_date'])."',
            ".$_POST['branch'].",
            $user_id,
            $form_id
        ) as id";
        $id=0;
        $q=DB::select($sql);

        $r=ere_get_assoc::assoc_($q)[0];
        $id=$r['id'];

        $sql="SELECT public.insert_e_request_working_application_address(
            $id,
            '".$_POST['home_number']."',
            '".$_POST['street']."',
            '".$_POST['village']."',
            '".$_POST['commune']."',
            '".$_POST['district']."',
            '".$_POST['provice']."',
            '".$_POST['country']."',
            '".$_POST['address_type']."',
            null
        )";
        $q=DB::select($sql);


        foreach($_POST['edu_school'] as $key=>$value){
        if(!empty($value))
        {     $sql="SELECT public.insert_e_request_working_application_education(
                $id,
                '$value',
                '".$_POST['edu_start_date'][$key]."-01-01',
                '".$_POST['edu_end_date'][$key]."-01-01',
                '".$_POST['edu_profession'][$key]."',
                '".$_POST['edu_degree'][$key]."',
                ".$_POST['edu_highest_degree']."
            )";
            $q=DB::select($sql);
           }
        }
        foreach($_POST['language'] as $key=>$value){
        if(!empty($value))
        {     $sql="SELECT public.insert_e_request_working_application_lang(
                $id,
                '$value',
                '".$_POST['r'.$key]."',
                '".$_POST['w'.$key]."',
                '".$_POST['s'.$key]."',
                '".$_POST['l'.$key]."'
            )";
            $q=DB::select($sql);
           }
        }
        $sql="SELECT public.insert_e_request_working_application_other(
            $id,
            '".$_POST['personal_skill']."',
            '".$_POST['join_reason']."',
            ".$_POST['job_news'].",
            '".$_POST['latlng']."'
        )";
        $q=DB::select($sql);


        if(isset($_POST['relative'])){
            if($_POST['relative']=="yes")
            {foreach($_POST['relative_name'] as $key=>$value){
                if(!empty($value))
                { $sql="SELECT public.insert_e_request_working_application_relative(
                    $id,
                    '$value',
                    '".$_POST['relation'][$key]."',
                    ".$_POST['relative_position'][$key].",
                    '".$_POST['relative_father_name']."',
                    '".$_POST['relative_mother_name']."',
                    '".$_POST['relative_father_job']."',
                    '".$_POST['relative_mother_job']."',
                    ".$_POST['relative_sibling_count'].",
                    '".$_POST['relative_partner_name']."',
                    '".$_POST['relative_partner_job']."',
                    ".$_POST['relative_child_count'].",
                    ".$_POST['relative_boy'].",
                    '".$_POST['relative_family_book_number']."',
                    '".$_POST['relative_home_number']."',
                    '".$_POST['relative_street']."',
                    '".$_POST['village']."',
                    '".$_POST['relative_commune']."',
                    '".$_POST['relative_district']."',
                    '".$_POST['relative_province']."',
                    '".$_POST['relative_country']."',
                    null,
                    null
                )";
                $q=DB::select($sql);
               }
            }}
        }
        foreach($_POST['exp_company_name'] as $key=>$value){
            if(!empty($value))
            {$org_type=$_POST['exp_org_type'.$key];
            if($_POST['exp_org_type'.$key]==4){
                if(!empty($_POST['org_type_other'][$key])){
                    $sql="INSERT INTO public.e_request_working_application_org_type(
                        name, parent_id, status)
                        VALUES ('".$_POST['org_type_other'][$key]."',".$_POST['exp_org_type'.$key]." ,'t') returning id;";
                    $q=DB::select($sql);

                    $r=ere_get_assoc::assoc_($q)[0];
                    $org_type=$r['id'];
                }
            }
            $sql="SELECT public.insert_e_request_working_application_work_exp(
                $id,
                '$value',
                ".$_POST['exp_staff_count'][$key].",
                '".$_POST['exp_phone'][$key]."',
                '".$_POST['exp_business_type'][$key]."',
                $org_type,
                '".$_POST['exp_position'][$key]."',
                '".util::to_pgdate($_POST['exp_start_date'][$key])."',
                '".util::to_pgdate($_POST['exp_end_date'][$key])."',
                ".$_POST['exp_start_salary'][$key].",
                ".$_POST['exp_end_salary'][$key].",
                '".$_POST['exp_leader'][$key]."',
                '".$_POST['exp_leader_position'][$key]."',
                '".$_POST['exp_work_type'.$key]."',
                '".$_POST['exp_leave_reason'][$key]."',
                '".$_POST['exp_job_responsibility'][$key]."'
            )";
            $q=DB::select($sql);
           }
        }
        if(isset($_POST['work_here'])){
            if($_POST['work_here']=='yes')
            {foreach($_POST['work_here_position'] as $key=>$value){
                $sql="SELECT public.insert_e_request_working_application_work_here(
                    $id,
                    $value,
                    '".to_pgdate($_POST['work_here_date'][$key])."'
                )";
                $q=DB::select($sql);

            }}
        }
    }
}
?>