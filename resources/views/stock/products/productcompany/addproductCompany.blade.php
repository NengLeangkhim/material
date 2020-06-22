@php
    if($action[0]=='out'){
        $title='Request';
        $act='out';
        $route='productCompanyrequest';
    }else if($action[0]=='in'){
        $title='Import';
        $act='cin';
        $route='productCompanyimport';
    }
@endphp
{{-- @include('../otherUser/header') --}}
<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <section class="content-header">
            <h2>
            <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Product {{$title}}</a>
            </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>

            <form name="addproductcompany" id="frm_addcop" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="action_type" id='action_type' value="{{$act}}">
            <div class="box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Company</label>
                            <input type="text" class="form-control" value="{{$action[1][0]->company}}" disabled>
                            <input type="hidden" name="company" value="{{$action[1][0]->company_id}}">
                        </div>
                    <div class="form-group col-md-4">
                        <label>Company Branch<i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select name="company_branch" id="company_branch" class="form-control select2" onchange="clear_row()" required>
                            @php
                                foreach($action[2] as $branch){
                                    echo '<option value="'.$branch->id.'">'.$branch->branch.'</option>';
                                }
                            @endphp
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Invoice Number</label>
                        <input type="text" class="form-control" name="invoice_number">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" autocomplete="off">
                    </div>
                    <div class="clearfix"></div>
                </div>
                </div>
                <br>

                <div class="container">
                    <div class="form-group col-3 col-xs-push-8">
                        <input type="text" name="" class="form-control" placeholder="search..." onkeyup="get_product_comp(this.value,'tbody_a',1)">
                    </div>
                    <div class="table">
                        <table class="table table-bordered table-hover"  >
                            <thead class="head-sticky">
                            <tr>
                                <th style="width: 2%">No</th>
                                <th>Product Code</th>
                                <th>Product Type</th>
                                <th>Product Name</th>
                                <th >Barcode</th>
                                <th>Part Number</th>
                            </tr>
                        </thead>
                        <tbody id='tbody_a' style="overflow: auto;">

                        </tbody>
                    </table>
                    </div>
                    <div id="tbody_a_pagi"></div>
                    {{-- second table --}}
                    <div class="table">
                        <table id="table-cart" class="table table-bordered" >
                            <thead class="head-sticky">
                            <tr>
                                <th style="width: 2%">No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th >Barcode</th>
                                <th>Part Number</th>
                                <th>Storage</th>
                                <th>Storage location</th>
                                <th style="width:12% ">Available Qty</th>
                                <th style="width:12% ">Qty</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th style="width: 1%;"></th>
                            </tr>
                        </thead>
                            <tbody id='tbody_b'>
                                {{-- <tr style="display:">
                                    <td colspan="8"><input class="form-control text-center" value="No Products" disabled=""></td>
                                </tr> --}}
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10" style="text-align: right">Total:</td>
                                <td colspan="2">0</td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <button class="btn btn-primary" type="button" id="frm_btn_subaddcop" name="savecustproduct">
                            <i class="fa fa-plus"></i> Save
                        </button>
                        <a href="javascript:void(0);" onclick="go_to('<?php echo $route;?>')" class="btn btn-danger m-l-5">
                            <i class="fa fa-close"></i> Cancel
                        </a>
                    </div>
                </div>

                {{-- <div class="box-footer"> --}}

                {{-- </div> --}}
            </div>
        </form>



        </div>
    </div>
</div>
<div id='modaldiv'></div>
<!-- /page content -->
</section>
<script type="text/javascript">
    $(document).ready(
        function(){
            get_product_comp('','tbody_a',1);
        }
    );
    $('#frm_btn_subaddcop').click( function(){
        var tbody = document.getElementById("tbody_b");
        if(tbody.rows.length<1){
            ok_dialog('Please Select product first!','No product!');
        }else{
            submit_form('/addProductCompany','frm_addcop','<?php echo $route;?>');
        }
    });
    $("body").on('DOMSubtreeModified', "#modaldiv", function() {
   if(document.getElementById("modaladd")){
        $("#modaladd").modal("show");
   }
});
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>