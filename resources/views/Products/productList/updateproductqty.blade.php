@php
// dump($addp);
// $edit=array();
// if(count($addp)==6){
//     foreach($addp[5] as $d){
//         $edit=$d;
//     }
//     $id=$edit->id;
//     $pname=$edit->name;
//     $ppartNumber=$edit->part_number;
//     $supplier=$edit->company_id;
//     $supplier_branch=$edit->branch_id;
//     $unitType=$edit->measurement_id;
//     $brand=$edit->brand_id;
//     $cost=$edit->price;
//     $img=$edit->image;
//     $record_qty=$edit->qty;
//     $description=$edit->description;
//     $currency=$edit->currency_id;
//     $bbarcode=$edit->barcode;
//     // $storage_location=
// }else{
//     $id=0;
//     $pname="";
//     $ppartNumber="";
//     $supplier=0;
//     $unitType="";
//     $brand=0;
//     $cost="";
//     $sale_price="";
//     $img="";
//     $record_qty="";
//     $description="";
//     $currency=0;
//     $supplier_branch=0;
//     $bbarcode="";
// }
// $sel="";
@endphp
@include('../userview/header')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <section class="content-header">
            <h2>
                <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Update Product Qty/Storage location</a>
            </h2>
        </section>
        <div>
        <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <form action="/Updateproductqty" method="post" name="addproduct" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="pid" value="{{$id}}"> --}}
            <div class="box-info" style="padding-top: 20px;">
                <div class="box-body">
                    <h5 style="margin-top: 0px; float:left;">
                        <span class="text-primary">Move from: </span>
                    </h5>
                    <h5 style="margin-top: 0px;margin-left:50%">
                        <span class="text-primary">To: </span>
                    </h5>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Qty <i class="text-danger">*</i></label>
                        <input type="number" step='1' name="reorder_qty" class="form-control number"  required>
                 </div>
                 <div class="form-group col-md-3 col-lg-3">
                    <label>Storage location *</label>
                    <select class="form-control" name="storage_location" required>
                        @php
                        // foreach($addp[3] as $storagee){
                        //     $sel=($storagee->id==$unitType)?"selected":"";
                        //     echo '<option value="'.$storagee->id.'"'.$sel.'>'.$storagee->name.'</option>';
                        // }
                    @endphp
                    </select>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Qty <i class="text-danger">*</i></label>
                        <input type="number" step='1' name="reorder_qty" class="form-control number"  required>
                 </div>
                 <div class="form-group col-md-3 col-lg-3">
                    <label>Storage location *</label>
                    <select class="form-control" name="storage_location" required>
                        @php
                        // foreach($addp[3] as $storagee){
                        //     $sel=($storagee->id==$unitType)?"selected":"";
                        //     echo '<option value="'.$storagee->id.'"'.$sel.'>'.$storagee->name.'</option>';
                        // }
                    @endphp
                    </select>
                </div>
                    <div class="form-group col-md-12 col-lg-12">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="" autocomplete="off" >
                    </div>
                </div>
            </div>




            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-info">Save</button>
                <!-- <a href="" class="btn btn-info">Save</a> -->
                <a href='javascript:void(0);' onclick="go_to('ProductList')" class="btn btn-danger">Cancel</a>
            </div>
            </form>




        </div>
    </div>
</div>
<!-- /page content -->
@include('../userview/footer')
{{-- Js  --}}
<script type="text/javascript">
    function getbranch(s) {
            $.ajax({
               type:'GET',
               url:'/getsupplier?supplier_id='+s.value,
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                    var s_b=document.addproduct.supplier_branch;
                    s_b.options.length=0;
                    var b =data.branch_id;
                    for (var i = 0; i < b.length; i++) {
                        var option = document.createElement("option");
                        option.text=""+b[i]['branch'];
                        option.value=b[i]['id'];
                        if(b[i]['id']==document.addproduct.sup_branch.value){
                            option.setAttribute("selected","true");
                        }
                        s_b.add(option);
                   }
               }
            });
         }
         $(document).ready(function(){
            getbranch(document.addproduct.supplier);
            if(document.addproduct.pid.value>0){
                document.addproduct.reorder_qty.setAttribute("disabled","true");
                document.addproduct.storage_location.setAttribute("disabled","true");
                document.addproduct.reorder_qty.removeAttribute("required");
                document.addproduct.storage_location.removeAttribute("required");
                document.addproduct.storage_location.value="";
                document.addproduct.reorder_qty.value="";
            }
         });
</script>