<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-dollar-sign"></i></span> Transfer Balance to Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_customer_balance')"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a></li>
                    <li class="breadcrumb-item"><a href="" class="deposit" ​value="deposit">Home</a></li>
                    <li class="breadcrumb-item active">Transfer Balance to Invoice</li>
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
                <form id="frm_transfer_balance" action="">
                    @csrf
                    <div class="card card-primary"​>
                        <div class="card-body" style="padding-bottom: 0px">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label>Customer ID <b class="color_label">*</b></label>
                                            <div class="col-sm-7">
                                                <select class="form-control custom-select select2 input_required" name="customer_id" id="customer_id">
                                                    <option value="" selected hidden disabled>select item</option>
                                                    <option value="">TT-001</option>
                                                    <option value="">TT-002</option>
                                                    <option value="">TT-003</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label>Customer Name</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: Touch Rith</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label>ឈ្មោះអតិថិជន</label>
                                            <div style="padding-left: 40px">
                                                <label for="">: ទូច រិទ្ធ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label>Deposit</label>
                                            <div style="padding-left: 30px">
                                                <label for="">: 1000</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label>Balance</label>
                                            <div style="padding-left: 70px">
                                                <label for="">: 1000</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label>Invoice Balance</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: 1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Transfer Balance to Invoice --}}
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Transfer Balance to Invoice</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="invoice_id">Select Invoice<b class="color_label">*</b></label>
                                        <select name="invoice_id" id="invoice_id" class="form-control custom-select input_required">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="total_invoice">Total Invoice Value<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">USD</span>
                                            </div>
                                            <input type="number" class="form-control input_required" name="total_invoice" id="total_invoice">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="transfer_amount">Transfer Amount<b class="color_label">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">USD</span>
                                            </div>
                                            <input type="number" class="form-control input_required" name="transfer_amount" id="transfer_amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="comment">Comment</label>
                                        <input type="text" class="form-control" name="comment" id="comment">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_transfer_balance" onclick="saveData()">Save</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_customer_balance')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function saveData(){

    }
</script>