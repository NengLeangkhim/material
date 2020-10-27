<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Payroll List Report</strong></h1>
                <div class="col-md-12 text-right">
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <select name="" id="custom_select_payroll_list_report" class="form-control" onchange="custom_payroll_list_report()">
                            <option value="t">All</option>
                            <option value="f">Select Month and Year</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                      <select name="" id="select_year_payroll" class="form-control" onchange="custom_payroll_list_report()" disabled>
                        @php
                              for($y=2013;$y<=date('Y');$y++){
                                echo '<option value="'.$y.'">'.$y.'</option>';
                              }
                        @endphp
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="" id="select_month_payroll" class="form-control" onchange="custom_payroll_list_report()" disabled>
                        <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">Appril</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- /.card-header -->
                <div class="card-body" id="paroll_by_month">
                <table class="table table-bordered" id="tbl_payroll_list_report" style="width: 100%">
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
                      <th>Is Approved</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @foreach ($data[0] as $empayroll)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$empayroll[1]}}</td>
                        <td>{{$empayroll[2]}}</td>
                        <td>{{$empayroll[3]}}</td>
                        <td>{{$empayroll[4]}}</td>
                        <td>{{$empayroll[5]}}</td>
                        <td>{{$empayroll[6]}}</td>
                        <td class="text-center">
                          
                          @php
                              if($empayroll[11]==1){
                               $btn='<label class="btn btn-danger btn-sm">Yes</label>';
                              }else {
                                $btn='<label class="btn btn-info btn-sm">Yes</label>';
                              }
                              echo $btn;
                          @endphp
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
    $('#tbl_payroll_list_report').DataTable({
      responsive: true
    });
} );

var d = new Date();
var month = d.getMonth();
var year=d.getFullYear();
$("#select_month_payroll").val(month+1);
$("#select_year_payroll").val(year);
</script>