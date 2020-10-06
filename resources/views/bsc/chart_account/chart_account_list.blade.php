 <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Chart Account</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Chart Account</li>
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
                            <div class="row">
                                <a  href="#" class="btn btn-success btn-sm chart_account" ​value="bsc_chart_account_form" id="chart_account"><i class="fas fa-plus"></i> Add Account</a>&nbsp;
                                <a  href="#" class="btn btn-success btn-sm chart_account" ​value="bsc_chart_account_form" id="chart_account"><i class="far fa-file-excel"></i> Import</a>&nbsp;
                                <a  href="#" class="btn btn-success btn-sm chart_account" ​value="bsc_chart_account_form" id="chart_account"><i class="far fa-file-excel"></i> Export</a>
                            </div><br/>
                            {{-- ======================= Start Tab menu =================== --}}
                            <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#account" role="tab" aria-controls="home" aria-selected="true">All Account</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#asset" role="tab" aria-controls="profile" aria-selected="false">Asset</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#liabilities" role="tab" aria-controls="profile" aria-selected="false">Liabilities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#equity" role="tab" aria-controls="profile" aria-selected="false">Equity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="profile" aria-selected="false">Expense</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#revenue" role="tab" aria-controls="profile" aria-selected="false">Revenue</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#archive" role="tab" aria-controls="profile" aria-selected="false">Archive</a>
                                </li>
                            </ul><br/>
                            {{-- ======================= End Tab menu =================== --}}
                                <div class="tab-content" id="myTabContent">
                                    {{-- ============================ Start Tab account ======================= --}}
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>TT-001</td>
                                                        <td>Touch Rith</td>
                                                        <td>Call</td>
                                                        <td style="text-align-last: center">
                                                            <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                            <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                            <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tab account ======================= --}}

                                    {{-- ============================ Start Tabl asset ======================= --}}
                                    <div class="tab-pane fade" id="asset" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example2" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Type</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td class="td_text_center">
                                                                        <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl asset ======================= --}}

                                    {{-- ============================ Start Tabl liabilities ======================= --}}
                                    <div class="tab-pane fade" id="liabilities" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example3" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Type</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td class="td_text_center">
                                                                        <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl liabilities ======================= --}}

                                    {{-- ============================ Start Tabl equity ======================= --}}
                                    <div class="tab-pane fade" id="equity" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example4" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Type</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td class="td_text_center">
                                                                        <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl equity ======================= --}}

                                    {{-- ============================ Start Tabl expense ======================= --}}
                                    <div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example5" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Type</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td class="td_text_center">
                                                                        <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl expense ======================= --}}

                                    {{-- ============================ Start Tabl revenue ======================= --}}
                                    <div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example6" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Type</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td class="td_text_center">
                                                                        <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl revenue ======================= --}}

                                    {{-- ============================ Start Tabl archive ======================= --}}
                                    <div class="tab-pane fade" id="archive" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example7" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Type</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td class="td_text_center">
                                                                        <a title="Edit" href="javascript:;"​ onclick="go_to('bsc_chart_account_list_edit')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Delete" href="javascript:;"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ============================ End Tabl archive ======================= --}}
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
        $("#example4").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $("#example5").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $("#example6").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $("#example7").DataTable({
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
    $('.chart_account').click(function(e)
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

