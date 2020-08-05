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
            $trainType=new TrainingType();
            $trainer=new Trainer();
            $data[0]=$trainType->TrainingType();
            $data[1]=$trainer->Trainer();
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
            $trainingType=$_POST['trainingtype'];
            $trainer=$_POST['trainer'];
            $startdate=$_POST['startdate'];
            $enddate=$_POST['enddate'];
            $filename = $_FILES['document']['name'];
            $description=$_POST['description'];
            // print_r($filename);
            $trainList = new TrainingList();
            $trainList->InsertTrainingList($filename);
            if($id>0){

            }else{

            }
        } else {
            return view('noperms');
        }
    }
}
