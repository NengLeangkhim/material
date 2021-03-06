
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <style>
                    th {
                        font-size: 16px;
                    }

                    td {
                        font-size: 14px;
                    }
                </style>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><span><i class="fas fa-sitemap"></i></span> Organization</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Organization</li>
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
                            {{-- <div class="card-header">
                                <div class="col-6">
                                    <div class="row">
                                        <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                        <a href="javascript:void(0);" class="btn btn-success CrmAddOrganization" onclick="go_to('/organizations/add')" id="CrmAddOrganization"><i class="fas fa-plus"></i> Add Organization</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-body">
                                <table id="OrganizationTbl" class="table table-bordered table-striped"  style="white-space: nowrap;">
                                    <thead>
                                        <tr style="background: #1fa8e0">
                                            {{-- <th style="color: #FFFFFF">No</th> --}}
                                            <th style="color: #FFFFFF">Organization</th>
                                            <th style="color: #FFFFFF">Email</th>
                                            <th style="color: #FFFFFF">Phone</th>
                                            <th style="color: #FFFFFF">website</th>
                                            <th style="color: #FFFFFF">Facebook</th>
                                            <th style="color: #FFFFFF">Detail</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </section><!-- end section Main content -->
            <script>
              t=$("#OrganizationTbl").DataTable({
                // "responsive": true,
                scrollX:true,
                "autoWidth": false,
                "serverSide": true,
                "scrollY": "400px",
                "scrollCollapse": false,
                "paging": true,
                "searchDelay":500,
                "ajax": "organizations/datatable",
                "columnDefs": [

                    {
                        // The `data` parameter refers to the data for the cell (defined by the
                        // `data` option, which defaults to the column being worked with, in
                        // this case `data: 0`.
                        "searchable": false,
                        "render": function ( data, type, row ) {
                            return '<div class="container-fluid datatable-action-col"><div class="row form-inline">'+
                                        '<div class="col-md-6">'+
                                            '<a href="javascript:void(0);" class="btn btn-block btn-danger  btn-sm branch" value="detaillead/'+data+'" onclick="go_to(\'detaillead/'+data+'\')" title="Edit Organization">'+
                                                '<i class="fas fa-edit">  </i>'+
                                            '</a>'+
                                        '</div>'+
                                        '<div class="col-md-6 ">'+
                                            '<a href="javascript:void(0);" class="btn btn-block btn-info btn-sm branch" value="branch/'+data+'" onclick="go_to(\'organizations/branches/'+data+'\')" title="Show Branch Of Organization">'+
                                                '<i class="fas fa-code-branch">  </i>'+
                                            '</a>'+
                                        '</div>'+
                                    '</div></div>';
                        },
                        "width": "100px",
                        "targets": 5,
                    },
                ],
                "initComplete": function()
                {
                    $(".dataTables_filter input")
                    .unbind() // Unbind previous default bindings
                    .bind("keyup", function(e) { // Bind our desired behavior
                        // If the length is 3 or more characters, or the user pressed ENTER, search
                        if(this.value.length >= 3 || e.keyCode == 13) {
                            // Call the API search function
                            t.search(this.value).draw();
                            notify_alert('.dataTables_filter input','success', 'top center', 'search success')
                        }else{
                            notify_alert('.dataTables_filter input','warn', 'top center', 'please input 3 characters or more')
                        }
                        // Ensure we clear the search if they backspace far enough
                        if(this.value == "") {
                            t.search("").draw();
                        }
                        return;
                    });
                }
              });
              $('.organization_detail').click(function(e)
              {
                  var table = $(this).attr("​value");
                  go_to(table);
              });
            </script>
