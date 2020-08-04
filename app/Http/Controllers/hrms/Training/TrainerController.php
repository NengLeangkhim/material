<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    function Trainer(){
        return view('hrms/Training/Trainer/Trainer');
    }
}
