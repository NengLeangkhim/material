@php
    $item = "";
    $id="";
    $contenteditable="false";
    if (count($products) > 0) {
        foreach($products as $product){
            $item.="<option value='{$product->id}'>{$product->name}</option>";
        }
    }

    // if (count($purchase_detail) > 0) {
    //     foreach ($purchase_detail as $item) {
    //         dd($item);
    //     }
    // }
@endphp
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="fas fa-user-plus"></i> Create Purchase</h1>
            </div>
            <div class="col-md-6">
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
                {{-- <form id="frm_chart_account" action=""> --}}
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Purchase Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Choose Account <b style="color:red">*</b> </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <select class="form-control input_required" name="account_type" id="purchase_account_chart_id">
                                                @if (count($account_payables) > 0)
                                                    @foreach ($account_payables as $account_payable)
                                                        <option value="{{$account_payable->id}}">{{$account_payable->name_en}}</option>
                                                    @endforeach
                                                @endif
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Choose Vat Chart Account <b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <select class="form-control select2 input_required" name="purchase_chart_vat_acc" id="purchase_chart_vat_acc">
                                                <option selected hidden disabled>select item</option>
                                                @if (count($show_vat_chart_accounts) > 0)
                                                    @foreach ($show_vat_chart_accounts as $show_vat_chart_account)
                                                        <option value="" disabled>{{$show_vat_chart_account->bsc_account_type_name}}</option>
                                                        @php
                                                            $sub_chart_acc = $show_vat_chart_account->vat_input_chart_accounts;
                                                        @endphp
                                                        @if ($sub_chart_acc != null)
                                                            @foreach ($sub_chart_acc as $chart_acc)
                                                                <option value="{{$chart_acc->id}}">&nbsp;&nbsp;&nbsp;{{$chart_acc->name_en}}</option>
                                                            @endforeach
                                                        @endif

                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                @if (count($suppliers) > 0)
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <label for="exampleInputEmail1">Date <b style="color:red">*</b></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" value="{{date('Y-m-d')}}" class="form-control input_required" name="end_period_date" id="purchase_date">
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
                                                <th style="min-width: 150px;">Description</th>
                                                <th style="min-width: 160px;" colspan="2">Quantity</th>
                                                <th style="min-width: 80px;">Unit Price</th>
                                                <th style="min-width: 120px;">Account</th>
                                                <th style="min-width: 90px;">Tax</th>
                                                <th style="min-width: 125px;">Amount</th>
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
                                                        <label for="">Total :</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="" id="txtTotal" class="txtTotal">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                {{-- </form> --}}
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
            $(".tax").css('background-color','white');
            myKeyPress();
        });

        // Remove Table
        $(document).on('click', '.remove', function(){
            var delete_row = $(this).data("row");
            if($(this).closest('tbody').find('tr').length >1){
                $('#' + delete_row).remove();
                showTotal();
                total_Vat();
                showGrandTotal();
            }
        });

        myKeyPress();
        

        $("#purchase_table tbody").delegate('.item_qty','keyup',function(){
            tr=$(this).closest('tr');
            var qty=$(this).text();
            let price = tr.find('.item_unit_price').text();
            let amount = show_amount(qty, price);
            tr.find('.item_amount').text(amount.toFixed(4));
            showTotal();
            getVatTotal();
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
            getVatTotal();
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

        //Delegate Field Tax 
        $("#purchase_table tbody").delegate('.tax','change',function(){
            let tr=$(this).closest('tr');
            let tax = $(this).val();
            let total_amount = 0;
            let vat = 0;
            
            if(parseInt(tax) == 1){
                total_amount = tr.find('.item_amount').text();
                vat = parseFloat(total_amount * 10)/100;
                tr.find('.item_amount').attr('data-tax_total',vat);
                showTotal();
                total_Vat();
                showGrandTotal();
            }else{
                tr.find('.item_amount').attr('data-tax_total',0);
                showTotal();
                total_Vat();
                showGrandTotal();
            }
            
        });

        //
        $("#purchase_table tbody").delegate('.stock_product_id','change',function(){
            let tr=$(this).closest('tr');
            let vat = 0;
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
                    tr.find('.item_unit').text(data['measurement_name']);
                    tr.find('.item_unit_price').text(data['product_price']);
                    tr.find('.item_account').text(data['chart_account_name']);
                    tr.find('.item_account').attr('data-id',data['bsc_account_charts_id']==null ? "null" : data['bsc_account_charts_id']);
                    tr.find('.item_tax [value=1]').attr('selected', 'true');
                    let amount = show_amount(1, data['product_price']);
                    tr.find('.item_amount').text(amount.toFixed(4));
                    vat = parseFloat(amount * 10)/100;
                    tr.find('.item_amount').attr('data-tax_total',vat);
                    showTotal();
                    total_Vat();
                    showGrandTotal();
                    tr.find('.item_des').attr('contentEditable',true);
                    tr.find('.item_qty').attr('contentEditable',true);
                    tr.find('.item_unit_price').attr('contentEditable',true);

                    tr.find('.tax').prop('disabled',false);
                    
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
            if(!isNaN(parseFloat($(this).text()))){
                total_amount += parseFloat($(this).text());
            }
        });
        document.getElementById('txtTotal').innerHTML=total_amount.toFixed(4);
    }
    
    function inSertTable(count){ 
        var tr = '';
        tr +='<tr id="row'+count+'">'+
                '<td style="max-width: 165px;padding: 0;overflow: auto;" class="item_name"><select class="item_select stock_product_id" style="width: 100%;height: 51px;"><option value=""></option>'+$("#items").val()+'</select></td>'+
                '<td style="max-width: 150px;" contenteditable="{{$contenteditable}}" class="item_des" id="item_des"></td>'+
                '<td style="max-width: 90px;border-right-style: hidden;" contenteditable="{{$contenteditable}}" class="item_qty" id="item_qty" onkeypress="if(navigator.userAgent.indexOf(\'Firefox\') != -1) if($(this).parent().index()==0) return (this.innerText.length < 6) ; else return (this.innerText.length < 5); return (this.innerText.length < 5);"><span></span></td>'+
                '<td style="max-width: 70px;" class="item_unit" id="item_unit"></td>'+
                '<td style="max-width: 80px;" contenteditable="{{$contenteditable}}" class="item_unit_price" id="item_unit_price"></td>'+
                '<td style="max-width: 120px;" class="item_account" id="item_account" data-id=""></td>'+
                '<td style="max-width: 90px;padding: 0;" class="item_tax"><select disabled style="border: 0px; height: 51px;background-color: white;" class="tax form-control"><option value="" disabled hidden selected></option><option value="1">Tax</option><option value="0">No Tax</option></select></td>'+
                '<td style="max-width: 125px;" class="item_amount" id="item_amount" data-tax_total></td>'+
                '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
            '</tr>'; 
        $('#purchase_table tbody').append(tr);
    }

    // function total vat total
    function getVatTotal(){
        let vat =0;
        let total_amount = tr.find('.item_amount').text();
        vat = parseFloat(total_amount * 10)/100;
        tr.find('.item_amount').attr('data-tax_total',vat);
        total_Vat();
    }

    function total_Vat(){
        let vat = 0;
        $('.item_amount').each(function(e){
            if(!isNaN(parseFloat($(this).attr('data-tax_total')))){
                vat += parseFloat($(this).attr('data-tax_total'));
            }
        });
        document.getElementById('txtVatTotal').innerHTML=vat.toFixed(4);
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
            if(itemDetail.length > 0){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:'/bsc_purchase_save',                    
                    data:{
                        _token: CSRF_TOKEN,
                        bsc_account_charts_id : $("#purchase_account_chart_id").val(),
                        bsc_vat_chart_account : $("#purchase_chart_vat_acc").val(),
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
                        let id = data.saved.data[0].insert_bsc_invoice;
                        if(data.saved.success == false){
                            sweetalert('error','fail to insert!!');
                        }else{
                            go_to('bsc_purchase_purchase_view/'+id);
                        }
                    }
                });   
            }else{
                sweetalert('error','Please select field item!!');
            }
        }
    }
</script>
