<?php

namespace App\Http\Controllers\api\HRMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkOnSideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $sql= "SELECT hm.id,mu.id as emid,concat(mu.last_name_en,' ',mu.first_name_en) as employee,hm.date_from as date,hm.description as location,hm.shift FROM hr_mission hm inner join hr_mission_detail hmd on hm.id=hmd.hr_mission_id inner join ma_user mu on hmd.ma_user_id=mu.id WHERE lower(hm.type)='work on side' and hmd.status='t' and hmd.is_deleted='f' and hm.status='t' and hm.is_deleted='f' order by hm.id desc";
            $work_on_side=DB::select($sql);
            return response()->json($work_on_side);
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
            $sql = "SELECT hm.id,mu.id as emid,concat(mu.last_name_en,' ',mu.first_name_en) as employee,hm.date_from as date,hm.description as location,hm.shift FROM hr_mission hm inner join hr_mission_detail hmd on hm.id=hmd.hr_mission_id inner join ma_user mu on hmd.ma_user_id=mu.id WHERE lower(hm.type)='work on side' and hmd.status='t' and hmd.is_deleted='f' and hm.status='t' and hm.is_deleted='f' and hm.id=$id limit 1";
            $work_on_side = DB::select($sql);
            return response()->json($work_on_side);
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
    }
}
