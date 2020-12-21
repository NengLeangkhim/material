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
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">Purchase#</th>
                                                    <th class="background_color_td">Supplier</th>
                                                    <th class="background_color_td">Date</th>
                                                    <th class="background_color_td">Due Date</th>
                                                    <th class="background_color_td">Paid</th>
                                                    <th class="background_color_td">Due</th>
                                                    <th class="background_color_td">Status</th>
                                                    <th class="background_color_td">Detail</th>
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
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $purchase->invoice_number }}</td>
                                                            <td>{{ $purchase->supplier_name }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                            <td>{{ $paid }}</td>
                                                            <td>{{ $due }}</td>
                                                            <td>{{ $status }}</td>
                                                            <td style="text-align: center;">
                                                                <a href="javascript:;" onclick="go_to('bsc_purchase_payment_view/{{ $purchase->id}}')"><i class="far fa-eye"></i></a>
                                                            </td>
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
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->

<script type="text/javascript">

    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });


</script>
