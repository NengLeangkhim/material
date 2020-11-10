<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-eye"></i> View Purchase Payment</strong></h1>
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
                                                    <tr>
                                                        <td>{{$purchase->supplier_name}}</td>
                                                        <td>{{$purchase->invoice_number}}</td>
                                                        <td>{{$purchase->billing_date}}</td>
                                                        <td>{{$purchase->due_date}}</td>
                                                        <td>{{$purchase->create_date}}</td>
                                                        <td>{{$purchase->reference}}</td>
                                                        <td>{{$purchase->grand_total}}</td>
                                                        <td>{{$purchase->amount_paid}}</td>
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
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2">
                                            <label for="">Total Paid : 
                                                @php
                                                    $amount = 0;
                                                    foreach ($purchases as $item) {
                                                        $amount += $item->amount_paid;
                                                    }
                                                    echo $amount;
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