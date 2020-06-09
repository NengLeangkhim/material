<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addSupplier extends Controller
{
    //
    public function getaddSupplier(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $m='<form action="/addsupplier" id="form1" method="POST" name="addsupplier">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Name <i class="text-danger">*</i></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Contact <i class="text-danger">*</i></label>
                                        <input type="text" name="contact" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addsupplier\',\'form1\',\'isupplier\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }else{
            return view('login');
        }
    }

    public function addSupplier(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $website=$_POST['website'];
            $address=$_POST['address'];
            $sql="insert_supplier('$name',$staff,'$contact','$email','$website','$address')";
            $q=DB::select("SELECT ".$sql);
            if(count($q)>0){
                return redirect()->back();
            }
        }else{
            return view('login');
        }
    }
}
