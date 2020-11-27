
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer Sevice Detail</h1>
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
                    <div class="card-header">
                        <div class="col-12">
                            <div class="row">
                                <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                {!! $button_add !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Customer Branch</th>
                                    <th>Service</th>
                                    <th>Effectvice Date</th>
                                    <th>End Period Date</th>
                                    <th>Service Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($customer_service_details) >0)
                                    @foreach ($customer_service_details as $customer_service_detail)
                                        <tr>
                                            <td>{{ $customer_service_detail->customer_name }}</td>
                                            <td>{{ $customer_service_detail->customer_branch }}</td>
                                            <td>{{ $customer_service_detail->product_name }}</td>
                                            <td>{{ $customer_service_detail->effective_date }}</td>
                                            <td>{{ $customer_service_detail->end_period_date }}</td>
                                            <td>{{ $customer_service_detail->service_status }}</td>
                                            <td class="td_text_center">
                                                @if ($button_edit == '1')
                                                    <a title="Edit" href="javascript:void(0);"​ onclick="go_to('customer_service_detail_edit/{{ $customer_service_detail->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                @endif
                                                @if ($button_delete == '1')
                                                    <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$customer_service_detail->id}},'bsc_customer_service_detail_delete','bsc_customer_service_detail','Customer serivice detail Deleted Succseefully !','BSC_03020403')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                @endif
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
$('.service_detail').click(function(e)
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
