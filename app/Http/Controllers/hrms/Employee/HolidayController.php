<?php

namespace App\Http\Controllers\hrms\Employee;

use App\model\hrms\employee\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;
use Illuminate\Validation\Rule;

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
    function insert_update_holiday(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090102')) {
            $validation=\Validator::make($request->all(),[
                'title'=>'required',
                'startDate'=>'required','date',
                'endDate'=>'required','date'
            ]);
            if($validation->fails()){
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            $userid = $_SESSION['userid'];
            $title=$request->title;
            $kh_title=$request->khmerTitle;
            $start_date=$request->startDate;
            $end_date=$request->endDate;
            $description=$request->description;
            $date=date('Y-m-d');
            $id=$request->id;
            if($id>0){

                $stm=Holiday::UpdateHoliday($id,$userid,$title,$kh_title,$date,$description,$start_date,$end_date);
                if($stm==1){
                    return response()->json(['success'=>'Holiday is updated !']);
                }
            }else{
                $stm = Holiday::InsertHoliday($title, $kh_title, $date, $description, $start_date, $end_date, $userid);
                if($stm==1){
                    return response()->json(['success'=>'Holiday is inserted !']);
                }
            }
            return response()->json(['error'=>'Data error']);
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

    // Calculator holiday
    public static function calendar_holiday(){
        $holiday=Holiday::get_holiday_calendar();
        return response()->json($holiday);
    }
}