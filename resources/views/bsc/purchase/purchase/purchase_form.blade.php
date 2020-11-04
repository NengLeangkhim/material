@php
    $item = "";
    $id="";
    foreach($products as $product){
        $item.="<option value='{$product->id}'>{$product->name}</option>";
    }
@endphp
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1><i class="fas fa-user-plus"></i> Create Purchase</h1>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-5">
                        <label for="exampleInputEmail1">Choose Account <b style="color:red">*</b> </label>
                    </div>
                    <div class="col-md-7">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select class="form-control select2 input_required" name="account_type" id="purchase_account_chart_id">
                                <option value="" selected hidden disabled>select item</option>

                                @foreach ($account_payables as $account_payable)
                                    <option value="{{$account_payable->id}}">{{$account_payable->name_en}}</option>
                                @endforeach
                               
                            </select>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
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
                                            <select class="form-control select2 input_required" name="account_type" id="purchase_supplier">
                                                <option selected hidden disabled>select item</option>

                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <label for="exampleInputEmail1">Date <b style="color:red">*</b></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" class="form-control input_required" name="end_period_date" id="purchase_date">
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
                                            <input required type="date" class="form-control input_required" name="end_period_date" id="purchase_due_date" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Reference</label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="code" id="purchase_reference" placeholder="Reference" >
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
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Account</th>
                                                <th>Tax</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <a  href="javascript:" class="btn btn-success purchase_form"  value="bsc_purchase_purchase_form" id="purchase_form"><i class="fas fa-plus"></i> Add Record</a>&nbsp;
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-md-12" style="padding-right: 20px;">
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Total</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtTotal" class="txtTotal">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">VAT Total</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtVatTotal" class="txtVatTotal">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Grand Total</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtGrandTotal">0</label>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr">
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Payment</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Date</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">0</label>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr2">
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <h4>
                                                            <label for="">Amount Due</label>
                                                        </h4>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <h4>
                                                            <label for="">0</label>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <hr class="line_in_tag_hr2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br/>
                            <input type="hidden" id='items' value="{{$item}}">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_chart_account" onclick="saveData()">Save</button>
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
        var count = 1;
        // Loop to Display 4 Table
        for(count=0;count<4;count++){
            inSertTable(count);
        }

        // Insert Table
        $('#purchase_form').click(function(){
            inSertTable(count);
            count = count + 1;
            $('.item_select').select2({
                containerCssClass: "add_class_select2"
            });
            $(".select2 .selection .add_class_select2").css('border','0px');
        });

        // Remove Table
        $(document).on('click', '.remove', function(){
            var delete_row = $(this).data("row");
            if($(this).closest('tbody').find('tr').length >1){
                $('#' + delete_row).remove();
                showTotal();
                showGrandTotal();
            }
        });
        // Can Input only Number and . in Field Quantity and UnitPrice
        $('.item_qty').keypress(function(e){
            if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
        });
        $('.item_unit_price').keypress(function(e){
            var x = event.charCode || event.keyCode;
            if (isNaN(String.fromCharCode(e.which)) && x!=46 || x===32 || x===13 || (x===46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
        });
        

        $("#purchase_table tbody").delegate('.item_qty','keyup',function(){
            tr=$(this).closest('tr');
            var qty=$(this).text();
            let price = tr.find('.item_unit_price').text();
            let amount = show_amount(qty, price);
            tr.find('.item_amount').text(amount.toFixed(2));
            showTotal();
            showGrandTotal();
        });
        
        // Delegate Field Unit Price
        $("#purchase_table tbody").delegate('.item_unit_price','keyup',function(){
            tr=$(this).closest('tr');
            var price=$(this).text();
            let qty =  tr.find('.item_qty').text();
            let amount =show_amount(qty,price);
            tr.find('.item_amount').text(amount.toFixed(2));
            showTotal();
            showGrandTotal();
        });

        
        // Remove border select2 in field Item
        $('.item_select').select2({
            containerCssClass: "add_class_select2"
        });
        $(".select2 .selection .add_class_select2").css('border','0px');

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
                    tr.find('.item_amount').text(amount.toFixed(2));
                    showTotal();
                    showGrandTotal();
                    
                }
            });
        });      

    });

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
        document.getElementById('txtGrandTotal').innerHTML=grandTotal.toFixed(2);
    }

    // function Calculate Total Amount
    function showTotal(){
        let total_amount = 0;
        $('.item_amount').each(function(e){
            if(!isNaN(parseFloat($(this).text()))){
                total_amount += parseFloat($(this).text());
            }
        });
        document.getElementById('txtTotal').innerHTML=total_amount.toFixed(2);
    }
    
    function inSertTable(count){ 
        var tr = '';
        tr +='<tr id="row'+count+'">'+
                '<td class="item_name" style="padding: 0;max-width: 165px;overflow: auto;"><select class="item_select stock_product_id" style="width: 100%;height: 51px;"><option value=""></option>'+$("#items").val()+'</select></td>'+
                '<td contenteditable="true" class="item_des" id="item_des"></td>'+
                '<td contenteditable="true" class="item_qty" id="item_qty"></td>'+
                '<td contenteditable="true" class="item_unit_price" id="item_unit_price"></td>'+
                '<td class="item_account" id="item_account" data-id=""></td>'+
                '<td class="item_tax" style="padding: 0;"><select style="border: 0px; height: 51px;" class="tax form-control"><option value=""></option><option value="1">Tax</option><option value="0">No Tax</option></select></td>'+
                '<td class="item_amount" id="item_amount"></td>'+
                '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
            '</tr>';
        $('#purchase_table tbody').append(tr);
    }

    // function save all data
    function saveData(){

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
                        stock_product_id        : thisInput,
                        description             : tr.find(".item_des").text(),
                        qty                     : tr.find(".item_qty").text(),
                        unit_price              : tr.find(".item_unit_price").text(),
                        bsc_account_charts_id   : tr.find(".item_account").attr('data-id'),
                        tax                     : tr.find(".tax").val(),
                        amount                  : tr.find(".item_amount").text()
                    };
                }
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_purchase_save',                    
                data:{
                    _token: CSRF_TOKEN,
                    bsc_account_charts_id : $("#purchase_account_chart_id").val(),
                    suppier_id            : $("#purchase_supplier").val(),
                    billing_date          : $("#purchase_date").val(),
                    due_date              : $("#purchase_due_date").val(),  
                    reference             : $("#purchase_reference").val(),    
                    total                 : $("#txtTotal").text(),
                    vat_total             : $("#txtVatTotal").text(), 
                    grand_total           : $("#txtGrandTotal").text(), 
                    itemDetail            : itemDetail
                },
                dataType: "JSON",
                success:function(data){

                    if(data.saved.success == false){
                        alert("fail to insert");
                    }else{
                        go_to('bsc_purchase_purchase_list');
                    }
                }
            });   
        }
    }
</script>
