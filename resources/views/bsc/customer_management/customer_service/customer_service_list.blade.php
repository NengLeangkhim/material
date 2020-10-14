
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer Service</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Customer Service</li>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Customer Branch Name</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer_services as $customer_service)
                                    <tr>
                                        <td>{{ $customer_service->customer_name }}</td>
                                        <td>{{ $customer_service->customer_branch }}</td>
                                        <td>{{ $customer_service->service_name }}</td>
                                        <td>{{ $customer_service->service_status }}</td>
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
