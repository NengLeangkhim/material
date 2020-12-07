
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-code-branch"></i> Branches </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/organizations')">Organization</a></li>
                                <li class="breadcrumb-item active">View Branch of organization</li>
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
                                    <div class="col-12">
                                        <div class="row"> --}}
                                            <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                            {{-- <a  href="#" class="btn btn-success lead" ​value="addlead" id="lead"><i class="fas fa-plus"></i> Add Lead</a>  --}}
                                        {{-- </div>
                                    </div>
                                </div> --}}
                                <div class="card-body">
                                    <table id="TableOrganizeBranchId" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background: #1fa8e0">
                                                {{-- <th>Lead Number</th> --}}
                                                <th style="color:#FFFFFF">Name EN</th>
                                                <th  style="color:#FFFFFF">Name KH</th>
                                                {{-- <th  style="color:#FFFFFF">Email</th>
                                                <th  style="color:#FFFFFF">Website </th> --}}
                                                {{-- <th  style="color:#FFFFFF">Facebook </th> --}}
                                                <th  style="color:#FFFFFF">Assigned To</th>
                                                <th  style="color:#FFFFFF">Email</th>
                                                <th  style="color:#FFFFFF">Status</th>
                                                {{-- <th  style="color:#FFFFFF">Detail</th> --}}
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
    t=$("#TableOrganizeBranchId").DataTable({
    scrollX:true,
    "autoWidth": false,
    "serverSide": true,
    "ajax": "/organizations/branches/datatable/{{ $organize_id }}",
    });

</script>
