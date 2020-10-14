<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <div>
            <section class="content-header">
                    <h2>
                        <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Product Assign Detail</a>
                    </h2>
            </section>
        </div>
    </div>
        <div class="pull-right" style="margin-top: -1.3%;">
            <a  href="javascript:void(0);" onclick="window.print();" class="text-danger"><i class="fa fa-print"></i> Print</a>
            {{-- <a href="#" title="Add New" class="text-custom"><i class="fa fa-plus-square"></i> Create New </a> | --}}
            {{-- <a href="/productListDetial?edit={{$plist[0][0]->id}}" title="Update" class="text-custom"><i class="fa fa-pencil-square"></i> Update</a>|
            <a href="#" onclick="yesno_dialog('/productListDetial?delete={{$plist[0][0]->id}}','Are you sure to delete this?','Delete')" title="Update" class="text-custom"><i class="fa fa-trash"></i> Delete</a> --}}
        </div>
        <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:1%;margin-top:1%"></div>
        <div class="box-body">
                    <div class="pro-detail-head col-md-9">
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Company Name</span> : {{$plist[0][0]->name}}
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Company Code</span> : {{$plist[0][0]->code}}
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Company create on system date</span> : {{ date_format(date_create($plist[0][0]->create_date), 'd-M-Y h:i:s A')}}<br>
                        </h4>
                        {{-- <h4 style="margin-top: 0px;">
                            <span class="text-primary">Arrival Date</span>: {{ date_format(date_create($plist[0][0]->arrival_date), 'd-M-Y h:i:s A')}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Description</span>: {{$plist[0][0]->description}}<br>
                        </h4> --}}
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="headings">
                          <th class="column-title" >No </th>
                          <th class="column-title" style="display: table-cell;">Product Code</th>
                          <th class="column-title" style="display: table-cell;">Brand</th>
                          <th class="column-title" style="display: table-cell;">Name</th>
                          <th class="column-title" style="display: table-cell;">Part Number</th>
                          <th class="column-title" style="display: table-cell;">Barcode</th>
                          <th class="column-title" style="display: table-cell;">Measurement</th>
                          <th class="column-title" style="display: table-cell;">Currency</th>
                          <th class="column-title" style="display: table-cell;">Qty</th>
                          <th class="column-title" style="display: table-cell;">Price</th>
                          <th class="column-title" style="display: table-cell;">Amount</th>
                        </tr>
                      </thead>

                      <tbody>
                      @php
                        $i=1;
                        $sumamount=0;
                        foreach($plist[1] as $a){
                            $q=(empty($a->qty))?0:$a->qty;
                            // $a->product_code=(!empty($a->product_code))?$plist[0][0]->code.'-'.$a->product_code:'';
                            echo '<tr>';
                            echo '<td class=" ">'.$i++.'</td>';
                            echo '<td class=" ">'.$a->product_code.'</td>';
                            echo '<td class=" ">'.$a->brand.'</td>';
                            echo '<td class=" ">'.$a->name.'</td>';
                            echo '<td class=" ">'.$a->part_number.'</td>';
                            echo '<td class=" ">'.$a->barcode.'</td>';
                            echo '<td class=" ">'.$a->measurement.'</td>';
                            echo '<td class=" ">'.$a->currency.'</td>';
                            echo '<td class=" ">'.$q.'</td>';
                            echo '<td class=" ">'.$a->price.'</td>';
                            echo '<td class=" ">'.$a->amount.'</td></tr>';
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
});
</script>