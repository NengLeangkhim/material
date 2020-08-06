<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
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
            $data[0]=$trainType->TrainingType();
            $data[1]=$trainer->Trainer();
            if($id>0){
                $data[2]=$trainList->TrainingList($id);
            }
            return view('hrms/Training/TrainingList/ModalTrainingList')->with('data',$data);
        } else {
            return view('noperms');
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
            $trainList = new TrainingList();
            
            if($id>0){
                $stm=$trainList->UpdateTrainingList($filename,$file,$trainingType,$startdate,$enddate,$description,$chech_status,$userid,$trainer,$id,$namefile);
            }else{
                $stm=$trainList->InsertTrainingList($filename, $file, $trainingType, $startdate, $enddate, $description,$chech_status, $userid, $trainer);
            }
            print_r($stm);
        } else {
            return view('noperms');
        }
    }
}
