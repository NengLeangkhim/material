<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addCurrency extends Controller
{
    //
    public function getaddCurrency(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $m='<form action="/addcurrency" id="form1" method="POST" name="addcurrency">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Currency</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="close_modal_edge()" aria-label="Close">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal_edge()">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addcurrency\',\'form1\',\'icurrency\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }else{
            return view('no_perms');
        }
    }

    public function addCurrency(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            $sql="insert_currency('$name',$staff)";
            $q=DB::select("SELECT ".$sql);
            if(count($q)>0){
                return redirect()->back();
            }
        }else{
            return view('no_perms');
        }
    }
}
