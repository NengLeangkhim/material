@php
    foreach ($bsc_show_customer_branchs as $bsc_show_customer_branch) {
        $item='';
        $item.="<option value='{$bsc_show_customer_branch->id}'>{$bsc_show_customer_branch->branch}</option>";
    }
@endphp
<input type="hidden" id="customer_branch_item" value="{{ $item }}">
<form id="frm_chart_account" action="">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1><span><i class="fas fa-user-plus"></i></span> Update Invoce</h1>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="exampleInputEmail1">Choose Account <b class="color_label">*</b></label>
                        </div>
                        <div class="col-md-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <select class="form-control select2 input_required" name="account_type" id="account_type">
                                    <option selected hidden disabled>select item</option>
                                    @foreach ($ch_accounts as $ch_account)
                                        <option value="{{ $ch_account->id }}">{{ $ch_account->name_en }}</option>
                                    @endforeach>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Invoce</a></li>
                        <li class="breadcrumb-item active">New Invoice</li>
                    </ol>
                </div>
            </div>
         </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    {{-- <form id="frm_chart_account" action=""> --}}
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Invoce Detail</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Customer<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control select2 input_required" name="customer" id="customer">
                                                    <option selected hidden disabled>select item</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" id="invoice_id" value="1">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Deposit on Payment<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="number" class="form-control input_required" name="deposit_on_payment" id="deposit_on_payment" placeholder="Deposit on payment">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Billing Date<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="date" class="form-control input_required"  name="billing_date" id="billing_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Reference<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control input_required select2" name="reference" id="reference">
                                                    <option value="" selected hidden disabled>select item</option>
                                                    @foreach ($qoutes as $qoute)
                                                        <option value="{{ $qoute->id }}">{{ $qoute->quote_number }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">Due Date<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="date" class="form-control input_required" name="due_date" id="due_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Effective Date<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="date" class="form-control input_required" name="effective_date" id="effective_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">End Period Date<b class="color_label">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="date" class="form-control input_required" name="end_period_date" id="end_period_date">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="status">Status</label>
                                            <div class="custom-control custom-switch">
                                                <input
                                                {{-- @if ($ch_account_by_ids->status==true)
                                                    checked
                                                @endif --}}
                                                    type="checkbox" class="custom-control-input" id="status" name="status" value="1">
                                                <label class="custom-control-label" for="status"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <table class="table table-bordered" id="invoice_table">
                                            <thead>
                                                <tr>
                                                    <th>Customer Branch</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Discount</th>
                                                    <th>Account</th>
                                                    <th>Tax Rate</th>
                                                    <th>Amount</th>
                                                    {{-- <th></th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <button type="button" name="add" id="invoice_form" class="btn btn-success btn-xs"><i class="fas fa-plus"></i> New Record</button> --}}
                                </div><br/>
                                {{-- ============= detail payment ================= --}}
                                <div class="form-group">
                                    <div class="col-md-12" style="padding-right: 20px;">
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Total : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtTotal">00</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">VAT Total : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtVatTotal">00</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Grand Total : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtGrandTotal">00</label>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr">
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Payment : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">1000$</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Date : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">02-10-2020</label>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr2">
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <strong><label for="">Amount Due : </label></strong>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">1000$</label>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ============= end detail payment ================= --}}
                                <br>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary save" id="frm_btn_sub_invoice" onclick="updateData()">Update</button>
                                    <button type="button" class="btn btn-danger" onclick="go_to('bsc_invoice_invoice_list')">Cencel</button>
                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </section>
    </form>
    <script src="js/bsc/invoice.js"></script>
    {{-- ========== submit chart account =========== --}}
    <script type="text/javascript">
        var itemDetail = [];
        function updateData(){
            let num_miss = 0;
            $(".input_required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ num_miss++;}
            });
            if(num_miss>0){
                $(".input_required").each(function(){
                    if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
                });
                sweetalert('error', 'Please input or select field * required');
            }else{
                $(".stock_product_id").each(function(e){
                    var tr = $(this).closest('tr');
                    var thisInput = $(this).val();
                    if(thisInput != ""){
                        itemDetail[e] = {
                            stock_product_id: thisInput,
                            description           : tr.find(".item_des").text(),
                            qty                   : tr.find(".item_qty").text(),
                            unit_price            : tr.find(".item_unit_price").text(),
                            discount              : tr.find(".item_discount").text(),
                            bsc_account_charts_id : tr.find(".item_account").text(),
                            tax                   : tr.find(".tax").val(),
                            amount                : tr.find(".item_amount").text()
                        };
                    }
                });
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:'/bsc_invoice_update',
                    data:{
                        _token: CSRF_TOKEN,
                        account_type     : $("#account_type").val(),
                        invoice_id       : $("#invoice_id").val(),
                        customer         : $("#customer").val(),
                        billing_date     : $("#billing_date").val(),
                        reference        : $("#reference").val(),
                        due_date         : $("#due_date").val(),
                        effective_date   : $("#effective_date").val(),
                        end_period_date  : $("#end_period_date").val(),
                        deposit_on_payment : $("#deposit_on_payment").val(),
                        total            : $('#txtTotal').text(),
                        grandTotal       : $('#txtGrandTotal').text(),
                        vatTotal         : $('#txtVatTotal').text(),
                        stutus           : $('#status').val(),
                        itemDetail       : itemDetail
                    },
                    dataType: "JSON",
                    success:function(data){

                    }
                });
            }
        }
    </script>

