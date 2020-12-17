 <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user-circle"></i> Chart Account</h1>
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
                            <div class="row​ margin_left">
                                {!! $button_add !!}
                                {!! $button_import !!}
                                {!! $button_export !!}
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
                            </ul><br/>
                            {{-- ======================= End Tab menu =================== --}}
                                <div class="tab-content" id="myTabContent">
                                    {{-- ============================ Start Tab account ======================= --}}
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr class="background_color_tr">
                                                        <th class="background_color_td">Code</th>
                                                        <th class="background_color_td">Name</th>
                                                        <th class="background_color_td">Type</th>
                                                        <th class="background_color_td">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($ch_accounts) >0)
                                                        @foreach ($ch_accounts as $item)
                                                            <tr>
                                                                <td>{{ $item->code }}</td>
                                                                <td>{{ $item->name_en }}</td>
                                                                <td>{{ $item->account_type_name }}</td>
                                                                <td style="text-align-last: center">
                                                                    @if ($button_edit == '1')
                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $item->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                    @endif
                                                                    @if ($button_delete == '1')
                                                                        <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$item->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                    @endif
                                                                    {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
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
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Code</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($ch_accounts) >0)
                                                                    @foreach ($ch_accounts as $asset)
                                                                        @if ($asset->bsc_account_id == 1)
                                                                            <tr>
                                                                                <td>{{ $asset->code }}</td>
                                                                                <td>{{ $asset->name_en }}</td>
                                                                                <td>{{ $asset->account_type_name }}</td>
                                                                                <td style="text-align-last: center">
                                                                                    @if ($button_edit == '1')
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $asset->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    @if ($button_delete == '1')
                                                                                        <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$asset->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
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
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Code</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($ch_accounts) >0)
                                                                    @foreach ($ch_accounts as $acc_liability)
                                                                        @if ($acc_liability->bsc_account_id == 2)
                                                                            <tr>
                                                                                <td>{{ $acc_liability->code }}</td>
                                                                                <td>{{ $acc_liability->name_en }}</td>
                                                                                <td>{{ $acc_liability->account_type_name }}</td>
                                                                                <td style="text-align-last: center">
                                                                                    @if ($button_edit == '1')
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $acc_liability->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    @if ($button_delete == '1')
                                                                                        <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$acc_liability->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
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
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Code</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($ch_accounts) >0)
                                                                    @foreach ($ch_accounts as $acc_equity)
                                                                        @if ($acc_equity->bsc_account_id==3)
                                                                            <tr>
                                                                                <td>{{ $acc_equity->code }}</td>
                                                                                <td>{{ $acc_equity->name_en }}</td>
                                                                                <td>{{ $acc_equity->account_type_name }}</td>
                                                                                <td style="text-align-last: center">
                                                                                    @if ($button_edit == '1')
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $acc_equity->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    @if ($button_delete == '1')
                                                                                        <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$acc_equity->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
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
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Code</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($ch_accounts))
                                                                    @foreach ($ch_accounts as $acc_expense)
                                                                        @if ($acc_expense->bsc_account_id==6)
                                                                            <tr>
                                                                                <td>{{ $acc_expense->code }}</td>
                                                                                <td>{{ $acc_expense->name_en }}</td>
                                                                                <td>{{ $acc_expense->account_type_name }}</td>
                                                                                <td style="text-align-last: center">
                                                                                    @if ($button_edit == '1')
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $acc_expense->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    @if ($button_delete == '1')
                                                                                        <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$acc_expense->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
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
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Code</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($ch_accounts) >0)
                                                                    @foreach ($ch_accounts as $acc_revenue)
                                                                        @if ($acc_revenue->bsc_account_id==4)
                                                                            <tr>
                                                                                <td>{{ $acc_revenue->code }}</td>
                                                                                <td>{{ $acc_revenue->name_en }}</td>
                                                                                <td>{{ $acc_revenue->account_type_name }}</td>
                                                                                <td style="text-align-last: center">
                                                                                    @if ($button_edit == '1')
                                                                                        <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $acc_revenue->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    @if ($button_delete == '1')
                                                                                        <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$acc_revenue->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                                    @endif
                                                                                    {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
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
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Code</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>TT-001</td>
                                                                    <td>Touch Rith</td>
                                                                    <td>Call</td>
                                                                    <td style="text-align-last: center">
                                                                        @if ($button_edit == '1')
                                                                            <a title="Edit" href="javascript:void(0);"​ onclick="go_to('bsc_chart_account_list_edit/{{ $item->id }}')"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        @endif
                                                                        @if ($button_delete == '1')
                                                                            <a title="Delete" href="javascript:void(0);" onclick="bsc_delete_data({{$item->id}},'bsc_chart_account_list_delete','bsc_chart_account_list','Chart Account Deleted Succseefully !','BSC_030305')"><i class="far fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;
                                                                        @endif
                                                                        {{-- <a title="Archive" href="javascript:;"><i class="fa fa-archive"></i></a> --}}
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

    });
    // Delete chart account
        function ch_account_delete(id){
            alert(id);
        }


    $('.chart_account').click(function(e)
    {
        var ld = $(this).attr("​value");
        go_to(ld);
    })
    // $('.edit').click(function(e)
    // {
    //     var id = $(this).attr("​value");
    //     go_to(id);
    // });
    // $('.detail').click(function(e)
    // {
    //     var id = $(this).attr("​value");
    //     go_to(id);
    // });
    </script>

