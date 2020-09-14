<section>
<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Employees</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_AddEditEmployee()"><i class="fas fa-plus"></i> Add Employee</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @php
                    // print_r($employee);
                @endphp
                <table class="table table-bordered" id="tbl_employee" style="width:100%">
                  <thead>                  
                    <tr>
                      <th style="">#</th>
                      <th style="">Name</th>
                      <th>Khmer Name</th>
                      <th>Employee ID</th>
                      <th>Mobile</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($employee as $e)
                      <tr>
                      <th>{{ ++$i }}</th>
                      <td><img src="{{"http://172.17.168.27:82/".$e->image}}" alt="" width="50px" height="50px" style="border-radius:50px;margin-right:10px"> {{ $e->first_name_en." ".$e->last_name_en }} </td>
                      <td> {{$e->first_name_kh." ".$e->last_name_kh }} </td>
                      <td>{{ $e->id_number }}</td>
                      <td>{{ $e->contact}}</td>
                      <td>{{ $e->position }}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascript:;" onclick="HRM_AddEditEmployee({{$e->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_detail_employee','modal_employee_detail',{{$e->id}})"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascript:;"><i class="far fa-trash-alt" onclick="hrm_delete({{$e->id}},'hrm_delete_employee','hrm_allemployee','Employee Deleted Succseefully !')"></i></a></div>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_employee').DataTable({
      responsive: true
    });
} );
</script>
</section>