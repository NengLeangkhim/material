
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> View Purchase</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" onclick="go_to('bsc_purchase_purchase_list')">View Purchase</li>
                </ol>
            </div>
        </div>
    </div>
</section>
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
                                <a href="#" class="btn btn-secondary purchase_form"  value="bsc_purchase_purchase_purchase_edit" id="purchase_edit" onclick="go_to('bsc_purchase_purchase_edit_data/{{ $purchase->id}}')">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <p for="" class="account_name">Account Name : {{$purchase->chart_account_name}}</p><br/>
                                <p for="">Date : {{$purchase->billing_date}}</p><br/>
                                <p for="">Reference : {{$purchase->reference}}</p><br/>
                                <p for="">Address : {{$purchase->address}}</p><br/>
                            </div>
                            <div class="col-md-6">
                                <p for="">Supplier Name : {{$purchase->supplier_name}}</p><br/>
                                <p for="">Due Date : {{$purchase->due_date}}</p><br/>
                                <p for="">Purchase# : {{$purchase->invoice_number}}</p><br/>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Account</th>
                                    <th hidden>Tax Rate</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($purchase_detail) > 0)
                                    @foreach ($purchase_detail as $item)
                                        <tr>
                                            <td>{{$item->product_name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->chart_account_name}}</td>
                                            <td hidden>{{$item->tax}}</td>
                                            <td id="txtAmount" class="txtAmount">{{$item->amount}}</td>
                                        </tr>
                                    @endforeach                                   
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" style="padding-right: 20px;">
                            <div class="row">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">Total :</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="" id="txtTotal" value="">{{$purchase->total}}</label>
                                        </div>
                                    </div>
                                    <div class="row" hidden>
                                        <div class="col-sm-6 text_right">
                                            <label for="">VAT Total :</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="" id="txtVatTotal" value="">{{$purchase->vat_total}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">Grand Total :</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="" id="txtGrandTotal" value="">{{$purchase->grand_total}}</label>
                                        </div>
                                    </div>
                                    <hr class="" style="margin: 0px;">

                                    @php
                                        $due_amount = "";
                                        $my_display = "";
                                    @endphp
                                    @if (count($purchase_payments) > 0)
                                        @foreach ($purchase_payments as $purchase_payment)
                                            @php
                                                $due_amount = $purchase_payment->due_amount;

                                                $amount_paid = $purchase_payment->amount_paid;
                                                $payment = number_format($amount_paid, 4, '.', '');

                                                if($due_amount == 0){
                                                    $my_display="display : none";
                                                }
                                            @endphp
                                            <div class="row">
                                                <div class="col-sm-6 text_right">
                                                    <p for="">Payment :</p>
                                                </div>
                                                <div class="col-sm-6 text_right">
                                                    <p for="" id="payment_amount">{{$payment}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text_right">
                                                    <p for="">Date :</p>
                                                </div>
                                                <div class="col-sm-6 text_right">
                                                    <p for="">{{$purchase_payment->date_paid}}</p>
                                                </div>
                                            </div>
                                            <hr class="" style="margin: 0px;">
                                        @endforeach                                       
                                    @endif
                                    @php
                                        $display="";
                                        if($due_amount == null){
                                            $display="display : none";
                                        }
                                    @endphp
                                   
                                    <div class="row" style="{{$display}}">
                                        <div class="col-sm-6 text_right">
                                            <h4>
                                                <label for="">Amount Due :</label>
                                            </h4>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <h4>
                                                <label for="" id="due_amount_payment">{{$due_amount == null ? number_format($purchase->grand_total, 4, '.', '') : number_format($due_amount, 4, '.', '')}}</label>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr class="line_in_tag_hr2" style="{{$display}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    

                    <div class="card-body" style="{{$my_display}}">
                        <div class="form-group">
                            <div class="row">
                                <h2><b>Make Payment</b></h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">Amount Paid<b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input oninput="limitDecimalPlaces(event, 4)" type="number" class="form-control input_required" name="amount_paid" id="amount_paid" value="{{$due_amount == null ? number_format($purchase->grand_total, 4, '.', '') : number_format($due_amount, 4, '.', '')}}" autofocus placeholder="Amount Paid" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date Paid<b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input type="date" class="form-control input_required" name="date_paid" id="date_paid" placeholder="Date Paid" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Paid From<b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <select class="form-control select2" name="account_type" id="account_type">
                                            <option selected hidden disabled>select item</option>
                                            @if (count($show_chart_accounts) > 0)
                                                @foreach ($show_chart_accounts as $chart_account_show)
                                                    <option value="" disabled>{{$chart_account_show->bsc_account_type_name}}</option>
                                                    @php
                                                        $paid_from_to=$chart_account_show->paid_from_to;
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
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="reference" id="reference" placeholder="Reference" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row" style="margin-top: 30px;">
                                <a href="#" onclick="makePayment()" class="btn btn-success purchase_form"  value="bsc_purchase_purchase_form" id="purchase_form"><i class="fas fa-plus"></i> Add Payment</a>&nbsp;
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_purchase_purchase_list')">Cencel</button>
                                <input type="hidden" name="" id="show_hidden_grand_total" value="{{$purchase->grand_total}}">
                                {{--  --}}
                                <input type="hidden" id="bsc_invoice_id" value="{{$purchase->id}}">
                                {{--  --}}
                                <input type="hidden" id="bsc_account_charts_id" value="{{$purchase->chart_account_id}}">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

   $(document).ready(function(){
        $('.select2').select2();

        $("#amount_paid").on("keyup", function(){
           let paid_amount =  parseFloat($(this).val());
           let due_amount_payment=parseFloat($('#due_amount_payment').text());
           if(paid_amount > due_amount_payment){
                sweetalert('error', 'Your Paid Amount is bigger than Due Amount');
                return false;
            }
        });
    });

    function makePayment(){

        let amount_paid = parseFloat($('#amount_paid').val());
        let grand_total = parseFloat($('#show_hidden_grand_total').val());
        let due_amount_payment=parseFloat($('#due_amount_payment').text());

        if(amount_paid > due_amount_payment){
            sweetalert('error', 'Paid Amount input is bigger than Due Amount');
        }else if(amount_paid == 0){
            sweetalert('error', 'Paid Amount can not input Zero');
            return false;
        }else if(amount_paid < 0){
            sweetalert('error','Amount Paid must bigger than Zero');
            return false;
        }else{
            let num_miss = 0;
            $(".input_required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ num_miss++;}
            });
            if(num_miss>0){
                $(".input_required").each(function(){
                    if($(this).val()=="" || $(this).val()==null){
                        $(this).css("border-color","red");
                    }
                });
                sweetalert('error', 'Please input or select field * required');
            }else{

                let due_amount = due_amount_payment - amount_paid;

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:'/bsc_purchase_make_payment',
                    data:{
                        _token: CSRF_TOKEN,
                        amount_paid             : amount_paid,
                        due_amount              : due_amount,
                        old_due_amount          : parseFloat($('#due_amount_payment').text()),
                        date_paid               : $('#date_paid').val(),
                        account_type            : $('#account_type').val(),
                        reference               : $('#reference').val(),
                        bsc_invoice_id          : $('#bsc_invoice_id').val(),
                        grand_total             : grand_total,
                        bsc_account_charts_id   : $('#bsc_account_charts_id').val()
                    },
                    dataType: "JSON",
                    success:function(data){
                        if(data.payment.success == true){
                            go_to('bsc_purchase_purchase_list');
                        }else{
                            if(data.payment == "amount_paid_bigger_then_due"){
                                sweetalert('error','Amount Paid input is bigger than Due Amount or Grand Total');
                            }
                            sweetalert('error','Purchase Insert is fail!!');                            
                        }
                    }
                });
            }
        }
    }
    // max length input after dote
    function limitDecimalPlaces(e, count) {
        if (e.target.value.indexOf('.') == -1) { return; }
        if ((e.target.value.length - e.target.value.indexOf('.')) > count) {
            e.target.value = parseFloat(e.target.value).toFixed(count);
        }
    }
</script>
