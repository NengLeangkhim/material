<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingTypeController extends Controller
{
    function TrainingType(){
        return view('hrms/Training/TrainingType/TrainingType');
    }
}
