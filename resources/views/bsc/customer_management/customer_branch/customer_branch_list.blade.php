
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-university"></i> Customer Branch</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Customer Branch</li>
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
                <div class="row​ margin_left">
                    {!! $button_add !!}
                </div><br/>
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="background_color_tr">
                                    <th class="background_color_td">Customer Name</th>
                                    <th class="background_color_td">Branch Name</th>
                                    <th class="background_color_td">Branch Address</th>
                                    <th class="background_color_td">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($customer_branchs) >0)
                                    @foreach ($customer_branchs as $item)
                                        <tr>
                                            <td>{{ $item->customer_name }}</td>
                                            <td>{{ $item->branch }}</td>
                                            <td>{{ $item->lead_address }}</td>
                                            <td style="text-align-last: center">
                                                {{-- <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_customer_branch_edit/{{ $item->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp; --}}
                                                <a title="View Detail" id="icon_margin_auto" href="#" class="detail" onclick="go_to('customer_branch_detail/{{ $item->id }}')"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                                {{-- <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$item->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_0303')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp; --}}
                                                {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
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
$('.customer_branch').click(function(e)
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
