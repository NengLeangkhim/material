
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-address-card"></i> <span>Contacts</span></h1>
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
                                        <tr style="background: #1fa8e0">
                                            {{-- <th style="color: #FFFFFF">Contact Number</th> --}}
                                            <th style="color: #FFFFFF">Name EN</th>
                                            <th style="color: #FFFFFF">Name KH</th>
                                            <th style="color: #FFFFFF">Phone</th>
                                            <th style="color: #FFFFFF">Facebook</th>
                                            <th style="color: #FFFFFF">Email </th>
                                            <th style="color: #FFFFFF">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contact_table->data as $row)
                                        <tr>
                                            {{-- <td>TT-CON0000002</td> --}}
                                            <td>{{$row->name_en}}</td>
                                            <td>{{$row->name_kh}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->facebook}}</td>
                                            <td>{{$row->email}}</td>
                                            <td style="text-align: center">                                                
                                              
                                                <div class="row-12 form-inline">
                                                  <div class="col-md-6">
                                                    <button class="btn btn-info btn-block  btn-sm CrmEditContact" ​value="/contact/edit/{{$row->id}}"><i class="fas fa-wrench"></i></button>      
                                                  </div>
                                                  <div class="col-md-6 ">
                                                    <button href="javascript:void(0);" class="btn btn-block  btn-danger btn-sm CrmDeleteContact" onclick="Crm_delete({{$row->id}},'/contact/delete','/contact','Deleted successfully')"><i class="fas fa-trash"></i></button>         
                                                  </div>
                                              </div> 
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
