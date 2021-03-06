<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class addProductBrand extends Controller
{
    //modal to show add dialog
    public function getaddProductBrand(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $m='<form action="" id="form1" method="POST" name="addproductbrand">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <div class="modal fade" id="modaladd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="exampleModalCenterTitle">Add Product Brand</h5>
                        <button type="button" onclick="close_modal_edge()" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Brand name <i class="text-danger">*</i></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="close_modal_edge()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="SubForm(\'/addproductbrand\',\'form1\',\'ibrand\')">Save</button>
                        </div>
                </div>
            </div>
            </div>
            </div>
            </form>';
            echo $m;
        }
    }

    public function addProductBrand(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $name=$_POST['name'];
            $sql="insert_product_brand('$name',$staff)";
            $q=DB::select("SELECT ".$sql);
        }
    }
}
