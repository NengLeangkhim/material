<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\MissionAndOutSide;
use Illuminate\Support\Facades\DB;
use App\model\hrms\employee;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee as EmployeeEmployee;
use App\model\Setting\LeaveType;
use Illuminate\Validation\Validator;

class MissionAndOutsideController extends Controller
{
    // List all Mission
    function AllMissionAndOutSide()
    {
        $mission=MissionAndOutSide::MissionOutside();


        $permission=Request::create('/api/hrms_permission','GET');
        $permission->headers->set('Accept', 'application/json');
        $res = app()->handle($permission);
        $response_permission = json_decode($res->getContent());

        $late_missed_scan=Request::create('/api/hrms_late_missed_scan','GET');
        $late_missed_scan->headers->set('Accept', 'application/json');
        $res_late = app()->handle($late_missed_scan);
        $response_late_missed_scan = json_decode($res_late->getContent());


        $work_on_side = Request::create('/api/hrms_work_on_side', 'GET');
        $work_on_side->headers->set('Accept', 'application/json');
        $res_on_side = app()->handle($work_on_side);
        $response_work_on_side = json_decode($res_on_side->getContent());



        return view('hrms/Employee/MissionAndOutSide/MissionAndOutSide')->with(['mission'=>$mission,'permission'=>$response_permission,'late_missed_scan'=>$response_late_missed_scan,'work_on_side'=> $response_work_on_side]);
    }

    // Show modal add or edit mission
    function AddModalMissionOutside(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010401')) {
            $em=new EmployeeEmployee();
            $ms = new MissionAndOutSide();
            $id=$_GET['id'];
            $data=array();
            $data[0]=$em->AllEmployee();
            if($id>0){
                $data[1]=$ms->MissionOutside($id);
            }
            return view('hrms/Employee/MissionAndOutSide/ModalAddAndEditMissionAndOutSide')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_missionoutside');
        }
    }

    // Insert Mission
    function InsertUpdateMissionOutside(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090104')) {
            $validation=\Validator::make($request->all(),[
                'type'=>'required',
                'missioncheck'=>'required',
                'from_date'=>'required','date',
                'to_date'=>'required','date',
                'shift'=>'required'
            ]);
            if($validation->fails()){
                return response()->json(['error'=>$validation->getMessageBag()->toArray()]);
            }
            $ms = new MissionAndOutSide();
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $type=$_POST['type'];
            $emid=$_POST['missioncheck'];
            $f_date=$_POST['from_date'];
            $t_date=$_POST['to_date'];
            $shift=$_POST['shift'];
            $description=$_POST['description'];
            $date=date('Y-m-d');
            $street=$_POST['street'];
            $home_number=$_POST['home_number'];
            $gazetteers_code=$_POST['gazetteers_code'];
            $latelong=$_POST['latelong'];
            if($id>0){
                $stm=MissionAndOutSide::UpdateMissionOutside($id,$userid,$f_date,$t_date,$description,'t',$type,$shift,$street,$home_number,$latelong,$gazetteers_code,$emid);
            }else{
                $stm=$ms->InsertMissionOutSide($f_date,$t_date,$description,$type,$userid,$shift,$street,$home_number,$latelong,$gazetteers_code,$emid);
            }

            return response()->json(['success'=>$stm]);
        } else {
            return view('no_perms');
        }
    }

    // Delete Mission
    function DeleteMissionOutSide(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090104')) {
            $ms = new MissionAndOutSide();
            $userid = $_SESSION['userid'];
            $id=$_GET['id'];
            $ms->DeleteMissionOutSide($id,$userid);
        } else {
            return view('no_perms');
        }
    }


    // mission detail
    function MissionDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010402')) {
            $id=$_GET['id'];
            $missionDetail=MissionAndOutSide::MissionDetail($id);
            return view('hrms/Employee/MissionAndOutSide/MissionDetail')->with('mission_detail',$missionDetail);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_mission_detail');
        }
    }


    // my mission
    function hrm_my_mission(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $my_mission=MissionAndOutSide::hrm_my_mission($userid);
        return view('hrms.Employee.MissionAndOutSide.my_mission')->with('my_mission',$my_mission);
    }

    function hrm_search_mission(){
        $year=$_GET['eyear'];
        $month=$_GET['emonth'];
        $data=MissionAndOutSide::mission_search($month,$year);
        return view('hrms/Employee/MissionAndOutSide/mision_search')->with('mission',$data);
        print_r($data);
    }

    function hrm_my_mission_search(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $year=$_GET['eyear'];
        $month=$_GET['emonth'];
        $data=MissionAndOutSide::my_mission_search($userid,$month,$year);
        return view('hrms/Employee/MissionAndOutSide/mision_search')->with('mission',$data);
        print_r($data);
    }


    // late and missed scan
    function modal_late_missed_scan(Request $request){
        $employee=EmployeeEmployee::AllEmployee();

        if($request->id>0){
            $response_late_missed_scan=MissionAndOutSide::late_missed_scan_one($request->id);
        }else{
            $response_late_missed_scan='';
        }
        
        return view('hrms/Employee/MissionAndOutSide/modal_late_missed_scan')->with(['employee'=>$employee, 'response_late_missed_scan'=> $response_late_missed_scan]);
    }
    function insert_update_late_missed_scan(Request $request){
        DB::beginTransaction();
        try {
            $validation = \Validator::make($request->all(), [
                'employees' => ['required', 'integer'],
                'type' => ['required', 'string'],
                'date' => ['required', 'date'],
                'shift' => ['required', 'string'],
                'reason' => ['required'],
            ]);
            if ($validation->fails()) {
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            $emid=array();
            array_push($emid,$request->employees);
            if($request->id>0){
                $sussess=MissionAndOutSide::UpdateMissionOutside($request->id,$userid,$request->date,$request->date,$request->reason,'t',$request->type,$request->shift,'','','','',$emid);
            }else{
                $sussess=MissionAndOutSide::InsertMissionOutSide($request->date,$request->date,$request->reason,$request->type,$userid,$request->shift,'','','','',$emid);
            }
            return response()->json(['success' => $sussess]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }
    // end late and missed scan


    // Perission 
        function modal_permission(Request $request){
            $employee = EmployeeEmployee::AllEmployee();
            $leave_type = LeaveType::leave_type();

            $approved_attendance = Request::create('/api/hrms_approve_attendance', 'GET');
            $approved_attendance->headers->set('Accept', 'application/json');
            $res = app()->handle($approved_attendance);
            $response_attendance = json_decode($res->getContent());

            $permission_one = Request::create('/api/hrms_permission/'.$request->id, 'GET');
            $permission_one->headers->set('Accept', 'application/json');
            $res_one = app()->handle($permission_one);
            $response_permission_one = json_decode($res_one->getContent());
            

            return view('hrms/Employee/MissionAndOutSide/modal_permission')->with(['employee'=>$employee,'leave_type'=>$leave_type,'approve_attendance'=>$response_attendance,'permission'=>$response_permission_one]);
        }
    // end Permission

    // work on side
        function modal_work_on_side(Request $request){
            $employee = EmployeeEmployee::AllEmployee();
            if($request->id>0){
                
                dd('id>0');
            }else{
                $response_permission='';
            }
            return view('hrms/Employee/MissionAndOutSide/modal_work_on_side')->with(['employee'=>$employee,'pemission'=>$response_permission]);
        }
    // end work on side
}
