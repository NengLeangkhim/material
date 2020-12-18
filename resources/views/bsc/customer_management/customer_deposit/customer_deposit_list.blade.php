
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Deposit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Deposit</li>
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
                <div class="row​ margin_left">
                    {{-- {!! $button_add !!}&nbsp; --}}
                </div><br/>
                <div class="card">
                    {{-- ======================= Start Tab menu =================== --}}
                    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="deposit-tab" data-toggle="tab" href="#deposit" role="tab" aria-controls="deposit" aria-selected="true">Deposit</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="refund-tab" data-toggle="tab" href="#refund" role="tab" aria-controls="refund" aria-selected="true">Refund</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="transfer" aria-selected="true">Deposit Transfer</a>
                        </li>
                    </ul><br/>
                    {{-- ======================= End Tab menu =================== --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- ================ start tap deposit ============ --}}
                        <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                            <div class="card-body">
                                <div class="row margin_left">
                                    <a  href="javascript:" class="btn btn-success deposit_form" ​value="bsc_customer_deposit_form" id="deposit_form"><i class="fas fa-plus"></i> Increase Deposit</a>
                                </div><br/>
                                <div class="table-responsive">
                                    <table id="tbl_deposit" class="table table-bordered table-striped" style="white-space: nowrap;">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Deposit#</th>
                                                <th class="background_color_td">Created at</th>
                                                <th class="background_color_td">Amount</th>
                                                <th class="background_color_td">Payment Option</th>
                                                <th class="background_color_td">Comment</th>
                                                <th class="background_color_td">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No</td>
                                                <td>Customer</td>
                                                <td>Deposit#</td>
                                                <td>Created at</td>
                                                <td>Amount</td>
                                                <td>Payment Option</td>
                                                <td>Comment</td>
                                                <td style="text-align-last: center">
                                                    <a title="View" href="javascript:"​ onclick="go_to('bsc_customer_deposit_view/1')"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a title="Transfer Deposit to Balance" href="javascript:"​ onclick="go_to('bsc_customer_deposit_transfer_form/1')"><i class="fas fa-exchange-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a title="Refund" href="javascript:"​ onclick="go_to('bsc_customer_deposit_refund_form/1')"><i class="fas fa-dollar-sign" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap deposit ============ --}}

                        {{-- ================ start tap refund ======= --}}
                        <div class="tab-pane fade" id="refund" role="tabpanel" aria-labelledby="refund-tab">
                            <div class="card-body">
                                <div class="row margin_left">
                                    <a  href="javascript:" class="btn btn-success deposit_refund_form" ​value="bsc_customer_deposit_refund_form" id="deposit_refund_form"><i class="fas fa-dollar-sign"></i> Refund Deposit</a>
                                </div><br/>
                                <div class="table-responsive">
                                    <table id="tbl_refund" class="table table-bordered table-striped" style="white-space: nowrap;">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Refund#</th>
                                                <th class="background_color_td">Created at</th>
                                                <th class="background_color_td">Current Amount</th>
                                                <th class="background_color_td">Refund Amount</th>
                                                <th class="background_color_td">Comment</th>
                                                <th class="background_color_td">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No</td>
                                                <td>Customer</td>
                                                <td>Refund#</td>
                                                <td>Created at</td>
                                                <td>Current Amount</td>
                                                <td>Refund Amount</td>
                                                <td>Comment</td>
                                                <td style="text-align-last: center">
                                                    <a title="Print" href="javascript:"​><i class="fas fa-print"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap refund ========= --}}
                        {{-- ================ start tap transfer ======= --}}
                        <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                            <div class="card-body">
                                <div class="row margin_left">
                                    <a  href="javascript:" class="btn btn-success deposit_transfer_form" ​value="bsc_customer_deposit_transfer_form" id="deposit_transfer_form"><i class="fas fa-dollar-sign"></i> Transfer Deposit to Balance</a>
                                </div><br/>
                                <div class="table-responsive">
                                    <table id="tbl_transfer" class="table table-bordered table-striped" style="white-space: nowrap;">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Transfer#</th>
                                                <th class="background_color_td">Created at</th>
                                                <th class="background_color_td">Current Amount</th>
                                                <th class="background_color_td">Transfer Amount</th>
                                                <th class="background_color_td">Comment</th>
                                                <th class="background_color_td">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No</td>
                                                <td>Customer</td>
                                                <td>Transfer#</td>
                                                <td>Created at</td>
                                                <td>Current Amount</td>
                                                <td>Transfer Amount</td>
                                                <td>Comment</td>
                                                <td style="text-align-last: center">
                                                    <a title="Print" href="javascript:"​><i class="fas fa-print"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap transfer ========= --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->


<script type="text/javascript">

$(function () {
    $("#tbl_deposit").DataTable({
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false,
        "responsive": true
    });
    $("#tbl_refund").DataTable({
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false,
        "responsive": true
    });
    $("#tbl_transfer").DataTable({
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false,
        "responsive": true
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
    });
    
    $('.deposit_form').click(function(e)
    {
        var ld = $(this).attr("​value");
        go_to(ld);
    });
    $('.deposit_refund_form').click(function(e)
    {
        var ld = $(this).attr("​value");
        go_to(ld);
    });
    $('.deposit_transfer_form').click(function(e)
    {
        var ld = $(this).attr("​value");
        go_to(ld);
    });
});
</script>
