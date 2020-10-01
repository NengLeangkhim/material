<?php

namespace App\Http\Controllers\hrms\Employee;

use App\model\hrms\employee\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;

class HolidayController extends Controller
{

    // List Holiday
    function Holiday()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090102')) {
            $h=new Holiday();
            $holiday['holiday']=$h->Holiday_All();
            return view('hrms/Employee/Holiday/Holiday')->with($holiday);
        } else {
            return view('no_perms');
        }
    }

    // Show modal And and Edit Holiday
    function AddAndEditHoliday(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010201')) {
            if($_GET['id']>0){
                $h=new Holiday();
                $ho=$h->HolidayOneRow($_GET['id']);
                return view('hrms/Employee/Holiday/AddAndEditHolidayModal')->with('holiday',$ho);
            }else{
                return view('hrms/Employee/Holiday/AddAndEditHolidayModal');
            }
        } else {
            $data = 'modal_holiday';
            return view('modal_no_perms')->with('modal', $data);
        }
        
    }

    // Insert or Update Holiday
    function InsertUpdateHoliday(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090102')) {
            $em=new Holiday();
            $userid = $_SESSION['userid'];
            $title=$_POST['title'];
            $kh_title=$_POST['khmerTitle'];
            $start_date=$_POST['startDate'];
            $end_date=$_POST['endDate'];
            $description=$_POST['description'];
            $date=date('Y-m-d');
            $id=$_POST['id'];
            if($id>0){
                $stm=$em->UpdateHoliday($id,$userid,$title,$kh_title,$date,$description,$start_date,$end_date);
            }else{
                $stm = $em->InsertHoliday($title, $kh_title, $date, $description, $start_date, $end_date, $userid);
            }
            echo $stm;
        } else {
            return view('noperms');
        }
    }



    // fouction for delete holiday
    function DeleteHoliday(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090102')) {
            $userid = $_SESSION['userid'];
            $id=$_GET['id'];
            $h=new Holiday();
            $stm=$h->DeleteHoliday($id,$userid);
        } else {
            return view('noperms');
        }
    }
}
