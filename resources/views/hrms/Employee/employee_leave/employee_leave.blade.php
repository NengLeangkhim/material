<section>
<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Employees Leave</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_employee" style="width:100%">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Name</th>
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
                    @foreach ($employee_leave as $e)
                      <tr>
                      <th>{{ ++$i }}</th>
                      <td>
                        {{-- <img src="{{$e->image}}" alt="" width="50px" height="50px" style="border-radius:50px;margin-right:10px"> {{ $e->name_en }}  --}}
                        <div class="text-center">
                              <img src="{{$e->image}}" alt="" width="50px" height="50px" style="border-radius:50px;margin-right:10px">
                          </div>
                          <div class="text-center">
                              {{ $e->name_en}}
                          </div> 
                      </td>
                      <td style="padding-top:24px "> {{$e->name_kh}} </td>
                      <td style="padding-top:24px ">{{ $e->id_number }}</td>
                      <td style="padding-top:24px ">{{ $e->contact}}</td>
                      <td style="padding-top:24px ">{{ $e->position }}</td>
                      <td><div class="col-md-4"><a href="javascript:;" onclick="hrms_employee_detail({{$e->id}})"><i class="fas fa-info"></i></a></div></td>
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
    $(document).ajaxStop(function(){
      $("#department").select2();
      $("#position").select2();
    });
} );
</script>
</section>