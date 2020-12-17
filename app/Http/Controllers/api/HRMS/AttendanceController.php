<?php

namespace App\Http\Controllers\api\HRMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
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
            $date=date('Y/m/d');
            $sql= "SELECT mu.id,concat(mu.last_name_en,' ',mu.first_name_en) as employee,
            (select ha.\"deviceStamp\"::date from hr_attendance ha where ha.status='t' and is_deleted='f' and ha.\"deviceStamp\"::date='$date'::date limit 1) as date,
            (select ha.\"deviceStamp\"::time from hr_attendance ha WHERE ha.status='t' and is_deleted='f' and split_part(mu.id_number,'-',2)::INTEGER=ha.\"deviceID\" and ha.\"typeName\"='Check-in' and ha.\"deviceStamp\"::date='$date'::date and \"deviceStamp\"::time BETWEEN '01:00:00'::time and '12:00:00'::time order by id limit 1) as m_check_in,
            (select ha.\"deviceStamp\"::time from hr_attendance ha WHERE ha.status='t' and is_deleted='f' and split_part(mu.id_number,'-',2)::INTEGER=ha.\"deviceID\" and ha.\"typeName\"='Check-out' and ha.\"deviceStamp\"::date='$date'::date and \"deviceStamp\"::time BETWEEN '01:00:00'::time and '17:30:00'::time order by id desc limit 1) as m_check_out,
            (select ha.\"deviceStamp\"::time from hr_attendance ha WHERE ha.status='t' and is_deleted='f' and split_part(mu.id_number,'-',2)::INTEGER=ha.\"deviceID\" and ha.\"typeName\"='Check-in' and ha.\"deviceStamp\"::date='$date'::date and \"deviceStamp\"::time BETWEEN '12:00:00'::time and '17:30:00'::time order by id limit 1) as e_check_in,
            (select ha.\"deviceStamp\"::time from hr_attendance ha WHERE ha.status='t' and is_deleted='f' and split_part(mu.id_number,'-',2)::INTEGER=ha.\"deviceID\" and ha.\"typeName\"='Check-out' and ha.\"deviceStamp\"::date='$date'::date and \"deviceStamp\"::time BETWEEN '13:30:00'::time and '17:30:00'::time order by id desc limit 1) as e_check_out
            FROM ma_user mu WHERE mu.status='t' and mu.is_deleted='f' and mu.is_employee='t' and is_night_shift='f' and mu.id_number != 'TT-0001' ORDER BY employee";
            $attendance=DB::select($sql);
            return response()->json($attendance);
        } catch(Exception $e) {
            return response()->json(['error'=>$e]);
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
        try {
            //code...
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
        }
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
            //code...
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
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
        try {
            //code...
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
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
        try {
            //code...
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
        }
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
        try {
            //code...
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
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
        try {
            //code...
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
        }
    }
}
