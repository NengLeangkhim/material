
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
                    </ul><br/>
                    {{-- ======================= End Tab menu =================== --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- ================ start tap deposit ============ --}}
                        <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tbl_deposit" class="table table-bordered table-striped" style="white-space: nowrap;">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Deposit#</th>
                                                <th class="background_color_td">Issue On</th>
                                                <th class="background_color_td">Amount</th>
                                                <th class="background_color_td">Payment Option</th>
                                                <th class="background_color_td">Comment</th>
                                                <th class="background_color_td">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap deposit ============ --}}

                        {{-- ================ start tap refund ======= --}}
                        <div class="tab-pane fade" id="refund" role="tabpanel" aria-labelledby="refund-tab">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tbl_refund" class="table table-bordered table-striped" style="white-space: nowrap;">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Refund#</th>
                                                <th class="background_color_td">Issue On</th>
                                                <th class="background_color_td">Amount</th>
                                                <th class="background_color_td">Comment</th>
                                                <th class="background_color_td">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap deposit ========= --}}
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

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
    });
});
</script>
