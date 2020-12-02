<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-eye"></i> View Purchase Payment</strong></h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_purchase_view_purchase_payment')"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Back</a></li>
                    <li class="breadcrumb-item"><a href="" class="lead" value="lead">Home</a></li>
                    <li class="breadcrumb-item active" onclick="go_to('bsc_purchase_view_purchase_payment')">View Puechase Payment</li>
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
                        <div class="card-body">
                        </div>
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Supplier</th>
                                                    <th>Purchase#</th>
                                                    <th>Date</th>
                                                    <th>Due Date</th>
                                                    <th>Payment Date</th>
                                                    <th>Reference</th>
                                                    <th>Total</th>
                                                    <th>Payment Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($purchases as $purchase)
                                                    @php
                                                        $payment_amount = $purchase->amount_paid;
                                                        $payment = number_format($payment_amount, 4, '.', '');

                                                        $grand_total = $purchase->grand_total;
                                                        $total = number_format($grand_total, 4, '.', '');
                                                    @endphp
                                                    <tr>
                                                        <td>{{$purchase->supplier_name}}</td>
                                                        <td>{{$purchase->invoice_number}}</td>
                                                        <td>{{ date('d-m-y', strtotime($purchase->billing_date)) }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($purchase->create_date)) }}</td>
                                                        <td>{{$purchase->reference}}</td>
                                                        <td>{{$total}}</td>
                                                        <td>{{$payment}}</td>
                                                    </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <label for="">Total Paid : 
                                                @php
                                                    $amount = 0;
                                                    foreach ($purchases as $item) {
                                                        $amount += $item->amount_paid;
                                                    }
                                                    echo number_format($amount, 4, '.', '');
                                                @endphp
                                            </label>
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
</section><!-- end section Main content -->

<script type="text/javascript">


    
</script>