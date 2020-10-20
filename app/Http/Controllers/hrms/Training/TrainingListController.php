<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;
use App\model\hrms\Training\Trainer;
use App\model\hrms\Training\TrainingList;
use App\model\hrms\Training\TrainingType;
use Illuminate\Http\Request;

class TrainingListController extends Controller
{
    function TrainingList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090501')) {
            $trainList=new TrainingList();
            $data=$trainList->TrainingList();
            return view('hrms/Training/TrainingList/TrainingList')->with('data',$data);
        } else {
            return view('noperms');
        }
    }
    function ModalTrainingList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090501')) {
            $data = array();
            $id=$_GET['id'];
            $trainType=new TrainingType();
            $trainer=new Trainer();
            $trainList=new TrainingList();
            $em=new Employee();
            $data[0]=$trainType->TrainingType();
            $data[1]=$trainer->Trainer();
            if($id>0){
                $data[2]=$trainList->TrainingList($id);
                if(strlen($data[2][0]->hrid)>0){
                    $data[3]=$trainList->TrainingStaff($data[2][0]->hrid);
                }else{
                    $data[3] = $trainList->TrainingStaff(0);
                }
            }
            $data[4]=$em->AllEmployee();
            return view('hrms/Training/TrainingList/ModalTrainingList')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_traininglist');
        }
        
    }

    function InsertUpdateTrainingList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090501')) {
            $id=$_POST['id'];
            $userid = $_SESSION['userid'];
            $trainingType=$_POST['trainingtype'];
            $trainer=$_POST['trainer'];
            $startdate=$_POST['startdate'];
            $enddate=$_POST['enddate'];
            $filename = $_FILES['document']['name'];
            $file= $_FILES['document']['tmp_name'];
            $description=$_POST['description'];
            $namefile=$_POST['namefile'];
            $chech_status=$_POST['schet_status'];
            $staff=array();
            if (isset($_POST['check'])) {
                $staff = $_POST['check'];
            }
            $trainList = new TrainingList();
            // print_r($staff);
            if($id>0){
                $stm=$trainList->UpdateTrainingList($filename,$file,$trainingType,$startdate,$enddate,$description,$chech_status,$userid,$trainer,$id,$namefile,$staff);
            }else{
                $stm=$trainList->InsertTrainingList($filename, $file, $trainingType, $startdate, $enddate, $description,$chech_status, $userid, $trainer,$staff);
            }
            echo $stm;
        } else {
            return view('noperms');
        }
    }


    function DeleteTrainingStaff(){
        $staffid=$_GET['staffid'];
        $hrid=$_GET['trainid'];
        $trainList=new TrainingList();
        $d= $trainList->DeleteTrainingStaff($staffid,$hrid);
        echo $d;
    }

    function TrainingListDetail(){
        if(perms::check_perm_module('HRM_09050102')) {
            $id = $_GET['id'];
            $trainList = new TrainingList();
            $data = array();
            $data[0] = $trainList->TrainingList($id);
            if (strlen($data[0][0]->hrid) > 0) {
                $data[1] = $trainList->TrainingStaff($data[0][0]->hrid);
            } else {
                $data[1] = $trainList->TrainingStaff(0);
            }
            return view('hrms/Training/TrainingList/TrainingListDetail')->with('data', $data);
        }else{
            return view('modal_no_perms')->with('modal', 'modal_traininglist_detail');
        }
        
    }

    function DeleteTrainingList(){
        session_start();
        $id=$_GET['id'];
        $userid = $_SESSION['userid'];
        $trainList=new TrainingList();
        $data=$trainList->DeleteTrainingList($id,$userid);
    }

    function my_training(){
        session_start();
        $userid = $_SESSION['userid'];
        return view('hrms/Training/my_training');
    }
}
