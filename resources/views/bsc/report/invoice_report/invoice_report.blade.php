<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header" style="margin-bottom: 20px;">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-calculator"></i> Invoice Report</strong></h1>
               </div><br/>
               {{-- ======================= Start Tab menu =================== --}}
               <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all_invoice" role="tab" aria-controls="home" aria-selected="true">All Invoice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpaid_invoice" role="tab" aria-controls="profile" aria-selected="false">Unpaid Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_invoice" role="tab" aria-controls="profile" aria-selected="false">Closed Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#void_invoice" role="tab" aria-controls="profile" aria-selected="false">Void Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#write_off_invoice" role="tab" aria-controls="profile" aria-selected="false">Write Off Invoice</a>
                </li>
            </ul><br/>
            {{-- ======================= End Tab menu =================== --}}
               <!-- /.card-header -->
               <div class="tab-content" id="myTabContent">
                   {{-- =============== start tap all invoice =========== --}}
                    <div class="tab-pane fade show active" id="all_invoice" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-4 col-form-label">Billing Date</label>
                                        <div class="col-lg-8">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="billing_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><strong>To</strong></span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="billing_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-4 col-form-label">Due Date</label>
                                        <div class="col-lg-8">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="due_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><strong>To</strong></span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="due_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-4 col-form-label">Effective Date</label>
                                        <div class="col-lg-8">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="effective_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><strong>To</strong></span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="effective_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row form-group-marginless">
                                        <label class="col-lg-4 col-form-label">End Period Date</label>
                                        <div class="col-lg-8">
                                            <div class="input-daterange input-group" id="k_datepicker_5">
                                                <input type="date" class="form-control" name="start" id="end_period_date_from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><strong>To</strong></span>
                                                </div>
                                                <input type="date" class="form-control" name="end" id="end_period_date_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="text-align: right">
                                    <button type="button" class="btn btn-primary save" style="margin-top:31px;" onclick="ReportInvoice()">Search</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5%;">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered table-striped2"​ style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Invoice Number</th>
                                                <th class="background_color_td">Reference</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Billing Date</th>
                                                <th class="background_color_td">Due Date</th>
                                                <th class="background_color_td">Effective Date</th>
                                                <th class="background_color_td">End Period Date</th>
                                                <th class="background_color_td">Paid</th>
                                                <th class="background_color_td">Due</th>
                                                <th class="background_color_td">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($invoices) >0)
                                                @foreach ($invoices as $invoice)
                                                    @php
                                                        $amount_paid = 0;
                                                        $due_amount = 0;
                                                        $status = '';

                                                        if($invoice->amount_paid == null && $invoice->due_amount == null){
                                                            $amount_paid = 0;
                                                            $due_amount = $invoice->grand_total;
                                                            $status = 'Unpaid Invoice';
                                                        }else if ($invoice->due_amount == 0) {
                                                            $amount_paid = $invoice->amount_paid;
                                                            $due_amount = $invoice->due_amount;
                                                            $status = 'Close Invoice';
                                                        }else{
                                                            $amount_paid = $invoice->amount_paid;
                                                            $due_amount = $invoice->due_amount;
                                                            $status = 'Close Invoice';
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $invoice->invoice_number }}</td>
                                                        <td>{{ $invoice->reference }}</td>
                                                        <td>{{ $invoice->customer_name }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                        <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                        <td>{{ date('d-m-Y', strtotime($invoice->effective_date))}}</td>
                                                        <td>{{ date('d-m-Y', strtotime($invoice->end_period_date))}}</td>
                                                        <td>{{ number_format($invoice->amount_paid,4,".",",") }}</td>
                                                        <td>{{ number_format($invoice->due_amount,4,".",",") }}</td>
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
                   {{-- =============== end tap all invoice ============= --}}

                   {{-- =============== start tap unpaid invoice ======== --}}
                   <div class="tab-pane fade" id="unpaid_invoice" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Billing Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="billing_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="billing_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Due Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="due_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="due_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Effective Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="effective_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="effective_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">End Period Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="end_period_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="end_period_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: right">
                                        <button type="button" class="btn btn-primary save" style="margin-top:31px;" onclick="ReportInvoice()">Search</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5%;">
                                    <div class="col-md-12">
                                        <table id="example2" class="table table-bordered table-striped2"​ style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">Invoice Number</th>
                                                    <th class="background_color_td">Reference</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Billing Date</th>
                                                    <th class="background_color_td">Due Date</th>
                                                    <th class="background_color_td">Effective Date</th>
                                                    <th class="background_color_td">End Period Date</th>
                                                    <th class="background_color_td">Paid</th>
                                                    <th class="background_color_td">Due</th>
                                                    <th class="background_color_td">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($invoices) >0)
                                                    @foreach ($invoices as $invoice)
                                                        @php
                                                            $amount_paid = 0;
                                                            $due_amount = 0;
                                                            $status = '';

                                                            if($invoice->amount_paid == null && $invoice->due_amount == null){
                                                                $amount_paid = 0;
                                                                $due_amount = $invoice->grand_total;
                                                                $status = 'Unpaid Invoice';
                                                            }else if ($invoice->due_amount == 0) {
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }else{
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $invoice->invoice_number }}</td>
                                                            <td>{{ $invoice->reference }}</td>
                                                            <td>{{ $invoice->customer_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->effective_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->end_period_date))}}</td>
                                                            <td>{{ number_format($invoice->amount_paid,4,".",",") }}</td>
                                                            <td>{{ number_format($invoice->due_amount,4,".",",") }}</td>
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
                   </div>
                   {{-- =============== end tap unpaid invoice ========== --}}
                   {{-- =============== start tap closed invoice ======== --}}
                   <div class="tab-pane fade" id="closed_invoice" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Billing Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="billing_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="billing_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Due Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="due_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="due_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Effective Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="effective_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="effective_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">End Period Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="end_period_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="end_period_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: right">
                                        <button type="button" class="btn btn-primary save" style="margin-top:31px;" onclick="ReportInvoice()">Search</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5%;">
                                    <div class="col-md-12">
                                        <table id="example3" class="table table-bordered table-striped2"​ style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">Invoice Number</th>
                                                    <th class="background_color_td">Reference</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Billing Date</th>
                                                    <th class="background_color_td">Due Date</th>
                                                    <th class="background_color_td">Effective Date</th>
                                                    <th class="background_color_td">End Period Date</th>
                                                    <th class="background_color_td">Paid</th>
                                                    <th class="background_color_td">Due</th>
                                                    <th class="background_color_td">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($invoices) >0)
                                                    @foreach ($invoices as $invoice)
                                                        @php
                                                            $amount_paid = 0;
                                                            $due_amount = 0;
                                                            $status = '';

                                                            if($invoice->amount_paid == null && $invoice->due_amount == null){
                                                                $amount_paid = 0;
                                                                $due_amount = $invoice->grand_total;
                                                                $status = 'Unpaid Invoice';
                                                            }else if ($invoice->due_amount == 0) {
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }else{
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $invoice->invoice_number }}</td>
                                                            <td>{{ $invoice->reference }}</td>
                                                            <td>{{ $invoice->customer_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->effective_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->end_period_date))}}</td>
                                                            <td>{{ number_format($invoice->amount_paid,4,".",",") }}</td>
                                                            <td>{{ number_format($invoice->due_amount,4,".",",") }}</td>
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
                   </div>
                   {{-- =============== end tap cloded invoice ========== --}}
                   {{-- =============== start tap void invoice ======== --}}
                   <div class="tab-pane fade" id="void_invoice" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Billing Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="billing_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="billing_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Due Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="due_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="due_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Effective Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="effective_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="effective_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">End Period Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="end_period_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="end_period_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: right">
                                        <button type="button" class="btn btn-primary save" style="margin-top:31px;" onclick="ReportInvoice()">Search</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5%;">
                                    <div class="col-md-12">
                                        <table id="example4" class="table table-bordered table-striped2"​ style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">Invoice Number</th>
                                                    <th class="background_color_td">Reference</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Billing Date</th>
                                                    <th class="background_color_td">Due Date</th>
                                                    <th class="background_color_td">Effective Date</th>
                                                    <th class="background_color_td">End Period Date</th>
                                                    <th class="background_color_td">Paid</th>
                                                    <th class="background_color_td">Due</th>
                                                    <th class="background_color_td">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($invoices) >0)
                                                    @foreach ($invoices as $invoice)
                                                        @php
                                                            $amount_paid = 0;
                                                            $due_amount = 0;
                                                            $status = '';

                                                            if($invoice->amount_paid == null && $invoice->due_amount == null){
                                                                $amount_paid = 0;
                                                                $due_amount = $invoice->grand_total;
                                                                $status = 'Unpaid Invoice';
                                                            }else if ($invoice->due_amount == 0) {
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }else{
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $invoice->invoice_number }}</td>
                                                            <td>{{ $invoice->reference }}</td>
                                                            <td>{{ $invoice->customer_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->effective_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->end_period_date))}}</td>
                                                            <td>{{ number_format($invoice->amount_paid,4,".",",") }}</td>
                                                            <td>{{ number_format($invoice->due_amount,4,".",",") }}</td>
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
                   </div>
                   {{-- =============== end tap void invoice ========== --}}
                   {{-- =============== start tap write off invoice ======== --}}
                   <div class="tab-pane fade" id="write_off_invoice" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Billing Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="billing_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="billing_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Due Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="due_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="due_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">Effective Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="effective_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="effective_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row form-group-marginless">
                                            <label class="col-lg-4 col-form-label">End Period Date</label>
                                            <div class="col-lg-8">
                                                <div class="input-daterange input-group" id="k_datepicker_5">
                                                    <input type="date" class="form-control" name="start" id="end_period_date_from">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><strong>To</strong></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="end" id="end_period_date_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="text-align: right">
                                        <button type="button" class="btn btn-primary save" style="margin-top:31px;" onclick="ReportInvoice()">Search</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5%;">
                                    <div class="col-md-12">
                                        <table id="example5" class="table table-bordered table-striped2"​ style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">Invoice Number</th>
                                                    <th class="background_color_td">Reference</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Billing Date</th>
                                                    <th class="background_color_td">Due Date</th>
                                                    <th class="background_color_td">Effective Date</th>
                                                    <th class="background_color_td">End Period Date</th>
                                                    <th class="background_color_td">Paid</th>
                                                    <th class="background_color_td">Due</th>
                                                    <th class="background_color_td">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($invoices) >0)
                                                    @foreach ($invoices as $invoice)
                                                        @php
                                                            $amount_paid = 0;
                                                            $due_amount = 0;
                                                            $status = '';

                                                            if($invoice->amount_paid == null && $invoice->due_amount == null){
                                                                $amount_paid = 0;
                                                                $due_amount = $invoice->grand_total;
                                                                $status = 'Unpaid Invoice';
                                                            }else if ($invoice->due_amount == 0) {
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }else{
                                                                $amount_paid = $invoice->amount_paid;
                                                                $due_amount = $invoice->due_amount;
                                                                $status = 'Close Invoice';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $invoice->invoice_number }}</td>
                                                            <td>{{ $invoice->reference }}</td>
                                                            <td>{{ $invoice->customer_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->effective_date))}}</td>
                                                            <td>{{ date('d-m-Y', strtotime($invoice->end_period_date))}}</td>
                                                            <td>{{ number_format($invoice->amount_paid,4,".",",") }}</td>
                                                            <td>{{ number_format($invoice->due_amount,4,".",",") }}</td>
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
                   </div>
                   {{-- =============== end tap write off invoice ========== --}}

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
        $("#example4").DataTable({
            "scrollX":true,
            "autoWidth": false,
            "scrollY": "400px",
            "scrollCollapse": false
        });
        $("#example5").DataTable({
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

    function ReportInvoice(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let billing_date_from = $('#billing_date_from').val();
        let billing_date_to = $('#billing_date_to').val();

        let due_date_from = $('#due_date_from').val();
        let due_date_to = $('#due_date_to').val();

        let effective_date_from = $('#effective_date_from').val();
        let effective_date_to = $('#effective_date_to').val();

        let end_period_date_from = $('#end_period_date_from').val();
        let end_period_date_to = $('#end_period_date_to').val();
        let payment_status = $('#payment_status').val();

        $.ajax({
            type:"POST",
            url:'/bsc_invoice_submit_report',
            data:{
                _token: CSRF_TOKEN,
                billing_date_from    : billing_date_from,
                billing_date_to      : billing_date_to,
                due_date_from        : due_date_from,
                due_date_to          : due_date_to,
                effective_date_from  : effective_date_from,
                effective_date_to    : effective_date_to,
                end_period_date_from : end_period_date_from,
                end_period_date_to   : end_period_date_to,
                payment_status       : payment_status
            },
            dataType:"JSON",
            success:function(data){
                $("#example1").DataTable().destroy();
                $("#example1 tbody").empty();
                let tr="";
                if(data.length >0){
                        $.each(data, function(i, value) {
                            let amount_paid = 0;
                            let due_amount = 0;
                            let status = '';
                            if(value.amount_paid == null && value.due_amount == null){
                                amount_paid = 0;
                                due_amount = value.grand_total;
                                status = 'Unpaid Invoice';
                            }else if(value.due_amount == 0){
                                amount_paid = value.amount_paid;
                                due_amount =  value.due_amount;
                                status = 'Close Invoice';
                            }else{
                                amount_paid = value.amount_paid;
                                due_amount =  value.due_amount;
                                status = 'Unpaid Invoice';
                            }
                            if(payment_status == '2'){
                                if(value.due_amount == null || value.due_amount != 0){

                                    tr+="<tr><td>"+value.invoice_number+"</td><td>"+value.reference+"</td><td>"+value.customer_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.effective_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.end_period_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                                }
                            }else if(payment_status == '3'){
                                if(value.due_amount == 0 && value.due_amount != null){

                                    tr+="<tr><td>"+value.invoice_number+"</td><td>"+value.reference+"</td><td>"+value.customer_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.effective_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.end_period_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                                }
                            }else{
                                tr+="<tr><td>"+value.invoice_number+"</td><td>"+value.reference+"</td><td>"+value.customer_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.effective_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.end_period_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                            }
                        });
                        $("#example1 tbody").html(tr);
                        $("#example1").DataTable({
                            // "responsive": true,
                            "autoWidth": false,
                        });
                    }
                }
        });
    }
</script>
