<?php

namespace App\Http\Controllers\hrms\Training;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;
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
            $em=new Employee();
            $data[0]=$trainType->TrainingType();
            $data[1]=$trainer->Trainer();
            if($id>0){
                $data[2]=$trainList->TrainingList($id);
                if(strlen($data[2][0]->hrid)>0){
                    $data[3]=$trainList->TrainingStaff($data[2][0]->hrid);
                }else{
                    $data[3] = $trainList->TrainingStaff_schedule_id($data[2][0]->id);
                }
            }
            $data[4]=$em->AllEmployee();
            return view('hrms/Training/TrainingList/ModalTrainingList')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_traininglist');
        }
        
    }

    function InsertUpdateTrainingList(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090501')) {
            $validation=\Validator::make($request->all(),[
                'trainingtype'=>'required',
                'trainer'=>'required',
                'startdate'=>'required','date',
                'enddate'=>'required','date'
            ]);
            if($validation->fails()){
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            $staff=array();
            if(isset($request->check)) {
                $staff = $request->check;
            }else{
                return 'em';
            }
            $id=$_POST['id'];
            $userid = $_SESSION['userid'];
            $trainingType=$request->trainingtype;
            $trainer=$request->trainer;
            $startdate=$request->startdate;
            $enddate=$request->enddate;
            $filename = $_FILES['document']['name'];
            $file= $_FILES['document']['tmp_name'];
            $description=$request->description;
            $namefile=$request->namefile;
            if(isset($request->schet_status)){
                $chech_status=$request->schet_status;
            }else{
                $chech_status='t';
            }
            $trainList = new TrainingList();
            if($id>0){
                $stm=$trainList->UpdateTrainingList($filename,$file,$trainingType,$startdate,$enddate,$description,$chech_status,$userid,$trainer,$id,$namefile,$staff);
                return response()->json(['success'=>'Training Schedule is updated !']);
            }else{
                $stm=$trainList->InsertTrainingList($filename, $file, $trainingType, $startdate, $enddate, $description,$chech_status, $userid, $trainer,$staff);
                return response()->json(['success'=>'Training Schedule is inserted !']);
            }
            
        } else {
            return view('noperms');
        }
    }


    function DeleteTrainingStaff(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $staffid=$_GET['staffid'];
        $hrid=$_GET['trainid'];
        $trainList=new TrainingList();
        $d= $trainList->DeleteTrainingStaff($staffid,$hrid);
        echo $d;
    }

    function TrainingListDetail(){
        if(perms::check_perm_module('HRM_09050102')) {
            $id = $_GET['id'];
            $trainList = new TrainingList();
            $data = array();
            $data[0] = $trainList->TrainingList($id);
            if (strlen($data[0][0]->hrid) > 0) {
                $data[1] = $trainList->TrainingStaff($data[0][0]->hrid);
            } else {
                 $data[1] = $trainList->TrainingStaff_schedule_id($data[0][0]->id);
            }
            return view('hrms/Training/TrainingList/TrainingListDetail')->with('data', $data);
        }else{
            return view('modal_no_perms')->with('modal', 'modal_traininglist_detail');
        }
        
    }

    function DeleteTrainingList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id=$_GET['id'];
        $userid = $_SESSION['userid'];
        $trainList=new TrainingList();
        $data=$trainList->DeleteTrainingList($id,$userid);
    }

    function my_training(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $training=TrainingList::my_training($userid);
        return view('hrms/Training/my_training')->with('training',$training);
    }

    function training_report_search(){
        $from_date=$_GET['date_from'];
        $to_date=$_GET['date_to'];
        $training_report=TrainingList::training_report_search($from_date,$to_date);
        $data=[];
        $i=0;
        if(!empty($training_report)){
            foreach($training_report as $train){
                $i++;
                if(strlen($train->hrid)>0){
                    $staff_trained=TrainingList::list_staff_training($train->hrid);
                }else{
                    $staff_trained=array();
                }
                $training_report_search=[
                    "training_course"=>$train->type,
                    "trainer"=>$train->trainer,
                    "schet_f_date"=>$train->schet_f_date,
                    "schet_t_date"=>$train->schet_t_date,
                    "actual_f_date"=>$train->actual_f_date,
                    "actual_t_date"=>$train->actual_t_date,
                    "status"=>$train->status,
                    "schet_description"=>$train->schet_description,
                    "actual_description"=>$train->actual_description,
                    "file"=>$train->file,
                    "employee"=>$staff_trained
                ];
                array_push($data,$training_report_search);
            }
        }
        // return $i;
        return view('hrms/Training/training_report_search')->with('report_training_schedule',$data);
    }
}
