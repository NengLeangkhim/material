<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingListController extends Controller
{
    function TrainingList(){
        return view('hrms/Training/TrainingList/TrainingList');
    }
    function ModalTrainingList(){
        return view('hrms/Training/TrainingList/ModalTrainingList');
    }
}
