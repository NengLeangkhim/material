<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <section class="content-header">
            <h2>
                <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Product Import</a>
            </h2>
        </section>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>

            <form name="addproductimport" id="frm_addpimport" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="action_type" id='action_type' value="in">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Company <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select name="company" id="icompany" class="form-control select2" onchange="getbranch(this,'company_branch','s','/getcompany');clear_row()" required>
                                @php
                                    foreach($action[0] as $company){
                                        echo '<option value="'.$company->id.'">'.$company->name.'</option>';
                                    }
                                @endphp
                            </select>
                            {{-- <input type="text" id="custname" name="custname" class="form-control" required=""> --}}
                            <a href="#" onclick="add_dialog('/addcompany')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Company Branch<i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select name="company_branch" id="company_branch" class="form-control select2" onchange="clear_row()" required>
                            </select>
                            {{-- <input type="text" id="custname" name="custname" class="form-control" required=""> --}}
                            <a  href="javascript:void(0);" onclick="add_dialog('/addcompanybranch')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Deliver By<i class="text-danger">*</i> </label>
                        <div class="input-group">
                            <select class="form-control select2" id="istaff" name="_by" required>
                                @php
                                foreach($action[1] as $staff){
                                    echo '<option value="'.$staff->id.'">'.$staff->name.'</option>';
                                }
                            @endphp
                            </select>
                            <a  href="javascript:void(0);" onclick="add_dialog('/addstaff')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Supplier <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select class="form-control select2" id="isupplier" name="supplier">
                            @php
                                    foreach($action[2] as $supllier){
                                        echo '<option value="'.$supllier->id.'">'.$supllier->name.'</option>';
                                    }
                            @endphp
                            </select>
                            <a  href="javascript:void(0);" onclick="add_dialog('/addsupplier')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Invoice Number</label>
                        <input type="text" class="form-control" name="invoice_number">
                    </div>
                    <div class="form-group col-md-9">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" autocomplete="off">
                    </div>
                <br>

                <div class="container">
                    <div class="form-group col-3 col-xs-push-8">
                        <input type="text" name="" id="product_search" class="form-control" placeholder="search...">
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
                </div>
                    <div class="form-group col-md-12 text-right">
                        <button class="btn btn-primary" id="frm_btn_subaddpimport" type="button"  name="savecustproduct">
                            <i class="fa fa-plus"></i> Save
                        </button>
                        <a href="javascript:void(0);" onclick="go_to('productImport')" class="btn btn-danger m-l-5">
                            <i class="fa fa-close"></i> Cancel
                        </a>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div id='modaldiv'></div>
<!-- /page content -->
</section>
<script type="text/javascript">
    $(document).ready(
        function(){
            getbranch(document.addproductimport.company,'company_branch','s','/getcompany');
            get_product('','tbody_a',1);
        }
    );
    $('#frm_btn_subaddpimport').click( function(){
        var tbody = document.getElementById("tbody_b");
        if(tbody.rows.length<1){
            ok_dialog('Please Select product first!','No product!');
            // setTimeout(function(){$("#modaladd").modal("show");},300);
        }else{
            submit_form('/addProductImport','frm_addpimport','productImport');
        }
    });
    $("body").on('DOMSubtreeModified', "#modaldiv", function() {
   if(document.getElementById("okmodal")){
        $("#okmodal").modal("show");
   }
});
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
})
$('#product_search').keyup(
    function(){
        get_product(this.value,'tbody_a',1);
    }
);
</script>