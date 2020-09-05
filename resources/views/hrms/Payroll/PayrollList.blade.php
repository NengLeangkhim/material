<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Payroll List</strong></h1>
                <div class="col-md-12 text-right">
                    {{-- <a href="javascrip:;" class="btn bg-gradient-primary" onclick="">Export Excel</a> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @php
                      print_r($data[1]);
                  @endphp
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      {{-- <th>Employee ID</th> --}}
                      <th>Role</th>
                      <th>Base Salary</th>
                      <th>Overtime</th>
                      <th>Commission</th>
                      <th>Bonus</th>
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
                        {{-- <td>{{$em->id_number}}</td> --}}
                        <td>{{$em->position}}</td>
                        <td>{{$salary}}</td>
                        <td>{{$salary}}</td>
                        <td>{{$salary}}</td>
                        <td>{{$salary}}</td>
                        
                        <td class="text-right">
                          {{-- <a href="javascrip:;" class="btn btn-info btn-sm" onclick="HRM_ShowDetail('hrm_payslip','modal_payslip',{{$em->id}})">Generate Slip</a> --}}
                          {{-- <a href="javascrip:;" class="btn btn-info btn-sm" onclick="HRM_ShowDetail('hrm_payrollitems','modal_payrollitems',{{$em->id}})">Payroll Items</a> --}}
                          <a href="javascrip:;" class="btn btn-info btn-sm" onclick="HRM_ShowDetail('hrm_paroll_detail','modal_payrolldetail',{{$em->id}})">Detail</a>
                          <a href="javascrip:;" class="btn btn-info btn-sm">Approve</a>
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