@php
    $item = "";
    $id="";
    if (count($products) > 0) {
        foreach($products as $product){
            $item.="<option value='{$product->id}'>{$product->name}</option>";
        }
    }
    $display="";
    $bg_color = "";
    $contenteditable="true";
    $remove_btn = "";
    if(count($purchase_payments) > 0){
        $display="disabled";
        $bg_color="background-color: #ffffff !important";
        $contenteditable = "false";
        $remove_btn = "hidden";
    }
@endphp
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h4><i class="fas fa-edit"></i> Update Purchase</h4>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Choose Account <b style="color:red">*</b> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select class="form-control input_required" name="account_type" id="purchase_account_chart_id" {{$display}}>
                                @if (count($account_payables) > 0)
                                    @foreach ($account_payables as $account_payable)
                                        <option 
                                            @if ($purchase->chart_account_id == $account_payable->id)
                                                selected
                                            @endif
                                            value="{{$account_payable->id}}">{{$account_payable->name_en}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_purchase_purchase_list')"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Back</a></li>
                    <li class="breadcrumb-item"><a href="" class="lead" value="lead">Home</a></li>
                    <li class="breadcrumb-item active" onclick="go_to('bsc_purchase_purchase_list')">View Puechase</li>
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
                <form id="frm_chart_account" action="">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Supplier <b style="color:red">*</b> </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <select class="form-control select2 input_required" name="account_type" id="purchase_supplier" {{$display}}>
                                                <option selected hidden disabled>select item</option>
                                                @if (count($suppliers) > 0)
                                                    @foreach ($suppliers as $supplier)
                                                        <option 
                                                            @if ($purchase->ma_supplier_id == $supplier->id)
                                                                selected
                                                            @endif
                                                            value="{{$supplier->id}}">{{$supplier->name}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="purchase_id" value="{{ $purchase->id }}">
                                    <div class="col-md-6">
                                         <label for="exampleInputEmail1">Date <b style="color:red">*</b></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" value="{{date('Y-m-d', strtotime($purchase->billing_date))}}" class="form-control input_required" name="end_period_date" id="purchase_date">
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Due Date<b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" value="{{date('Y-m-d', strtotime($purchase->due_date))}}" class="form-control input_required" name="end_period_date" id="purchase_due_date" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Reference</label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" value="{{$purchase->reference}}" class="form-control" name="code" id="purchase_reference" placeholder="Reference">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <div class="custom-control custom-switch">
                                            <input
                                            @if ($purchase->status==true)
                                                checked
                                            @endif
                                                type="checkbox" class="custom-control-input" id="status" name="status" value="1">
                                            <label class="custom-control-label" for="status"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row table-responsive">
                                    <table id="purchase_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 165px;">Item</th>
                                                <th style="min-width: 150px;">Description</th>
                                                <th style="min-width: 65px;">Quantity</th>
                                                <th style="min-width: 80px;">Unit Price</th>
                                                <th style="min-width: 120px;">Account</th>
                                                <th hidden style="min-width: 90px;">Tax</th>
                                                <th style="min-width: 125px;">Amount</th>
                                                <th {{$remove_btn}}></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @php
                                                $row_count = 0;
                                            @endphp
                                            @if (count($purchase_detail) > 0)
                                                @foreach ($purchase_detail as $key => $p_detail)
                                                    @php
                                                        $row_count = $key;
                                                    @endphp
                                                    <tr id="row{{$key}}">
                                                        <td class="item_name" style="padding: 0;max-width: 165px;overflow: auto;">
                                                            <select {{$display}} data-is_old="1" data-is_new="0" data-is_delete="0" class="item_select stock_product_id" style="width: 100%;height: 51px;" data-purchase_detail_id="{{$p_detail->id}}"><option value=""></option>
                                                                    @foreach ($products as $product)
                                                                        <option 
                                                                            @if ($p_detail->stock_product_id == $product->id)
                                                                                selected
                                                                            @endif
                                                                            value="{{$product->id}}">{{$product->name}}
                                                                        </option>";
                                                                    @endforeach
                                                            </select>
                                                        </td>

                                                        <td style="max-width: 150px;" contenteditable="{{$contenteditable}}" class="item_des" id="item_des">{{$p_detail->description}}</td>
                                                        <td style="max-width: 65px;" contenteditable="{{$contenteditable}}" class="item_qty" id="item_qty" onkeypress="return (this.innerText.length < 5)">{{$p_detail->qty}}</td>
                                                        <td style="max-width: 80px;" contenteditable="{{$contenteditable}}" class="item_unit_price" id="item_unit_price">{{$p_detail->unit_price}}</td>
                                                        <td style="max-width: 120px;"class="item_account" id="item_account" data-id="{{$p_detail->bsc_account_charts_id}}">{{$p_detail->chart_account_name}}</td>
                                                        <td hidden style="padding: 0;min-width: 90px;" class="item_tax">
                                                            <select style="border: 0px; height: 51px; {{$bg_color}}" class="tax form-control" {{$display}}>
                                                                <option value=""></option>
                                                                <option 
                                                                    @if ($p_detail->tax == 1)
                                                                        selected
                                                                    @endif value="1">Tax
                                                                </option>
                                                                <option 
                                                                    @if ($p_detail->tax == 0)
                                                                        selected
                                                                    @endif value="0">No Tax
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td style="min-width: 125px;" class="item_amount" id="item_amount">{{$p_detail->amount}}</td>
                                                        <td {{$remove_btn}} style="text-align: center;"><button type="button" name="remove" data-row="row{{$key}}" class="btn btn-danger btn-xs remove">x</button></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <input type="hidden" id="row_count" value="{{$row_count}}">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <a {{$remove_btn}} href="javascript:" class="btn btn-success purchase_form"  value="bsc_purchase_purchase_form" id="purchase_form"><i class="fas fa-plus"></i> Add Record</a>&nbsp;
                                </div>
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
                                                        <label for="" id="txtTotal" class="txtTotal">0</label>
                                                    </div>
                                                </div>
                                                <div class="row" hidden>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">VAT Total :</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtVatTotal" class="txtVatTotal">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Grand Total :</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtGrandTotal">0</label>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr">

                                                @php
                                                    $due_amount = "";
                                                @endphp
                                                @if (count($purchase_payments) > 0)
                                                    @foreach ($purchase_payments as $purchase_payment)
                                                        @php
                                                            $due_amount = $purchase_payment->due_amount;

                                                            $amount_paid = $purchase_payment->amount_paid;
                                                            $payment = number_format($amount_paid, 4, '.', '');
                                                        @endphp
                                                        <div class="row">
                                                            <div class="col-sm-6 text_right">
                                                                <p for="">Payment :</p>
                                                            </div>
                                                            <div class="col-sm-6 text_right">
                                                                <p for="" id="payment_amount">{{ $payment }}</p>
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
                                                    $display = "";
                                                    if ($due_amount == null) {
                                                       $display = "display : none";
                                                    }
                                                @endphp
                                                <div class="row" style="{{$display}}">
                                                    <div class="col-sm-6 text_right">
                                                        <h4>
                                                            <label for="">Amount Due:</label>
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
                            <input type="hidden" value='data-is_old="1" data-is_new="0" data-is_delete="1"'  id="add_attr">
                            <input type="hidden" id='items' value="{{$item}}">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_chart_account" onclick="updateData()">Update</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_purchase_purchase_list')">Cencel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('.select2').select2();

        // Insert Table
        let count=parseInt($('#row_count').val())+1;
        showTotal();
        showGrandTotal();
        $('#purchase_form').click(function(){
            inSertTable(count);
            count = count + 1;
            $('.item_select').select2({
                containerCssClass: "add_class_select2"
            });
            $(".select2 .selection .add_class_select2").css('border','0px');
            $(".select2 .selection .add_class_select2").css('background-color','#ffffff !important');
            myKeyPress();
        });

        // Remove Table
        $(document).on('click', '.remove', function(){
            tr=$(this).closest('tr');
            var delete_row = $(this).data("row");

            if($(this).closest('tbody').find('tr').length >1){
                // $('#' + delete_row).remove();
                let num_count = 0;
                $(".stock_product_id").each(function(e){
                    if($(this).attr("data-is_delete") == 0){
                        num_count++;
                    }
                });
                if(num_count > 1){
                    $('#' + delete_row).hide();
                    tr.find('.stock_product_id').attr('data-is_delete','1','data-is_old','1','data-is_new','0');
                    showTotal();
                    showGrandTotal();
                }
            }
        });

        // call function input only number and include(.) 
        myKeyPress();
        

        $("#purchase_table tbody").delegate('.item_qty','keyup',function(){
            tr=$(this).closest('tr');
            var qty=$(this).text();
            let price = tr.find('.item_unit_price').text();
            let amount = show_amount(qty, price);
            tr.find('.item_amount').text(amount.toFixed(4));
            showTotal();
            showGrandTotal();
        });
        
        // Delegate Field Unit Price
        $("#purchase_table tbody").delegate('.item_unit_price','keyup',function(){
            tr=$(this).closest('tr');
            var price=$(this).text();
            let qty =  tr.find('.item_qty').text();
            let amount =show_amount(qty,price);
            tr.find('.item_amount').text(amount.toFixed(4));
            showTotal();
            showGrandTotal();
        });

        // Convert when user input unit price toFixed(.)
        $("#purchase_table tbody").delegate('.item_unit_price','focusout',function(){
            tr = $(this).closest('tr');
            let input_Num = parseFloat($(this).text()).toFixed(4);
            tr.find('.item_unit_price').text(input_Num);
        });
        $("#purchase_table tbody").delegate('.item_unit_price','focus',function(){
            tr = $(this).closest('tr');
            let input_Num = parseFloat($(this).text());
            tr.find('.item_unit_price').text(input_Num);
        });

        
        // Remove border select2 in field Item
        $('.item_select').select2({
            containerCssClass: "add_class_select2"
        });
        $(".select2 .selection .add_class_select2").css('border','0px');
        $(".select2 .selection .add_class_select2").css('background-color','#ffffff !important');

        //
        $("#purchase_table tbody").delegate('.stock_product_id','change',function(){
            let tr=$(this).closest('tr');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_purchase_get_by_id',                    
                data:{
                    _token: CSRF_TOKEN,
                    product_id : $(this).val()
                },
                dataType: "JSON",
                success:function(data){
                    tr.find('.item_des').text(data['description']);
                    tr.find('.item_qty').text(1);
                    tr.find('.item_unit_price').text(data['product_price']);
                    tr.find('.item_account').text(data['chart_account_name']);
                    tr.find('.item_account').attr('data-id',data['bsc_account_charts_id']==null ? "null" : data['bsc_account_charts_id']);
                    tr.find('.item_tax [value=1]').attr('selected', 'true');
                    let amount = show_amount(1, data['product_price']);
                    tr.find('.item_amount').text(amount.toFixed(4));
                    showTotal();
                    showGrandTotal();
                    tr.find('.item_des').attr('contentEditable',true);
                    tr.find('.item_qty').attr('contentEditable',true);
                    tr.find('.item_unit_price').attr('contentEditable',true);
                    
                }
            });
        });      

    });

    // Function Can Input only Number and . in Field Quantity and UnitPrice
    function myKeyPress(){
        $('.item_qty').keypress(function(e){
            if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
        });
        $('.item_unit_price').keypress(function(e){
            var x = event.charCode || event.keyCode;
            if (isNaN(String.fromCharCode(e.which)) && x!=46 || x===32 || x===13 || (x===46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
        });
    }

    // function show Amount
    function show_amount(qty,price){
        let amount = (qty * price);
        return amount;
    }
    // function Calculate Grand Total Amount
    function showGrandTotal(){
        let total = parseFloat($('#txtTotal').text());
        let totalvat = parseFloat($('#txtVatTotal').text());
        let grandTotal = total + totalvat;
        document.getElementById('txtGrandTotal').innerHTML=grandTotal.toFixed(4);
    }

    // function Calculate Total Amount
    function showTotal(){
        let total_amount = 0;
        $('.item_amount').each(function(e){
            let tr=$(this).closest('tr');
            if(!isNaN(parseFloat($(this).text()))){
                if(tr.find(".stock_product_id").attr("data-is_delete") == 0){
                    total_amount += parseFloat($(this).text());
                }
            }
        });
        document.getElementById('txtTotal').innerHTML=total_amount.toFixed(4);
    }
    
    function inSertTable(count){ 
        var tr = '';
        tr +='<tr id="row'+count+'">'+
                '<td style="max-width: 165px;padding: 0;overflow: auto;" class="item_name"><select class="item_select stock_product_id" style="width: 100%;height: 51px;" data-is_old="0" data-is_new="1" data-is_delete="0"><option value=""></option>'+$("#items").val()+'</select></td>'+
                '<td style="max-width: 150px;" contenteditable="false" class="item_des" id="item_des"></td>'+
                '<td style="max-width: 65px;" contenteditable="false" class="item_qty" id="item_qty" onkeypress="if(navigator.userAgent.indexOf(\'Firefox\') != -1) if($(this).parent().index()==0) return (this.innerText.length < 6) ; else return (this.innerText.length < 5); return (this.innerText.length < 5);"></td>'+
                '<td style="max-width: 80px;" contenteditable="false" class="item_unit_price" id="item_unit_price"></td>'+
                '<td style="max-width: 120px;" class="item_account" id="item_account" data-id=""></td>'+
                '<td hidden style="max-width: 90px; padding: 0;" class="item_tax"><select style="border: 0px; height: 51px;" class="tax form-control"><option value=""></option><option value="1">Tax</option><option value="0">No Tax</option></select></td>'+
                '<td style="max-width: 125px;"class="item_amount" id="item_amount"></td>'+
                '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
            '</tr>';
        $('#purchase_table tbody').append(tr);
    }


    // function save all data
    function updateData(){
        let num_miss = 0;
        $(".input_required").each(function(){
            if($(this).val()=="" || $(this).val()==null){ num_miss++;}
        });
        if(num_miss>0){
            $(".input_required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
            });
            sweetalert('error', 'Please input or select field *');
        }else{
            var itemDetail = [];
            $(".stock_product_id").each(function(e){
                var tr = $(this).closest('tr');
                var thisInput = $(this).val();
                if(thisInput != ""){
                    itemDetail[e] = {
                        bsc_invoice_detail_id       : $(this).attr("data-purchase_detail_id"),
                        stock_product_id            : thisInput,
                        is_old                      : $(this).attr("data-is_old"),
                        is_new                      : $(this).attr("data-is_new"),
                        is_delete                   : $(this).attr("data-is_delete"),
                        description                 : tr.find(".item_des").text(),
                        qty                         : tr.find(".item_qty").text(),
                        unit_price                  : tr.find(".item_unit_price").text(),
                        bsc_account_charts_id       : tr.find(".item_account").attr('data-id'),
                        tax                         : tr.find(".tax").val(),
                        amount                      : tr.find(".item_amount").text()
                    };
                }
            });
            if(itemDetail.length > 0){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:'/bsc_purchase_update_data',                    
                    data:{
                        _token: CSRF_TOKEN,
                        purchase_id           : $("#purchase_id").val(),
                        bsc_account_charts_id : $("#purchase_account_chart_id").val(),
                        suppier_id            : $("#purchase_supplier").val(),
                        billing_date          : $("#purchase_date").val(),
                        due_date              : $("#purchase_due_date").val(),  
                        reference             : $("#purchase_reference").val(),    
                        total                 : $("#txtTotal").text(),
                        vat_total             : $("#txtVatTotal").text(), 
                        grand_total           : $("#txtGrandTotal").text(), 
                        status                : $("#status").val(),
                        itemDetail            : itemDetail
                    },
                    dataType: "JSON",
                    success:function(data){
                        
                        if(data.updateds.success == false){
                            alert("fail to update");
                        }else{    
                            go_to('bsc_purchase_purchase_list');
                        }
                    }
                });   
            }else{
                sweetalert('error','Product must be have data before update!!');
            }
        }
    }
</script>
