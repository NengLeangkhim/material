





<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="far fa-clipboard"></i></span> Quote Branch Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="goto_Action('/quote/leadBranch','{{ $quoteId }}')">Edit Quote Lead</a></li>
                    <li class="breadcrumb-item active">Edit Quote Branch</li>
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
                            <h3 class="card-title"​>
                                <i class="fas fa-hotel" style="padding-right:15px; font-size:35px"></i>
                                    {{ $data['lead_branch_name']  }}
                            </h3>
                    </div>
                </div>

              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">




                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            Edit Item
                        </h1>
                    </div>

                    <div class="card-body">


                        <dl class="row table-responsive">
                            <table class="table table-bordered" style="min-width: 450px;">
                                <thead class="thead-item-list">
                                        <tr>
                                            <th class="td-item-quote-name"><b style="color:red">*</b> Item Name</th>
                                            <th class="td-item-quote">Type</th>
                                            <th style="width: 120px">Quantity</th>
                                            <th class="td-item-quote">List Price($)</th>
                                            <th class="td-item-quote">Total($)</th>
                                            <th style="width: 50px;" >
                                                <button type="button" class="btn btn-info" id="btnAddRowQuoteItem" data-id="'+branId+'"><span><i class="fa fa-plus"></i></span></button>
                                            </th>
                                        </tr>
                                </thead>
                                <tbody>

                                        <tr id=" i" class="tr-quote-row row-quote-item" data-id="row_ +i+ ">
                                            <td class="td-item-quote-name">
                                                <div class=" form-group">
                                                    <div class="row form-inline2">
                                                        <div class="col-md-8 col-sm-8 col-8">
                                                            <input type="text" class="form-control txtPrdName_  i  "   name="product_name[]" id="product_name  i  "  value="" required placeholder="Product Name" readonly>
                                                            <input type="hidden" name="product  branId  []" id="txtPrdId_  i  "  readonly>
                                                            <span id="product_name  i  Error" ><strong></strong></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="row-12">
                                                                <button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemProduct_  i  "   name="addItemProduct"  id="  i  "  data-id="  branId  " > <span>  Add Product </span></button>
                                                            </div>
                                                            <div class="row-12 pt-1">
                                                                <button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemService_  i  "  name="addItemService"  id="  i  " data-id="  branId  " > <span>  Add Service </span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline"><textarea class="form-control txtDescription_  i  " id="txtDescription_  i  "  rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description" disabled></textarea> </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="itemType_  i  " class="btn-list-item text-center">----</div>
                                            </td>
                                            <td style="width: 120px;">
                                                <input type="text"  class="valid-numeric form-control itemQty_  i   qty  i   " name="qty  branId  []" id="  i  " data-id="qty  i  " demo="itemQty"  value="1"  required placeholder="Qty">
                                                <input type="hidden" id="numItemInStock_  i  " readonly>
                                                <p id="prdNotEnough_  i  " class="font-size-14" style="color:red;"></p>
                                                <span id="  i  Error" ><strong></strong></span>
                                            </td>
                                            <td class="td-item-quote">
                                                <div class="">
                                                    <input type="text" class="valid-numeric-float form-control itemPrice_  i   price  i  " name="price  branId  []" id="  i  " data-id="price  i  "  demo="itemPrice" value="0" required placeholder="0.0$">
                                                    <span id="  i  Error" ><strong></strong></span>
                                                </div>
                                                <div class="row pt-1 form-inline">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <select  class="select-itemDiscount btn-list-item mdb-select md-form" name="select-itemDiscount_  i  " id="  i  "  data-id="  branId  " required >
                                                            <option value="1"><span> Discount (%)</span> </option>
                                                            <option value="2"><span> Discount ($)</span> </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-6 field-input-discount" data-id="  i  " id="fieldItemDiscount_  i  ">
                                                        <input type="text"  class="itemDisPercent_  i   txtbox-quote valid-numeric-float" name="discount  branId  []" id="discount  i  " demo="itemDisPercent" data-id="  i  " value="0" placeholder="0.0%">
                                                        <input type="hidden" id="discount_type  i  " value="percent" name="discount_type  branId  []">
                                                        <span id="discountError" ><strong></strong></span>
                                                    </div>

                                                </div>
                                                <div class="btn-list-item" style="color:black; margin-left: 7px; margin-top:15px;">
                                                    <span>Total After Discount: </span>
                                                </div>
                                                <div class="btn-list-item" style="color:red; margin-left: 7px; margin-top:15px;">
                                                    <span>Net Price: </span>
                                                </div>
                                            </td>
                                            <td class="td-item-quote ">
                                                <div id="quote-sub-total_  i  " class="td-quote-total">0</div>
                                                <div id="quote-sub-discount_  i  " class="td-quote-total">0</div>
                                                <div id="quote-after-sub-disc_  i  " class="td-quote-total">0</div>
                                                <div id="quote-netPrice_  i  " style="color:red;"class="td-quote-total">0</div>
                                            </td>
                                            <td style="width:auto;">
                                                <button style="width: auto;" class="btnRemoveRow btn btn-denger" id="'+i+'" ><span><i style="color:#d42931;" class="fa fa-trash"></i></span></button>
                                            </td>

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
                                                <b>Grand Total</b>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                                <b>900.00 ($)</b>
                                            </span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </dl>
                        <dl class="col-sm-12 ">
                            <div class="text-right" >
                                    <button type="button" class="mr-2 font-weight-bold btn btn-sm btn-primary"  id="btnUpdateQuoteLead" >Update</button>
                                    <button type="button" class=" font-weight-bold  btn btn-sm btn-danger" >Cancel</button>
                            </div>
                        </dl>
                    </div>

                </div>



            </div>



            {{-- <div class="col-md-2 col-sm-12">
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
            </div> --}}
        </div>
    </div>
    <!-- ./col -->
</section>

