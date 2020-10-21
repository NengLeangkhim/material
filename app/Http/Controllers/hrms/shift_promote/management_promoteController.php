<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use App\model\hrms\employee\Employee;
use Illuminate\Http\Request;
use App\model\hrms\shift_promote\management_promoteModel; 


class management_promoteController extends Controller
{

    /* function get all employee from 3 table: staff, position, hr_payroll  */
    public function AllEmployee(){
        $AllEmployee = Employee::AllEmployee();
        return view('hrms/shift_promote/management_promote/shift_promote_management', ['allEmployee' => $AllEmployee]);
    }



    /* function to upgrade staff promote  */
    public function Edit_staff_promote(){

        if(isset($_GET['id'])){
            $staffid = $_GET['id'];
            $StaffByID = management_promoteModel::AllEmployeeByID($staffid);
            // $StaffByID = Employee::EmployeeOnRow($staffid);
            // dump($StaffByID);
            $get_postion = management_promoteModel::position();
            // print_r($get_postion);
            return view('hrms/shift_promote/management_promote/shift_promote_manager_edit', ['staffbyid' => $StaffByID, 'get_position' =>  $get_postion]);
        }

    }
    



    /* function to send update staff promote to DB */
    public function Submit_staff_promote(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];  //use this user id to know who was promote staff

        if( isset($_GET['s_id'])  && isset($_GET['txt_position']) && isset($_GET['txt_salary']) && isset($_GET['txt_comment'])){
            $id = $_GET['s_id'];
            $pos = $_GET['txt_position'];
            $sa = $_GET['txt_salary'];
            $com = $_GET['txt_comment'];
            $r = management_promoteModel::update_staff_shift($id,$pos,$sa,$userid,$com);
            if($r > 0){
                return 1;
            }else{
                return 0;
            }

        }

    }
    






















   
}
