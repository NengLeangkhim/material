
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
                        <div class="col-12 col-sm-12" >
                          <div class="card card-primary card-tabs" >
                            <div class="card-header p-0 pt-1" style="background: #FFFFFF">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                  <a style="color: #000000" class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">List Survey</a>
                                </li>
                                <li class="nav-item">
                                  <a style="color: #000000" class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Survey Result</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    {{-- <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body"> --}}
                                                    <table id="example1" class="table table-bordered table-striped" style="width:100%; white-space: nowrap;">
                                                        <thead>
                                                            <tr style="background: #1fa8e0">
                                                                <th style="color:#FFFFFF">No</th>
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
                                                                        <td style="color:#FFFFFF">{{$i+1}}</td>
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
                                                                        <td>{{$i+1}}</td>
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
                                                {{-- </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    {{-- <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body"> --}}
                                                    <table id="example2" class="table table-bordered table-striped" style="width:100%; white-space: nowrap;">
                                                        <thead>
                                                            <tr style="background: #1fa8e0">
                                                                <th style="color:#FFFFFF">No</th>
                                                                <th style="color:#FFFFFF">Create Date</th>
                                                                <th style="color:#FFFFFF">Customer Name EN</th>
                                                                <th style="color:#FFFFFF">Customer Name KH</th>
                                                                <th style="color:#FFFFFF">Address Type</th>
                                                                <th style="color:#FFFFFF">Survey</th>
                                                                <th style="color:#FFFFFF">Comment </th>
                                                                <th style="color:#FFFFFF">Create By</th>
                                                                {{-- <th style="color:#FFFFFF">Detail</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             <?php
                                                            for($i =0;$i<sizeof($survey_result);$i++){
                                                                    ?>
                                                                    <tr>
                                                                        <td >{{$i+1}}</td>
                                                                        <td >{{$survey_result[$i]["create_date"]}}</td>
                                                                        <td >{{$survey_result[$i]["name_en"]}}</td>
                                                                        <td >{{$survey_result[$i]["name_kh"]}}</td>
                                                                        <td >{{$survey_result[$i]["address_type"]}}</td>
                                                                        <td >{{$survey_result[$i]["possible"]==true? "Yes":"No"}}</td>
                                                                        <td >{{$survey_result[$i]["comment"]}}</td>
                                                                        <td >{{$survey_result[$i]["survey_create_by"]['last_name_en']}} {{$survey_result[$i]["survey_create_by"]['first_name_en']}}</td>

                                                                        {{-- <td>
                                                                            <a href="#" class="btn btn-block btn-info btn-sm branchdetail" value=""  onclick="go_to('detailsurvey/{{$survey_result[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>
                                                                        </td> --}}
                                                                    </tr>
                                                                <?php

                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                {{-- </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                   Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                   Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                              </div>
                            </div>
                            <!-- /.card -->
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
                $("#example2").DataTable({
                    "responsive": true,
                });
            });
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
