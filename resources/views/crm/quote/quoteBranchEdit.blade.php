


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="far fa-id-card" style=" font-size: 35px; font-weight:bold;"></i></span> Lead Name:</h1>
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
    <style>
        .table td, .table th {
            padding: 0.3rem !important;
            border-top: none !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: none ;
        }
    </style>
    <form action="" method="PUT" id="frmEditQuoteBranch">
        @csrf
        <div id="modal-list-quote">
        </div>
        <div class="container-fluid">
        <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box card-header">
                <div class="col-12" >
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                                <h3 class="card-title"​>
                                    <i class="fas fa-hotel" style="padding-right:15px; font-size:30px"></i>
                                    <label><span>Branch Name:</span> {{ $data['lead_branch_name']  }}</label>
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
                                Edit Branch Item
                            </h1>
                        </div>

                        <div class="card-body">


                            <dl class="row table-responsive">
                                <div>
                                @if(isset($data))
                                    <input type="hidden" id="quote_id" name="quote_id" value="{{ $quoteId }}" readonly>
                                    <input type="hidden" name="quote_branch_id" value="{{ $data['quote_branch_id'] ??"" }}" readonly>
                                    <input type="hidden" name="lead_branch_id" value="{{ $data['lead_branch_id'] ??"" }}" readonly>
                                @endif
                                </div>
                                <table class="table table-bordered" style="min-width: 850px;">
                                    <thead class="thead-item-list">
                                            <tr>
                                                <th class=""><b style="color:red">*</b> Item Name</th>
                                                <th class="td-item-quote">Type</th>
                                                <th style="width: 120px">Quantity</th>
                                                <th style="width: 120px">Measurement</th>
                                                <th class="td-item-quote">List Price($)</th>
                                                <th class="td-item-quote">Total($)</th>
                                                <th style="width: 50px;" >
                                                    <button type="button" class="btn btn-info" id="btnAddRowQuoteItem" data-id="quoteBranchEdit" ><span><i class="fa fa-plus"></i></span></button>
                                                </th>
                                            </tr>
                                    </thead>
                                    <tbody id="add_row_tablequoteItem" class="add_row_tablequoteItem" data-id="{{ count($response3->data) ??"" }}">

                                        @if(isset($response3->data))
                                            @foreach ($response3->data as $key=>$val)
                                                <input type="hidden" name="quote_detail_id[]" value="{{ $val->id }}" readonly>
                                                <input type="hidden" id="getBranchIdEdit" value="{{ $getBranchId }}" readonly>
                                                <input type="hidden" id="vatNumber" value="{{ $getVatNum }}" readonly>

                                                <tr id="{{ $key }}" class="tr-quote-row row-quote-item row-quote-item_{{ $key }}" data-id="row_{{ $key }}" >
                                                    <td style="width: 30%;">

                                                        <input type="hidden" name="quote_detail_id_updated[]" value="{{ $val->id }}" readonly>
                                                        <div class="form-group">
                                                            <div class="row pb-2">
                                                                <div class="col-6">
                                                                    <button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemProduct_{{ $key }}"   name="addItemProduct"  id="{{ $key }}"  data-id="_new" > <span>  Add Product </span></button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemService_{{ $key }}"  name="addItemService"  id="{{ $key }}" data-id="_new" > <span>  Add Service </span></button>
                                                                </div>
                                                            </div>
                                                            <div class="row form-inline2">
                                                                <div class="col-12">
                                                                    <input type="text" class="form-control txtPrdName_{{ $key }}"   name="product_name[]" id="product_name{{ $key }}"  value="{{ $val->stock_product->name }}" required placeholder="Product Name" readonly>
                                                                    <input type="hidden" name="product[]" id="txtPrdId_{{ $key }}" value="{{ $val->stock_product->id }}" readonly>
                                                                    <span id="product_name{{ $key }}  Error" ><strong></strong></span>
                                                                </div>

                                                            </div>
                                                            <div class="form-inline"><textarea class="form-control txtDescription_{{ $key }}" id="txtDescription_{{ $key }}"  rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description" disabled>{{ $response3->data[$key]->stock_product->description }}</textarea> </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="itemType_{{$key}}" class="btn-list-item text-center">{{ ucfirst($response3->data[$key]->stock_product->group_type) }}</div>
                                                    </td>
                                                    <td style="width: 120px;">
                                                        <input type="text"  class="valid-numeric form-control itemQty_{{ $key }} qty{{ $key }}" name="qty[]" id="{{ $key }}" data-id="qty{{ $key }}" demo="itemQty"  value="{{ $val->qty }}"  required placeholder="Qty">
                                                        <input type="hidden" id="numItemInStock_{{ $key }}" readonly>
                                                        <p id="prdNotEnough_{{ $key }}" class="font-size-14" style="color:red;"></p>
                                                        <span id="{{ $key }}Error" ><strong></strong></span>
                                                    </td>
                                                    <td>
                                                        <div id="" class="btn-list-item text-center">
                                                            @if($response3->data[$key]->stock_product->measure == '')
                                                                @php $measurement= 'Not value' @endphp
                                                            @else
                                                                @php $measurement= $response3->data[$key]->stock_product->measure @endphp
                                                            @endif
                                                            {{ $measurement }}
                                                        </div>
                                                    </td>
                                                    <td class="td-item-quote">
                                                        <div class="">
                                                            <input type="text" class="valid-numeric-float form-control itemPrice_{{ $key }}   price{{ $key }}" name="price[]"  id="itemPrice_{{ $key }}"   data-id="price{{ $key }}"  demo="itemPrice" value="{{ $val->price }}" required placeholder="0.0$">
                                                            <span id="{{ $key }}Error" ><strong></strong></span>
                                                        </div>
                                                        <div class="row pt-1 form-inline">
                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                <select  class="select-itemDiscount btn-list-item mdb-select md-form select-itemDiscount_{{$key}}"  name="select-itemDiscount_{{$key}}" id="{{$key}}" data-id='' required >
                                                                    @if($val->discount_type == 'percent')
                                                                        <option value="1" selected><span> Discount (%)</span> </option>
                                                                        <option value="2" ><span> Discount ($)</span> </option>
                                                                    @else
                                                                        <option value="1" ><span> Discount (%)</span> </option>
                                                                        <option value="2" selected><span> Discount ($)</span> </option>
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-6 field-input-discount" data-id="{{ $key }}" id="fieldItemDiscount_{{$key}}">
                                                                @if($val->discount_type == 'percent')
                                                                    <input type="text"  class="itemDisPercent_{{ $key }} txtbox-quote valid-numeric-float" name="discount[]" id="discount{{$key}}" demo="itemDisPercent" data-id="{{ $key }}" value="{{ $val->discount }}" placeholder="0.0%">
                                                                @else
                                                                    <input type="text"  class="itemDisPrice_{{ $key }} txtbox-quote valid-numeric-float" name="discount[]" id="discount{{ $key }}" demo="itemDisPrice" data-id="{{ $key }}" value="{{ $val->discount }}" required placeholder="0.0$">
                                                                @endif
                                                                <input type="hidden" id="discount_type{{ $key }}" value="{{ $val->discount_type }}" name="discount_type[]">
                                                                <span id="discountError" ><strong></strong></span>
                                                            </div>

                                                        </div>
                                                        <div class="btn-list-item" style="color:black; margin-left: 7px; margin-top:15px;">
                                                            <span>Total After Discount: </span>
                                                        </div>
                                                        <div class="btn-list-item" style="color:red; margin-left: 7px; margin-top:15px;">
                                                            <span id="vatLabelQuote{{$key}}">Vat Include (0%)</span>
                                                        </div>
                                                        <div class="btn-list-item" style="color:red; margin-left: 7px; margin-top:15px;">
                                                            <span>Net Price: </span>
                                                        </div>
                                                    </td>
                                                    <td class="td-item-quote ">
                                                        <div id="quote-sub-total_{{$key}}" class="td-quote-total">0</div>
                                                        <div id="quote-sub-discount_{{$key}}" class="td-quote-total">0</div>
                                                        <div id="quote-after-sub-disc_{{$key}}" class="td-quote-total">0</div>
                                                        <div id="quote-addVat_{{$key}}" style="color:red;"class="td-quote-total">0</div>
                                                        <div id="quote-netPrice_{{$key}}" style="color:red;"class="td-quote-total">0</div>

                                                    </td>
                                                    <td style="width:auto;" class="fieldBtnRemove" id="fieldBtnRemove_{{$key}}">
                                                        @if($key != 0)
                                                            <button style="width: auto;"  class="btnRemoveRow btn btn-denger" id="{{$key}}"  data-id="{{ count($response3->data) }}"  ><span><i style="color:#d42931;" class="fa fa-trash"></i></span></button>
                                                        @endif
                                                    </td>

                                                </tr>

                                            @endforeach
                                        @else
                                            <tr><td class="text-center" colspan="7">No data available in table</td></tr>
                                        @endif

                                    </tbody>
                                </table>
                            </dl>




                            {{-- table row to show grand total item --}}
                            <dl class="row pr-3">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr style="text-align: right">
                                                <td  ><span style="padding-right: 12px;">Sum Total </span></td>
                                                <td  ><div id="sumTotal"> 0.0 </div></td>
                                            </tr>
                                            <tr style="text-align: right">
                                                <td >
                                                    <span style="padding-right: 12px;" >Value Add Tax(VAT)</span>
                                                </td>
                                                <td >
                                                    <div id="valueAddTax">
                                                        @php
                                                            if($getVatNum != ''){
                                                                echo 'Yes';
                                                            }else{
                                                                echo 'No';
                                                            }
                                                        @endphp
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr style="text-align: right">
                                                <td >
                                                    <span style="padding-right: 12px;" id="labelTaxQuote">
                                                        @php
                                                            if($getVatNum != ''){
                                                                echo '+ Tax (10%)';
                                                            }else{
                                                                echo '+ Tax (0%)';
                                                            }
                                                        @endphp
                                                    </span>
                                                </td>
                                                <td >
                                                    <div id="getTaxation">0.0</div>
                                                </td>
                                            </tr>


                                            <tr class="td-total-quote grandTotal" >
                                                <td  ><span style="padding-right: 12px;">Grand Total</span></td>
                                                <td  ><div id="grandTotal"> 0.0 </div></td>
                                            </tr>

                                        </tbody>
                                        {{-- <tbody>
                                            <tr class="fieldGrandTotal">
                                                <td style="width: 50%"><input type="hidden"></td>
                                                <td  >
                                                    <table class="table table-bordered tr-quote-row">
                                                        <tbody>
                                                            <tr style="text-align: right">
                                                                <td  ><span style="padding-right: 12px;">Sum Total </span></td>
                                                                <td  ><div id="sumTotal"> 0.0 </div></td>
                                                            </tr>

                                                            <!-- <tr style="text-align: right">
                                                                <td >
                                                                    <select class="allItemDiscount btn-list-item mdb-select md-form" name="allDiscount" id="allItemDiscount" >
                                                                        <option value="1"><span>+Discount (%)</span> </option>
                                                                        <option value="2"><span>+Discount ($)</span> </option>
                                                                    </select>
                                                                </td>
                                                                <td class="rowGrandDiscount">
                                                                    <div id="allDiscount">
                                                                        <input type="text" style="width:40%;" class="txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="itemDiscountPercent" value="0" placeholder="0.0%" required>
                                                                    </div>
                                                                    <div  id="totalDiscount">
                                                                        0
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                                            <tr style="text-align: right">
                                                                <td >
                                                                    <span style="padding-right: 12px;">(+) Tax (10%) </span>
                                                                </td>
                                                                <td >
                                                                    <div id="getTaxation"> 0.0 </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="td-total-quote grandTotal" >
                                                                <td  ><span style="padding-right: 12px;">Grand Total</span></td>
                                                                <td  ><div id="grandTotal"> 0.0 </div></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>


                                                </td>
                                            </tr>
                                        </tbody> --}}

                                    </table>
                            </dl>

                            <dl class="col-sm-12 ">
                                <div class="text-right" >
                                        <button type="button" class="mr-2 font-weight-bold btn btn-sm btn-primary"  id="btnUpdateQuoteBranch" >Update</button>
                                        <button type="button" class=" font-weight-bold  btn btn-sm btn-danger" onclick="cancelEditBranch();">Cancel</button>
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
    </form>
    <!-- ./col -->
</section>

<script type="text/javascript">

    $(document).ready(function(){
        $(".row-quote-item").keyup();
        $(".row-quote-item").keyup();
    });


    function cancelEditBranch(){
            var qId = <?php echo json_encode($quoteId); ?>;
            Swal.fire({ //get from sweetalert function
                title: 'Cancel',
                text: "Do you want to cancel ? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if(result.value){
                    goto_Action('/quote/leadBranch', qId);
                }
            });
    }



</script>

