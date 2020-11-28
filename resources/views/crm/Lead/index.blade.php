
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
                                                <th style="color: #FFFFFF">No</th>
                                                <th style="color: #FFFFFF">Lead Number</th>
                                                <th style="color: #FFFFFF">Customer Name</th>
                                                <th style="color: #FFFFFF">Email</th>
                                                <th style="color: #FFFFFF">Website </th>
                                                {{-- <th style="color: #FFFFFF">Facebook </th> --}}
                                                <th style="color: #FFFFFF">Action</th>
                                                {{-- <th>Detail</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{dd()}} --}}
                                            <?php
                                            for($i =0;$i<sizeof($lead);$i++){
                                                ?>
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$lead[$i]["lead_number"]}}</td>
                                                        <td>{{$lead[$i]["customer_name_en"]}}</td>
                                                        <td>{{$lead[$i]["email"]}}</td>
                                                        <td>{{$lead[$i]["website"]}}</td>
                                                        {{-- <td>{{$lead[$i]["create_by"]['last_name_en']." ".$lead[$i]["create_by"]['first_name_en']}}</td>                                                 --}}
                                                        {{-- <td>{{$lead[$i]["facebook"]}}</td>                                                 --}}
                                                        <td>
                                                            <div class="row-12 form-inline">
                                                                <div class="col-md-6">
                                                                    <a href="javascript:void(0);" class="btn btn-block btn-danger  btn-sm branch" value="detaillead/{{$lead[$i]["lead_id"]}}" onclick="go_to('detaillead/{{$lead[$i]['lead_id']}}')" title="Edit Lead">
                                                                        <i class="fas fa-edit">  </i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-6 ">
                                                                    <a href="javascript:void(0);" class="btn btn-block btn-info btn-sm branch" value="branch/{{$lead[$i]["lead_id"]}}" onclick="go_to('branch/{{$lead[$i]['lead_id']}}')" title="Show Branch Of Lead">
                                                                        <i class="fas fa-code-branch">  </i>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        {{-- <td>
                                                            <a href="#" class="btn btn-block btn-info btn-sm detail" ​value="detaillead" ><i class="fas fa-info-circle"></i></a>
                                                        </td> --}}
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
            // $('.branch').click(function(e)
            // {
            //     var id = $(this).attr("​value");
            //     go_to(id);
            // });

            </script>
