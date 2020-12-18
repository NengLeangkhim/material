
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer Connection Report</h1>
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
                    {{-- {!! $button_add !!}&nbsp; --}}
                </div><br/>
                <div class="card">
                    {{-- ======================= Start Tab menu =================== --}}
                    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist" style="font-size: 14px">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new_cus" role="tab" aria-controls="home" aria-selected="true">All Connection</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">New Connection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#suspend_cus" role="tab" aria-controls="profile" aria-selected="false">Connection Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Connection Closed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Connection Suspend</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Connection Locked</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Unpaid Connection</a>
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
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">ACCID</th>
                                                <th class="background_color_td">Customer(EN)</th>
                                                <th class="background_color_td">Customer(KH)</th>
                                                <th class="background_color_td">Village</th>
                                                <th class="background_color_td">Commune</th>
                                                <th class="background_color_td">District</th>
                                                <th class="background_color_td">City/Province</th>
                                                <th class="background_color_td">Phone Number</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finish Date</th>
                                                <th class="background_color_td">Billing Date</th>
                                                <th class="background_color_td">Next Billing Date</th>
                                                <th class="background_color_td">Product Type</th>
                                                <th class="background_color_td">Package</th>
                                                <th class="background_color_td">Customer Type</th>
                                                <th class="background_color_td">Business Sector</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Payment Term</th>
                                                <th class="background_color_td">Monthly Price</th>
                                                <th class="background_color_td">Discount Price</th>
                                                <th class="background_color_td">Total Price</th>
                                                <th class="background_color_td">Tax</th>
                                                <th class="background_color_td">Grand Total</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($customers) >0)
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
                                                    </tr>
                                                @endforeach
                                            @endif --}}
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
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">ACCID</th>
                                                <th class="background_color_td">Customer(EN)</th>
                                                <th class="background_color_td">Customer(KH)</th>
                                                <th class="background_color_td">Village</th>
                                                <th class="background_color_td">Commune</th>
                                                <th class="background_color_td">District</th>
                                                <th class="background_color_td">City/Province</th>
                                                <th class="background_color_td">Phone Number</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finish Date</th>
                                                <th class="background_color_td">Billing Date</th>
                                                <th class="background_color_td">Next Billing Date</th>
                                                <th class="background_color_td">Product Type</th>
                                                <th class="background_color_td">Package</th>
                                                <th class="background_color_td">Customer Type</th>
                                                <th class="background_color_td">Business Sector</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Payment Term</th>
                                                <th class="background_color_td">Monthly Price</th>
                                                <th class="background_color_td">Discount Price</th>
                                                <th class="background_color_td">Total Price</th>
                                                <th class="background_color_td">Tax</th>
                                                <th class="background_color_td">Grand Total</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($customers) >0)
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
                                                    </tr>
                                                @endforeach
                                            @endif --}}
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
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">ACCID</th>
                                                <th class="background_color_td">Customer(EN)</th>
                                                <th class="background_color_td">Customer(KH)</th>
                                                <th class="background_color_td">Village</th>
                                                <th class="background_color_td">Commune</th>
                                                <th class="background_color_td">District</th>
                                                <th class="background_color_td">City/Province</th>
                                                <th class="background_color_td">Phone Number</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finish Date</th>
                                                <th class="background_color_td">Billing Date</th>
                                                <th class="background_color_td">Next Billing Date</th>
                                                <th class="background_color_td">Product Type</th>
                                                <th class="background_color_td">Package</th>
                                                <th class="background_color_td">Customer Type</th>
                                                <th class="background_color_td">Business Sector</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Payment Term</th>
                                                <th class="background_color_td">Monthly Price</th>
                                                <th class="background_color_td">Discount Price</th>
                                                <th class="background_color_td">Total Price</th>
                                                <th class="background_color_td">Tax</th>
                                                <th class="background_color_td">Grand Total</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($customers) >0)
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
                                                    </tr>
                                                @endforeach
                                            @endif --}}
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
                                                <th class="background_color_td">No</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">ACCID</th>
                                                <th class="background_color_td">Customer(EN)</th>
                                                <th class="background_color_td">Customer(KH)</th>
                                                <th class="background_color_td">Village</th>
                                                <th class="background_color_td">Commune</th>
                                                <th class="background_color_td">District</th>
                                                <th class="background_color_td">City/Province</th>
                                                <th class="background_color_td">Phone Number</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finish Date</th>
                                                <th class="background_color_td">Billing Date</th>
                                                <th class="background_color_td">Next Billing Date</th>
                                                <th class="background_color_td">Product Type</th>
                                                <th class="background_color_td">Package</th>
                                                <th class="background_color_td">Customer Type</th>
                                                <th class="background_color_td">Business Sector</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Payment Term</th>
                                                <th class="background_color_td">Monthly Price</th>
                                                <th class="background_color_td">Discount Price</th>
                                                <th class="background_color_td">Total Price</th>
                                                <th class="background_color_td">Tax</th>
                                                <th class="background_color_td">Grand Total</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($customers) >0)
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
                                                    </tr>
                                                @endforeach
                                            @endif --}}
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
