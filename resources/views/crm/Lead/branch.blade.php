
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-code-branch"></i> Branch </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/lead')">Lead</a></li>
                            <li class="breadcrumb-item active">View Branch By Lead</li>
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background: #1fa8e0">
                                                {{-- <th>Lead Number</th> --}}
                                                <th style="color:#FFFFFF">Company Name EN</th>
                                                <th  style="color:#FFFFFF">Company Name KH</th>
                                                <th  style="color:#FFFFFF">Email</th>
                                                <th  style="color:#FFFFFF">Website </th>
                                                <th  style="color:#FFFFFF">Facebook </th>
                                                <th  style="color:#FFFFFF">Lead status</th>
                                                <th  style="color:#FFFFFF">Assigned To</th>
                                                <th  style="color:#FFFFFF">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            for($i =0;$i<sizeof($branch);$i++){
                                                if($branch[$i]["survey_comment"]!=null){
                                                    ?>
                                                        <tr style="background: yellowgreen">
                                                            <td style="color: #FFFFFF">{{$branch[$i]["company_en"]}}</td>
                                                            <td style="color: #FFFFFF">{{$branch[$i]["company_kh"]}}</td>
                                                            <td style="color: #FFFFFF">{{$branch[$i]["primary_email"]}}</td>
                                                            <td style="color: #FFFFFF">{{$branch[$i]["primary_website"]}}</td>
                                                            <td style="color: #FFFFFF">{{$branch[$i]["facebook"]}}</td>
                                                            <td style="color: #FFFFFF">{{$branch[$i]["lead_status"]}}</td>
                                                            <td style="color: #FFFFFF">{{$branch[$i]['assig']}}</td> 
                                                            <td style="color: #FFFFFF">  
                                                                <a href="#" class="btn btn-block btn-info btn-sm branchdetail" ​value="detailbranch/{{$branch[$i]["branch_id"]}}"  onclick="go_to('detailbranch/{{$branch[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>                                                     
                                                            </td>
                                                        </tr> 
                                                    <?php
                                                }else {
                                                    ?>
                                                        <tr>
                                                            <td>{{$branch[$i]["company_en"]}}</td>
                                                            <td>{{$branch[$i]["company_kh"]}}</td>
                                                            <td>{{$branch[$i]["primary_email"]}}</td>
                                                            <td>{{$branch[$i]["primary_website"]}}</td>
                                                            <td>{{$branch[$i]["facebook"]}}</td>
                                                            <td>{{$branch[$i]["lead_status"]}}</td>
                                                            <td>{{$branch[$i]['assig']}}</td> 
                                                            <td>  
                                                                <a href="#" class="btn btn-block btn-info btn-sm branchdetail" ​value="detailbranch/{{$branch[$i]["branch_id"]}}"  onclick="go_to('detailbranch/{{$branch[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>                                                     
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
            