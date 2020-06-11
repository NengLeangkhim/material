<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <div>
            <section class="content-header">
                    <h2>
                        <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image"> Product List Detail</a>
            </section>
        </div>
        <div class="pull-right" style="margin-top: -1.3%;">
            <a  href="javascript:void(0);" onclick="window.print();" class="text-danger"><i class="fa fa-print"></i> Print</a> |
            {{-- <a href="#" title="Add New" class="text-custom"><i class="fa fa-plus-square"></i> Create New </a> | --}}
            <a href='javascript:void(0);' onclick="go_to('/productListDetial?edit={{$plist[0][0]->id}}')" title="Update" class="text-custom"><i class="fa fa-pencil-square"></i> Update</a>|
            {{-- <a href="#" onclick="yesno_dialog('/productListDetial?delete={{$plist[0][0]->id}}','Are you sure to delete this?','Delete')" title="Update" class="text-custom"><i class="fa fa-trash"></i> Delete</a> --}}
        </div>
        <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:1%;margin-top:1%"></div>


        <div class="box-body">
                    <div class="pull-right text-center" style="position: absolute; right: 20px;">
                        <img src="<?php echo (empty($plist[0][0]->image))?'/media/file/img/placeholder-image.png':$plist[0][0]->image;?>" style="max-height: 180px; max-width: 310px">
                    </div>
                    <div class="pro-detail-head col-md-9">
                        <h4 style="margin-top: 0px;">
                            <span class="text-danger">Name</span>: {{$plist[0][0]->name}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Barcode</span>:{{$plist[0][0]->barcode}}                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Part Number</span>: {{$plist[0][0]->part_number}}<br>

                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Cost</span>: {{$plist[0][0]->price}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Qty</span>: {{$plist[0][0]->qty}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Amount</span>: {{$plist[0][0]->amount}}<br>
                        </h4>
                        {{-- <span class="btn btn-sm btn-success">Active</span>
                        <span class="btn btn-sm btn-info">Report Stock</span> --}}
                        {{-- <h5>
                            <div class="row">
                                <div style="margin-right:20px">
                                    <div>Cost</div></span>
                                    <span class="text-primary" ><span class="fa fa-usd"></span> {{$plist[0][0]->price}}
                                </div>
                                <div style="margin-right:20px">
                                    <div>Qty</div></span>
                                    <span class="text-primary" > {{$plist[0][0]->qty}}</span>
                                </div>
                            </div>
                        </h5> --}}
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="headings">
                          {{-- <th width=2px>
                          </th> --}}
                          <th class="column-title" >No </th>
                          <th class="column-title" style="display: table-cell;">Product code</th>
                          <th class="column-title" style="display: table-cell;">Qty</th>
                          <th class="column-title" style="display: table-cell;">Storage</th>
                          <th class="column-title" style="display: table-cell;">Storage location</th>
                          <th class="column-title" style="display: table-cell;">Company</th>
                          <th class="column-title" style="display: table-cell;">Company Branch</th>
                        </tr>
                      </thead>

                      <tbody>
                      @php
                        $i=1;
                        $sumamount=0;
                        foreach($plist[1] as $a){
                            $q=(empty($a->qty))?0:$a->qty;
                            $a->product_code=(!empty($a->product_code)&&!empty($a->company_code))?$a->company_code.'-'.$a->product_code:"";
                            echo '<tr class="even pointer">';
                            echo '<td class=" ">'.$i++.'</td>';
                            echo '<td class=" ">'.$a->product_code.'</td>';
                            echo '<td class=" ">'.$q.'</td>';
                            echo '<td class=" ">'.$a->storage.'</td>';
                            echo '<td class=" ">'.$a->location.'</td>';
                            echo '<td class=" ">'.$a->company.'</td>';
                            echo '<td class=" ">'.$a->branch.'</td></tr>';
                        }

                      @endphp
                      </tbody>
                    </table>




                {{-- <div class="box-footer">
                    <table class="table table-noborder">
                        <tbody>
                            <tr>
                                <th width="120">Supplier</th>
                                <td width="300">: Default Supplier</td>
                                <th width="120">Unit Type</th>
                                <td>: Unit</td>
                            </tr>
                            <tr>
                                <th>Brand / Model</th>
                                <td>: None</td>
                                <th>Desctiption</th>
                                <td>: </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
    </div>
 </div>
 <div id='modaldiv'></div>
<!-- /page content -->
</section>

<script type="text/javascript">//to show modal
    $("body").on('DOMSubtreeModified', "#modaldiv", function() {
   if(document.getElementById("yesnomodal")){
        $("#yesnomodal").modal("show");
   }
   $(document).ready(function(){
        img_exist();
   });
});
</script>