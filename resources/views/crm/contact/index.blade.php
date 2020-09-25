
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-address-card"></i> <span>Contact</span></h1>
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
                        <div class="row">
                          <div class="col-8">
                            <ul class="nav nav-pills">
                              <li class="nav-item"><a class="nav-link active" href="#Crm_Card_Contact" data-toggle="tab"><i class="fas fa-credit-card"></i></a></li>
                              <li class="nav-item"><a class="nav-link" href="#Crm_List_Contact" data-toggle="tab"><i class="fas fa-list"></i></a></li>
                            </ul>
                          </div>
                          <div class="col-4 text-right">
                            <a  href="#" class="btn btn-success crm_contact" ​value="/contact/add" id="crm_contact"><i class="fas fa-plus"></i> Add Contact</a> 
                          </div>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body" >
                        <div class="tab-content">
                            {{-- show contact like card --}}
                            <div class="active tab-pane" id="Crm_Card_Contact" >
                              @include('crm.contact.CrmPaginationContact')
                            </div>
                            <!-- /.tab-pane -->
                            <!--show contact like table -->
                            <div class="tab-pane" id="Crm_List_Contact">
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
                                    @foreach($contact_table as $row)
                                        <tr>
                                            <td>TT-CON0000002</td>
                                            <td>{{$row->name_en}}</td>
                                            <td>{{$row->name_kh}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->facebook}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                <a href="#" class="btn btn-block btn-info btn-sm CrmEditContact" ​value="/contact/edit/{{$row->id}}"><i class="fas fa-wrench"></i></a>
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
            <div id="ShowModalContact"></div>
          <script type="text/javascript">  
            $(document).ready(function() {
              $(document).on('click', '.pagination a', function(event) {// function click on link pagination
                  event.preventDefault();
                  var page = $(this).attr('href').split('page=')[1];//get value page number
                  fetch_data(page);// execute function
              });

              function fetch_data(page) {// function get data without refresh page 
                  $.ajax({
                      url: "/contact/pagination?page=" + page,// URL 
                      success: function(data) {
                          $('#Crm_Card_Contact').html(data);// refresh content
                      }
                  });
              }

            });
                     
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
              $('#crm_contact').click(function(e) // function go to add contact
              {
                  var link = $(this).attr("​value");
                  go_to(link);
              });
              $('.listtabel').click(function(e)
              {
                  var table = $(this).attr("​value");
                  go_to(table);
              });
              $('.CrmEditContact').click(function(e)
            {
                var id = $(this).attr("​value");
                go_to(id);
            });
            $('.CrmContactDetail').click(function(e)
            {
                var id = $(this).attr("​value");
                go_to(id);
            });
          </script>
