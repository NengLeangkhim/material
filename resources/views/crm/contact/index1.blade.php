
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contacts</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Contacts</li>
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
                                        <a  href="#" class="btn btn-block btn-success checkcard" ​value="contact" id="checkcard"><i class="fas fa-address-card"></i> Show Card</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped"  style="white-space: nowrap;">
                                     <thead>
                                        <tr>
                                            <th>No</th>
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
                                    @foreach($contact as $key=>$row)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
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
            $('.checkcard').click(function(e)
            {
                var ld = $(this).attr("​value");
                go_to(ld);
            })
            $('.edit').click(function(e)
            {
                var id = $(this).attr("​value");
                alert(id);
            });
            </script>
