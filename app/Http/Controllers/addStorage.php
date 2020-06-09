<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addStorage extends Controller
{
    //
    public function getaddStorage(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $m='<form action="/addstorage" id="form1" method="POST" name="addstorage">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Storage</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name <i class="text-danger">*</i></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addstorage\',\'form1\',\'istorage\')">Save</button>
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

    public function getaddStorageLocation(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $q=DB::select("SELECT id,name from storage");
            $m='<form action="/addstorage" id="form1" method="POST" name="addstoragelocation">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Storage Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name <i class="text-danger">*</i></label>
                                        <input type="hidden" name="_loc" value="loc">
                                        <select name="name" class="form-control" required="">';
                                        foreach($q as $r){
                                            $m.='<option value="'.$r->id.'">'.$r->name.'</option>';
                                        }
                                        $m.='<option hidden disabled selected value=\'-1\'></option></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Location <i class="text-danger">*</i></label>
                                        <input type="text" name="location" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Description <i class="text-danger">*</i></label>
                                        <input type="text" name="description" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addstorage\',\'form1\',\'storage_location\')">Save</button>
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

    public function addstorage(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            if(isset($_POST['location'])){
                $location=$_POST['location'];
            }
            if(isset($_POST['description'])){
                $des=$_POST['description'];
            }
            if(isset($_POST['_loc'])){
                $sql="insert_storage_location($name,'$location',$staff,'$des')";
            }else{
                $sql="insert_storage('$name',$staff)";
            }
            $q=DB::select("SELECT ".$sql);
            if(count($q)>0){
                return redirect()->back();
            }
        }else{
            return view('login');
        }
    }
}
