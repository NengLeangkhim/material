
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> View Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
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
                                <a href="#" class="btn btn-success purchase_form"  value="" id="">Print</a>
                                <a href="#" class="btn btn-secondary purchase_form"  value="bsc_purchase_purchase_purchase_edit" id="purchase_edit" onclick="go_to('bsc_invoice_invoice_edit/{{ $invoices->id }}')">Edit</a>
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
                                            <div class="col-sm-12">
                                                <p for="">Account Name : &nbsp;{{ $invoices->chart_account_name }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Customer Name : &nbsp;{{ $invoices->customer_name }}</p>
                                            </div>

                                            <div class="col-sm-12">
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

                                            <div class="col-sm-12">
                                                <p for="">Address : &nbsp;{{ $invoices->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Customer Branch Name</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Account</th>
                                    <th>Tax Rate</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice_details as $invoice_detail)
                                    <tr>
                                        <td>{{ $invoice_detail->customer_branch_name }}</td>
                                        <td>{{ $invoice_detail->product_name }}</td>
                                        <td>{{ $invoice_detail->description }}</td>
                                        <td>{{ $invoice_detail->qty }}</td>
                                        <td>{{ $invoice_detail->chart_account_name }}</td>
                                        <td>{{ $invoice_detail->tax }}</td>
                                        <td>{{ $invoice_detail->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><br/>
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
                                                <label for="">{{ $invoices->total }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Vat Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">{{ $invoices->vat_total }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Grand Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">{{ $invoices->grand_total }}</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr">
                                        @php
                                            $due_amount="";
                                        @endphp
                                        @foreach ($invoice_payments as $invoice_payment)
                                            @php
                                                $due_amount=$invoice_payment->due_amount;
                                            @endphp
                                            <div class="row">
                                                <div class="col-sm-6 text_right">
                                                    <label for="">Payment : </label>
                                                </div>
                                                <div class="col-sm-6 text_right">
                                                    <label for="">{{ $invoice_payment->amount_paid }}</label>
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
                                        
                                        @php
                                            $display = "";
                                            if ($due_amount == null){
                                                $display = "display: none";
                                            }
                                        @endphp
                                        <hr class="line_in_tag_hr2">

                                        <div class="row" style="{{ $display }}">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Amount Due : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="" id="due_amount">{{ $due_amount==null ? $invoices->grand_total : $due_amount }}</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr" style="{{ $display }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <form action="">
                                @csrf
                                <div class="card-body">
                                    <strong><h4 for="" style="text-align: center">Receive a Payment</h4><strong><br/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Amount Paid <b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control input_required item_unit_price"  name="amount_paid" id="amount_paid" placeholder="Amount Paid">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Date paid<b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control input_required"  name="date_paid" id="date_paid" placeholder="Date Paid">
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
                                                        @foreach ($ch_accounts as $ch_account)
                                                            <option value="{{ $ch_account->id }}">{{ $ch_account->name_en }}</option>
                                                        @endforeach
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


<script type="text/javascript">

$(function () {
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

        let amount_paid=parseFloat($('#amount_paid').val());
        let grand_total=parseFloat($('#grand_total').val());
        let due_amount=parseFloat($('#due_amount').text());

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
        if(amount_paid > due_amount){
            $('#amount_paid').css('border-color', 'red');
            sweetalert('error','Amount Paid input is bigger than Due Amount or Grand Total');
        }else if(amount_paid == 0){
            sweetalert('error','Amount Paid can not input Zero');
        }else{
            let due_amounts = (due_amount - amount_paid).toFixed(2);
            // alert(due_amounts);exit;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:'/bsc_invoice_payment',
                    data:{
                        _token: CSRF_TOKEN,
                        due_amount      : due_amounts,
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
                        if(data.payment.success == false){
                            alert("fail to payment");
                        }else{
                            go_to('bsc_invoice_invoice_list');
                        }
                    }
                });
            }
        }
    }

    // input only number & .
    $('.item_unit_price').keypress(function(e){
        var x = event.charCode || event.keyCode;
        if (isNaN(String.fromCharCode(e.which)) && x!=46 || x===32 || x===13 || (x===46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
    });
</script>
