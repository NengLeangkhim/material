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
        dd('index');
        //
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                $userid = "";
            }else{
                $userid = $user->id;
            }
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
        try {
            $validation=Validator::make($request->all(),[
                'ma_user_id'=>['required','integer'],
                'editor_id'=>['required','integer'],
                'reason'=>'required',
                'date_from'=>['required','date'],
                'date_to'=>['required','date']
            ]);
            if($validation->fails()){
                return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            }
            return response()->json(['success'=>'Insert Successfully !!']);
        } catch (\Throwable $th) {
            throw $th;
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
    }
}
