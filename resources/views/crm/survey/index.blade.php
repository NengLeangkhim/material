
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-tasks"></i> Surveys </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Survey</li>
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background: #1fa8e0">
                                                <th style="color:#FFFFFF">Create Date</th>
                                                <th style="color:#FFFFFF">Customer Name EN</th>
                                                <th style="color:#FFFFFF">Customer Name KH</th>
                                                <th style="color:#FFFFFF">Address Type</th>
                                                <th style="color:#FFFFFF">Home Number </th>
                                                <th style="color:#FFFFFF">Street Number </th>
                                                <th style="color:#FFFFFF">Latlong</th>
                                                <th style="color:#FFFFFF">Create By</th> 
                                                <th style="color:#FFFFFF">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                            for($i =0;$i<sizeof($survey);$i++){
                                                if( $survey[$i]["create_date"]==date('d-m-yy')){
                                                    ?>
                                                    <tr style="background: #d42931">
                                                        <td style="color:#FFFFFF">{{$survey[$i]["create_date"]}}</td>
                                                        <td style="color:#FFFFFF">{{$survey[$i]["name_en"]}}</td>
                                                        <td style="color:#FFFFFF">{{$survey[$i]["name_kh"]}}</td>
                                                        <td style="color:#FFFFFF">{{$survey[$i]["address_type"]}}</td>
                                                        <td style="color:#FFFFFF"># {{$survey[$i]["home_en"]}}</td>
                                                        <td style="color:#FFFFFF">St {{$survey[$i]["street_en"]}}</td>
                                                        <td style="color:#FFFFFF">{{$survey[$i]["latlg"]}}</td>                                                       
                                                        <td style="color:#FFFFFF">{{$survey[$i]["user_create"]['last_name_en']}} {{$survey[$i]["user_create"]['first_name_en']}}</td>                                                       
                                                       
                                                        <td>
                                                            <a href="#" class="btn btn-block btn-info btn-sm branchdetail" value=""  onclick="go_to('detailsurvey/{{$survey[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>                                                     
                                                        </td>
                                                    </tr> 
                                                <?php
                                                }
                                                else {
                                                    ?>
                                                    <tr >
                                                        <td>{{$survey[$i]["create_date"]}}</td>
                                                        <td>{{$survey[$i]["name_en"]}}</td>
                                                        <td>{{$survey[$i]["name_kh"]}}</td>
                                                        <td>{{$survey[$i]["address_type"]}}</td>
                                                        <td># {{$survey[$i]["home_en"]}}</td>
                                                        <td>St {{$survey[$i]["street_en"]}}</td>
                                                        <td>{{$survey[$i]["latlg"]}}</td>                                                       
                                                        <td>{{$survey[$i]["user_create"]['last_name_en']}} {{$survey[$i]["user_create"]['first_name_en']}}</td>
                                                       
                                                        <td>
                                                            <a href="#" class="btn btn-block btn-info btn-sm branchdetail" value=""  onclick="go_to('detailsurvey/{{$survey[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>                                                     
                                                        </td>
                                                    </tr> 
                                                <?php
                                                }
                                               
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
            // $('.backlead').click(function(e)
            // {
            //     var ld = $(this).attr("​value");
            //     go_to(ld);
            // })
            $('.edit').click(function(e)
            {
                var id = $(this).attr("​value");
                go_to(id);
            });
            $('.branchdetail').click(function(e)
            {
                var id = $(this).attr("​value");
                go_to(id);
                // alert(id);
            });
            </script>
            