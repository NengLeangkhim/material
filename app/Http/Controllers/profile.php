<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\e_request\ere_get_assoc;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;
use App\model\hrms\employee\warning_and_punishment;
use App\model\hrms\Training\TrainingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\model\mainapp\employeeProfile\profileModel;
use App\model\Setting\LeaveType;

// use App\model\hrms\shift_promote\management_promoteModel; 

class profile extends Controller
{

    /*=============Old Profile Info=============*/  
    // function get_profile(){
    //     $user_id=0;
    //     if (session_status() == PHP_SESSION_NONE) {
    //         session_start();
    //     }
    //     if(isset($_SESSION['userid'])){
    //         $user_id=$_SESSION['userid'];
    //     }else{
    //         return;
    //     }
    //     if(perms::check_perm_module('PRO_07')){//module codes
    //         $q=DB::select("select s.first_name_en, s.last_name_en, s.first_name_kh,s.last_name_kh,s.sex, s.email,s.contact,p.name as position,cd.company,cd.branch,s.create_Date,s.image,s.id_number,s.office_phone
    //                         from ma_user s
    //                         join ma_position p on p.id=s.ma_position_id
    //                         join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=$user_id");
    //         $r=ere_get_assoc::assoc_($q)[0];
    //         $pro=$r;
    //         return view('profile',compact("pro"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
    //     }else{
    //         return view('no_perms');
    //     }
    // }


    function get_profile(){
        $user_id=0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['userid'])){
            if(isset($_GET['id'])){
                $user_id=$_GET['id'];
            }else{
                $user_id=$_SESSION['userid'];
            }
        }else{
            return;
        }
        if(perms::check_perm_module('PRO_07')){//module codes
            // $pro = profileModel::getUserInfo($user_id);
            // $addr_code = $pro[0]->gazetteer_code;
            // $addr_detail = profileModel::address_detail($addr_code);
            $employee=profileModel::get_data_info_of_one_employee($user_id);
            // dd($employee[0]->gazetteer_code);
            // $address=profileModel::get_address_of_employee($employee[0]->gazetteer_code);
            $training=TrainingList::my_training($user_id);
            $leave_type=LeaveType::get_leave_type();
            $all_leave=LeaveType::get_all_permission($user_id);
            $warning=warning_and_punishment::warning_and_punishment_list_one($user_id);
            $exit_info=profileModel::exit_information($user_id);
            
            if(count($exit_info)>0){
                $exit_information=[
                    'id'=>$exit_info[0]->id,
                    'ma_user_id'=>$exit_info[0]->ma_user_id,
                    'ma_exit_type_id'=>$exit_info[0]->ma_exit_type_id,
                    'training_development'=>$exit_info[0]->training_development,
                    'opportunity_to_promote'=>$exit_info[0]->opportunity_to_promote,
                    'work_presure'=>$exit_info[0]->work_presure,
                    'working_on_holiday'=>$exit_info[0]->working_on_holiday,
                    'motivation'=>$exit_info[0]->motivation,
                    'overall_option'=>$exit_info[0]->overall_option,
                    'request_exit_date'=>$exit_info[0]->request_exit_date,
                    'hr_received_date'=>$exit_info[0]->hr_received_date,
                    'effective_date'=>$exit_info[0]->effective_date,
                    'submit_date'=>$exit_info[0]->submit_date,
                    'manager_approved_date'=>$exit_info[0]->manager_approved_date,
                    'exit_reason'=>$exit_info[0]->exit_reason,
                    'duties_responsibility'=>$exit_info[0]->duties_responsibility,
                    'given_salary'=>$exit_info[0]->given_salary,
                    'work_environment'=>$exit_info[0]->work_environment,
                    'team_work'=>$exit_info[0]->team_work,
                    'management_issue'=>$exit_info[0]->management_issue,
                    'comment'=>$exit_info[0]->comment,
                    'create_date'=>$exit_info[0]->create_date,
                    'create_by'=>$exit_info[0]->create_by,
                    'name_en'=>$exit_info[0]->name_en,
                    'name_kh'=>$exit_info[0]->name_kh
                ];
            }else{
                $exit_information=[
                    'id'=>null,
                    'ma_user_id'=>null,
                    'ma_exit_type_id'=>null,
                    'training_development'=>null,
                    'opportunity_to_promote'=>null,
                    'work_presure'=>null,
                    'working_on_holiday'=>null,
                    'motivation'=>null,
                    'overall_option'=>null,
                    'request_exit_date'=>null,
                    'hr_received_date'=>null,
                    'effective_date'=>null,
                    'submit_date'=>null,
                    'manager_approved_date'=>null,
                    'exit_reason'=>null,
                    'duties_responsibility'=>null,
                    'given_salary'=>null,
                    'work_environment'=>null,
                    'team_work'=>null,
                    'management_issue'=>null,
                    'comment'=>null,
                    'create_date'=>null,
                    'create_by'=>null,
                    'name_en'=>null,
                    'name_kh'=>null
                ];
            }
            $job_experience=profileModel::experience_detil($user_id);
            $education=profileModel::education_deatail($user_id);
            $permanent_address=profileModel::permanent_address($user_id);
            $current_address=profileModel::current_address($user_id);
            // dd($current_address);
            // return;
            $em_contect=profileModel::user_contact($user_id);
            return view('profile',compact("employee","training","leave_type","all_leave","warning","exit_information","job_experience","education","permanent_address","em_contect","current_address"));//,"pos","name","id_number","dept","kindof","transfer_to","leave_kind","trans_to","date_from","time_from","date_to","time_to","date_resume","leave_number","reason","req_by","create_date"));
        }else{
            return view('no_perms');
        }
    }


}