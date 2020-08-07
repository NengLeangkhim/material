<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class addCompany extends Controller
{
    //
    //modal to show add dialog
    public function getaddCompany(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $m='<form action="/addcompany" id="form1" method="POST">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Company</h5>
                        <button type="button" class="close" onclick="close_modal_edge()" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Company Name <i class="text-danger">*</i></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Branch <i class="text-danger">*</i></label>
                                        <input type="text" name="branch" class="form-control" required="">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal_edge()">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addcompany\',\'form1\',\'icompany\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }
    }
    public function getaddCompanybranch(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $q=DB::select("SELECT id,name from ma_company");
            $m='<form action="/addcompany" id="form1" method="POST">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Company Branch</h5>
                        <button type="button" class="close" onclick="close_modal_edge()" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                <input type="hidden" name="_b" value="branch">
                                    <div class="form-group col-md-6">
                                        <label>Company Name <i class="text-danger">*</i></label>
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
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addcompany\',\'form1\',\'company_branch\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }
    }
    public function addCompany(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            $branch=$_POST['branch'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            // $pcode=(isset($_POST['pcode']))?$_POST['pcode']:'';
            // $company_id=0;
            if(isset($_POST['_b'])){
                $sql="insert_company_branch($name,'$contact','$branch','$address',$staff)";
                $q=DB::select("SELECT ".$sql);
            }else{
                $sql="insert_company('$name','$contact','$branch','$address',$staff) as id";
                $q=DB::select("SELECT ".$sql);
            }
        }
    }
}
