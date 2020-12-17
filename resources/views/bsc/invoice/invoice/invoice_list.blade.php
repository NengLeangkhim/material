 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-file"></i> Invoices</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Invoices</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12">
                            <div class="row margin_left">
                                <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                {!! $button_add !!}&nbsp;
                            </div><br/>
                            {{-- ======================= Start Tab menu =================== --}}
                            <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Unpaid_invoice" role="tab" aria-controls="profile" aria-selected="false">Unpaid Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#close_invoice" role="tab" aria-controls="profile" aria-selected="false">Close Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#void_invoice" role="tab" aria-controls="profile" aria-selected="false">Void Invoice</a>
                                </li>

                            </ul><br/>
                            {{-- ======================= End Tab menu =================== --}}
                                <div class="tab-content" id="myTabContent">
                                    {{-- ============================ Start Tab all ======================= --}}
                                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                                                    <thead>
                                                        <tr class="background_color_tr">
                                                            <th class="background_color_td">Invoice Number</th>
                                                            <th class="background_color_td">Reference</th>
                                                            <th class="background_color_td">Customer</th>
                                                            <th class="background_color_td">Date</th>
                                                            <th class="background_color_td">Due Date</th>
                                                            <th class="background_color_td">Paid</th>
                                                            <th class="background_color_td">Due</th>
                                                            <th class="background_color_td">Status</th>
                                                            <th class="background_color_td">Action</th>
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
                                                                            $status = 'Unpaid Invoice';
                                                                        }
                                                                    @endphp
                                                                <tr>
                                                                    <td>{{ $invoice->invoice_number }}</td>
                                                                    <td>{{ $invoice->reference }}</td>
                                                                    <td>{{ $invoice->customer_name }}</td>
                                                                    <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                                    <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                                    <td>{{ number_format($amount_paid,4,".",",") }}</td>
                                                                    <td>{{ number_format($due_amount,4,".",",") }}</td>
                                                                    <td>{{ $status }}</td>
                                                                    <td style="text-align-last: center">
                                                                        <a title="View" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_view/{{ $invoice->id }}')"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_edit/{{ $invoice->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Preview" target="_blank" href="bsc_preview_invoioce/{{ $invoice->id }}"   value="" id=""><i class="fa fa-file"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tab all ======================= --}}

                                    {{-- ============================ Start Tabl Unpaid_invoice ======================= --}}
                                    <div class="tab-pane fade" id="Unpaid_invoice" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example2" class="table table-bordered table-striped" style="white-space: nowrap">
                                                                <thead>
                                                                    <tr class="background_color_tr">
                                                                        <th class="background_color_td">Invoice Number</th>
                                                                        <th class="background_color_td">Reference</th>
                                                                        <th class="background_color_td">Customer</th>
                                                                        <th class="background_color_td">Date</th>
                                                                        <th class="background_color_td">Due Date</th>
                                                                        <th class="background_color_td">Paid</th>
                                                                        <th class="background_color_td">Due</th>
                                                                        <th class="background_color_td">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (count($invoices) >0)
                                                                        @foreach ($invoices as $invoice)
                                                                            @if($invoice->due_amount == null || $invoice->due_amount != 0)
                                                                                @php
                                                                                        $amount_paid = 0;
                                                                                        $due_amount = 0;

                                                                                        if($invoice->due_amount == null){
                                                                                            $amount_paid = 0;
                                                                                            $due_amount = $invoice->grand_total;
                                                                                        }else{
                                                                                            $amount_paid = $invoice->amount_paid;
                                                                                            $due_amount = $invoice->due_amount;
                                                                                        }
                                                                                    @endphp
                                                                                    <tr>
                                                                                        <td>{{ $invoice->invoice_number }}</td>
                                                                                        <td>{{ $invoice->reference }}</td>
                                                                                        <td>{{ $invoice->customer_name }}</td>
                                                                                        <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                                                        <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                                                        <td>{{ number_format($amount_paid,4,".",",") }}</td>
                                                                                        <td>{{ number_format($due_amount,4,".",",") }}</td>
                                                                                        <td style="text-align-last: center">
                                                                                            <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_view/{{ $invoice->id }}')"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                            <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_edit/{{ $invoice->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                            <a title="Preview" target="_blank" href="bsc_preview_invoioce/{{ $invoice->id }}"   value="" id=""><i class="fa fa-file"></i></a>
                                                                                        </td>
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
                                    </div>
                                    {{-- ============================ End Tabl Unpaid Invoice ======================= --}}

                                    {{-- ============================ Start Tabl Close ======================= --}}
                                    <div class="tab-pane fade" id="close_invoice" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example3" class="table table-bordered table-striped" style="white-space: nowrap">
                                                                <thead>
                                                                    <tr class="background_color_tr">
                                                                        <th class="background_color_td">Invoice Number</th>
                                                                        <th class="background_color_td">Reference</th>
                                                                        <th class="background_color_td">Customer</th>
                                                                        <th class="background_color_td">Date</th>
                                                                        <th class="background_color_td">Due Date</th>
                                                                        <th class="background_color_td">Paid</th>
                                                                        <th class="background_color_td">Due</th>
                                                                        <th class="background_color_td">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (count($invoices) >0)
                                                                        @foreach ($invoices as $invoice)
                                                                            @if($invoice->due_amount == 0 && $invoice->due_amount != null)
                                                                            @php
                                                                                $paid = $invoice->amount_paid;
                                                                                $amount_paid = number_format($paid, 4, '.', '');

                                                                                $due = $invoice->due_amount;
                                                                                $due_amount = number_format($due, 4, '.', '');
                                                                            @endphp
                                                                                <tr>
                                                                                    <td>{{ $invoice->invoice_number }}</td>
                                                                                    <td>{{ $invoice->reference }}</td>
                                                                                    <td>{{ $invoice->customer_name }}</td>
                                                                                    <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                                                    <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                                                    <td>{{ number_format($amount_paid,4,".",",") }}</td>
                                                                                    <td>{{ number_format($due_amount,4,".",",") }}</td>
                                                                                    <td style="text-align-last: center">
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_view/{{ $invoice->id }}')"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_edit/{{ $invoice->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    </td>
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
                                    </div>
                                    {{-- ============================ End Tabl Close Invoice ======================= --}}

                                    {{-- ============================ Start Tabl Void Invoice ======================= --}}
                                    <div class="tab-pane fade" id="void_invoice" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example3" class="table table-bordered table-striped" style="white-space: nowrap">
                                                                <thead>
                                                                    <tr class="background_color_tr">
                                                                        <th class="background_color_td">Invoice Number</th>
                                                                        <th class="background_color_td">Reference</th>
                                                                        <th class="background_color_td">Customer</th>
                                                                        <th class="background_color_td">Date</th>
                                                                        <th class="background_color_td">Due Date</th>
                                                                        <th class="background_color_td">Paid</th>
                                                                        <th class="background_color_td">Due</th>
                                                                        <th class="background_color_td">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (count($invoices) >0)
                                                                        @foreach ($invoices as $invoice)
                                                                            @if($invoice->due_amount == 0 && $invoice->due_amount != null)
                                                                            @php
                                                                                $paid = $invoice->amount_paid;
                                                                                $amount_paid = number_format($paid, 4, '.', '');

                                                                                $due = $invoice->due_amount;
                                                                                $due_amount = number_format($due, 4, '.', '');
                                                                            @endphp
                                                                                <tr>
                                                                                    <td>{{ $invoice->invoice_number }}</td>
                                                                                    <td>{{ $invoice->reference }}</td>
                                                                                    <td>{{ $invoice->customer_name }}</td>
                                                                                    <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                                                                    <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                                                                    <td>{{ number_format($amount_paid,4,".",",") }}</td>
                                                                                    <td>{{ number_format($due_amount,4,".",",") }}</td>
                                                                                    <td style="text-align-last: center">
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_view/{{ $invoice->id }}')"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_edit/{{ $invoice->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    </td>
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
                                    </div>
                                    {{-- ============================ End Tabl Void Invoice ======================= --}}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->

<script type="text/javascript">

    $(function () {
        $("#example1").DataTable({
        // "responsive": true,
        "autoWidth": false,
        });
        $("#example2").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $("#example3").DataTable({
        "responsive": true,
        "autoWidth": false,
        });

        // $('#example2').DataTable({
        // "paging": true,
        // "lengthChange": false,
        // "searching": false,
        // "ordering": true,
        // "info": true,
        // "autoWidth": false,
        // "responsive": true,
        // });

    });
    $('.invoice_form').click(function(e)
    {
        var ld = $(this).attr("​value");
        go_to(ld);
    })
    $('.edit').click(function(e)
    {
        var id = $(this).attr("​value");
        go_to(id);
    });
    $('.detail').click(function(e)
    {
        var id = $(this).attr("​value");
        go_to(id);
    });
    </script>

