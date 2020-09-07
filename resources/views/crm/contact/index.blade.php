
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contact</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Contact</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- section Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">                  
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#Card" data-toggle="tab">Show Card</a></li>
                          <li class="nav-item"><a class="nav-link" href="#List" data-toggle="tab">Show List</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body" >
                        <div class="tab-content">
                            {{-- show contact like card --}}
                            <div class="active tab-pane" id="Card" >
                              <div class="col-12 " >
                                <div class="row d-flex align-items-stretch">
                                  @foreach ($contact as $row )
                                  <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch" >
                                    <div class="card bg-light" style="width:1000px">
                                      <div class="card-header text-muted border-bottom-0">                                    
                                      </div>
                                      <div class="card-body pt-0">
                                        <div class="row">
                                          <div class="col-7">
                                          <h2 class="lead"><b>{{($row->name_en)=='Null'? "N/A":$row->name_en}}</b></h2>
                                          <h2 class="lead"><b>{{($row->name_kh)=='Null'? "N/A":$row->name_kh}}</b></h2>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                              <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> Email : {{($row->email)=='NUll'? "turbotech@gmail.com":$row->email}}                                  </li>
                                              <li class="small"><span class="fa-li"><i class="fab fa-facebook-f"></i></span> Facbook : {{($row->facebook)=='Null'? "N/A":$row->facebook}}                                  </li>
                                              <li class="small"><span class="fa-li"><i class="fas fa-phone-alt"></i></span> Phone : {{($row->phone)=='Null'? "N/A":$row->phone}}</li>
                                            </ul>
                                          </div>
                                          <div class="col-5 text-center">
                                            <img src="../../dist/img/user8-128x128.jpg" alt="" class="img-circle img-fluid">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <div class="text-right">
                                          {{-- <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                          </a> --}}
                                          <a href="#" class="btn btn-sm btn-primary edit" ​value="{{$row->id}}">
                                            <i class="fas fa-user"></i> View Profile
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach                      
                                  
                                </div> 
                              </div>
                            </div>
                            <!-- /.tab-pane -->
                            <!--show contact like table -->
                            <div class="tab-pane" id="List">
                              <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Contact Number</th>
                                            <th>Name eng</th>
                                            <th>Name Kh</th>
                                            <th>phone</th>
                                            <th>facebook</th>
                                            <th>Email </th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contact as $row)
                                        <tr>
                                            <td>TT-CON0000002</td>
                                            <td>{{$row->name_en}}</td>
                                            <td>{{$row->name_kh}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->facebook}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                <a href="#" class="btn btn-block btn-info btn-sm edit" ​value="{{$row->id}}"><i class="fas fa-wrench"></i></a>
                                            </td>
                                        </tr>                                       
                                    @endforeach
                                    </tbody>  
                                </table>
                            </div>
                          </div>
                          <!-- /.tab-pane -->        
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
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
              $('.listtabel').click(function(e)
              {
                  var table = $(this).attr("​value");
                  go_to(table);
              });
              $('.edit').click(function(e)
            {
                var id = $(this).attr("​value");
                alert(id);
            });
             
              </script>
