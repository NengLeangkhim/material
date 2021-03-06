<?php

namespace App\Http\Controllers\api\HRMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        try {
            // if (! $user = JWTAuth::parseToken()->authenticate()) {
            //     $userid = "";
            // }else{
            //     $userid = $user->id;
            // }
            // if (!perms::check_perm_module_api('BSC_030501', $userid)) {
            //     return $this->sendError("No Permission");
            // }
            $leavea_type=DB::table('e_request_leaveapplicationform_leave_kind')
            ->select('id','name','name_kh','annual_count')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return response()->json($leavea_type);
        } catch (\Throwable $th) {
            throw $th;
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            if(is_numeric($id) && $id>0){
                $sql = "SELECT erl.id,erl.name,erl.name_kh,erl.annual_count,(SELECT (sum (case WHEN (EXTRACT(epoch from(date_to::time-date_from::time))::INTEGER/60)/60 = 9 THEN ((EXTRACT(epoch from(date_to::time-date_from::time))::INTEGER/60)/60)-1 ELSE (EXTRACT(epoch from(date_to::time-date_from::time))::INTEGER/60)/60 END)::FLOAT)/8::FLOAT FROM e_request_temp where ma_user_id=$id AND leave_type_id=erl.id) as employee_leave FROM e_request_leaveapplicationform_leave_kind erl WHERE status='t' and is_deleted='f'";
                $em_leave = DB::select($sql);
                return response()->json($em_leave);
            }else{
                return response()->json(['error'=>'Parameter must be Number, Integer and Bigger than Zero !!']);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo 'destroy';
    }
}
