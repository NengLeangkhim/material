
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-user"></i> Leads</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Leads</li>
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
                                            <a  href="#" class="btn btn-success lead" ​value="addlead" id="lead"><i class="fas fa-plus"></i> Add Lead</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap;">
                                        <thead>
                                            <tr style="background: #1fa8e0">
                                                {{-- <th style="color: #FFFFFF">No</th> --}}
                                                <th style="color: #FFFFFF">Lead Number</th>
                                                <th style="color: #FFFFFF">Customer Name</th>
                                                <th style="color: #FFFFFF">Email</th>
                                                <th style="color: #FFFFFF">Phone </th>
                                                <th style="color: #FFFFFF">Create Date </th>
                                                <th style="color: #FFFFFF">Action</th>
                                                {{-- <th>Detail</th> --}}
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- end section Main content -->


            <script type="text/javascript">

            $(function () {
                t=$("#example1").DataTable({
                scrollX:true,
                "autoWidth": false,
                "serverSide": true,
                "ajax": "lead/datatable",
                "columnDefs": [
                    {
                        "searchable": false,
                        "render": function(data,type,row){
                            return moment(data).format('YYYY-M-DD h:mm:ss');
                        },
                        "targets": 4
                        },
                    {
                        // The `data` parameter refers to the data for the cell (defined by the
                        // `data` option, which defaults to the column being worked with, in
                        // this case `data: 0`.
                        "searchable": false,
                        "render": function ( data, type, row ) {
                            return '<div class="container-fluid datatable-action-col" ><div class="row form-inline">'+
                                        '<div class="col-6">'+
                                            '<a href="javascript:void(0);" class="btn btn-block btn-danger  btn-sm branch" value="detaillead/'+data+'" onclick="go_to(\'detaillead/'+data+'\')" title="Edit Lead">'+
                                                '<i class="fas fa-edit">  </i>'+
                                            '</a>'+
                                        '</div>'+
                                        '<div class="col-6 ">'+
                                            '<a href="javascript:void(0);" class="btn btn-block btn-info btn-sm branch" value="branch/'+data+'" onclick="go_to(\'branch/'+data+'\')" title="Show Branch Of Lead">'+
                                                '<i class="fas fa-code-branch">  </i>'+
                                            '</a>'+
                                        '</div>'+
                                    '</div></div>';
                        },
                        "width": "100px",
                        "targets": 5,
                    },
                ]
                });
            });
            $('.lead').click(function(e)
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
            // $('.branch').click(function(e)
            // {
            //     var id = $(this).attr("​value");
            //     go_to(id);
            // });

            </script>
