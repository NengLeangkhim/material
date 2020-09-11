
            <!-- Content Header (Page header) -->
            <section class="content-header">
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
                            <div class="card-body">
                                <table id="OrganizationTbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Organization Number</th>
                                            <th>CID</th>
                                            <th>Organization Name</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Assigned To </th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{-- @foreach($lead as $row) --}}
                                        <tr>
                                            <td>{{'TT-ACC0001'}}</td>
                                            <td>{{'N00004'}}</td>
                                            <td>{{'Bo Entertainment'}}</td>
                                            <td>{{'Leader Bo'}}</td>
                                            <td>{{'Oppa@gmail.com'}}</td>
                                            <td>{{'09999999'}}</td>
                                            <td>{{'XD'}}</td>
                                            <td>
                                            {{-- <a href="#" class="btn btn-block btn-info btn-sm edit" ​value="editlead/{{$row->id}}" ><i class="fas fa-wrench"></i></a>detaillead --}}
                                            <a href="#" class="btn btn-block btn-info btn-sm organization_detail" ​value="/organizations/detail" ><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>                                       
                                    {{-- @endforeach --}}
                                    </tbody>  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </section><!-- end section Main content -->
            <script>
              $(function () {
                $("#OrganizationTbl").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
              });
              $('.organization_detail').click(function(e)
              {
                  var table = $(this).attr("​value");
                  go_to(table);
              });
            </script>
