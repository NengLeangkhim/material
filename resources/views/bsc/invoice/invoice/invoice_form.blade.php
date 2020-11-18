@php
if (count($bsc_show_customer_branchs) >0) {
    foreach ($bsc_show_customer_branchs as $bsc_show_customer_branch) {
        $item='';
        $item.="<option value='{$bsc_show_customer_branch->id}'>{$bsc_show_customer_branch->branch}</option>";
    }
}
@endphp
<input type="hidden" id="customer_branch_item" value="{{ $item }}">
<form id="frm_chart_account" action="">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1><span><i class="fas fa-user-plus"></i></span> Create Invoce</h1>
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
                                <select class="form-control input_required" name="account_type" id="account_type">
                                    @if (count($ch_accounts) >0)
                                        @foreach ($ch_accounts as $ch_account)
                                            <option value="{{ $ch_account->id }}">{{ $ch_account->name_en }}</option>
                                        @endforeach>
                                    @endif
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
                                        <label for="exampleInputEmail1">Reference<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control select2 input_required reference" name="reference" id="reference" onchange="myFunction(this)">
                                                <option value="" selected hidden disabled>select item</option>
                                                @if (count($qoutes) >0)
                                                    @foreach ($qoutes as $qoute)
                                                        <option value="{{ $qoute->quote_number }}" data-crm_quote_id="{{ $qoute->id }}">{{ $qoute->quote_number }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <input type="hidden" id="crm_quote_id" name="crm_quote_id">
                                    </div>
                                    <input type="hidden" id="billing_address" name="billing_address">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Customer<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control input_required" name="customer" id="customer" data-customer_id placeholder="Customer" readonly>
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
                                        <label for="exampleInputEmail1">Due Date<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input type="date" class="form-control input_required" name="due_date" id="due_date">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Effective Date<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input type="date" class="form-control input_required" name="effective_date" id="effective_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">End Period Date<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input type="date" class="form-control input_required" name="end_period_date" id="end_period_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6" style="display: none">
                                        <label for="exampleInputEmail1">Deposit on Payment</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="deposit_on_payment" id="deposit_on_payment" value="0" placeholder="Deposit on payment">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <table class="table table-bordered" id="invoice_table">
                                        <thead>
                                            <tr>
                                                <th>Cutomer Branch</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Discount</th>
                                                <th>Account</th>
                                                <th style="white-space: nowrap">Tax Rate</th>
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
                                                    <label for="" id="txtTotal">0</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text_right">
                                                    <label for="">VAT Total : </label>
                                                </div>
                                                <div class="col-sm-6 text_right">
                                                    <label for="" id="txtVatTotal">0.0000</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text_right">
                                                    <label for="">Grand Total : </label>
                                                </div>
                                                <div class="col-sm-6 text_right">
                                                    <label for="" id="txtGrandTotal">0</label>
                                                </div>
                                            </div>
                                            <hr class="line_in_tag_hr">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ============= end detail payment ================= --}}
                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_invoice" onclick="saveData()">Save</button>
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
<script>
    function myFunction(id)
    {
        let crm_quote_id=$('.reference option:selected').attr('data-crm_quote_id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_reference_onchange',
                data:{
                    _token: CSRF_TOKEN,
                    invoice_id  : crm_quote_id
                },
                dataType: "JSON",
                success:function(data){
                    $("#invoice_table").DataTable().destroy();
                    $("#invoice_table tbody").empty();
                    let quotes = data.quotes;
                    let quote_products = data.quote_products;

                    if(quotes.length > 0){
                        $.each(quotes,function(i, quote){
                            $('#customer').val(quote.customer_name);
                            $('#customer').attr("data-customer_id",quote.customer_id);
                            $('#billing_address').val(quote.billing_address);
                        });
                    }
                    if(quote_products.length > 0){
                        let tr='';
                        let amounts=0;
                        let option='<select class="invoice_tax" style="width: 100%;height: 51px;border:none;white-space: nowrap;padding:0" class="form-control"><option value=""></option><option value="1" selected>Tax</option><option value="0">No Tax</option></select>';
                        $.each(quote_products,function(index, quote_product){
                            let qty=quote_product.qty;
                            let price=quote_product.price;
                            let discount=quote_product.discount;
                            let amount = show_amounts(qty,price,discount);

                            tr="<tr><td class='customer_branch' data-customer_branch_id='"+quote_product.customer_branch_id+"'>"+quote_product.customer_branch_name+"</td><td class='stock_product_id' data-product_id='"+quote_product.stock_product_id+"'>"+quote_product.product_name+"</td><td class='description'>"+quote_product.description+"</td><td class='qty'>"+quote_product.qty+"</td><td class='price'>"+parseFloat(quote_product.price).toFixed(4)+"</td><td class='discount'>"+parseFloat(quote_product.discount).toFixed(4)+"</td><td class='chart_account' data-chart_account_id='"+quote_product.bsc_account_charts_id+"'>"+quote_product.chart_account_name+"</td><td>"+option+"</td><td class='item_amount'>"+parseFloat(amount).toFixed(4)+"</td></tr>";
                            $("#invoice_table").append(tr);
                        });
                    }
                    showTotal();
                    showGrandTotal();
                }
            });
    }

    // function show amount
    function show_amounts(qty,price,discount)
    {
        let discount_price= (qty * price) * discount/100;
        let amount = (qty * price) - discount_price;
        return amount;
    }
</script>
<script type="text/javascript">
    var itemDetail = [];
    function saveData(){
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
                var thisInput = $(this).attr('data-product_id');
                if(thisInput != ""){
                    itemDetail[e] = {
                        stock_product_id: thisInput,
                        ma_customer_branch_id : tr.find(".customer_branch").attr('data-customer_branch_id'),
                        description           : tr.find(".description").text(),
                        qty                   : tr.find(".qty").text(),
                        unit_price            : parseFloat (tr.find(".price").text()).toFixed(4),
                        discount              : parseFloat(tr.find(".discount").text()).toFixed(4),
                        bsc_account_charts_id : tr.find(".chart_account").attr('data-chart_account_id'),
                        tax                   : tr.find(".invoice_tax").val(),
                        amount                : parseFloat(tr.find(".item_amount").text()).toFixed(4)
                    };
                }
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if(itemDetail.length >0){
                $.ajax({
                    type:"POST",
                    url:'/bsc_invoice_save',
                    data:{
                        _token: CSRF_TOKEN,
                        account_type     : $("#account_type").val(),
                        customer_id      : $("#customer").attr("data-customer_id"),
                        billing_date     : $("#billing_date").val(),
                        reference        : $("#reference").val(),
                        due_date         : $("#due_date").val(),
                        effective_date   : $("#effective_date").val(),
                        end_period_date  : $("#end_period_date").val(),
                        deposit_on_payment : $("#deposit_on_payment").val(),
                        total            : parseFloat($('#txtTotal').text()).toFixed(4),
                        grandTotal       : parseFloat($('#txtGrandTotal').text()).toFixed(4),
                        vatTotal         : parseFloat($('#txtVatTotal').text()).toFixed(4),
                        billing_address  : $('#billing_address').val(),
                        crm_quote_id     : $('.reference option:selected').attr('data-crm_quote_id'),
                        itemDetail       : itemDetail
                    },
                    dataType: "JSON",
                    success:function(data){
                        if(data.saved.success == false){
                            alert("fail to insert");
                        }else{
                            go_to('bsc_invoice_invoice_list');
                        }
                    }
                });
            }else{
               sweetalert('error','Product must be have data before save!');
            }
        }
    }
</script>


