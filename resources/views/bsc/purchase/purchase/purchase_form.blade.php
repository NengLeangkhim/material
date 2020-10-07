<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1><i class="fas fa-user-plus"></i> Create Purchase</h1>
                <!-- <h1 class="card-title hrm-title"><strong><i class="fas fa-user-plus"></i> Create Purchase </strong></h1> -->
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
                            <select class="form-control select2" name="account_type" >
                                <option selected hidden disabled>select item</option>
                                <option>Exclusive</option>
                                <option>Inclusive</option>
                                <option>Oppa</option>
                                <option>Other</option>                        
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" value="lead">Home</a></li>
                    <li class="breadcrumb-item active">View Puechase</li>
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
                        <!-- <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Purchase Detail</h3>
                        </div> -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Supplier <b style="color:red">*</b> </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <select class="form-control select2" name="account_type" >
                                                <option selected hidden disabled>select item</option>
                                                <option>Exclusive</option>
                                                <option>Inclusive</option>
                                                <option>Oppa</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <label for="exampleInputEmail1">Date <b style="color:red">*</b></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" class="form-control" name="end_period_date" id="exampleInputEmail1" placeholder="Description">
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
                                            <input required type="date" class="form-control" name="end_period_date" id="exampleInputEmail1" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <label for="exampleInputEmail1">Parent</label> -->
                                        <label for="exampleInputEmail1">Reference</label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="Reference" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row table-responsive">
                                    <table id="purchase_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Account</th>
                                                <th>Tax Rate</th>
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
                                                        <label for="" id="txtTotal">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">VAT Total</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">0</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">Grand Total</label>
                                                    </div>
                                                    <div class="col-sm-6 text_right">
                                                        <label for="">0</label>
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
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_chart_account">Save</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_chart_account_list')">Cencel</button>
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
        var count = 1;
        $('.select2').select2();
        // Loop to Display 4 Table
        for(count=0;count<4;count++){
            inSertTable(count);
        }
        // Insert Table
        $('#purchase_form').click(function(){
                inSertTable(count);
                count = count + 1;
        });

        // Remove Table
        $(document).on('click', '.remove', function(){
            var delete_row = $(this).data("row");
            if($(this).closest('tbody').find('tr').length >1){
                $('#' + delete_row).remove();
                showTotal();
            }
        });

        $("#purchase_table tbody").delegate('.item_qty','keyup',function(){
            tr=$(this).closest('tr');
            var qty=$(this).text();
            var amount = qty * tr.find('.item_unit_price').text();
            tr.find('.item_amount').text(amount);
            showTotal();
            
        });
        $("#purchase_table tbody").delegate('.item_unit_price','keyup',function(){
            tr=$(this).closest('tr');
            var price=$(this).text();
            var amount = price * tr.find('.item_qty').text();
            tr.find('.item_amount').text(amount);
            showTotal();
            
        });
        
    });

    function showTotal(){
        let total_amount = 0;
        $('.item_amount').each(function(e){
            if(!isNaN(parseInt($(this).text()))){
                total_amount += parseInt($(this).text());
            }
        });
        document.getElementById('txtTotal').innerHTML=total_amount;
    }

    function inSertTable(count){ 
        var tr = '';
        tr +='<tr id="row'+count+'">'+
                '<td contenteditable="true" id="txt_name" class="item_name" data-id="'+count+'"></td>'+
                '<td contenteditable="true" class="item_des"></td>'+
                '<td contenteditable="true" class="item_qty"></td>'+
                '<td contenteditable="true" class="item_unit_price"></td>'+
                '<td contenteditable="true" class="item_account"></td>'+
                '<td contenteditable="true" class="item_tax"></td>'+
                '<td class="item_amount" id="item_amount"></td>'+
                '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
            '</tr>'; 
        $('#purchase_table tbody').append(tr);
    }
    
</script>
