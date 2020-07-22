<?php

namespace App\Http\Controllers\hrms\shift_promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\shift_promote\management_promoteModel; 

class management_promoteController extends Controller
{


    public function AllEmployee(){
        $AllEmployee = management_promoteModel::AllEmployee();
        return view('hrms\shift_promote\management_promote\shift_promote_management', ['allEmployee' => $AllEmployee]);
    }


    public function Edit_staff_promote(){

        if(isset($_GET['id'])){
            $staffid = $_GET['id'];
            $StaffByID = management_promoteModel::AllEmployeeByID($staffid);
            $get_postion = management_promoteModel::position();
            // print_r($get_postion);

            return view('hrms\shift_promote\management_promote\shift_promote_manager_edit', ['staffbyid' => $StaffByID, 'get_position' =>  $get_postion]);
        }

    }
    


    public function Submit_staff_promote(){

        if( isset($_GET['s_id'])  && isset($_GET['txt_position']) && isset($_GET['txt_salary']) && isset($_GET['txt_comment'])){
            $id = $_GET['s_id'];
            $pos = $_GET['txt_position'];
            $sa = $_GET['txt_salary'];
            $com = $_GET['txt_comment'];
            $r = management_promoteModel::update_staff_shift($id,$pos,$sa,$com);
            if($r > 0){
                // return 1;
                echo '<script language="javascript">';
                echo '$.notify(
                       "Promote Successful!", 
                       { position:"top center" }
                   );';
                echo '</script>';

            }else{
                return 0;
            }

        }

    }
    





    /* *
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
