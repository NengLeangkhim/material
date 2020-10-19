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
                                <select class="form-control select2" name="account_type" id="account_type">
                                    <option selected hidden disabled>select item</option>
                                    <option value="1">Exclusive</option>
                                    <option value="2">Inclusive</option>
                                    <option value="3">Oppa</option>
                                    <option value="4">Other</option>
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
                                            <select class="form-control select2" name="customer" id="customer" required>
                                                <option selected hidden disabled>select item</option>
                                                <option>Exclusive</option>
                                                <option>Inclusive</option>
                                                <option>Oppa</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Customer Branch<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control select2 is-invalid" name="customer_branch" id="customer_branch" required multiple="">
                                                <option>Exclusive</option>
                                                <option>Inclusive</option>
                                                <option>Oppa</option>
                                                <option>Other</option>
                                            </select>
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
                                            <input type="date" class="form-control"  name="billing_date" id="billing_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Reference<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control select2" name="reference" id="reference" required>
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
                            <div class="form-group">
                                <div class="row">
                                     <div class="col-md-6">
                                        <label for="exampleInputEmail1">Due Date<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" class="form-control" name="due_date" id="due_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Effective Date<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" class="form-control" name="effective_date" id="effective_date" required>
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
                                            <input required type="date" class="form-control" name="end_period_date" id="end_period_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Deposit on Payment<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input required type="date" class="form-control" name="deposit_on_payment" id="deposit_on_payment" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <table class="table table-bordered" id="invoice_table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Discount</th>
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
                            <div class="row">
                                <button type="button" name="add" id="invoice_form" class="btn btn-success btn-xs"><i class="fas fa-plus"></i> New Record</button>
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
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_invoice" onclick="saveData()">Save</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_chart_account_list')">Cencel</button>
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
    function saveData(){
        $("#frm_chart_account select").addClass("is-invalid");
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
            url:'/bsc_invoice_save',
            data:{
                _token: CSRF_TOKEN,
                account_type     : $("#account_type").val(),
                customer         : $("#customer").val(),
                customer_branch  : $("#customer_branch").val(),
                billing_date     : $("#billing_date").val(),
                reference        : $("#reference").val(),
                due_date         : $("#due_date").val(),
                effective_date   : $("#effective_date").val(),
                end_period_date  : $("#end_period_date").val(),
                deposit_on_payment : $("#deposit_on_payment").val(),
                itemDetail       : itemDetail
            },
            dataType: "JSON",
            success:function(data){
                if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
                    sweetalert('success',alert);
                    // go_to(goto);// refresh content
                  }else{
                    $.each( data.errors, function( key, value ) {//foreach show error
                        // document.getElementById(key).attributes["required"] = "";
                        // document.getElementById(key).required = true;
                        $("#" + key).addClass("is-invalid"); //give read border to input field

                        // $("#" + key + "_Error").children("strong").text("").text(data.errors[key][0]);
                        // $("#" + key + "_Error").addClass("invalid-feedback");

                    });
                  }
            }
        });
    }
</script>

