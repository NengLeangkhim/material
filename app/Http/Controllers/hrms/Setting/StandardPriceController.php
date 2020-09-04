<?php

namespace App\Http\Controllers\hrms\Setting;

use App\Http\Controllers\Controller;
use App\model\hrms\Setting\StandardPrice;
use Illuminate\Http\Request;

class StandardPriceController extends Controller
{
    function StandardPrice(){
        $sp=new StandardPrice();
        $data=array();
        $data[0]=$sp->StandardPrice();
        return view('hrms\setting\StandardPrice')->with('data',$data);
    }

    function AddEditStandardPrice(){
        $data=array();
        $sp=new StandardPrice();
        $id=$_GET['id'];
        if($id>0){
            $data[0]=$sp->StandardPrice($id);
        }
        return view('hrms\setting\ModalStandardPrice')->with('data', $data);
    }

    function InsertUpdateStandardPrice(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sp=new StandardPrice();
        $userid = $_SESSION['userid'];
        $id=$_POST['id'];
        $type=$_POST['type'];
        $price=$_POST['price'];
        $date=date('Y-m-d');
        if($id>0){
            $stm=$sp->UpdateStandardPrice($id,$userid,$date,$type,$price,'t');
        }else{
            $stm=$sp->InsertStandardPrice($date,$type,$price);
        }
        echo $stm;
    }

    function DeleteStandardPrice(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sp = new StandardPrice();
        $userid = $_SESSION['userid'];
        $id=$_GET['id'];
        $stm=$sp->DeleteStandardPrice($id,$userid);
    }
}
