<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;

class modal extends Controller
{
    //
    public function yes_no(){
        $route=$_GET['route'];
        $message=$_GET['message'];
        $title=$_GET['title'];

        $modal='<!-- Modal -->
        <div class="modal fade" id="yesnomodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">'.$title.'</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                '.$message.'
              </div>
              <div class="modal-footer">
                <a href="'.$route.'" class="btn btn-primary">Ok</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>';
        echo $modal;
    }
    public function o_k(){
      // $route=$_GET['route'];
      $message=$_GET['message'];
      $title=$_GET['title'];
      $modal='<!-- Modal -->
      <div class="modal fade" id="okmodal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">'.$title.'</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              '.$message.'
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>';
      echo $modal;
  }
}
