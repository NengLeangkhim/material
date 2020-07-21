<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\Employee;
use PhpParser\Node\Expr\Print_;

class AllemployeeController extends Controller
{
    
    //
    public function AllEmployee(){
        $em = new Employee();
        $employee['employee']=$em->AllEmployee();
        return view('hrms/Employee/AllEmployees/AllEmployees')->with($employee);
    }
    public function InsertEmployee(){

    }
    public function AddAndEditEmployee(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            if($id>0){
                return view('hrms/Employee/AllEmployees/AddAndEditEmployee');
            }else{
                return view('hrms/Employee/AllEmployees/AddAndEditEmployee');
            }
            
        }
        
        
    }
}
