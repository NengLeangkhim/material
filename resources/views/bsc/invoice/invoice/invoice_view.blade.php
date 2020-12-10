
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-eye"></i> View Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_invoice_invoice_list')"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Back</a></li>
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">View Invoice</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text_right">
                                <a target="_blank" href="bsc_preview_invoioce/{{ $invoices->id }}" class="btn btn-success purchase_form"  value="" id="">Preview</a>
                                {{-- <a href="#" class="btn btn-secondary purchase_form"  value="bsc_purchase_purchase_purchase_edit" id="purchase_edit" onclick="go_to('bsc_invoice_invoice_edit/{{ $invoices->id }}')">Edit</a> --}}
                                {{-- <a href="#" class="btn btn-danger purchase_form"  value="" id="">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <input type="hidden" id="bsc_invoice_id" value="{{ $invoices->id }}">
                                            <input type="hidden" id="bsc_account_charts_id" value="{{ $invoices->chart_account_id }}">
                                            <input type="hidden" name="vat_number" id="vat_number" value="{{ $invoices->vat_number }}">
                                            <div class="col-sm-12">
                                                <p for="">Account Name : &nbsp;{{ $invoices->chart_account_name }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Customer Name : &nbsp;{{ $invoices->customer_name }}</p>
                                            </div>

                                            <div class="col-sm-12" style="display: none">
                                                <p for="">Deposit : &nbsp;{{ $invoices->deposit_on_payment }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Balance : &nbsp;{{ $invoices->customer_balance }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Invoice Balance : &nbsp;{{ $invoices->customer_invoice_balance }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Billing Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->billing_date)) }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Address : &nbsp;{{ $invoices->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p for="">Invoice : &nbsp;{{ $invoices->invoice_number }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Reference : &nbsp;{{ $invoices->reference }}</p>
                                            </div>

                                            <div class="col-sm-5">
                                                <p for="">Due Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->due_date)) }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Effective Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->effective_date)) }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">End Period Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->end_period_date)) }}</p>
                                            </div>

                                            {{-- <div class="col-sm-12">
                                                <p for="">Address : &nbsp;{{ $invoices->address }}</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tbl_invoice_detail"  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Customer Branch</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Dsicount</th>
                                    <th>Account</th>
                                    <th>Tax</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            @php
                                // dd($invoice_details);
                            @endphp
                            <tbody>
                                {{-- @if (count($invoice_details) >0)
                                    @foreach ($invoice_details as $invoice_detail)
                                        <tr>
                                            <td>{{ $invoice_detail->customer_branch_name }}</td>
                                            <td>{{ $invoice_detail->product_name }}</td>
                                            <td>{{ $invoice_detail->description }}</td>
                                            <td>{{ $invoice_detail->qty }} <span>{{ $invoice_detail->measurement_name }}</span></td>
                                            <td>{{ number_format($invoice_detail->unit_price,4,".",",") }}</td>
                                            <td>{{ number_format($invoice_detail->discount,4,".",",") }}</td>
                                            <td>{{ $invoice_detail->chart_account_name }}</td>
                                            <td>{{ $invoice_detail->tax == 0 ? "Exclude" : "Include" }}</td>
                                            <td class="item_amount" data-item_amount="{{ $invoice_detail->amount }}">{{ number_format($invoice_detail->amount,4,".",",") }}</td>
                                        </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                        </table><br/>
                        <div class="form-group">
                            <div class="col-md-12" style="padding-right: 20px;">
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row" id="display_none">
                                            <input type="hidden" id="old_total">
                                            <div class="col-sm-6 text_right">
                                                <label for="" id="total_label">Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="" id="txtTotal">0</label>
                                            </div>
                                        </div>
                                        <div class="row" id="display_none_vat">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Vat Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="" id="txtVatTotal">0.0000</label>
                                            </div>
                                        </div>
                                        <div class="row" id="display_none_grand">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Grand Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="" id="txtGrandTotal">{{ $invoices->grand_total }}</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr">
                                        @php
                                            $due_amount="";
                                            $due_total="";
                                        @endphp
                                        @if (count($invoice_payments) >0)
                                            @foreach ($invoice_payments as $invoice_payment)
                                                @php
                                                    $due_amount=$invoice_payment->due_amount;
                                                    if($due_amount == 0){
                                                        $due_total="display : none";
                                                    }
                                                @endphp
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Payment : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">{{ number_format($invoice_payment->amount_paid,4,".",",") }}</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Date : </label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">{{ date('d-m-Y', strtotime($invoice_payment->date_paid))  }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @php
                                            $display = "";
                                            if ($due_amount == null){
                                                $display = "display: none";
                                            }
                                        @endphp
                                        <hr class="line_in_tag_hr2" style="{{ $display }}">

                                        <div class="row" style="{{ $display }}">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Amount Due : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="" id="due_amount">{{$due_amount == null ? number_format($invoices->grand_total, 4, '.', '') : number_format($due_amount, 4, '.', '')}}</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr" style="{{ $display }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="{{ $due_total }}">
                            <form action="">
                                @csrf
                                <div class="card-body">
                                    <h4><label for="">Receive a Payment</label></h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Amount Paid <b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input oninput="limitDecimalPlaces(event, 4)" type="number" class="form-control input_required item_unit_price" name="amount_paid" id="amount_paid" value="{{$due_amount == null ? number_format($invoices->grand_total, 4, '.', '') : number_format($due_amount, 4, '.', '')}}" autofocus placeholder="Amount Paid" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Date paid<b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control input_required" value="{{ date('Y-m-d') }}"  name="date_paid" id="date_paid" placeholder="Date Paid">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Paid To<b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <select class="form-control select2 input_required" name="paid_to" id="paid_to">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        @if (count($ch_accounts) >0)
                                                            @foreach ($ch_accounts as $ch_account)
                                                                <option value="" disabled>{{ $ch_account->bsc_account_type_name }}</option>
                                                                @php
                                                                    $paid_from_to=$ch_account->paid_from_to;
                                                                @endphp
                                                                @if ($paid_from_to !=null)
                                                                    @foreach ($paid_from_to as $paid_to)
                                                                        <option value="{{ $paid_to->id }}">&nbsp;&nbsp;&nbsp;{{ $paid_to->name_en }}</option>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Reference</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name="reference" id="reference" placeholder="Reference">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" value="{{ $invoices->grand_total }}" id="grand_total">
                                    <div class="col-md-12">
                                        <button id="add_payment" type="button" onclick="invoice_payment()" class="btn btn-success save" id="frm_btn_sub_add_chart_account">Add Payment</button>&nbsp;&nbsp;&nbsp;
                                        <button id="add_payment" onclick="go_to('bsc_invoice_invoice_list')" type="button" class="btn btn-danger save" id="frm_btn_sub_add_chart_account">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->
<script src="js/bsc/invoice.js"></script>

<script type="text/javascript">

$(function () {

    showData();

    $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    });
});
$('.lead').click(function(e)
{
    var ld = $(this).attr("​value");
    go_to(ld);
})
$('.edit').click(function(e)
{
    var id = $(this).attr("​value");
    go_to(id);
});
$('.detail').click(function(e)
{
    var id = $(this).attr("​value");
    go_to(id);
});
</script>
<script>
    $('.select2').select2();

    $(document).ready(function(){
        //show total & grand total
        // showTotal();
        // vatTotal();
        // showGrandTotal();

        $("#amount_paid").on("keyup", function()
        {
            let amount_paid=parseFloat($('#amount_paid').val());
            let due_amount=parseFloat($('#due_amount').text());

            if(amount_paid > due_amount){
                sweetalert('error','Amount Paid is bigger than Due Amount or Grand Total');
                return false;
            }
        });
    });

    // add payment
    function invoice_payment()
    {
        let amount_paid=parseFloat($('#amount_paid').val()).toFixed(4);
        let grand_total=parseFloat($('#grand_total').val()).toFixed(4);
        let due_amount=parseFloat($('#due_amount').text()).toFixed(4);
        let num_miss = 0;
        $(".input_required").each(function(){
            if($(this).val()=="" || $(this).val()==null){ num_miss++;}
        });
        if(num_miss>0){
            $(".input_required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
            });
            sweetalert('error', 'Please input or select field * required');
            return false;
        }else{
            if(parseFloat(amount_paid) > parseFloat(due_amount)){
                $('#amount_paid').css('border-color', 'red');
                sweetalert('error','Amount Paid input is bigger than Due Amount or Grand Total');
                return false;
            }else if(parseFloat(amount_paid) == 0){
                sweetalert('error','Amount Paid can not input Zero');
                return false;
            }else if(parseFloat(amount_paid) < 0){
                sweetalert('error','Amount Paid must input bigger than Zero');
                return false;
            }else{
                let due_amounts =parseFloat(due_amount - amount_paid).toFixed(4);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:'/bsc_invoice_payment',
                    data:{
                        _token: CSRF_TOKEN,
                        due_amount      : due_amounts,
                        old_due_amount  : parseFloat($('#due_amount').text()).toFixed(4),
                        amount_paid     : amount_paid,
                        grand_total     : grand_total,
                        date_paid       : $('#date_paid').val(),
                        paid_to         : $('#paid_to').val(),
                        reference       : $('#reference').val(),
                        bsc_invoice_id  : $('#bsc_invoice_id').val(),
                        bsc_account_charts_id  : $('#bsc_account_charts_id').val()

                    },
                    dataType: "JSON",
                    success:function(data){
                        if(data.payment.success == true){
                            go_to('bsc_invoice_invoice_list');
                        }else{
                            if(data.payment == "amount_paid_bigger_then_due"){
                                sweetalert('error','Amount Paid input is bigger than Due Amount or Grand Total');
                            }
                            sweetalert('error','Invoice insert is fail!');
                        }
                    }
                });
            }
        }
    }

    // input only number & .
    // $('.item_unit_price').keypress(function(e){
    //     var x = event.charCode || event.keyCode;
    //     if (isNaN(String.fromCharCode(e.which)) && x!=46 || x===32 || x===13 || (x===46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
    // });

    // End Calculate Grand Total
    function showTotals(){
        let total_amount = 0;
        $('.item_amount').each(function(e){
            if(!isNaN(parseFloat($(this).attr('data-item_amount')))){
                total_amount += parseFloat($(this).attr('data-item_amount'));
            }
        });
        document.getElementById('txtTotal').innerHTML=total_amount.toFixed(4);
    }

    // Calculate Grand Total
    // function showGrandTotals(){
    //     let total = parseFloat($('#txtTotal').text());
    //     let totalvat = parseFloat($('#txtVatTotal').text());
    //     let grandTotal = total + totalvat;
    //     document.getElementById('txtGrandTotal').innerHTML=grandTotal.toFixed(4);
    // }
    //Calculate Vat Total
    function vatTotals()
    {
        let total = parseFloat($('#txtTotal').text());
        let vat_total= (total * 10)/100;
        document.getElementById('txtVatTotal').innerHTML=vat_total.toFixed(4);
    }
    // max length input after dote
    function limitDecimalPlaces(e, count) {
        if (e.target.value.indexOf('.') == -1) { return; }
        if ((e.target.value.length - e.target.value.indexOf('.')) > count) {
            e.target.value = parseFloat(e.target.value).toFixed(count);
        }
    }

    // function show amount
    function show_amounts(discount_type,qty,price,discount)
    {
        let amount = 0;
        let discount_price = 0;
        if(discount_type == 'percent'){
            discount_price= (qty * price) * discount/100;
            amount = (qty * price) - discount_price;
            return amount;
        }else{
            amount = (qty * price)  - discount;
            return amount;
        }
    }

    function showData(){
        let invoice_details = <?php echo json_encode($invoice_details); ?>;
        let tr = '';
        let vat_number = $("#vat_number").val();
        let amount = 0;
        let vats = 0;
        let vat_per_item = 0;
        let price_show = 0;
        let amount_show = 0;
        if(invoice_details.length > 0){
            $.each(invoice_details, function(e, invoice_detail){

                let discount_type = 'percent';
                if(discount_type == 'percent'){
                    percent ="%";
                }else{
                    percent ="$";
                }
                let qty=invoice_detail.qty;
                let price=invoice_detail.unit_price;
                let discount=invoice_detail.discount;
                amount = show_amounts(discount_type,qty,price,discount);
                vats = vat(amount);
                vat_per_item = vats / qty;

                if(vat_number == ""){
                    tax_rate="Include";
                    attr_tax_rate=1;
                    price_show = newUnitPrice(discount_type,price,vat_per_item);
                    amount_show = show_amount_old(discount_type,qty,price_show,discount);
                }else{
                    tax_rate="Exclude";
                    attr_tax_rate=0;
                }

                let tax = invoice_detail.tax == 0 ? "Exclude" : "Include"
                tr += '<tr>'+
                            '<td>'+invoice_detail.customer_branch_name+'</td>'+
                            '<td>'+invoice_detail.product_name+'</td>'+
                            '<td>'+invoice_detail.description+'</td>'+
                            '<td>'+invoice_detail.qty+' <span>'+invoice_detail.measurement_name+'</span></td>'+
                            '<td>'+parseFloat(vat_number == ""  ? price_show : price).toFixed(4)+'</td>'+
                            '<td>'+invoice_detail.discount+''+percent+'</td>'+
                            '<td>'+invoice_detail.chart_account_name+'</td>'+
                            '<td>'+tax+'</td>'+
                            '<td class="item_amount" data-amount="'+amount+'" data-vat="'+vats+'">'+parseFloat(vat_number == "" ? amount_show : amount).toFixed(4)+'</td>'+
                        '</tr>';
            });
        }
        $("#tbl_invoice_detail tbody").html(tr);
        showTotal();
        vatTotals();
        // showGrandTotal();
        let total_label ='';
        if(vat_number == ""){
            total_label = "Total with Tax :";
            $('#total_label').html(total_label);
            $('#display_none_vat').hide();
        }else{
            total_label = "Total :";
            $('#total_label').html(total_label);
            $('#display_none_vat').show();
        }

    }
</script>
