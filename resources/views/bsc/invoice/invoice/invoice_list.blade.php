 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Invoices</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Invoices</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12">
                            <div class="row" style="padding-left: 30px">
                                <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                <a  href="#" class="btn btn-success invoice_form" ​value="bsc_invoice_invoice_form" id="invoice_form"><i class="fas fa-plus"></i> Add New</a>&nbsp;
                            </div><br/>
                            {{-- ======================= Start Tab menu =================== --}}
                            <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#awaiting" role="tab" aria-controls="profile" aria-selected="false">Awaiting Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="profile" aria-selected="false">Paid</a>
                                </li>

                            </ul><br/>
                            {{-- ======================= End Tab menu =================== --}}
                                <div class="tab-content" id="myTabContent">
                                    {{-- ============================ Start Tab all ======================= --}}
                                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Reference</th>
                                                        <th>Customer</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Paid</th>
                                                        <th>Due</th>
                                                        <th>Status</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>TT-001</td>
                                                        <td>Touch Rith</td>
                                                        <td>Keo Raksmey</td>
                                                        <td>2020-10-01</td>
                                                        <td>2020-10-01</td>
                                                        <td>200$</td>
                                                        <td>2020-10-01</td>
                                                        <td>Aprove</td>
                                                        <td>
                                                            <a href="#" onclick="go_to('bsc_invoice_invoice_view')" class="btn btn-block btn-info btn-sm detail" ​value="detaillead" ><i class="fas fa-info-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tab all ======================= --}}

                                    {{-- ============================ Start Tabl awaiting ======================= --}}
                                    <div class="tab-pane fade" id="awaiting" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example2" class="table table-bordered table-striped">
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
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Keo Raksmey</td>
                                                                    <td>2020-10-01</td>
                                                                    <td>2020-10-01</td>
                                                                    <td>200$</td>
                                                                    <td>2020-10-01</td>
                                                                    <td>
                                                                        <a href="#" onclick="go_to('bsc_invoice_invoice_view')" class="btn btn-block btn-info btn-sm detail" ​value="detaillead" ><i class="fas fa-info-circle"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl awaiting ======================= --}}

                                    {{-- ============================ Start Tabl paid ======================= --}}
                                    <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example3" class="table table-bordered table-striped">
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
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Keo Raksmey</td>
                                                                    <td>2020-10-01</td>
                                                                    <td>2020-10-01</td>
                                                                    <td>200$</td>
                                                                    <td>2020-10-01</td>
                                                                    <td>
                                                                        <a href="#" onclick="go_to('bsc_invoice_invoice_view')" class="btn btn-block btn-info btn-sm detail" ​value="detaillead" ><i class="fas fa-info-circle"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl paid ======================= --}}
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
        $("#example2").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $("#example3").DataTable({
        "responsive": true,
        "autoWidth": false,
        });

        // $('#example2').DataTable({
        // "paging": true,
        // "lengthChange": false,
        // "searching": false,
        // "ordering": true,
        // "info": true,
        // "autoWidth": false,
        // "responsive": true,
        // });

    });
    $('.invoice_form').click(function(e)
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

