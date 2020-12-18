<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1><span><i class="fas fa-dollar-sign"></i></span> View Balance</h1>
            </div>
            <div class="col-md-5">

            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_customer_balance')"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a></li>
                    <li class="breadcrumb-item"><a href="" class="Balance" ​value="Balance">Home</a></li>
                    <li class="breadcrumb-item active">View Balance</li>
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
                @csrf
                <div class="card card-primary"​>
                    <div class="card-body" style="padding-bottom: 0px">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>Customer ID</label>
                                        <div style="padding-left: 10px">
                                            <label for="">: 001</label>
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

                {{-- Increase Balance --}}
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Increase Balance</h3> --}}
                        <div class="row">
                            <div class="col-md-12 text_right">
                                <a href="javascript:" class="btn btn-success" onclick="go_to('bsc_customer_balance_form/1')">Increase Balance</a>
                                <a href="javascript:" class="btn btn-info" onclick="go_to('bsc_customer_balance_transfer_form/1')">Transfer Balance to Invoice</a>
                                <a href="javascript:" class="btn btn-primary" onclick="go_to('bsc_customer_balance_edit/1')">Edit Balance</a>
                                <a href="javascript:" class="btn btn-danger" onclick="go_to('bsc_customer_balance_refund_form/1')">Refund Balance</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="current_balance">Current Balance</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="amount">Amount</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="payment_method">Payment Method</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="credit_card_code">Credit Card Code</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="comment">Comment</label>
                                            <div style="padding-left: 10px">
                                                <label for="">: </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>