
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-user"></i> Customer Branch</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Customer Branch</li>
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
                                        
                                    </div>                               
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Branch Name</th>
                                                <th>Branch Address</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($lead as $row) --}}
                                                <tr>
                                                    <td>{{'Sov Sothea'}}</td>
                                                    <td>{{'ABC'}}</td>
                                                    <td>{{'Toul Kok'}}</td>
                                                    <td>
                                                    {{-- <a href="#" class="btn btn-block btn-info btn-sm edit" ​value="editlead/{{$row->id}}" ><i class="fas fa-wrench"></i></a>Detail --}}
                                                    <a href="javascript:" class="btn btn-block btn-info btn-sm customer_branch_detail" ​value="/bsc_customer_branch/detail" ><i class="fas fa-info-circle"></i></a>
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


            <script type="text/javascript">
            
            $(function () {
                $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
                $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
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
            </script>
            <script>
              $(function () {
                $("#OrganizationTbl").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
              });
              $('.customer_branch_detail').click(function(e)
              {
                  var table = $(this).attr("​value");
                  go_to(table);
              });
            </script>
            