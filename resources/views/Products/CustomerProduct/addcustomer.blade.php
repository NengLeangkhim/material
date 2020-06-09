@php
$re="";
$a=$action[0];
    if($action[0]=='out'){
        $re="Request By";
        $title="(Request)";
    }else if($a=='return'){
        $re="Return By";
        $title="(Return)";
    }
@endphp
@include('../userview/header')
<div class="right_col" role="main">
    <div class="container-fluid">
        <section class="content-header">
            <h2>
            <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Customer Products {{$title}}</a>
            </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <div>


            <form name="addproductcustomer" action="/addCustomerProduct" method="post" enctype="multipart/form-data" onsubmit="return ">
                @csrf
                <input type="hidden" name="action_type" id='action_type' value="{{$a}}">
            <div class="box-info">
                <div class="box-body">
                    <div class="form-group col-md-3">
                        <label>Customer <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select name="customer" id='icustomer' class="form-control" onchange="getbranch(this,'customer_branch','s','/getcustomer')">
                                @php
                                    foreach($action[1] as $customer){
                                        echo '<option value="'.$customer->id.'">'.$customer->name.'</option>';
                                    }
                                @endphp
                            </select>
                            {{-- <input type="text" id="custname" name="custname" class="form-control" required=""> --}}
                            <a  href="javascript:void(0);" onclick="add_dialog('/addcustomer')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Customer Branch<i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select name="customer_branch" id="customer_branch" class="form-control" onchange="getcustomer_con(document.addproductcustomer.customer,this,'account','/getcustomercon')">
                            </select>
                            {{-- <input type="text" id="custname" name="custname" class="form-control" required=""> --}}
                            <a  href="javascript:void(0);" onclick="add_dialog('/addcustomerbranch')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Connection <i class="text-danger">*</i></label>
                        <input type="text" id="account" name="accountname" class="form-control" readonly="" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label>{{$re}} <i class="text-danger">*</i> </label>
                        <div class="input-group">
                            <select class="form-control" id="istaff" name="_by">
                                @php
                                foreach($action[2] as $staff){
                                    echo '<option value="'.$staff->id.'">'.$staff->name.'</option>';
                                }
                            @endphp
                            </select>
                            <a  href="javascript:void(0);" onclick="add_dialog('/addstaff')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" autocomplete="off">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <br>

                <div class="container" style="height:370px;">
                    <div class="form-group col-3 col-xs-push-8">
                        <input type="text" name="" id="product_search" class="form-control" placeholder="search...">
                    </div>
                    <div class="table">
                        <table class="table table-bordered table-hover"  >
                            <thead class="head-sticky">
                            <tr>
                                <th style="width: 2%">No</th>
                                <th>Product Code</th>
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
                        <button class="btn btn-primary" type="submit" name="savecustproduct">
                            <i class="fa fa-plus"></i> Save
                        </button>
                        <a href="javascript:history.back()" class="btn btn-danger m-l-5">
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
</div>
<div id='modaldiv'>
</div>
@include('../userview/footer')
<script type="text/javascript">
    $(document).ready(
        function(){
            getbranch(document.addproductcustomer.customer,'customer_branch','s','/getcustomer');
            setTimeout(function(){
                getcustomer_con(document.addproductcustomer.customer,document.addproductcustomer.customer_branch,'account','/getcustomercon');
            },500);
            get_product('','tbody_a',1);
           $("#icustomer").change(
               function(){
                setTimeout(function(){
                    getcustomer_con(document.addproductcustomer.customer,document.addproductcustomer.customer_branch,'account','/getcustomercon');
                },300);
               }
           );
        }
    );
    document.addproductcustomer.onsubmit = function(){
        var tbody = document.getElementById("tbody_b");
        if(tbody.rows.length<1){
            ok_dialog('Please Select product first!','No product!')
            return false;
        }else{
            return OnSubmitCofirm('Do you want to add ?');
        }
        return true;
    };
    $("body").on('DOMSubtreeModified', "#modaldiv", function() {
   if(document.getElementById("okmodal")){
        $("#okmodal").modal("show");
   }
   if(document.getElementById("modaladd")){
        $("#modaladd").modal("show");
   }
});
</script>