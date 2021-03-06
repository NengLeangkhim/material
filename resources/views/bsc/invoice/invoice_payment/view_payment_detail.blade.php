
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4><i class="fas fa-eye"></i> View Payment​ Detail</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_invoice_view_payment')"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Back</a></li>
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Payment</li>
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
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="width: 100%; max-width: 1200px; table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Customer Branch</th>
                                    <th>Invoice Number</th>
                                    <th>Reference</th>
                                    <th>Payment Date</th>
                                    <th>Billing Date</th>
                                    <th>Due Date</th>
                                    <th>Total </th>
                                    <th>Payment Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($view_payment_details) >0)
                                    @foreach ($view_payment_details as $view_payment_detail)
                                        <tr>
                                            <td>{{ $view_payment_detail->customer_name }}</td>
                                            <td>{{ $view_payment_detail->customer_name }}</td>
                                            <td>{{ $view_payment_detail->invoice_number }}</td>
                                            <td>{{ $view_payment_detail->reference }}</td>
                                            <td>{{ date('d-m-Y', strtotime($view_payment_detail->create_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($view_payment_detail->billing_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($view_payment_detail->due_date)) }}</td>
                                            <td>{{ number_format($view_payment_detail->total_invoice,4,".",".")}}</td>
                                            <td>{{ number_format($view_payment_detail->amount_paid,4,".",",") }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
                                                if (count($view_payment_details) >0) {
                                                    foreach ($view_payment_details as $item) {
                                                        $amount += $item->amount_paid;
                                                    }
                                                }
                                                echo number_format($amount,4,'.',',');
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
</section><!-- end section Main content -->


<script type="text/javascript">

$(function () {
    $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    });
});
$('.lead').click(function(e)
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
