@php
    if($action=='out'){
        $title="Request";
        $route="addProductCompanyrequest";
        $table='productCompanyrequest';
    }else if($action=="in"){
        $title="Import";
        $route="addProductCompanyimport";
        $table='productCompanyimport';
    }
@endphp
{{-- @include('../otherUser/header') --}}
<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <input type="hidden" name="action_type" value="{{$action}}">
        <section class="content-header">
            <h2>
                <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Product Company({{$title}})</a>
                / <a href="javascript:void(0);" onclick="go_to('/{{$route}}')" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</a>
                        </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <div class="row">
                <div class="col-md-9">
                    <a  href="javascript:void(0)"  class="btn btn-light">PDF</a>
                    <a  href="javascript:void(0);" class="btn btn-light">Excel</a>
                </div>
                <div class="col-md-3 right">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Search</span>
                        </div>
                        {{--  --}}
                        <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" onkeyup="getTable_search('{{$table}}','id',this)">
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="tablediv">
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
</section>
<script type='text/javascript'>
    $(document).ready(
        function(){
            if($('input[name ="action_type"]').val()=="out"){
                getTable('productCompanyrequest','id');
            }else if($('input[name ="action_type"]').val()=="in"){
                getTable('productCompanyimport','id');
            }
        }
    );
  </script>