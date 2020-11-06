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
                                                <tr>
                                                    <th>Purchase#</th>
                                                    <th>Supplier</th>
                                                    <th>Date</th>
                                                    <th>Due Date</th>
                                                    <th>Paid</th>
                                                    <th>Due</th>
                                                    <th>Status</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($purchases as $purchase)
                                                    @php 
                                                        $amount_paid = 0;
                                                        $due_amount = 0;
                                                        $status = '';
                                                
                                                        if($purchase->amount_paid == null && $purchase->due_amount == null){
                                                            $amount_paid = 0;
                                                            $due_amount = $purchase->grand_total;
                                                            $status = 'Waiting Payment';
                                                        }else{
                                                            $amount_paid = $purchase->amount_paid;
                                                            $due_amount = $purchase->due_amount;
                                                            $status = 'Paid'; 
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $purchase->invoice_number }}</td>
                                                        <td>{{ $purchase->supplier_name }}</td>
                                                        <td>{{ $purchase->billing_date }}</td>
                                                        <td>{{ $purchase->due_date }}</td>
                                                        <td>{{ $amount_paid }}</td>
                                                        <td>{{ $due_amount }}</td>
                                                        <td>{{ $status }}</td>
                                                        <td style="text-align: center;">
                                                            <a href="javascript:;" onclick="go_to('bsc_purchase_payment_view/{{ $purchase->id}}')"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
