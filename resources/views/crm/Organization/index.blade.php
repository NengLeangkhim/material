
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
                            <div class="card-header">
                                <div class="col-6">
                                    <div class="row">
                                        <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                        <a href="javascript:void(0);" class="btn btn-success CrmAddOrganization" onclick="go_to('/organizations/add')" id="CrmAddOrganization"><i class="fas fa-plus"></i> Add Organization</a> 
                                    </div>
                                </div>                               
                            </div>
                            <div class="card-body">
                                <table id="OrganizationTbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background: #1fa8e0">
                                            <th style="color: #FFFFFF">Organization Number</th>
                                            <th style="color: #FFFFFF">CID</th>
                                            <th style="color: #FFFFFF">Organization Name</th>
                                            <th style="color: #FFFFFF">Customer Name</th>
                                            <th style="color: #FFFFFF">Email</th>
                                            <th style="color: #FFFFFF">Phone</th>
                                            <th style="color: #FFFFFF">Assigned To </th>
                                            <th style="color: #FFFFFF">Detail</th>
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
