




<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="far fa-clipboard"></i></span> Quote Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="go_to('/quote')">Quote List</a></li>
                    <li class="breadcrumb-item active">Quote Edit</li>
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

        .dd {
            padding: 10px;
        }
    </style>


        <div class="container-fluid">
        <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box card-header">
                <div class="col-12" >
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                                <h1 class="card-title"​>
                                    <i class="fas fa-hotel" style="padding-right:15px; font-size:30px;"></i>
                                    <b>{{ $quoteDetail->data->quote_number ?? '' }}</b>
                                </h1>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <!--  =====This part for edit quote lead & qoute stage ====== -->
            <div class="row-12">
                <div class="col-md-12">
                    <form action="" method="PUT" id="frmEditQuoteLead">
                        @csrf
                        {{-- card use for Quote detail --}}
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4 dt" >Subject</dt>
                                        <dd class="col-sm-8 dd" >
                                            <input type="text" class="form-control" name="subject" id="subject" value="{{ $quoteDetail->data->subject ??""}}" placeholder="subject">
                                            <span id="subjectError" ><strong></strong></span>
                                            <input type="hidden" name="quote_id"  id="quote_id" value="{{ $quoteDetail->data->id ??""}}" readonly>
                                            <input type="hidden" name="crm_lead_id" id="crm_lead_id" value="{{ $quoteDetail->data->crm_lead->id ??""}}" readonly>
                                            <input type="text" hidden value="{{$_SESSION['token']}}" id="token">
                                        </dd>
                                    <dt class="col-sm-4 dt">Assign To</dt>
                                        <dd class="col-sm-8 dd">
                                            <select class="form-control select2"  name="assign_to" id="assign_to" >
                                                <option value="{{ $quoteDetail->data->assign_to->id }}">
                                                    {{ $quoteDetail->data->assign_to->first_name_en.' '.$quoteDetail->data->assign_to->last_name_en ??""}}
                                                </option>
                                                @if(isset($employee))
                                                    @foreach ($employee as $key=>$val )
                                                        <option value="{{ $val->id ??"" }}">
                                                            {{ $val->first_name_en.' '.$val->last_name_en ??""}}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                            <span id="assign_toError" ><strong></strong></span>
                                        </dd>

                                    {{-- <dt class="col-sm-4 dt">Quote Status</dt>
                                        <dd class="col-sm-8 dd">
                                            <select class="form-control select2" name="crm_quote_status_type_id" id="crm_quote_status_type_id">
                                                @php
                                                    $num = count($quoteDetail->data->quote_stage ??"");
                                                @endphp
                                                @foreach ($quoteStatus as $key=>$val )
                                                        <option value="{{$val->id ?? ''}}" {{$val->id ?? '' == $quoteDetail->data->quote_stage[($num-1)]->id ??'' ? 'selected="selected"':''}}> {{$val->name_en}}</option>
                                                @endforeach
                                            </select>
                                        </dd> --}}
                                    @php
                                        $num = count($quoteDetail->data->quote_stage ??"");
                                    @endphp
                                    <input type="hidden" name="crm_quote_status_type_id" value="{{ $quoteDetail->data->quote_stage[($num-1)]->id ??''}}">
                                    <dt class="col-sm-4 dt">Due Date</dt>
                                        <dd class="col-sm-8 dd">
                                            <input type="text" name="due_date" id="due_date" class="form-control" value="{{ $quoteDetail->data->due_date ??""}}" placeholder="Due Date" >
                                            <span id="due_dateError" ><strong></strong></span>
                                        </dd>
                                    <dt class="col-sm-4 dt">Comment</dt>
                                    <dd class="col-sm-8 dd">
                                        <?php
                                            $num2 = count($quoteDetail->data->status_quote ??"");
                                        ?>
                                        <input type="text" name="comment" id="comment" class="form-control" value="{{ $quoteDetail->data->status_quote[$num2-1]->comment ??""}}" placeholder="comment">
                                        <span id="commentError" ><strong></strong></span>
                                    </dd>
                                    <dt class="col-sm-12 ">
                                        <div class="text-right" >
                                            <button type="button" class="mr-2 font-weight-bold btn btn-sm btn-primary"  id="btnUpdateQuoteLead" >Update</button>
                                            <button type="button" class=" font-weight-bold  btn btn-sm btn-danger" onclick='cancelEditLead();' >Cancel</button>
                                        </div>
                                    </dt>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                </div>

                {{-- <div class="col-md-3">
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

            <!--  =====This part for edit quote branch====== -->
            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">

                            <div id="modal-list-quote">
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                        @php $Countnum = 0; @endphp
                                        @isset($lead_branch_quote)
                                            @foreach ($lead_branch_quote->data ?? [] as $key=>$value)
                                                <form action="" method="PUT" id="frmEditQuoteBranch{{ $value->crm_lead_branch->id ?? '' }}">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <div class="card">

                                                                <div class="p-1">
                                                                    <div class="form-inline border rounded back-color-blue">
                                                                        <label class="border-right p-2">Lead Branch ({{ $key+1 }})</label>
                                                                        <div class="pl-2">{{ $value->crm_lead_branch->name ?? '' }}</div>
                                                                    </div>
                                                                </div>

                                                                <div class="card-body">
                                                                    {{-- this part for edit quote item  --}}
                                                                    <dl class="row table-responsive">
                                                                        <div>
                                                                            <input type="hidden" id="quote_id" name="quote_id" value="{{ $value->crm_quote_id ?? ""}}" readonly>
                                                                            <input type="hidden" name="quote_branch_id" value="{{ $value->id ?? ""}}" readonly>
                                                                            <input type="hidden" name="lead_branch_id" value="{{ $value->crm_lead_branch->id ?? ""}}" readonly>
                                                                            <input type="hidden" id="vatNumber{{ $value->crm_lead_branch->id ?? ""}}" value="{{ $value->crm_lead_branch->vat_number ?? ''}}" readonly>
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
                                                                                            {{-- <button type="button" class="btn btn-info" id="btnAddRowQuoteItem" data-id="quoteBranchEdit" ><span><i class="fa fa-plus"></i></span></button> --}}
                                                                                            <button type="button" class="btn btn-info" id="btnAddRowQuoteItem" data-id="{{ $value->crm_lead_branch->id ?? ''}}" data-code="quoteBranchEdit"><span><i class="fa fa-plus"></i></span></button>
                                                                                        </th>
                                                                                    </tr>
                                                                            </thead>
                                                                            <tbody id="add_row_tablequoteItem{{ $value->crm_lead_branch->id ?? ''}}" class="add_row_tablequoteItem" data-id="{{ count($quoteBranchDetail[$key]->data) ??''}}">

                                                                                @if(isset($quoteBranchDetail[$key]->data))
                                                                                    @foreach ($quoteBranchDetail[$key]->data as $key2=>$val2)
                                                                                        <input type="hidden" name="quote_detail_id[]" value="{{ $val2->id ?? ''}}" readonly>
                                                                                        <input type="hidden" id="getBranchIdEdit" value="{{ $value->crm_lead_branch->id ?? ''}}" readonly>

                                                                                        <tr id="{{ $Countnum }}" class="tr-quote-row row-quote-item row-quote-item_{{ $Countnum }}" data-id="row_{{ $Countnum }}" data-code="{{ $value->crm_lead_branch->id ?? "" }}">
                                                                                            <td style="width: 30%;">

                                                                                                <input type="hidden" name="quote_detail_id_updated[]" value="{{ $val2->id ?? ''}}" readonly>
                                                                                                <div class="form-group">
                                                                                                    <div class="row pb-2">
                                                                                                        <div class="col-6">
                                                                                                            <button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemProduct_{{ $Countnum }}"   name="addItemProduct"  id="{{ $Countnum }}"  data-id="_new" data-code="{{ $value->crm_lead_branch->id ?? ""}}"> <span>  Add Product </span></button>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemService_{{ $Countnum }}"  name="addItemService"  id="{{ $Countnum }}" data-id="_new" data-code="{{ $value->crm_lead_branch->id ?? ""}}"> <span>  Add Service </span></button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-inline2">
                                                                                                        <div class="col-12">
                                                                                                            <input type="text" class="form-control txtPrdName_{{ $Countnum }}"   name="product_name[]" id="product_name{{ $Countnum }}"  value="{{ $val2->stock_product->name ?? ''}}" required placeholder="Product Name" readonly>
                                                                                                            <input type="hidden" name="product[]" id="txtPrdId_{{ $Countnum }}" value="{{ $val2->stock_product->id ?? ''}}" readonly>
                                                                                                            <span id="product_name{{ $Countnum }}  Error" ><strong></strong></span>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="form-inline"><textarea class="form-control txtDescription_{{ $Countnum }}" id="txtDescription_{{ $Countnum }}"  rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description" disabled>{{ $val2->stock_product->description ?? ''}}</textarea> </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div id="itemType_{{$Countnum}}" class="btn-list-item text-center">{{ ucfirst($val2->stock_product->group_type ?? "") ?? ""}}</div>
                                                                                            </td>
                                                                                            <td style="width: 120px;">
                                                                                                <input type="text"  class="valid-numeric form-control itemQty_{{ $Countnum }} qty{{ $Countnum }}" name="qty[]" id="{{ $Countnum }}" data-id="qty{{ $Countnum }}" demo="itemQty"  value="{{ $val2->qty ?? ''}}"  required placeholder="Qty">
                                                                                                <input type="hidden" id="numItemInStock_{{ $Countnum }}" readonly>
                                                                                                <p id="prdNotEnough_{{ $Countnum }}" class="font-size-14" style="color:red;"></p>
                                                                                                <span id="{{ $Countnum }}Error" ><strong></strong></span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div id="" class="btn-list-item text-center">
                                                                                                    @if(isset($val2->stock_product->measure) && $val2->stock_product->measure == '')
                                                                                                        @php $measurement= 'Not value' @endphp
                                                                                                    @else
                                                                                                        @php $measurement= $val2->stock_product->measure ?? '' @endphp
                                                                                                    @endif
                                                                                                    {{ $measurement }}
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="td-item-quote">
                                                                                                <div class="">
                                                                                                    <input type="text" class="valid-numeric-float form-control itemPrice_{{ $Countnum }}   price{{ $Countnum }}" name="price[]"  id="itemPrice_{{ $Countnum }}"   data-id="price{{ $Countnum }}"  demo="itemPrice" value="{{ $val2->price ?? ''}}" required placeholder="0.0$">
                                                                                                    <span id="{{ $Countnum }}Error" ><strong></strong></span>
                                                                                                </div>
                                                                                                <div class="row pt-1 form-inline">
                                                                                                    <div class="col-md-6 col-sm-6 col-6">
                                                                                                        <select  class="select-itemDiscount btn-list-item  select-itemDiscount_{{$Countnum}}"  name="select-itemDiscount_{{$Countnum}}" id="{{$Countnum}}" data-id='' required >
                                                                                                            @if($val2->discount_type == 'percent')
                                                                                                                <option value="1" selected><span> Discount (%)</span> </option>
                                                                                                                <option value="2" ><span> Discount ($)</span> </option>
                                                                                                            @else
                                                                                                                <option value="1" ><span> Discount (%)</span> </option>
                                                                                                                <option value="2" selected><span> Discount ($)</span> </option>
                                                                                                            @endif
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div class="col-md-6 col-sm-6 col-6 field-input-discount" data-id="{{ $Countnum }}" id="fieldItemDiscount_{{$Countnum}}">
                                                                                                        @if($val2->discount_type == 'percent')
                                                                                                            <input type="text"  class="itemDisPercent_{{ $Countnum }} txtbox-quote valid-numeric-float" name="discount[]" id="discount{{$Countnum}}" demo="itemDisPercent" data-id="{{ $Countnum }}" value="{{ $val2->discount ?? ''}}" placeholder="0.0%">
                                                                                                        @else
                                                                                                            <input type="text"  class="itemDisPrice_{{ $Countnum }} txtbox-quote valid-numeric-float" name="discount[]" id="discount{{ $Countnum }}" demo="itemDisPrice" data-id="{{ $Countnum }}" value="{{ $val2->discount ?? ''}}" required placeholder="0.0$">
                                                                                                        @endif
                                                                                                        <input type="hidden" id="discount_type{{ $Countnum }}" value="{{ $val2->discount_type ?? ''}}" name="discount_type[]">
                                                                                                        <span id="discountError" ><strong></strong></span>
                                                                                                    </div>

                                                                                                </div>
                                                                                                <div class="btn-list-item" style="color:black; margin-left: 7px; margin-top:15px;">
                                                                                                    <span>Total After Discount: </span>
                                                                                                </div>
                                                                                                <div class="btn-list-item" style="color:red; margin-left: 7px; margin-top:15px;">
                                                                                                    <span id="vatLabelQuote{{$Countnum}}">Vat Include (0%)</span>
                                                                                                </div>
                                                                                                <div class="btn-list-item" style="color:red; margin-left: 7px; margin-top:15px;">
                                                                                                    <span>Net Price: </span>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="td-item-quote ">
                                                                                                <div id="quote-sub-total_{{$Countnum}}" class="td-quote-total">0</div>
                                                                                                <div id="quote-sub-discount_{{$Countnum}}" class="td-quote-total">0</div>
                                                                                                <div id="quote-after-sub-disc_{{$Countnum}}" class="td-quote-total">0</div>
                                                                                                <div id="quote-addVat_{{$Countnum}}" style="color:red;"class="td-quote-total">0</div>
                                                                                                <div id="quote-netPrice_{{$Countnum}}" style="color:red;"class="td-quote-total">0</div>

                                                                                            </td>
                                                                                            <td style="width:auto;" class="fieldBtnRemove" id="fieldBtnRemove_{{$Countnum}}">
                                                                                                @if($key2 != 0)
                                                                                                    <button style="width: auto;"  class="btnRemoveRow btn btn-denger" id="{{$Countnum}}"  data-id="{{ $Countnum ?? ''}}"  ><span><i style="color:#d42931;" class="fa fa-trash"></i></span></button>
                                                                                                @endif
                                                                                            </td>

                                                                                        </tr>
                                                                                        @php $Countnum +=1; @endphp
                                                                                    @endforeach
                                                                                @else
                                                                                    <tr><td class="text-center" colspan="7">No data available in table</td></tr>
                                                                                @endif

                                                                            </tbody>
                                                                        </table>
                                                                    </dl>
                                                                </div>

                                                                <dl class="col-sm-12 ">
                                                                    <div class="text-right" >
                                                                            <button type="button" class="mr-2 font-weight-bold btn btn-sm btn-primary"  id="btnUpdateQuoteBranch" data-id="{{ $value->crm_lead_branch->id ?? '' }}">Update</button>
                                                                            <button type="button" class=" font-weight-bold  btn btn-sm btn-danger" onclick="cancelEditBranch();">Cancel</button>
                                                                    </div>
                                                                </dl>

                                                        </div>
                                                    </div>

                                                </form>
                                            @endforeach
                                            <input type="hidden" id="countNumBranchEdit" value="{{ $Countnum  }}">
                                            <input type="hidden" id="QuoteTypeFunction"  value="quoteEdit">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="p-1">
                                                        <div class="form-inline rounded back-color-blue">
                                                            <label class="p-2">Total Branch Item</label>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
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
                                                                                        if(isset($lead_branch_quote->data[0]->crm_lead_branch->vat_number)){
                                                                                            if($lead_branch_quote->data[0]->crm_lead_branch->vat_number != ''){
                                                                                                echo 'Yes';
                                                                                            }else{
                                                                                                echo 'No';
                                                                                            }
                                                                                        }

                                                                                    @endphp
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr style="text-align: right">
                                                                            <td >
                                                                                <span style="padding-right: 12px;" id="labelTaxQuote">
                                                                                    @php
                                                                                        if(isset($lead_branch_quote->data[0]->crm_lead_branch->vat_number)){
                                                                                            if($lead_branch_quote->data[0]->crm_lead_branch->vat_number != ''){
                                                                                                echo '+ Tax (10%)';
                                                                                            }else{
                                                                                                echo '+ Tax (0%)';
                                                                                            }
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

                                                                </table>
                                                            </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        @endisset
                                </div>
                            </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ./col -->

    <?php
        // $quoteId = json_encode($quoteDetail->data->id);
    ?>
    <script type="text/javascript">

        $(".row-quote-item").keyup();
        $(".row-quote-item").keyup();
        $(document).ready(function(){
            $('.select2').select2();
        });

        function cancelEditLead(){
            // var qId = <?php echo json_encode($quoteDetail->data->id); ?>;
            Swal.fire({ //get from sweetalert function
                title: 'Cancel',
                text: "Do you want to cancel ? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if(result.value) {
                    go_to('/quote');
                }
            });
        }



        function cancelEditBranch(){
            Swal.fire({ //get from sweetalert function
                title: 'Cancel',
                text: "Do you want to cancel ? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if(result.value) {
                    go_to('/quote');
                }
            });
        }


    </script>

</section>

