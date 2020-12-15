<?php

namespace App\Http\Controllers\api\HRMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $sql= "SELECT ert.id,
            concat(mu_user.last_name_en,' ',mu_user.first_name_en) as employee_name,
            concat(mu_approve.last_name_en,' ',mu_approve.first_name_en) as approve_name,
            ert.reason,
            ert.date_from::date,
            ert.date_to::date ,case WHEN ert.date_from::time ='08:00:00'::time and ert.date_to::time='12:00:00'::time THEN 'AM' WHEN ert.date_from::time ='13:30:00'::time and ert.date_to::time='17:30:00'::time THEN 'PM' ELSE 'Full' END as shift
            FROM e_request_temp ert 
                        INNER JOIN ma_user mu_user on mu_user.id=ert.ma_user_id
                        INNER JOIN ma_user mu_approve on mu_approve.id=ert.approve_by ORDER BY ert.id desc";
            $permission_list=DB::select($sql);
            return response()->json($permission_list);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        DB::beginTransaction();
        try {
            $validation=Validator::make($request->all(),[
                'ma_user_id'=>['required','integer'],
                'editor_id'=>['required','integer'],
                'date'=>['required','date'],
                'reason'=>'required',
                'shift'=>['required','string'],
                'approved_by'=>['required','integer'],
                'leave_type_id'=>['required','integer']
            ]);
            if($validation->fails()){
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            if ($request->shift == 'am') {
                $date_from = $request->date . ' 08:00:00';
                $date_to = $request->date . ' 12:00:00';
            } elseif ($request->shift == 'pm') {
                $date_from = $request->date . ' 13:30:00';
                $date_to = $request->date . ' 17:30:00';
            } else {
                $date_from = $request->date . ' 08:00:00';
                $date_to = $request->date . ' 17:30:00';
            }
            $sql = "INSERT INTO e_request_temp
                    (ma_user_id,create_by,reason,date_from,date_to,approve_by,leave_type_id)
                    VALUES ('$request->ma_user_id','$request->editor_id','$request->reason','$date_from','$date_to','$request->approved_by','$request->leave_type_id');";
            DB::select($sql);
            DB::commit();
            return response()->json(['success'=>'Insert Successfully !!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error'=>$th]);
        }
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
        if(is_numeric($id) && $id>0){
            $sql = "SELECT ert.id,mu_user.id as emid,ert.leave_type_id,ert.approve_by,concat(mu_user.last_name_en,' ',mu_user.first_name_en) as employee_name,concat(mu_approve.last_name_en,' ',mu_approve.first_name_en) as approve_name,ert.reason,ert.date_from,ert.date_to,case WHEN ert.date_from::time ='08:00:00'::time and ert.date_to::time='12:00:00'::time THEN 'AM' WHEN ert.date_from::time ='13:30:00'::time and ert.date_to::time='17:30:00'::time THEN 'PM' ELSE 'Full' END as shift FROM e_request_temp ert 
            INNER JOIN ma_user mu_user on mu_user.id=ert.ma_user_id
            INNER JOIN ma_user mu_approve on mu_approve.id=ert.approve_by where ert.id=$id ORDER BY ert.date_from desc limit 1";
            $permission_list = DB::select($sql);
            return response()->json($permission_list);
        }else{
            return response()->json(['error'=>'Parameter must be Number and Bigger than Zero']);
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
        return response()->json(['success' => 'Success Edit !!']);
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
        DB::beginTransaction();
        try {
            $validation = Validator::make($request->all(), [
                'ma_user_id' => ['required', 'integer'],
                'editor_id' => ['required', 'integer'],
                'reason' => 'required',
                'shift'=>['required','string'],
                'approved_by' => ['required', 'integer'],
                'leave_type_id' => ['required', 'integer']
            ]);
            if ($validation->fails()) {
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            if ($request->shift == 'am') {
                $date_from = $request->date . ' 08:00:00';
                $date_to = $request->date . ' 12:00:00';
            } elseif ($request->shift == 'pm') {
                $date_from = $request->date . ' 13:30:00';
                $date_to = $request->date . ' 17:30:00';
            } else {
                $date_from = $request->date . ' 08:00:00';
                $date_to = $request->date . ' 17:30:00';
            }
            $data=[
                'ma_user_id'=>$request->ma_user_id,
                'date_from'=>$date_from,
                'date_to'=>$date_to,
                'create_date'=>date('Y/m/d h:m:s'),
                'reason'=>$request->reason,
                'approve_by'=>$request->approved_by,
                'leave_type_id'=>$request->leave_type_id
            ];
            DB::table('e_request_temp')->where('id',$id)->update($data);
            DB::commit();
            return response()->json(['success' => 'Success Update !!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Data error !!']);
        }
        
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
    }
}
