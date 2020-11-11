
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> View Payment</h1>
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
                        <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Reference</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->invoice_number }}</td>
                                            <td>{{ $invoice->reference }}</td>
                                            <td>{{ $invoice->customer_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($invoice->billing_date))}}</td>
                                            <td>{{ date('d-m-Y', strtotime($invoice->due_date))}}</td>
                                            <td>{{ $invoice->amount_paid }}</td>
                                            <td>{{ $invoice->due_amount }}</td>
                                            <td style="text-align-last: center">
                                                <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_invoice_view_detail/{{ $invoice->id }}')"><i class="far fa-eye"></i></a>
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
