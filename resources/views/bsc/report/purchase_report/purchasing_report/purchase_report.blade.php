<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header" style="margin-bottom: 20px;">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-shopping-cart"></i> Purchase Report</strong></h1>
               </div><br/>
               <!-- /.card-header -->
               {{-- ======================= Start Tab menu =================== --}}
               <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpaid" role="tab" aria-controls="profile" aria-selected="false">Unpaid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="profile" aria-selected="false">Paid</a>
                </li>
            </ul><br/>
            <div class="tab-content" id="myTabContent">
                {{-- =========== start tap all ============ --}}
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row form-group-marginless">
                                    <label class="col-lg-3 col-form-label">Billing Date</label>
                                    <div class="col-lg-9">
                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                            <input type="date" class="form-control" name="start" id="billing_date_from">
                                            <div class="input-group-append">
                                                <span class="input-group-text">To</span>
                                            </div>
                                            <input type="date" class="form-control" name="end" id="billing_date_to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row form-group-marginless">
                                    <label class="col-lg-3 col-form-label">Due Date</label>
                                    <div class="col-lg-9">
                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                            <input type="date" class="form-control" name="start" id="due_date_from">
                                            <div class="input-group-append">
                                                <span class="input-group-text">To</span>
                                            </div>
                                            <input type="date" class="form-control" name="end" id="due_date_to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" style="text-align: right">
                                <button type="button" class="btn btn-info save" onclick="ReportPurchase()">Search</button>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5%;">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped2">
                                    <thead>
                                        <tr class="background_color_tr">
                                            <th class="background_color_td">Purchase#</th>
                                            <th class="background_color_td">Supplier</th>
                                            <th class="background_color_td">Date</th>
                                            <th class="background_color_td">Due Date</th>
                                            <th class="background_color_td">Paid</th>
                                            <th class="background_color_td">Due</th>
                                            <th class="background_color_td">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($purchases) > 0)
                                            @foreach($purchases as $purchase)
                                                @php
                                                    $amount_paid = 0;
                                                    $due_amount = 0;
                                                    $status = '';

                                                    if($purchase->amount_paid == null && $purchase->due_amount == null){
                                                        $amount_paid = 0;
                                                        $due_amount = $purchase->grand_total;
                                                        $status = 'Unpaid';
                                                    }else if ($purchase->due_amount == 0) {
                                                        $amount_paid = $purchase->amount_paid;
                                                        $due_amount = $purchase->due_amount;
                                                        $status = 'Paid';
                                                    }else{
                                                        $amount_paid = $purchase->amount_paid;
                                                        $due_amount = $purchase->due_amount;
                                                        $status = 'Unpaid';
                                                    }

                                                    $paid = number_format($amount_paid, 4, '.', '');
                                                    $due = number_format($due_amount, 4, '.', '');

                                                    $remove_btn = "";
                                                    if ($due == 0) {
                                                        $remove_btn = "display:none;";
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $purchase->invoice_number }}</td>
                                                    <td>{{ $purchase->supplier_name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                    <td>{{ $paid }}</td>
                                                    <td>{{ $due }}</td>
                                                    <td>{{ $status }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- =========== end tap all ================= --}}
                {{-- =========== start tap unpaid ============ --}}
                <div class="tab-pane fade" id="unpaid" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tab-content" id="myTabContent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-3 col-form-label">Billing Date</label>
                                        <div class="col-lg-9">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="billing_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">To</span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="billing_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-3 col-form-label">Due Date</label>
                                        <div class="col-lg-9">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="due_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">To</span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="due_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1" style="text-align: right">
                                    <button type="button" class="btn btn-info save" onclick="ReportPurchase()">Search</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5%;">
                                <div class="col-md-12">
                                    <table id="example2" class="table table-bordered table-striped2">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Purchase#</th>
                                                <th class="background_color_td">Supplier</th>
                                                <th class="background_color_td">Date</th>
                                                <th class="background_color_td">Due Date</th>
                                                <th class="background_color_td">Paid</th>
                                                <th class="background_color_td">Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($purchases) > 0)
                                                @foreach($purchases as $purchase)
                                                    @if($purchase->due_amount == null || $purchase->due_amount != 0)
                                                        @php
                                                            $amount_paid = 0;
                                                            $due_amount = 0;

                                                            if($purchase->due_amount == null){
                                                                $amount_paid = 0;
                                                                $due_amount = $purchase->grand_total;
                                                            }else{
                                                                $amount_paid = $purchase->amount_paid;
                                                                $due_amount = $purchase->due_amount;
                                                            }

                                                            $paid = number_format($amount_paid, 4, '.', '');
                                                            $due = number_format($due_amount, 4, '.', '');
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $purchase->invoice_number }}</td>
                                                            <td>{{ $purchase->supplier_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                            <td>{{ $paid }}</td>
                                                            <td>{{ $due }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- =========== end tap unpaid ============== --}}
                {{-- =========== start tap unpaid ============ --}}
                <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tab-content" id="myTabContent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-3 col-form-label">Billing Date</label>
                                        <div class="col-lg-9">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="billing_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">To</span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="billing_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-3 col-form-label">Due Date</label>
                                        <div class="col-lg-9">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="due_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">To</span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="due_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1" style="text-align: right">
                                    <button type="button" class="btn btn-info save" onclick="ReportPurchase()">Search</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5%;">
                                <div class="col-md-12">
                                    <table id="example3" class="table table-bordered table-striped2">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Purchase#</th>
                                                <th class="background_color_td">Supplier</th>
                                                <th class="background_color_td">Date</th>
                                                <th class="background_color_td">Due Date</th>
                                                <th class="background_color_td">Paid</th>
                                                <th class="background_color_td">Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($purchases) > 0)
                                                @foreach($purchases as $purchase)
                                                    @if($purchase->due_amount == 0 && $purchase->due_amount != null)

                                                        @php
                                                            $paid = $purchase->amount_paid;
                                                            $amount_paid = number_format($paid, 4, '.', '');

                                                            $due = $purchase->due_amount;
                                                            $due_amount = number_format($due, 4, '.', '');

                                                            $remove_btn = "";
                                                            if ($due == 0) {
                                                                $remove_btn = "display:none;";
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $purchase->invoice_number }}</td>
                                                            <td>{{ $purchase->supplier_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                            <td>{{ $amount_paid }}</td>
                                                            <td>{{ $due_amount }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- =========== end tap unpaid ============== --}}
            </div>
            </div>

        </div>
    </section>
    <div id="modal_report_performance">
    </div>

<script>
    $(document).ready(function(){
        // datatable
        $("#example1").DataTable({
            "scrollX":true,
            "autoWidth": false,
            "scrollY": "400px",
            "scrollCollapse": false
        });
        $("#example2").DataTable({
            "scrollX":true,
            "autoWidth": false,
            "scrollY": "400px",
            "scrollCollapse": false
        });
        $("#example3").DataTable({
            "scrollX":true,
            "autoWidth": false,
            "scrollY": "400px",
            "scrollCollapse": false
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
    });
    });

    function ReportPurchase(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let billing_date_from = $('#billing_date_from').val();
        let billing_date_to = $('#billing_date_to').val();

        let due_date_from = $('#due_date_from').val();
        let due_date_to = $('#due_date_to').val();
        let payment_status = $('#payment_status').val();

        $.ajax({
            type:"POST",
            url:'/bsc_purchase_purchase_report',
            data:{
                _token: CSRF_TOKEN,
                billing_date_from : billing_date_from,
                billing_date_to   : billing_date_to,
                due_date_from     : due_date_from,
                due_date_to       : due_date_to,
                payment_status    : payment_status
            },
            dataType:"JSON",
            success:function(data){

                $("#example1").DataTable().destroy();
                $("#example1 tbody").empty();
                let tr = "";
                if(data.length > 0){
                    $.each(data, function(i, value) {
                        let amount_paid = 0;
                        let due_amount = 0;
                        let status = '';

                        if(value.amount_paid == null && value.due_amount == null){
                            amount_paid = 0;
                            due_amount = value.grand_total;
                            status = 'Waiting Payment';
                        }else if(value.due_amount == 0){
                            amount_paid = value.amount_paid;
                            due_amount =  value.due_amount;
                            status = 'Paid';
                        }else{
                            amount_paid = value.amount_paid;
                            due_amount =  value.due_amount;
                            status = 'Waiting Payment';
                        }
                        if(payment_status == '2'){
                            if(value.due_amount == null || value.due_amount != 0){

                                tr += "<tr><td>"+value.invoice_number+"</td><td>"+value.supplier_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                            }
                        }else if(payment_status == '3'){
                            if(value.due_amount == 0 && value.due_amount != null){

                                tr += "<tr><td>"+value.invoice_number+"</td><td>"+value.supplier_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                            }
                        }else{
                            tr += "<tr><td>"+value.invoice_number+"</td><td>"+value.supplier_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                        }
                    });
                }
                $("#example1").append(tr);
                $('#example1').DataTable();
            }
        });
    }
</script>
