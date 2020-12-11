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
                $stm= MissionAndOutSide::InsertMissionOutSide($f_date,$t_date,$description,$type,$userid,$shift,$street,$home_number,$latelong,$gazetteers_code,$emid);
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
            $date=$request->date;
            $reason=$request->reason;
            $type=$request->type;
            $shift=$request->shift;
            $em=$request->employees;
            $emid=array();
            array_push($emid,$em);
            if($request->id>0){
                $sussess=MissionAndOutSide::UpdateMissionOutside($request->id,$userid,$request->date,$request->date,$request->reason,'t',$request->type,$request->shift,'','','','',$emid);
            }else{
                $sussess=MissionAndOutSide::InsertMissionOutSide($date,$date,$reason,$type,$userid,$shift,'','','','',$emid);
            }
            DB::commit();
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
            if($request->id>0){
                $permission_one = Request::create('/api/hrms_permission/' . $request->id, 'GET');
                $permission_one->headers->set('Accept', 'application/json');
                $res_one = app()->handle($permission_one);
                $response_permission_one = json_decode($res_one->getContent());
            }else{
                $response_permission_one='';
            }
            
            

            return view('hrms/Employee/MissionAndOutSide/modal_permission')->with(['employee'=>$employee,'leave_type'=>$leave_type,'approve_attendance'=>$response_attendance,'permission'=>$response_permission_one]);
        }

    function insert_permission_employee(Request $request)
    {
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            $validation = \Validator::make($request->all(), [
                'employees' => ['required', 'integer'],
                'type' => ['required'],
                'date' => ['required', 'date'],
                'shift' => ['required'],
                'approved_by' => ['required','integer'],
                'reason' => ['required']
            ]);
            if ($validation->fails()) {
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            if($request->shift=='am'){
                $date_from=$request->date.' 08:00:00';
                $date_to=$request->date.' 12:00:00';
            }elseif($request->shift=='pm'){
                $date_from = $request->date . ' 13:30:00';
                $date_to = $request->date . ' 17:30:00';
            }else{
                $date_from = $request->date . ' 08:00:00';
                $date_to = $request->date . ' 17:30:00';
            }

            if($request->id>0){
                $response = Request::create('/api/hrms_permission/'.$request->id, 'PUT', [
                    'ma_user_id' => $request->employees,
                    'leave_type_id' => $request->type,
                    'editor_id' => $userid,
                    'reason' => $request->reason,
                    'shift' => $request->shift,
                    'approved_by' => $request->approved_by,
                    'date_from' => $date_from,
                    'date_to' => $date_to,
                ]);
                $response->headers->set('Accept', 'application/json');
                $response = app()->handle($response);
                $respon = json_decode($response->getContent());
                if (isset($respon->success)) {
                    return response()->json(["success" => $respon->success]);
                } else {
                    return response()->json(['error' => $respon->error]);
                }
            }else{
                $response = Request::create('/api/hrms_permission', 'POST', [
                    'ma_user_id' => $request->employees,
                    'leave_type_id' => $request->type,
                    'editor_id' => $userid,
                    'reason' => $request->reason,
                    'shift' => $request->shift,
                    'approved_by' => $request->approved_by,
                    'date_from' => $date_from,
                    'date_to' => $date_to,
                ]);
                $response->headers->set('Accept', 'application/json');
                $response = app()->handle($response);
                $respon = json_decode($response->getContent());
                if (isset($respon->success)) {
                    return response()->json(["success" => $respon->success]);
                } else {
                    return response()->json(['error' => $respon->error]);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // end Permission

    // work on side
        function modal_work_on_side(Request $request){
            $employee = EmployeeEmployee::AllEmployee();
            if($request->id>0){
                $work_on_side = Request::create('/api/hrms_work_on_side/'.$request->id, 'GET');
                $work_on_side->headers->set('Accept', 'application/json');
                $res_on_side = app()->handle($work_on_side);
                $response_work_on_side = json_decode($res_on_side->getContent());
            }else{
                $response_work_on_side='';
            }
            return view('hrms/Employee/MissionAndOutSide/modal_work_on_side')->with(['employee'=>$employee,'work_on_side'=>$response_work_on_side]);
        }


        function insert_work_on_side(Request $request){
            $validation=\Validator::make($request->all(),[
            'employees'=>['required','integer'],
            'date'=>['required','date'],
            'shift'=>['required','string'],
            'location'=>['required'],
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
                $success=MissionAndOutSide::UpdateMissionOutside($request->id,$userid,$request->date,$request->date,$request->location,'t', 'work on side',$request->shift,'','','','',$emid);
            }else{
                $success=MissionAndOutSide::InsertMissionOutSide($request->date,$request->date,$request->location,'work on side',$userid,$request->shift,'','','','',$emid);
            }
            return response()->json(['success'=>$success]);
        }
    // end work on side
}
