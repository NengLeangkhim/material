<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class addCustomer extends Controller
{
    //modal to show add dialog
    public function getaddCustomer(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $m='<form action="/addcustomer" id="form1" method="POST">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Customer</h5>
                        <button type="button" onclick="close_modal_edge()" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Customer Name <i class="text-danger">*</i></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Branch <i class="text-danger">*</i></label>
                                        <input type="text"  name="branch" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Connection <i class="text-danger">*</i></label>
                                        <input type="text" name="connection" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Contact <i class="text-danger">*</i></label>
                                        <input type="text"  name="contact" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Address <i class="text-danger">*</i></label>
                                        <input type="text" name="address" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal_edge()">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addcustomer\',\'form1\',\'icustomer\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }
    }
    public function getaddCustomerbranch(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $q=DB::select("SELECT id,name from customer");
            $m='<form action="/addcustomer" id="form1" method="POST">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Customer Branch</h5>
                        <button type="button" class="close" onclick="close_modal_edge()" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                <input type="hidden" name="_b" value="branch">
                                    <div class="form-group col-md-6">
                                        <label>Customer Name <i class="text-danger">*</i></label>
                                        <select name="name" class="form-control" required="">';
                                        foreach($q as $r){
                                            $m.='<option value="'.$r->id.'">'.$r->name.'</option>';
                                        }
                                    $m.='<option hidden disabled selected value=\'-1\'></option></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Branch <i class="text-danger">*</i></label>
                                        <input type="text" name="branch" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Connection <i class="text-danger">*</i></label>
                                        <input type="text" name="connection" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Contact <i class="text-danger">*</i></label>
                                        <input type="text" name="contact" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Address <i class="text-danger">*</i></label>
                                        <input type="text" name="address" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="close_modal_edge()" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addcustomer\',\'form1\',\'customer_branch\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }
    }
    public function addCustomer(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            $branch=$_POST['branch'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            $connection=$_POST['connection'];

            if(isset($_POST['_b'])){
                $sql="insert_customer_branch($name,'$branch','$contact','$address',$staff,'$connection')";
            }else{
                $sql="insert_customer('$name','$branch','$contact','$address',$staff,'$connection')";
            }
            $q=DB::select("SELECT ".$sql);
        }
    }
}
