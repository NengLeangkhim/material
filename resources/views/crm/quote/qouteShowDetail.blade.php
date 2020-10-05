
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="far fa-clipboard"></i></span> Quote Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="go_to('/quote')">Quote List</a></li>
                    <li class="breadcrumb-item active">Quote Detail</li>
                </ol>
            </div>
        </div>
     </div>
</section> 
<section class="content">
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="col-12" >
              <div class="row">
                <div class="col-6">
                    <div class="row"> 
                            {{-- <div class="> --}}
                            <h3 class="card-title"​>
                                <i class="fas fa-hotel" style="padding-right:15px; font-size:35px"></i>
                                    Subject Name
                            </h3>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-6" >
                   <div class="row">
                        <div class="col-8"></div> 
                        <div class="col-4" >
                            <button type="button" ​value="/" class="btn btn-primary btn-block btn-md ">Convert To BSC</button>
                        </div>
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->      
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">

                {{-- card use for Quote detail --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Quote Detail
                        </h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Subject</dt>
                                <dd class="col-sm-8 dd" >N00004</dd>
                            <dt class="col-sm-4 dt">Contact Name</dt>
                                <dd class="col-sm-8 dd" >Bo Entertainment</dd>
                            <dt class="col-sm-4 dt">Assign To</dt>
                                <dd class="col-sm-8 dd">Oppa Bo </dd>
                            <dt class="col-sm-4 dt">Quote Number</dt>
                                <dd class="col-sm-8 dd">TT-001</dd>
                            <dt class="col-sm-4 dt">Valid Until </dt>
                                <dd class="col-sm-8 dd">09-09-2020</dd>
                            <dt class="col-sm-4 dt">Approval </dt>
                                <dd class="col-sm-8 dd">Approved</dd>
                            <dt class="col-sm-4 dt">Convert To BSC </dt>
                                <dd class="col-sm-8 dd">Yes</dd>
                            {{-- /// --}}
                            <dt class="col-sm-4 dt">Quote Stage </dt>
                                <dd class="col-sm-8 dd">Accepted </dd>
                            <dt class="col-sm-4 dt">Create Date </dt>
                                <dd class="col-sm-8 dd">10-10-2020</dd>
                            <dt class="col-sm-4 dt">Modified Time </dt>
                                <dd class="col-sm-8 dd">10-10-2020</dd>
                            <dt class="col-sm-4 dt">Organizations Name </dt>
                                <dd class="col-sm-8 dd">Dara Sok</dd>
                            <dt class="col-sm-4 dt">Opportunity Name </dt>
                                <dd class="col-sm-8 dd"></dd>
                            <dt class="col-sm-4 dt">Comment </dt>
                                <dd class="col-sm-8 dd">Quote Product for turbotech</dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>


                {{-- card use for Acknowledgement --}}
                 <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Acknowledgement
                        </h1>
                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Acknowledged by</dt>
                                <dd class="col-sm-8 dd" >Sok Dara</dd>
                            <dt class="col-sm-4 dt">Prepared by</dt>
                                <dd class="col-sm-8 dd" >Sok Visa</dd>
                            <dt class="col-sm-4 dt">Position</dt>
                                <dd class="col-sm-8 dd">Manager</dd>
                        </dl>
                    </div>  
                 
                </div>


                {{-- card use for Address Detail--}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Address Detail
                        </h1>
                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Street</dt>
                                <dd class="col-sm-8 dd" >St 1234</dd>
                            <dt class="col-sm-4 dt">Home number</dt>
                                <dd class="col-sm-8 dd" ># 12A</dd>
                            <dt class="col-sm-4 dt">City/Province</dt>
                                <dd class="col-sm-8 dd">Phnom penh</dd>
                            <dt class="col-sm-4 dt">District/Khan</dt>
                                <dd class="col-sm-8 dd">Chamkar Mon</dd>
                            <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                                <dd class="col-sm-8 dd">Tonle Basak </dd>
                            <dt class="col-sm-4 dt">Village</dt>
                                <dd class="col-sm-8 dd">Phum 12 </dd>
                            
                        </dl>
                    </div>  
                  
                </div>


                {{-- card use for Item Details--}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            Item Details
                        </h1>
                    </div>
                     <div class="card-body">

                        {{-- table row for show item unit --}}
                        <dl class="row table-responsive">
                            <table class="table table-bordered " style="min-width: 600px;">
                                <thead class="font-weight-bold font-size-14">
                                    <tr>
                                        <td class="">Item Name</td>
                                        <td class="">Type</td>
                                        <td style="">Quantity</td>
                                        <td class="">List Price</td>
                                        <td class="">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0; $i<=5;$i++)
                                        <tr id="row'+i+'" data-id="'+i+'" class="tr-quote-row row-quote-item">
                                            <td class="td-item-quote-name">
                                                <div class=" form-group">
                                                    <div class="row font-size-14">
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            Fiber Cable AAC 9/125 x 4C (FTTH) Focal Brand 
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="font-size-14">
                                                    <span>Product</span>
                                                </div>
                                            </td>
                                            <td style="">
                                                <div class="font-size-14">
                                                    <span>100</span>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="row-12 font-size-14">
                                                    <span>100</span>
                                                </div>
                                                <div class="row-12 pt-1 btn-list-item font-size-14">
                                                    <div class="font-weight-normal">
                                                        <div>
                                                            (-) Discount:
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-12 pt-1 btn-list-item font-size-14">
                                                    <div class="font-weight-normal">
                                                        <div>
                                                            Total After Discount:
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div style="color:red;" class="row-12 pt-1 btn-list-item font-size-14">
                                                    <div class="font-weight-normal">
                                                        <span>Net Price: </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div id="quote-sub-total_'+i+'" class="font-size-14 ">1000</div>
                                                <div id="quote-sub-discount_'+i+'" class="font-size-14 pt-1">100</div>
                                                <div id="quote-after-sub-disc_'+i+'" class="font-size-14 pt-1">900</div>
                                                <div id="quote-netPrice_'+i+'" style="color:red;" class="font-size-14 pt-1 ">900</div>
                                            </td>
                                            
                                        </tr>
                                    @endfor
                                    <tr>

                                    </tr>
                                </tbody>
                                
                            </table>
                                
                        </dl>

                        {{-- table row to show grand total item --}}
                        <dl class="row table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="83%">
                                            <div class="pull-right">
                                                <b>Items Total</b>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                            <b>282.00</b>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <span class="pull-right">
                                                        (-)&nbsp;<b><a class="inventoryLineItemDetails" href="javascript:void(0)" id="finalDiscount" data-info="Final Discount Amount =  0.000 % of 282.00 = 0.00">Discount</a></b>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                            0.00
                                            </span>
                                
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <span class="pull-right">
                                            (+)&nbsp;<b>Shipping &amp; Handling Charges </b>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                            0.00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <span class="pull-right">
                                            <b>Pre Tax Total </b>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                            282.00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <span class="pull-right">
                                            <b>Adjustment</b>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                            0.00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <span class="pull-right">
                                            <b>Grand Total</b>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                            310.20
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </dl>
                    </div>  
                    
                </div>



            </div>
            <div class="col-md-3">
                <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">More</h3>        
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <a href="#" >Quote Detail</a>
                            </dl>
                            <dl class="row">
                                <a href="#" >Update</a>
                            </dl>
                            <dl class="row">
                                <a href="#" >Activities</a>
                            </dl>
                            <dl class="row">
                                <a href="#" >Documents</a>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./col -->
</section>

