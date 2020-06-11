
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Leads</h1>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-2">
                                    <div class="row  ">
                                        <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                        <a  href="#" class="btn btn-block btn-success lead" ​value="addlead" id="lead"><i class="fas fa-wrench"></i> Add Lead</a> 
                                    </div>
                                </div>                               
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                        <tr>
                                            <th>Lead Number</th>
                                            <th>Customer/Comapny Name</th>
                                            <th>Email</th>
                                            <th>phone</th>
                                            <th>Lead Status </th>
                                            <th>Assigned To </th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lead as $row)
                                        <tr>
                                            <td>{{$row->lead_number}}</td>
                                            <td>{{$row->customer_name_en}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->status}}</td>
                                            <td>{{$row->create_by}}</td>
                                            <td>
                                                <a href="#" class="btn btn-block btn-info btn-sm edit" ​value="{{$row->id}}"><i class="fas fa-wrench"></i></a>
                                            </td>
                                        </tr>                                       
                                    @endforeach
                                    </tbody>  
                                </table>
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
                e.preventDefault();  
                // alert(ld);
                    $.ajax({   
                        type: 'GET',   
                        url:ld,
                        success:function(data){

                            $(".content-wrapper").show();
                            $(".content-wrapper").html(data);
                    }
                });
            })
            $('.edit').click(function(e)
            {
                var id = $(this).attr("​value");
                alert(id);
            });
            </script>
            