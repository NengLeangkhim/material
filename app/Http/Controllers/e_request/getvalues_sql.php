<?php
namespace App\Http\Controllers\e_request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    class getvalues_sql{
        public function sqlst($s,$id){
            $sql=array();
            $sql['get_pos']="select p.name from position p join ma_user s on s.position_id=p.id where s.id=$id";
            $sql['get_company_dept']="select d.name from ma_company_dept d join ma_user s on s.ma_company_dept_id=d.id where s.id=$id";
            $sql['get_all_staff']="select id,name from ma_user order by name";
            $sql['get_id_number']="select id_number as name from ma_user where id=$id";
//===============================example====================================
// $sql['table_name'][]="SELECT request_by, create_date, related_to_e_request_id
//             FROM public.table_name where id=$id;";
// $sql['table_name'][]="SELECT date, start_time, end_time, reason, type, rest_time_start, rest_time_end, actual_work_time
//             FROM public.table_name_detail where table_name_id=$id;";
//
//  the where statement means to find exact row of the request which come from the the view list
//this is just where it tell system to get data for a certain form
//
//===============================example====================================
            $sql['e_request_employment_biography']=array();
            $sql['e_request_employment_biography'][]="SELECT name, name_kh, birth_date, height, nation, nationality, religion, marital_status, birth_village, birth_district, birth_province, phone, education, major, school, shool_start_date, school_end_date, language_skill, request_by, create_date, birth_commune
            FROM public.e_request_employment_biography where id=$id;";
            $sql['e_request_employment_biography'][]="SELECT country, \"group\", home_number, street, commune, village, district, province
            FROM public.e_request_employment_biography_address where e_request_employment_biography=$id;";
            $sql['e_request_employment_biography'][]="SELECT carrier as carrer, position_id, ma_company_dept_id, start_work_date, id_card_r_passport, id_card_r_passport_date, family_book_number, family_book_date, image, id_number
            FROM public.e_request_employment_biography_ where e_request_employment_biography=$id;";
            $sql['e_request_employment_biography'][]="SELECT name as relative_name, id_number as relative_id_number, position_id as relative_positionid, ma_company_dept_id as relative_company_dept_id, relation as relative_relation
            FROM public.e_request_employment_biography_relative where e_request_employment_biography=$id;";
            $sql['e_request_employment_biography'][]="SELECT name as spouse_name, birth_date as spouse_birth_date, nationality as spouse_nationality, nation as spouse_nation, religion as spouse_religion, birth_place as spouse_birth_place, current_address as spouse_current_address, phone as spouse_phone, work_place as spouse_work_place, children_count as spouse_children_count, \"position\" as spouse_position, id_number as spouse_id_number, sex as spouse_sex
            FROM public.e_request_employment_biography_spouse where e_request_employment_biography=$id;";
            $sql['e_request_employment_biography'][]="SELECT name as child_name, gender as child_gener, birth_date as child_birth_date, marital_status as child_marital_status, job as child_job
            FROM public.e_request_employment_biography_children where e_request_employment_biography=$id;";
            $sql['e_request_employment_biography'][]="SELECT name as parent_name, gender as parent_gender, age as parent_age, job as parent_job, current_address as parent_current_address, phone as parent_phone, dead_live as parent_dead_live
            FROM public.e_request_employment_biography_parent where e_request_employment_biography=$id;";

            $sql['e_request_overtime'][]="SELECT request_by, create_date, related_to_e_request_id
            FROM public.e_request_overtime where id=$id;";
            $sql['e_request_overtime'][]="SELECT date, start_time, end_time, reason, type, rest_time_start, rest_time_end, actual_work_time
            FROM public.e_request_overtime_detail where e_request_overtime_id=$id;";

            $sql['e_request_employment_certificate'][]="SELECT request_by, via, object, reason, create_date
            FROM public.e_request_employment_certificate where id=$id;";

            $sql['e_request_leaveapplicationform'][]="SELECT request_by, kind_of_leave_id, create_date, date_from, date_to, date_resume, number_date_leave, transfer_job_to, status, reason
            FROM public.e_request_leaveapplicationform where id=$id;";

            $sql['e_request_vehicle_usage'][]="SELECT request_by, create_date
            FROM public.e_request_vehicle_usage where id=$id;";
            $sql['e_request_vehicle_usage'][]="SELECT departure_time, return_time, destination, objective, other, date
            FROM public.e_request_vehicle_usage_detail where e_request_vehicle_usage_id=$id;";

            $sql['e_request_use_electronic'][]="SELECT request_by, id_number, create_date,request_to
            FROM public.e_request_use_electronic where id=$id;";
            $sql['e_request_use_electronic'][]="SELECT use_of_id
            FROM public.e_request_use_electronic_detail where e_request_use_electronic_id=$id;";

            $sql['e_request_requestform'][]="SELECT request_number, request_by, \"to\", subject_id, create_date
            FROM public.e_request_requestform where id=$id;";
            $sql['e_request_requestform'][]="SELECT description, qty, other, receiver,(select name from ma_user where id=receiver) as rec
            FROM public.e_request_requestform_detail where e_request_requestform_id=$id;";

            $sql['e_request_equipment_request_form'][]="SELECT request_by, technician_name, creat_date as create_date, customer_name, customer_account_name, customer_address, customer_phone, customer_email, connection, speed, finish_date, note, pop
            FROM public.e_request_equipment_request_form where id=$id;";
            $sql['e_request_equipment_request_form'][]="SELECT product_id, qty, price, type, product_name, model_sn
            FROM public.e_request_equipment_request_form_detail where e_request_equipment_request_form_id=$id;";

            $sql['e_request_stand_by'][]="SELECT description, create_date, create_by as request_by, is_deleted
            FROM public.e_request_stand_by where id=$id;";
            $sql['e_request_stand_by'][]="SELECT ma_user_id, stand_by_date, time_start, time_end, create_date, create_by, is_deleted
            FROM public.e_request_stand_by_detail where e_request_stand_by_id=$id;";

            if(isset($sql[$s])){
                return $sql[$s];
            }
        }
    }