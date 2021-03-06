
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
                            <h1><i class="fas fa-address-card"></i> <span>Contacts</span></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Contact</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- section Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header p-2">
                        <div class="row">
                          {{-- <div class="col-8">
                            <ul class="nav nav-pills">
                              <li class="nav-item"><a class="nav-link active" href="#Crm_Card_Contact" data-toggle="tab"><i class="fas fa-credit-card"></i></a></li>
                              <li class="nav-item"><a class="nav-link" href="#Crm_List_Contact" data-toggle="tab"><i class="fas fa-list"></i></a></li>
                            </ul>
                          </div> --}}
                          <div class="col-4">
                            <a  href="#" class="btn btn-success crm_contact" ​value="/contact/add" id="crm_contact"><i class="fas fa-plus"></i> Add Contact</a>
                          </div>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body" >
                        <div class="tab-content">
                            {{-- show contact like card --}}
                            {{-- <div class="active tab-pane" id="Crm_Card_Contact" >
                              @include('crm.contact.CrmPaginationContact')
                            </div> --}}
                            <!-- /.tab-pane -->
                            <!--show contact like table -->
                            <div class="active tab-pane" id="Crm_List_Contact">
                              <div class="col-12">
                                <table id="tblIndexContact" class="table table-bordered table-striped"  style="width:100%; white-space: nowrap;">
                                    <thead>
                                        <tr style="background: #1fa8e0">
                                            {{-- <th style="color: #FFFFFF">No</th> --}}
                                            <th style="color: #FFFFFF">Name EN</th>
                                            <th style="color: #FFFFFF">Name KH</th>
                                            <th style="color: #FFFFFF">Phone</th>
                                            {{-- <th style="color: #FFFFFF">Facebook</th> --}}
                                            <th style="color: #FFFFFF">Email </th>
                                            <th style="color: #FFFFFF">Detail</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <div id="ShowModalContact"></div>
          <script type="text/javascript">
              t=$("#tblIndexContact").DataTable({
                // "responsive": true,
                scrollX:true,
                "autoWidth": false,
                "serverSide": true,
                "scrollY": "400px",
                "scrollCollapse": false,
                "paging": true,
                "ajax": "contact/datatable",
                "columnDefs": [
                      {
                          "searchable": false,
                          "targets": 4
                          },
                      {
                          // The `data` parameter refers to the data for the cell (defined by the
                          // `data` option, which defaults to the column being worked with, in
                          // this case `data: 0`.
                          "render": function ( data, type, row ) {
                              return '<div class="container-fluid datatable-action-col"><div class="row form-inline">'+
                                          '<div class="col-md-12">'+
                                            '<button class="btn btn-info btn-block  btn-sm CrmEditContact" onclick=go_to("/contact/edit/'+data+'")><i class="fas fa-wrench"></i></button>'+
                                          '</div>'+
                                      '</div></div>';
                          },
                          "targets": 4
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

              $('#crm_contact').click(function(e) // function go to add contact
              {
                  var link = $(this).attr("​value");
                  go_to(link);
              });
              // $('.listtabel').click(function(e)
              // {
              //     var table = $(this).attr("​value");
              //     go_to(table);
              // });
            // $('.CrmContactDetail').click(function(e)
            // {
            //     var id = $(this).attr("​value");
            //     go_to(id);
            // });
          </script>
