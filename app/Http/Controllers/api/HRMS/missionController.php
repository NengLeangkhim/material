<?php

namespace App\Http\Controllers\api\HRMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class missionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        echo 'show';
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




    public function late_missed_scan(){
        try {
            $sql= "select hm.id,concat(mu.last_name_en,' ',mu.first_name_en) as employee,hm.date_from as date,hm.type,hm.shift,hm.description as reason FROM hr_mission hm 
                INNER JOIN hr_mission_detail hmd on hm.id=hmd.hr_mission_id 
                INNER JOIN ma_user mu on mu.id=hmd.ma_user_id
                WHERE hm.status='t' and hm.is_deleted='f' and lower(hm.type)='missed scan' or lower(hm.type)='late' ORDER BY hm.date_from desc";
            $late_missed_scan=DB::select($sql);
            return response()->json($late_missed_scan);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
