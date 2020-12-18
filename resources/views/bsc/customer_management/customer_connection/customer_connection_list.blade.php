
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer Connection</h1>
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
                    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new_cus" role="tab" aria-controls="home" aria-selected="true">All Conncetion</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">New Conncetion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#suspend_cus" role="tab" aria-controls="profile" aria-selected="false">Closed Conncetion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Suspend Conncetion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ass" role="tab" aria-controls="profile" aria-selected="false">Locked Conncetion</a>
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
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Configure Date</th>
                                                <th class="background_color_td">Finish</th>
                                                <th class="background_color_td">VAT</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Address</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="javascript:;" onclick="go_to('bsc_customer_connection_view')"><i class="far fa-eye"></i></a>
                                                </td>
                                                <td>CIF-001</td>
                                                <td>001</td>
                                                <td>Sok Seng</td>
                                                <td>17/12/2020</td>
                                                <td>1/1/2020</td>
                                                <td>007</td>
                                                <td>SS-007</td>
                                                <td>Sok_Seng</td>
                                                <td>Seng-007</td>
                                                <td>Sok Seng</td>
                                                <td>17/12/2020</td>
                                                <td>sokseng@gmail.com</td>
                                                <td>Pp</td>
                                                <td>Home Package</td>
                                                <td>100$</td>
                                                <td>Router</td>
                                                <td>150$</td>
                                                <td>10%</td>
                                                <td>Home</td>
                                                <td>1200Mbp</td>
                                                <td>Bopha</td>
                                                <td>Active</td>
                                            </tr>
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
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Configure Date</th>
                                                <th class="background_color_td">Finish</th>
                                                <th class="background_color_td">VAT</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Address</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
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
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Configure Date</th>
                                                <th class="background_color_td">Finish</th>
                                                <th class="background_color_td">VAT</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Address</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                        </thead>
                                        <tbody>
                                            
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
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Configure Date</th>
                                                <th class="background_color_td">Finish</th>
                                                <th class="background_color_td">VAT</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Address</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap closed customer ========= --}}
                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="ass" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="table-responsive" style="padding-left: 20px;padding-top: 20px">
                                    <table id="example5" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Configure Date</th>
                                                <th class="background_color_td">Finish</th>
                                                <th class="background_color_td">VAT</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Address</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
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
    $("#example5").DataTable({
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
