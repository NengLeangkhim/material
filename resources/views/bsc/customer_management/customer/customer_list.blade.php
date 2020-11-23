
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Customers</li>
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
                    <a  href="#" class="btn btn-success btn-sm customer" ​value="bsc_customer_form" id="customer"><i class="fas fa-plus"></i> Add Customer</a>&nbsp;
                </div><br/>
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                            <thead>
                                <tr>
                                    <th>Lead Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Deposit</th>
                                    <th>Balance</th>
                                    <th>Invoice Balance</th>
                                    <th>VAT Type</th>
                                    <th>VAT Number</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($customers) >0)
                                    @foreach ($customers as $item)
                                        <tr>
                                            <td>{{ $item->lead_number }}</td>
                                            <td>{{ $item->customer_name }}</td>
                                            <td>{{ $item->lead_email }}</td>
                                            <td>{{ $item->deposit }}</td>
                                            <td>{{ $item->balance }}</td>
                                            <td>{{ $item->invoice_balance }}</td>
                                            <td>{{ $item->vat_type }}</td>
                                            <td>{{ $item->vat_number }}</td>
                                            {{-- <td style="text-align-last: center">
                                                <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $item->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$item->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_0303')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                            </td> --}}
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
$('.customer').click(function(e)
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
