@php
    $ap="";
    if($plist[0][0]->action_type=="out"){
        $act='Request';
    }else if($plist[0][0]->action_type=="in"){
        $act='Import';
    }
@endphp
{{-- @include('../otherUser/header') --}}
<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <div>
            <section class="content-header">
                    <h2>
                        <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Product {{ $act }} Detail</a>
                    </h2>
            </section>
        </div>
    </div>
        <form action="approveProductCompany" name="approveproductcompany" method="POST" id='frm_aprcop'>
        @csrf
        <div class="pull-right" style="margin-top: -1.3%;">
            <a  href="javascript:void(0);" onclick="window.print();" class="text-danger"><i class="fa fa-print"></i> Print</a>
            @php
                echo $apr;
            @endphp
            <input type="button" value="approve" id='sub' style="display:none;">
            {{-- <a href="/productListDetial?edit={{$plist[0][0]->id}}" title="Update" class="text-custom"><i class="fa fa-pencil-square"></i> Update</a>|
            <a href="#" onclick="yesno_dialog('/productListDetial?delete={{$plist[0][0]->id}}','Are you sure to delete this?','Delete')" title="Update" class="text-custom"><i class="fa fa-trash"></i> Delete</a> --}}
        </div>
        <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:1%;margin-top:1%"></div>
        <div class="box-body">
                    <div class="pro-detail-head col-md-9">
                        <h4 style="margin-top: 0px;">
                        <span class="text-primary">Deliver By</span>:{{$plist[0][0]->_by}}</h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Company</span>: {{$plist[0][0]->company}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Branch</span>: {{$plist[0][0]->branch}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Create Date</span>: {{ date_format(date_create($plist[0][0]->create_date), 'd-M-Y h:i:s A')}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Approve Status</span>: {{$plist[0][0]->approve}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Approve By</span>: {{$plist[0][0]->approve_by}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Approve Date</span>: {{date_format(date_create($plist[0][0]->approve_date), 'd-M-Y h:i:s A')}}<br>
                        </h4>
                        <h4 style="margin-top: 0px;">
                            <span class="text-primary">Description</span>: {{$plist[0][0]->description}}<br>
                        </h4>
                        <input type="hidden" name="company" id="icompany" value="{{$plist[0][0]->company_id}}">
                        <input type="hidden" name="compan_branch" id="company_branch" value="{{$plist[0][0]->branch_id}}">
                        <input type="hidden" name="action_type" id="action_type" value="{{$plist[0][0]->action_type}}">
                        <input type="hidden" name="approve" id="approve" value="{{$plist[0][0]->approve}}">
                        <input type="hidden" name="before_id" value="{{$plist[0][0]->id}}">
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-cart">
                      <thead>
                        <tr class="headings">
                          {{-- <th class="column-title" >No </th>
                          <th class="column-title" style="display: table-cell;">Brand</th>
                          <th class="column-title" style="display: table-cell;">Name</th>
                          <th class="column-title" style="display: table-cell;">Part Number</th>
                          <th class="column-title" style="display: table-cell;">Barcode</th>
                          <th class="column-title" style="display: table-cell;">Measurement</th>
                          <th class="column-title" style="display: table-cell;">Currency</th>
                          <th class="column-title" style="display: table-cell;">Qty</th>
                          <th class="column-title" style="display: table-cell;">Price</th>
                          <th class="column-title" style="display: table-cell;">Amount</th> --}}
                          <th style="width: 2%">No</th>
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
                      </tbody>
                      <tfoot>
                        <tr>
                            <td colspan="9" style="text-align: right">Total:</td>
                            <td colspan="2">0</td>
                        </tr>
                    </tfoot>
                    </table>
        </div>
    </form>
 </div>
 <div id='modaldiv'></div>
<!-- /page content -->
</section>

<script type="text/javascript">//to show modal
    $("body").on('DOMSubtreeModified', "#modaldiv", function() {
   if(document.getElementById("okmodal")){
        $("#okmodal").modal("show");
   }
});
$('#sub').click( function(){
        var tbody = document.getElementById("tbody_b");
        if(tbody.rows.length<1){
            ok_dialog('Please Select product first!','No product!');
        }else{
            submit_form('/approveProductCompany','frm_aprcop','productCompanyimport');
        }
    });
</script>
@php

$script='<script src="stJS/ajaxcompanyview.js"></script><script type="text/javascript">';
    foreach($plist[1] as $p){
        $script.='add_row_qty('.$p->product_id.','.$p->qty.','.$p->price.');';
    }
    $script.='</script>';
    echo $script;
@endphp