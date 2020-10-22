<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\Training\Trainer;
use App\Http\Controllers\perms;
class TrainerController extends Controller
{
    function Trainer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090503')) {
            $t = new Trainer();
            $data = $t->Trainer();
            return view('hrms/Training/Trainer/Trainer')->with('data', $data);
        } else {
            return view('noperms');
        }
        
    }
    function ModalTrainerAddAndEdit(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09050301')) {
            $t = new Trainer();
            $id=$_GET['id'];
            $data=array();
            if($id>0){
                $data[0]=$t->Trainer($id);
            }
            return view('hrms/Training/Trainer/modalAddEditTrainer')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_trainer');
        }
    }

    function AddAndEditTrainer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09050301')) {
            $t = new Trainer();
            $id = $_POST['id'];
            $trainer=$_POST['trainer'];
            $telephone=$_POST['telephone'];
            $type=$_POST['type'];
            $description=$_POST['description'];
            $userid = $_SESSION['userid'];
            if($id>0){
                $stm=$t->UpdateTrainer($trainer,$telephone,$type,$description,$userid,$id);
            }else{
                $stm=$t->InsertTrainer($trainer,$telephone,$type,$description,$userid);
            }
            echo $stm;
        } else {
            return view('noperms');
        }
    }

    function DeleteTrainer(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09050302')) {
            $t = new Trainer();
            $id=$_GET['id'];
            $userid = $_SESSION['userid'];
            $t->DeleteTrainer($id,$userid);
        } else {
            return view('noperms');
        }
    }
}
