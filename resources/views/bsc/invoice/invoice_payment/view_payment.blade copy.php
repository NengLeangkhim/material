
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-eye"></i> View Payment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
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
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                                <thead>
                                    <tr class="background_color_tr">
                                        <th class="background_color_td">Number</th>
                                        <th class="background_color_td">Reference</th>
                                        <th class="background_color_td">Customer</th>
                                        <th class="background_color_td">Date</th>
                                        <th class="background_color_td">Due Date</th>
                                        <th class="background_color_td">Paid</th>
                                        <th class="background_color_td">Due</th>
                                        <th class="background_color_td">Status</th>
                                        <th class="background_color_td">Detail</th>
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
                                                    <td>{{ number_format($invoice->amount_paid,4,".",",") }}</td>
                                                    <td>{{ number_format($invoice->due_amount,4,".",",") }}</td>
                                                    <td>{{ $status }}</td>
                                                    <td style="text-align-last: center">
                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_view_detail/{{ $invoice->id }}')"><i class="far fa-eye"></i></a>
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
</section><!-- end section Main content -->


<script type="text/javascript">

$(function () {
    $("#example1").DataTable({
    // "responsive": true,
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
