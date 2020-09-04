<?php

namespace App\Http\Controllers\hrms\Setting;

use App\Http\Controllers\Controller;
use App\model\hrms\Setting\CurrencyRate;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    function CurrencyRate(){
        $data = array();
        $curency=new CurrencyRate();
        $data[0]=$curency->Currency();
        return view('hrms/setting/CurrencyRate')->with('data',$data);
    }

    function AddEditModalCurrencyRate(){
        $data=array();
        $id=$_GET['id'];
        $cu = new CurrencyRate();
        $data[0] = $cu->CurrencyType();
        if($id>0){
            $data[1]=$cu->Currency($id);
        }
        
        return view('hrms/setting/ModalCurrency')->with('data', $data);
    }

    function InsertUpdateCurrencyRate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cu=new CurrencyRate();
        $userid = $_SESSION['userid'];
        $id=$_POST['id'];
        $type=$_POST['type'];
        $totype=$_POST['totype'];
        $unit=$_POST['unit'];
        $rate=$_POST['rate'];
        if($id>0){
            $stm=$cu->UpdateCurrencyRate($id,$userid,$type,$totype,$rate,$unit,'t');
        }else{
            $stm=$cu->InsertCurrencyRate($type,$totype,$rate,$unit,$userid);
        }
        echo $stm;
    }


    function DeleteCurrencyRate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cu = new CurrencyRate();
        $userid = $_SESSION['userid'];
        $id = $_GET['id'];
        $stm=$cu->DeleteCurrencyRate($id,$userid);
        echo $stm;
    }
}
