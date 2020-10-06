
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
                    <div class="card-header">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">Payment Date : </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">02-10-2020</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="">Reference : </label>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="">Touch Rith</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="">Customer : </label>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="">Ly Hong</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Customer Branch</th>
                                    <th>Invoice</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Total </th>
                                    <th>Payment Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Phnom Penh</td>
                                    <td>ISP</td>
                                    <td>02-10-2020</td>
                                    <td>02-10-2020</td>
                                    <td>200$</td>
                                    <td>180$</td>
                                </tr>
                            </tbody>
                        </table><br/>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-3">
                                    <label for="">Total : </label>180$
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
