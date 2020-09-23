@php
// dump($addp);
$edit=array();
if(count($addp)==6){
    foreach($addp[6] as $d){
        $edit=$d;
    }
    $id=$edit->id;
    $pname=$edit->name;
    $pname_kh=$edit->name_kh;
    $pcode=$edit->product_code;
    $ppartNumber=$edit->part_number;
    $supplier=0;
    $unitType=$edit->measurement_id;
    $brand=$edit->brand_id;
    $cost=$edit->product_cost;
    $price=$edit->product_price;
    $img=$edit->image;
    $record_qty=$edit->stock_qty;
    $description=$edit->description;
    $currency=$edit->currency_id;
    $bbarcode=$edit->barcode;
    $ptype=$edit->product_type_id;
    $e='disabled';
}else{
    $id=0;
    $pname="";
    $pname_kh="";
    $ppartNumber="";
    $pcode="";
    $supplier=0;
    $unitType="";
    $brand=0;
    $cost="";
    $price='';
    $sale_price="";
    $img="";
    $record_qty="";
    $description="";
    $currency=0;
    // $company=0;
    // $company_branch=0;
    $bbarcode="";
    // $storage_location=0;
    $e='required';
    $ptype="";
}
$sel="";
@endphp
<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <section class="content-header">
            <h2>
                <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Product List</a>
            </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>


            <form method="post" id="frm_addproduct" name="addproduct" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="pid" value="{{$id}}">
            <div class="container-fluid" style="padding-top: 20px;">
                <div class="row">
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Product Type</label>
                        <div class="input-group">
                            <select class="form-control select2" name="ptype" required="" id="iptype" value="{{$ptype}}" {{$e }} onchange="getpcode(this,'pcode','getpcode')">
                                @php
                                    foreach($addp[7] as $brandd){
                                        $sel=($brandd->id==$ptype)?'selected':"";
                                        echo '<option value="'.$brandd->id.'"'.$sel.'>'.$brandd->name_en.'</option>';
                                    }
                                @endphp
                            </select>
                            @php
                                echo (empty($ptype))?'':"<input hidden name='ptype' value='{$ptype}'>";
                            @endphp
                            {{-- <a  href="javascript:void(0);" onclick="add_dialog('/addptype')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a> --}}
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Product Code <i class="text-danger"><i class="text-danger">*</i></i></label>
                        <input type="text" name="product_code" id='pcode' class="form-control" value="{{$pcode}}" readonly>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Brand</label>
                        <div class="input-group">
                            <select class="form-control select2" name="brand" required="" id="ibrand" value="{{$brand}}">
                                @php
                                    foreach($addp[2] as $brandd){
                                        $sel=($brandd->id==$brand)?'selected':"";
                                        echo '<option value="'.$brandd->id.'"'.$sel.'>'.$brandd->name.'</option>';
                                    }
                                @endphp
                            </select>
                            {{-- <a  href="javascript:void(0);" onclick="add_dialog('/addproductbrand')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a> --}}
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Measurement<i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select class="form-control select2" name="unit" required id="iunit_type">
                            @php
                                foreach($addp[1] as $measurement){
                                    $sel=($measurement->id==$unitType)?"selected":"";
                                    echo '<option value="'.$measurement->id.'"'.$sel.'>'.$measurement->name.'</option>';
                                }
                            @endphp
                            </select>
                            {{-- <a  href="javascript:void(0);" onclick="add_dialog('/addmeasurement')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a> --}}
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label>Product Name (EN)<i class="text-danger">*</i></label>
                        <input type="text" name="name" class="form-control" required value="{{$pname}}">
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label>Product Name (KHMR)<i class="text-danger">*</i></label>
                        <input type="text" name="name_kh" class="form-control" required value="{{$pname_kh}}">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Part Number</label>
                        <input type="text" name="item" class="form-control" value="{{$ppartNumber}}">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Barcode</label>
                        <input type="text" name="barcode" class="form-control" value="{{$bbarcode}}">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Currency <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select class="form-control select2" name="currency" required id="icurrency">
                                @php
                                foreach($addp[4] as $currencyy){
                                    $sel=($currencyy->id==$currency)?"selected":"";
                                    echo '<option value="'.$currencyy->id.'"'.$sel.'>'.$currencyy->name.'</option>';
                                }
                            @endphp
                            </select>
                            {{-- <a  href="javascript:void(0);" onclick="add_dialog('/addcurrency')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a> --}}
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Cost <i class="text-danger">*</i></label>
                        <input type="number" step="0.0001" min="0.0001" name="cost" class="form-control currency" value="{{$cost}}" placeholder="0.0000" onkeypress="valid_float(event)" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Price</label>
                        <input type="number" step="0.0001" min="0.0001" name="price" class="form-control currency" value="{{$price}}" placeholder="0.0000" onkeypress="valid_float(event)" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label>Account chart <i class="text-danger">*</i></label>
                        <div class="input-group">
                            <select class="form-control select2" name="account_chart" required id="iaccount_chart">
                                @php
                                foreach($addp[8] as $currencyy){
                                    $sel=($currencyy->id==$currency)?"selected":"";
                                    echo '<option value="'.$currencyy->id.'"'.$sel.'>'.$currencyy->name.'</option>';
                                }
                            @endphp
                            </select>
                            {{-- <a  href="javascript:void(0);" onclick="add_dialog('/addcurrency')" class="input-group-addon pointer">
                                <span class="fa fa-plus"></span>
                            </a> --}}
                        </div>
                    </div>
                    <div class="form-group col-md-9 col-lg-9">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="" value="{{$description}}">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Image(Optional)</label>
                        <input type="file" name="image" class="form-control-file" data-placeholder="" id="filestyle-0" style="padding-top: 1.8%;">
                        {{-- <div class="bootstrap-filestyle input-group"><input type="text" class="form-control " placeholder="" disabled=""> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div> --}}
                    </div>
                </div>
            </div>




            <div class="col-md-12 text-right">
                <button type="button" id="frm_btn_sub_addp" class="btn btn-info">Save</button>
                <!-- <a href="" class="btn btn-info">Save</a> -->
                <a href='javascript:void(0);' onclick="go_to('ProductList')" class="btn btn-danger">Cancel</a>
            </div>
            </form>




        </div>
    </div>
</div>
<div id="modaldiv"></div>
<!-- /page content -->
</section>
{{-- Js  --}}
<script type="text/javascript">

         $(document).ready(function(){
            // getbranch(document.addproduct.company,'company_branch','comp_branch','/getcompany');
            // getbranch(document.addproduct.storage,'storage_location','storage_loc','/get_s_location');
            getpcode(document.addproduct.ptype,'pcode','getpcode');
            if(document.addproduct.pid.value>0){
                // document.addproduct.reorder_qty.setAttribute("disabled","true");
                // document.addproduct.storage_location.setAttribute("disabled","true");
                // document.addproduct.reorder_qty.removeAttribute("required");
                // document.addproduct.storage_location.removeAttribute("required");
                // document.addproduct.storage_location.value="";
                // document.addproduct.reorder_qty.value="";
            }
         });
$("body").on('DOMSubtreeModified', "#modaldiv", function() {
   if(document.getElementById("modaladd")){
        $("#modaladd").modal("show");
   }
});
$("#frm_btn_sub_addp").click(function(){
    submit_form ('/AddProductList','frm_addproduct','ProductList');
});
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>