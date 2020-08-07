<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class addStaff extends Controller
{
    //
    //modal to show add dialog
    public function getaddStaff(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $q=DB::select("SELECT id,name from ma_company");
            $m='<form action="/addstaff" id="form1" method="POST" name="addStaff">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Staff Name <i class="text-danger">*</i></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Contact <i class="text-danger">*</i></label>
                                        <input type="text" name="contact" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address </label>
                                        <input type="text" name="address" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Company <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                        <select name="a_company" class="form-control" onchange="getbranch(this,\'a_branch\',\'s\',\'/getcompany\')">';
                                        foreach($q as $r){
                                            $m.='<option value="'.$r->id.'">'.$r->name.'</option>';
                                        }
                                    $m.='       <option hidden disabled selected value=\'-1\'></option>
                                            </select>
                                            <a href="#" onclick="add_dialog(\'/addcompany\')" class="input-group-addon pointer">
                                                <span class="fa fa-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Company Branch <i class="text-danger">*</i></label>
                                        <div class="input-group">
                                            <select name="a_branch" id="a_branch" class="form-control" required>
                                            </select>
                                            <a href="#" onclick="add_dialog(\'/addcompanybranch\')" class="input-group-addon pointer">
                                                <span class="fa fa-plus"></span>
                                            </a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addstaff\',\'form1\',\'istaff\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }
    }

    public function addStaff(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            $ma_company=$_POST['a_company'];
            $branch=$_POST['a_branch'];

            $sql="insert_staff('$name','$email','$contact','$address',null,$ma_company,$branch,null,$staff)";
            $q=DB::select("SELECT ".$sql);
        }
    }
}
