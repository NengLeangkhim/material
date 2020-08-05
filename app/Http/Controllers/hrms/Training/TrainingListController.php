<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\hrms\Training\Trainer;
use App\model\hrms\Training\TrainingType;
use Illuminate\Http\Request;

class TrainingListController extends Controller
{
    function TrainingList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090501')) {
            return view('hrms/Training/TrainingList/TrainingList');
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
}
