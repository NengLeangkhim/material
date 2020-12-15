
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
                    {!! $button_add !!}&nbsp;
                </div><br/>
                <div class="card">
                    {{-- ======================= Start Tab menu =================== --}}
                    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new_cus" role="tab" aria-controls="home" aria-selected="true">New Customer</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">Closed Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#suspend_cus" role="tab" aria-controls="profile" aria-selected="false">Suspend Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Locked Customer</a>
                        </li>
                    </ul><br/>
                    {{-- ======================= End Tab menu =================== --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- ================ start tap new customer ============ --}}
                        <div class="tab-pane fade show active" id="new_cus" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Lead Number</th>
                                                <th class="background_color_td">Name</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Deposit</th>
                                                <th class="background_color_td">Balance</th>
                                                <th class="background_color_td">Invoice Balance</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
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
                        {{-- ================ end tap new customer ============ --}}

                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="closed_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="table-responsive" style="padding-left: 20px;padding-top: 20px">
                                    <table id="example2" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Lead Number</th>
                                                <th class="background_color_td">Name</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Deposit</th>
                                                <th class="background_color_td">Balance</th>
                                                <th class="background_color_td">Invoice Balance</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
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
                        {{-- ================ end tap closed customer ========= --}}
                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="suspend_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="table-responsive" style="padding-left: 20px;padding-top: 20px">
                                    <table id="example3" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Lead Number</th>
                                                <th class="background_color_td">Name</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Deposit</th>
                                                <th class="background_color_td">Balance</th>
                                                <th class="background_color_td">Invoice Balance</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
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
                        {{-- ================ end tap closed customer ========= --}}
                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="locked_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="table-responsive" style="padding-left: 20px;padding-top: 20px">
                                    <table id="example4" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Lead Number</th>
                                                <th class="background_color_td">Name</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Deposit</th>
                                                <th class="background_color_td">Balance</th>
                                                <th class="background_color_td">Invoice Balance</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
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
                        {{-- ================ end tap closed customer ========= --}}
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
    $("#example2").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $("#example3").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $("#example4").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $('#example').DataTable({
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
