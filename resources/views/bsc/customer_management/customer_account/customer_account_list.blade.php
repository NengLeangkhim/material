
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
                    {{-- {!! $button_add !!}&nbsp; --}}
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
                                <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                                    <thead>
                                        <tr class="background_color_tr">
                                            <th class="background_color_td">Detail</th>
                                            <th class="background_color_td">CIF</th>
                                            <th class="background_color_td">CID</th>
                                            <th class="background_color_td">Customer</th>
                                            <th class="background_color_td">Customer KH</th>
                                            <th class="background_color_td">Account Name</th>
                                            <th class="background_color_td">Create Date</th>
                                            <th class="background_color_td">Finishdate</th>
                                            <th class="background_color_td">Bill Date</th>
                                            <th class="background_color_td">VAT Type</th>
                                            <th class="background_color_td">VAT Number</th>
                                            <th class="background_color_td">Branch</th>
                                            <th class="background_color_td">Mobile Phone</th>
                                            <th class="background_color_td">Email</th>
                                            <th class="background_color_td">Startbilling Date</th>
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
                                            <td style="text-align-last: center">
                                                <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_customer_connection_view')"><i class="far fa-eye"></i></a>
                                            </td>
                                            <td>TT-001</td>
                                            <td>TT-001</td>
                                            <td>Touch Rith</td>
                                            <td>ទូច រិទ្ធ</td>
                                            <td>Touch Rith</td>
                                            <td>21-12-2020</td>
                                            <td>21-12-2020</td>
                                            <td>21-12-2020</td>
                                            <td>Include</td>
                                            <td>TT-NIV-0020002</td>
                                            <td>Phnom Penh</td>
                                            <td>0968990987</td>
                                            <td>touchrith@gmail.com</td>
                                            <td>21-12-2020</td>
                                            <td>Internet</td>
                                            <td>$100</td>
                                            <td>$100</td>
                                            <td>10</td>
                                            <td>10</td>
                                            <td>VAT</td>
                                            <td>12GB</td>
                                            <td>Touch Rith</td>
                                            <td>New</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- ================ end tap new customer ============ --}}

                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="closed_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Customer KH</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finishdate</th>
                                                <th class="background_color_td">Bill Date</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Startbilling Date</th>
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
                                                <td style="text-align-last: center">
                                                    <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_customer_connection_view')"><i class="far fa-eye"></i></a>
                                                </td>
                                                <td>TT-001</td>
                                                <td>TT-001</td>
                                                <td>Touch Rith</td>
                                                <td>ទូច រិទ្ធ</td>
                                                <td>Touch Rith</td>
                                                <td>21-12-2020</td>
                                                <td>21-12-2020</td>
                                                <td>21-12-2020</td>
                                                <td>Include</td>
                                                <td>TT-NIV-0020002</td>
                                                <td>Phnom Penh</td>
                                                <td>0968990987</td>
                                                <td>touchrith@gmail.com</td>
                                                <td>21-12-2020</td>
                                                <td>Internet</td>
                                                <td>$100</td>
                                                <td>$100</td>
                                                <td>10</td>
                                                <td>10</td>
                                                <td>VAT</td>
                                                <td>12GB</td>
                                                <td>Touch Rith</td>
                                                <td>New</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap closed customer ========= --}}
                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="suspend_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <table id="example3" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Customer KH</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finishdate</th>
                                                <th class="background_color_td">Bill Date</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Startbilling Date</th>
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
                                            <tr>
                                                <td style="text-align-last: center">
                                                    <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_customer_connection_view')"><i class="far fa-eye"></i></a>
                                                </td>
                                                <td>TT-001</td>
                                                <td>TT-001</td>
                                                <td>Touch Rith</td>
                                                <td>ទូច រិទ្ធ</td>
                                                <td>Touch Rith</td>
                                                <td>21-12-2020</td>
                                                <td>21-12-2020</td>
                                                <td>21-12-2020</td>
                                                <td>Include</td>
                                                <td>TT-NIV-0020002</td>
                                                <td>Phnom Penh</td>
                                                <td>0968990987</td>
                                                <td>touchrith@gmail.com</td>
                                                <td>21-12-2020</td>
                                                <td>Internet</td>
                                                <td>$100</td>
                                                <td>$100</td>
                                                <td>10</td>
                                                <td>10</td>
                                                <td>VAT</td>
                                                <td>12GB</td>
                                                <td>Touch Rith</td>
                                                <td>New</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap closed customer ========= --}}
                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="locked_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <table id="example4" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">Detail</th>
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Customer KH</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finishdate</th>
                                                <th class="background_color_td">Bill Date</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Startbilling Date</th>
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
                                                <td style="text-align-last: center">
                                                    <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_customer_connection_view')"><i class="far fa-eye"></i></a>
                                                </td>
                                                <td>TT-001</td>
                                                <td>TT-001</td>
                                                <td>Touch Rith</td>
                                                <td>ទូច រិទ្ធ</td>
                                                <td>Touch Rith</td>
                                                <td>21-12-2020</td>
                                                <td>21-12-2020</td>
                                                <td>21-12-2020</td>
                                                <td>Include</td>
                                                <td>TT-NIV-0020002</td>
                                                <td>Phnom Penh</td>
                                                <td>0968990987</td>
                                                <td>touchrith@gmail.com</td>
                                                <td>21-12-2020</td>
                                                <td>Internet</td>
                                                <td>$100</td>
                                                <td>$100</td>
                                                <td>10</td>
                                                <td>10</td>
                                                <td>VAT</td>
                                                <td>12GB</td>
                                                <td>Touch Rith</td>
                                                <td>New</td>
                                            </tr>
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
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false
    });
    $("#example2").DataTable({
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false
    });
    $("#example3").DataTable({
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false
    });
    $("#example4").DataTable({
        "scrollX":true,
        "autoWidth": false,
        "scrollY": "400px",
        "scrollCollapse": false
    });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
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
