<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-calendar-times"></i> Payroll</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascrip:;" class="btn bg-gradient-primary" onclick="">Export Excel</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @php
                    //   print_r($data);
                  @endphp
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      <th>Employee ID</th>
                      <th>Role</th>
                      <th>Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                          $salary="100 $";
                      @endphp
                    @foreach ($data[0] as $em)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$em->name}}</td>
                        <td>{{$em->id_number}}</td>
                        <td>{{$em->position}}</td>
                        <td>{{$salary}}</td>
                        <td class="text-right">
                          {{-- <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-4">
                                  <a href="" class="btn btn-info btn-sm">Generate Slip</a>
                                </div>
                                <div class="col-md-4">
                                  <a href="" class="btn btn-info btn-sm">Payroll Items</a>
                                </div>  
                                <div class="col-md-4">
                                  <a href="" class="btn btn-info btn-sm">Approve</a>
                                </div>    
                              </div>
                          </div> --}}
                          <a href="" class="btn btn-info btn-sm">Generate Slip</a>
                          <a href="" class="btn btn-info btn-sm">Payroll Items</a>
                          <a href="" class="btn btn-info btn-sm">Approve</a>
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
    $('#tbl_payroll').DataTable({
      responsive: true
    });
} );
</script>