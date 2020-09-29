<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\Employee;
use App\model\hrms\shift_promote\management_promoteModel; 


class management_promoteController extends Controller
{

    /* function get all employee from 3 table: staff, position, hr_payroll  */
    public function AllEmployee(){
        $AllEmployee = Employee::AllEmployee();
       
        // $AllEmployee = management_promoteModel::AllEmployee();
        // var_dump($AllEmployee);
        
        foreach($AllEmployee as $val){
            echo $val->base_salary;
        }

        return view('hrms/shift_promote/management_promote/shift_promote_management', ['allEmployee' => $AllEmployee]);
    }



    /* function to upgrade staff promote  */
    public function Edit_staff_promote(){

        if(isset($_GET['id'])){
            $staffid = $_GET['id'];
            $StaffByID = management_promoteModel::AllEmployeeByID($staffid);
            $get_postion = management_promoteModel::position();
            // print_r($get_postion);
            return view('hrms/shift_promote/management_promote/shift_promote_manager_edit', ['staffbyid' => $StaffByID, 'get_position' =>  $get_postion]);
        }

    }
    



    /* function to send update staff promote to DB */
    public function Submit_staff_promote(){
        if( isset($_GET['s_id'])  && isset($_GET['txt_position']) && isset($_GET['txt_salary']) && isset($_GET['txt_comment'])){
            $id = $_GET['s_id'];
            $pos = $_GET['txt_position'];
            $sa = $_GET['txt_salary'];
            $com = $_GET['txt_comment'];
            $r = management_promoteModel::update_staff_shift($id,$pos,$sa,$com);
            if($r > 0){
                return 1;
                // return view('hrms/Employee/AllEmployees/AddAndEditEmployee');
                // return view('hrms/shift_promote/management_promte/shift_promote_management');
            }else{
                return 0;
                // echo '
                //     $.notify(
                //         "Failed to promote update !", 
                //         { position:"top center" }
                //     )
                // ';
            }

        }

    }
    






















   
}
