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
            $sql= "SELECT ert.id,concat(mu_user.last_name_en,' ',mu_user.first_name_en) as employee_name,concat(mu_approve.last_name_en,' ',mu_approve.first_name_en) as approve_name,ert.reason,ert.date_from,ert.date_to FROM e_request_temp ert 
            INNER JOIN ma_user mu_user on mu_user.id=ert.ma_user_id
            INNER JOIN ma_user mu_approve on mu_approve.id=ert.approve_by ORDER BY ert.date_from desc";
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
