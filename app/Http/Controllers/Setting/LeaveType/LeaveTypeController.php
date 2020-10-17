<?php

namespace App\Http\Controllers\Setting\LeaveType;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\setting\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    function leave_type(){
        $leave_type=LeaveType::leave_type();
        return view('setting.leave_type.leave_type')->with('leave_type',$leave_type);
    }

    function modal_add_edit_leave_type(){
        $id=$_GET['id'];
        if($id>0){
            $leave_type=LeaveType::leave_type($id);
            return view('setting.leave_type.modal_add_and_edit_leave_type')->with('leavetype', $leave_type);
        }else{
            return view('setting.leave_type.modal_add_and_edit_leave_type');
        }
        
        
        
    }


    function add_and_update_leave_type(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$_POST['id'];
        $name=$_POST['leave_type'];
        $name_kh=$_POST['leave_type_kh'];
        $number_of_day=$_POST['number_of_day'];
        $status=$_POST['status'];
        if($id>0){
            $update_leave_type=LeaveType::update_leave_type($id,$userid,$name,$status,$name_kh,$number_of_day);
            if($update_leave_type==1){
                return redirect()->route('leave_type')->with('success', 'Update Successfully !');
            }else{
                return redirect()->route('leave_type')->with('error', 'Error');
            }
        }else{
            $insert_leave_type=LeaveType::insert_leave_type($name,$name_kh,$number_of_day,$userid);
            if ($insert_leave_type == 1) {
                return redirect()->route('leave_type')->with('success', 'Update Successfully !');
            } else {
                return redirect()->route('leave_type')->with('error', 'Error');
            }
        }
    }

    function delete_leave_type(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$_GET['id'];
        $delete_leave_type=LeaveType::delete_leave_type($id,$userid);
        if($delete_leave_type==1){
            return redirect()->route('leave_type')->with('success', 'Delete Successfully !');
        }else{
            return redirect()->route('leave_type')->with('error', 'Error');
        }
    }
}
