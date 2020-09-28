<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\hrms\Training\TrainingType;
use Illuminate\Http\Request;

class TrainingTypeController extends Controller
{
    function TrainingType(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090502')) {
            $t=new TrainingType();
            $data=$t->TrainingType();
            return view('hrms/Training/TrainingType/TrainingType')->with('data',$data);
        } else {
            return view('noperms');
        }
    }


    function AddModalTrainingType(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090507')) {
            $id=$_GET['id'];
            $data=array();
            if($id>0){
                $t = new TrainingType();
                $data[0]=$t->TrainingType($id);
            }
            return view('hrms/Training/TrainingType/ModalTrainingType')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_trainingType');
        }
    }

    
    function AddEditTrainingType(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090502')) {
            $t = new TrainingType();
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $trainingType=$_POST['trainingType'];
            $description=$_POST['description'];
            if($id>0){
                $stm=$t->UpdateTrainingType($trainingType,$description,$userid,$id);
            }else{
                $stm=$t->InsertTrainingType($trainingType,$description,$userid);
            }
            echo $stm;
        } else {
            return view('noperms');
        }
    }  

    function DeleteTrainingType(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090502')) {
            $t = new TrainingType();
            $userid = $_SESSION['userid'];
            $id = $_GET['id'];
            $t->DeleteTrainingType($id,$userid);
        } else {
            return view('noperms');
        }
    }
}
