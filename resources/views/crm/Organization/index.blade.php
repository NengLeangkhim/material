
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
                                            <th style="color: #FFFFFF">No</th>
                                            <th style="color: #FFFFFF">Organization</th>
                                            <th style="color: #FFFFFF">Contact</th>
                                            <th style="color: #FFFFFF">Email</th>
                                            <th style="color: #FFFFFF">Phone</th>
                                            <th style="color: #FFFFFF">Assigned To </th>
                                            <th style="color: #FFFFFF">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i =0;$i<sizeof($organize);$i++){
                                                ?>
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$organize[$i]["name_en_branch"]}}</td>
                                                        <td>{{$organize[$i]["name_en_contact"]}}</td>
                                                        <td>{{$organize[$i]["email_branch"]}}</td>
                                                        <td>{{$organize[$i]["branch_phone"]}}</td>
                                                        <td>{{$organize[$i]["user_assig_to"]}}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-block btn-info btn-sm organization_detail" ​value='/organizations/detail/{{$organize[$i]["branch_id"]}}' >
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
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
